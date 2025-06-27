<?php
include('../../lib/bpconn.php');

$model = $_REQUEST['user'];
$established_year = (isset($_REQUEST['established_year'])) ? $_REQUEST['established_year'] : '';

$model['established_year'] = $established_year;
$userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$model['id']}'");
$errors = [];
$data = [];
$em_photo = '';

if (empty($model['name'])) {
    $errors['error'] = 'name is required.';
}

if (empty($model['mobile'])) {
    $errors['error'] = 'Mobile is required.';
}else{
    if(!validNumber($model['mobile'])){
        $errors['error'] = 'Mobile is not valid.';
    }
}

$photo = isset($_FILES['photo']) ? $_FILES['photo'] : '';


$em_photo = $userModel->profile_photo;

$target_dir = "../../assets/img/profile/";



if (!empty($photo['name'])) {

    $data1 = [];
    $data1['filename'] = '';
    $data1['success'] = 'false';
    $data1['error'] = '';

    $token1 = rand(1234, 6789);
    $iName1 = '';
    $true = 1;

    $target_file1 = $target_dir . basename($token1 . $photo["name"]);
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $check1 = getimagesize($photo["tmp_name"]);
    $kb_5 = 600000;

    if ($check1 !== false) {
        if ($photo["size"] <= $kb_5) {
            if (move_uploaded_file($photo["tmp_name"], $target_file1)) {
                $iName1 = htmlspecialchars(basename($token1 . $photo["name"]));
                $error = $iName1;
                $data1['error'] = '';
                $data1['filename'] = $iName1;
                $data1['success']  = 'true';
            } else {
                $error = "Sorry, there was an error uploading your file.";
                $data1['error'] = $error;
                $data1['success']  = 'false';
            }
        } else {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
            $data1['error'] = $error;
            $data1['success']  = 'false';
        }
    } else {
        $error = "File is not an image.";
        $uploadOk = 0;
        $data1['error'] = $error;
        $data1['success']  = 'false';
    }
    
    $e1 = $data1;

    if ($e1['success'] === false) {
        $errors['error'] = $e1['error'];
    } else {
        if ($userModel->profile_photo != 'profile.png' && !empty($userModel->profile_photo)) {
            unlink($target_dir . $userModel->profile_photo);
        }
        $em_photo = $e1['filename'];
    }
}


// if (empty($_REQUEST['email'])) {
//     $errors['error'] = 'Price is required.';
// }

function updateUser($db, $profile_photo, $model)
{
    $value = (object) $model;
    $id = $model['id'];

    $updated_at = date('Y-m-d H:i:s', time());

    $mobile = $value->country_code . $value->mobile;

    $keyVal = "`profile_photo`='{$profile_photo}', `name`='{$value->name}',`mobile`='{$mobile}',`email`='{$value->email}',`company_name`='{$value->company_name}',`country`='{$value->country}',`website`='{$value->website}',`origin`='{$value->origin}',`about`='{$value->about}',`user_type`='{$value->user_type}',`updated_at`='{$updated_at}',`country_code`='{$value->country_code}',`established_year`='{$value->established_year}'";
    // if ($value->user_type == "supplier") {
    //     foreach ($value->chemical as $chemicalKey => $chemicalVal) {
    //         $chemical_id = $chemicalVal;
    //         mysqli_query($db, "INSERT INTO `supplier_chemical_list`(`uid`, `chemical_id`, `created_at`) VALUES ('{$id}','{$chemical_id}','{$updated_at}')");
    //     }
    // }

    $sql = "UPDATE `user` SET {$keyVal} WHERE id={$id}";
    $query = mysqli_query($db, $sql);
    return $query ? true : false;
}

if (!empty($errors)) {
    $data['errors'] = $errors;
} else {
    $m = updateUser($db, $em_photo, $model);
    $data['success'] = true;
    $data['status'] = true;
    $data['data'] = $m;
    $data['errors'] = false;
}

echo json_encode($data);
