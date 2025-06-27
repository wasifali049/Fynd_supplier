<?php
include('../../lib/bpconn.php');

$v = $_REQUEST;
$message = $v['message'];
$identity = $v['identity'];
$action = $v['action']; // this will be 'identity', 'anonymous', or 'email'

$errors = [];
$data = [];

if (empty($message)) {
    $errors['error'] = 'Message is required.';
}

function addGroupMessage($db, $message, $identity, $action)
{
    $created_at = date('Y-m-d H:i:s');    
    $uid = get_user_id(); 

    // Check if action is email to add 'Don't post publicly' note
    $dontPost = ($action === 'email') ? "Don't post publically" : "";

    // Escape message and note
    $message = mysqli_real_escape_string($db, $message);
    $dontPost = mysqli_real_escape_string($db, $dontPost);

    $sql = "INSERT INTO `group_chat` (`uid`, `message`, `post_type`, `status`, `dont_post`, `created_at`) 
            VALUES ({$uid}, '{$message}', {$identity}, 'approved', '{$dontPost}', '{$created_at}')";

    $query = mysqli_query($db, $sql);

    if (!$query) {
        die("MySQL Error: " . mysqli_error($db));
    }

    $id = mysqli_insert_id($db);
    $model = fetch_object($db, "SELECT * FROM `group_chat` WHERE id='{$id}'");

    return $model;
}

function getMessageData($db, $model)
{
    $html = '';
    if (!empty($model)) {
        $html .= getMessageContent($db, $model);
    }
    return $html;
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $m = addGroupMessage($db, $message, $identity, $action);

    $status = !empty($m) ? true : false;
    $datas = getMessageData($db, $m);

    $data['success'] = $status;
    $data['data'] = $datas;
    $data['message'] = 'Success!';
}

echo json_encode($data);
