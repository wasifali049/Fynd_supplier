<?php

include('../../lib/bpconn.php');
include('../../lib/sms-config.php');

$errors = [];
$data = [];
$data['data'] = false;
$data['success'] = false;
$data['status'] = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_REQUEST['user'])) {

        $user = $_REQUEST['user'];
        // var_dump($user);
        $data['membership'] = $user['membership'];
        $data['root'] = get_root();
        if (isset($user['submit_type'])) {

            $user = $_POST['user'];
            $mobile = isset($user['mobile']) ? $user['mobile'] : '';
            $email = isset($user['email']) ? $user['email'] : '';
            $chemical = isset($user['chemicals']) ? $user['chemicals'] : '';
            $otp = isset($user['email_otp']) ? $user['email_otp'] : '';
            $user_type = isset($user['user_type']) ? $user['user_type'] : 'supplier';
            $country_code = isset($user['country_code']) ? $user['country_code'] : '91';

            $user['mobile'] = $mobile;
            $user['user_type'] = $user_type;
            $user['country_code'] = $country_code;
            $user['chemicals'] = $chemical;

            if (!empty($mobile)) {

                if (!validNumber($mobile)) {
                    $errors['error'] = 'Mobile Number is not valid.';
                } else {
                    $mobile = $country_code . $mobile;
                    $sql = mysqli_query($db, "SELECT mobile FROM user WHERE mobile='{$mobile}'");
                    if (mysqli_num_rows($sql) > 0) {
                        $errors['error'] = 'User Already Exist!';
                        $userType = 'old';
                    } else {
                        $userType = 'new';
                    }
                }
            } else {
                $errors['error'] = 'Mobile Number Required!!';
            }


            if (!empty($email)) {
                if (!validEmail($email)) {
                    $errors['error'] = 'Email ID is not valid.';
                } else {
                    $mobile = $country_code . $mobile;
                    $sql = mysqli_query($db, "SELECT email FROM user WHERE email='{$email}'");
                    if (mysqli_num_rows($sql) > 0) {
                        $errors['error'] = 'User Already Exist!';
                        $userType = 'old';
                    } else {
                        $userType = 'new';
                    }
                }
            } else {
                $errors['error'] = 'Email ID Required!!';
            }

            if (!empty($otp)) {
                if (strlen($otp) != 6) {
                    $errors['error'] = 'OTP is not valid.';
                } else {
                    $sql = mysqli_query($db, "SELECT id FROM user_otp WHERE email='{$email}' AND otp='{$otp}'");
                    if (mysqli_num_rows($sql) > 0) {
                        mysqli_query($db, "DELETE FROM `user_otp` WHERE email='{$email}'");
                    } else {
                        $errors['error'] = 'OTP is not valid.';
                    }
                }
            } else {
                $errors['error'] = 'Email ID Required!!';
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
            $email = $user['email'];
            $user_type = $user['user_type'];
            $chemical = $user['chemicals']; // <--- make sure this is included
            $country_code = $user['country_code'];

            $countryModel = fetch_object($db, "SELECT * FROM `country` WHERE `phonecode`='{$country_code}'");
            $country = $countryModel->nicename;
            $created_at = date('Y-m-d H:i:s', time());

            $mobile = $country_code . $mobile;
            $userSlug = generateRandomKey();

            // Add `chemicals` to both column and value
            $k = "`profile_photo`, `name`, `mobile`, `email`, `user_type`, `country_code`, `chemicals`, `country`, `slug`, `created_at`";
            $val = "'profile.png', '{$name}', '{$mobile}', '{$email}', '{$user_type}', '{$country_code}', '{$chemical}', '{$country}', '{$userSlug}', '{$created_at}'";

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
    } else {
        $errors['error'] = 'Data not valid.';
    }
} else {
    $errors['error'] = 'Unauthorized access.';
}
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $m = checkUser($db, $mobile, $userType, $user);

    $success = $m ? true : false;
    $errors['error'] = 'Successfully Login! Please wait for a while...';
    $data['success'] = $success;
    $data['status'] = $success;
    $data['data'] = $m;
    $data['errors'] = $m ? false : $errors['error'];
}

echo json_encode($data);
