<?php
include('../../lib/bpconn.php');

$model = $_REQUEST;


$errors = [];
$data = [];

function addInquiry($db, $model)
{
    $created_at = date('Y-m-d H:i:s', time());

    $number = $model['number'];
    $login_id = get_user_id();
    $type = $model['type'];

    $loginUserModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$login_id}'");
    $providerUserModel = fetch_object($db, "SELECT * FROM `user` WHERE mobile='{$number}'");

    $contact_to = $providerUserModel->id;
    $contact_from = $loginUserModel->id;

    $to_number = $providerUserModel->mobile;
    $from_number = $loginUserModel->mobile;

    $sqlKey = "`contact_to`, `contact_from`, `to_number`, `from_number`, `type`, `created_at`";
    $sqlValue = "'{$contact_to}', '{$contact_from}', '{$to_number}', '{$from_number}', '{$type}', '{$created_at}'";

    $sql = "INSERT INTO `contact_inquiry` ({$sqlKey}) VALUES ({$sqlValue})";

    $query = mysqli_query($db, $sql);

    $lastId = mysqli_insert_id($db);
    sendWhatsappInquiry($db, $lastId);

    return $query ? true : false;
}

if (!empty($errors)) {
    $data['errors'] = $errors;
} else {

    $m = addInquiry($db, $model);

    $data['success'] = true;
    $data['status'] = true;
    $data['data'] = $m;
    $data['errors'] = false;
}

echo json_encode($data);
