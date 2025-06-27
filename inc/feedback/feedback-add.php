<?php
include('../../lib/bpconn.php');

$errors = [];
$data = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if(!empty($_REQUEST['feedback'])){

        $model = $_REQUEST['feedback'];
        
        if(empty($_REQUEST['country_code'])){
            $errors['error'] = 'Country code is required.';
        }
        
        $mobile = $_REQUEST['country_code'] . $model['mobile'];
        
        $model['mobile'] = $mobile;
        $model['country_code'] = $_REQUEST['country_code'];
        
    
        
        
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
        
        
        // if (empty($model['mobile'])) {
        //     $errors['error'] = 'Mobile is required.';
        // } else {
        //     if (validNumber($mobile)) {
        //         $errors['error'] = 'Mobile Number is not valid.';
        //     }
        // }
        
        
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
        
            $name = '';
            $country_code = $model['country_code'];
            $mobile = $model['mobile'];
            $email = '';
            $message = $model['message'];
        
            $sqlKey = "`name`, `country_code`, `mobile`, `email`, `message`, `created_at`";
            $sqlValue = "'{$name}', '{$country_code}', '{$mobile}', '{$email}', '{$message}', '{$created_at}'";
        
            $sql = "INSERT INTO `site_feedback` ({$sqlKey}) VALUES ({$sqlValue})";
        
            $query = mysqli_query($db, $sql);
        
            return $query ? true : false;
        }
    }else{
        $errors['error'] = 'Data not valid.';
    }
}else{
    $errors['error'] = 'Unauthorized access.';
}

if (!empty($errors)) {
    // $data['errors'] = $errors;
    
    
    $data['success'] = false;
    $data['status'] = false;
    $data['data'] = '';
    $data['errors'] = $errors;
    
} else {

    $m = addFeedback($db, $model);

    $data['success'] = true;
    $data['status'] = true;
    $data['data'] = $m;
    $data['errors'] = false;
}

echo json_encode($data);
