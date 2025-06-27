<?php
include('../../lib/bpconn.php');

include('../../lib/fynd-post/mail-config.php');


$model = $_REQUEST['shortOnTime'];

$mobile = $_REQUEST['country_code'] . $model['mobile'];

$model['mobile'] = $mobile;
$model['country_code'] = $_REQUEST['country_code'];

$errors = [];

$data = [];


// if (empty($model['name'])) {
//     $errors['error'] = 'Name is required.';
// } else {
//     if (!validName($model['name'])) {
//         $errors['error'] = 'Name is not valid.';
//     }
// }


if (empty($model['mobile'])) {
    $errors['error'] = 'Mobile is required.';
}
else {
    if (!validNumber($model['mobile'])) {
        $errors['error'] = 'Mobile Number is not valid.';
    }
}


// if (empty($model['email'])) {
//     $errors['error'] = 'Email is required.';
// } else {
//     if (!validEmail($model['email'])) {
//         $errors['error'] = 'Email is not valid.';
//     }
// }


if (empty($model['message'])) {
    $errors['error'] = 'message is required.';
}

function addFeedback($db, $model)
{
    $created_at = date('Y-m-d H:i:s', time());

    $name = $model['name'];
    $country_code = $model['country_code'];
    $mobile = $model['mobile'];
    $email = $model['email'];
    $message = $model['message'];
    $chemical = $model['chemical'];
    $location = $model['location'];

    $sqlKey = "`name`, `country_code`, `mobile`, `email`, `message`, `chemical`, `location`, `created_at`";
    $sqlValue = "'{$name}', '{$country_code}', '{$mobile}', '{$email}', '{$message}', '{$chemical}', '{$location}', '{$created_at}'";

    $sql = "INSERT INTO `short_on_time` ({$sqlKey}) VALUES ({$sqlValue})";

    $query = mysqli_query($db, $sql);

    $last_id = mysqli_insert_id($db);

    searchInquiryMail($db, $last_id);

    return $query ? true : false;
}

if (!empty($errors)) {
    $data['errors'] = $errors;
} else {

    $m = addFeedback($db, $model);

    $data['success'] = true;
    $data['status'] = true;
    $data['data'] = $m;
    $data['errors'] = false;
}

echo json_encode($data);
