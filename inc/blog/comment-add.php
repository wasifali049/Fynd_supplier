<?php
include('../../lib/bpconn.php');

$model = $_REQUEST;

$errors = [];
$data = [];

function addInquiryOffer($db, $model)
{
    $created_at = date('Y-m-d H:i:s', time());

    $comment = $model['comment'];
    $bid = $model['bid'];
    $uid = $model['uid'];

    $sqlKey = "`comment`, `bid`, `uid`, `created_at`";
    $sqlValue = "'{$comment}', '{$bid}', '{$uid}', '{$created_at}'";

    $sql = "INSERT INTO `blog_comment` ({$sqlKey}) VALUES ({$sqlValue})";

    $query = mysqli_query($db, $sql);

    return $query ? true : false;
}

if (!empty($errors)) {
    $data['errors'] = $errors;
} else {

    $m = addInquiryOffer($db, $model);

    $data['success'] = true;
    $data['status'] = true;
    $data['data'] = $m;
    $data['errors'] = false;
}

echo json_encode($data);
