<?php

include('../../lib/bpconn.php');
include('../../lib/sms-config.php');

$errors = [];
$data = [];
$data['data'] = false;
$data['success'] = false;
$data['status'] = false;

$user = $_REQUEST['user'];

if (isset($user['submit_type'])) {

    $user = $_POST['user'];
    $mobile = isset($user['mobile']) ? $user['mobile'] : '';
    $user_type = isset($user['user_type']) ? $user['user_type'] : 'supplier';
    $country_code = isset($user['country_code']) ? $user['country_code'] : '91';

    $user['mobile'] = $mobile;
    $user['user_type'] = $user_type;
    $user['country_code'] = $country_code;

    if (!empty($mobile)) {

        if (!validNumber($mobile)) {
            $errors['error'] = 'Mobile Number is not valid.';
        } else {
            $mobile = $country_code . $mobile;
            $sql = mysqli_query($db, "SELECT mobile FROM user WHERE mobile='{$mobile}'");
            if (mysqli_num_rows($sql) > 0) {
                $userType = 'old';
            } else {
                //$userType = 'new';
                $errors['error'] = 'Please Signup!!';
            }
        }
    } else {
        $errors['error'] = 'Mobile Number Required!!';
    }
} else {

    $errors['error'] = 'Unauthorized Access!!';
}



function checkUser($db, $mobile, $userType, $user)

{
    $data = ($userType == 'old') ? fetchUser($db, $mobile) : addUser($db, $user);

    setLogin($db, $data->id);

    return $data;
}

function addUser($db, $user)
{
    $name = !empty($user['name']) ? $user['name'] : 'Guest';
    $mobile = $user['mobile'];
    $user_type = $user['user_type'];
    $country_code = $user['country_code'];
    $countryModel = fetch_object($db, "SELECT * FROM `country` WHERE `phonecode`='{$country_code}'");
    $country = $countryModel->nicename;
    $created_at = date('Y-m-d H:i:s', time());

    $mobile = $country_code . $mobile;
    $userSlug = generateRandomKey();
    $k =  "`profile_photo`, `name`, `mobile`, `user_type`, `country_code`, `country`, `slug`, `created_at`";
    $val =  "'profile.png', '{$name}', '{$mobile}','{$user_type}', '{$country_code}', '{$country}', '{$userSlug}', '{$created_at}'";

    $sql = "INSERT INTO `user` ($k) VALUES ($val)";

    $query = mysqli_query($db, $sql);
    $lastId = mysqli_insert_id($db);

    $sql1 = "SELECT * FROM `user` WHERE id='{$lastId}'";
    $model = fetch_object($db, $sql1);

    return $model;
}

function fetchUser($db, $mobile)
{
    $k =  "mobile='{$mobile}'";
    $sql = "SELECT * FROM `user` WHERE $k";
    $model = fetch_object($db, $sql);

    return $model;
}




function addCart($db, $selected_color, $selected_size, $quantity, $product_id)
{

    $user_id = get_user_id();
    $created_at = getCreatedAt();

    $chkSql = "SELECT * FROM `cart` WHERE `product_id`='" . $product_id . "' AND `color`='" . $selected_color . "' AND `size`='" . $selected_size . "' AND `user_id`='" . $user_id . "'";
    $chkQuery = mysqli_query($db, $chkSql);



    if (mysqli_num_rows($chkQuery) > 0) {

        $oldModel = mysqli_fetch_object($chkQuery);
        $tQty = ($oldModel->quantity + $quantity);

        $updateSql = "UPDATE `cart` SET `quantity`='" . $tQty . "' WHERE product_id='" . $product_id . "' AND user_id='" . $user_id . "'";

        $s = mysqli_query($db, $updateSql);
    } else {

        $sql = "INSERT INTO `cart`(`product_id`, `quantity`, `color`, `size`, `user_id`, `created_at`) VALUES ('" . $product_id . "','" . $quantity . "','" . $selected_color . "','" . $selected_size . "','" . $user_id . "','" . $created_at . "')";
        $query = mysqli_query($db, $sql);
    }

    $qty = cartTotalCount($db);

    return $qty;
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {

    if ($userType == 'old') {
        $m = checkUser($db, $mobile, $userType, $user);
    } else {
        $m = false;
    }

    $success = $m ? true : false;
    $errors['error'] = 'Successfully Login! Please wait for a while...';
    $data['success'] = $success;
    $data['status'] = $success;
    $data['data'] = $m;
    $data['errors'] = $m ? false : $errors['error'];
}

echo json_encode($data);
