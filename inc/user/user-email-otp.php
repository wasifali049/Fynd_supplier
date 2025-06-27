<?php

include('../../lib/bpconn.php');
include('../../lib/sms-config.php');
include('../../lib/fynd-post/mail-config.php');

$errors = [];
$data = [];
$data['data'] = false;
$data['success'] = false;
$data['status'] = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(!empty($_REQUEST['user'])){
        $user = $_REQUEST['user'];
        if (isset($user['submit_type'])) {
            $user = $_POST['user'];
            $email = isset($user['email']) ? $user['email'] : '';

            if (!empty($email)) {
                if (!validEmail($email)) {
                    $errors['error'] = 'Email ID is not valid.';
                } else {
                    
                    $sql = mysqli_query($db, "SELECT email FROM user WHERE email='{$email}'");
                    if (mysqli_num_rows($sql) > 0) {
                        $errors['error'] = 'User Already Exist!';
                    }
                }
            } else {
                $errors['error'] = 'Email ID Required!!';
            }

        } else {
            $errors['error'] = 'Unauthorized Access!!';
        }
    }else{
        $errors['error'] = 'Data not valid.';
    }

}else{
    $errors['error'] = 'Unauthorized access.';
}
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $m = sendOTP($db, $user);

    $success = $m ? true : false;
    $errors['error'] = 'OTP Send Successfully.';
    $data['success'] = $success;
    $data['status'] = $success;
    $data['data'] = $m;
    $data['errors'] = $m ? false : $errors['error'];
}


function sendOTP($db, $user)
{
    $name = isset($user['name']) ? $user['name'] : '';
    $email = isset($user['email']) ? $user['email'] : '';
    $otp = rand(123456, 567890);
    $created_at = date('Y-m-d H:i:s', time());

    $deleteSql = "DELETE FROM `user_otp` WHERE email='{$email}'";
    mysqli_query($db, $deleteSql);
    $insertSql = "INSERT INTO `user_otp` (`name`, `email`, `otp`, `created_at`) VALUES ('{$name}', '{$email}', '{$otp}', '{$created_at}')";
    mysqli_query($db, $insertSql);

    $id = mysqli_insert_id($db);

    signupOTPMail($db, $id);

    return $id;
}

echo json_encode($data);
