<?php
include('../../lib/bpconn.php');

$model = $_REQUEST['search'];

$mobile = $_REQUEST['country_code'] . $model['mobile'];

$model['mobile'] = $mobile;
$model['country_code'] = $_REQUEST['country_code'];

$errors = [];

$data = [];


if (empty($model['buy'])) {
    $errors['error'] = 'Want Buy/ Want Sell Field is required.';
}else{
    $allowed = ['I Want To Sell', 'I Want To Buy'];
    
    if ( ! in_array( $model['buy'], $allowed ) ) {
    $errors['error'] = 'Important field is missing.';    
    }
}

if (empty($model['chemical'])) {
    $errors['error'] = 'Chemical is required.';
}

if (empty($model['name'])) {
    $errors['error'] = 'Name is required.';
} else {
    if (!validName($model['name'])) {
        $errors['error'] = 'Name is not valid.';
    }
}


if (empty($model['mobile'])) {
    $errors['error'] = 'Mobile is required.';
}else{
    if (!validNumber($model['mobile'])) {
        $errors['error'] = 'Mobile is not valid.';    
    }
}


if (
    ! empty( $model['email'] )
    && ( ! validEmail($model['email'] ) )
){
    $errors['error'] = 'Email is not valid.';
}


if (empty($model['message'])) {
    $errors['error'] = 'Details field is required.';
}

if (empty($model['page'])) {
    $errors['error'] = 'Important field is missing.';
}


if ( empty( $_REQUEST['in_site'] ) || $_REQUEST['in_site'] != 'in site'){
    $errors['error'] = 'Important field is missing.';
}

$em_photo = '';
$photo = isset($_FILES['photo']) ? $_FILES['photo'] : '';

$target_dir = "../../assets/img/search/";

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
        $em_photo = $e1['filename'];
    }
}




function addSearch($db, $model, $em_photo)
{
    $created_at = date('Y-m-d H:i:s', time());

    $buy = $model['buy'];
    $chemical = $model['chemical'];
    $name = $model['name'];
    $country_code = $model['country_code'];
    $mobile = $model['mobile'];
    $email = $model['email'];
    $message = $model['message'];
    $page = $model['page'];

    $sqlKey = "`buy`, `chemical`, `name`, `country_code`, `mobile`, `email`, `message`, `page`, `attachment`, `created_at`";
    $sqlValue = "'{$buy}', '{$chemical}', '{$name}', '{$country_code}', '{$mobile}', '{$email}', '{$message}', '{$page}', '{$em_photo}', '{$created_at}'";

    $sql = "INSERT INTO `search_modal` ({$sqlKey}) VALUES ({$sqlValue})";

    $query = mysqli_query($db, $sql);

    return $query ? true : false;
}

$m = addSearch($db, $model, $em_photo);




if (!empty($errors)) {
    $data['errors'] = $errors;
} else {

    $m = addSearch($db, $model, $em_photo);

    $data['success'] = true;
    $data['status'] = true;
    $data['data'] = $m;
    $data['errors'] = false;
}

echo json_encode($data);
