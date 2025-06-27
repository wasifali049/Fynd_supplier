<?php
include('../../lib/bpconn.php');
include('../../lib/fynd-post/mail-config.php');


$errors = [];

$data = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if(!empty($_REQUEST['inquiry'])){

        $model = $_REQUEST['inquiry'];
        
        $chemical = $_REQUEST['chemical'];
        
        $model['chemical'] = $chemical;
        
        
        
        $mobile = $_REQUEST['country_code'] . $model['mobile'];
        
        $model['mobile'] = $mobile;
        $model['country_code'] = $_REQUEST['country_code'];
        
        
        
        
        if (empty($model['mobile'])) {
            $errors['error'] = 'Mobile is required.';
        }else{
            if (!validNumber($model['mobile'])) {
            $errors['error'] = 'Mobile is not valid.';    
            }
        }
        
        if (empty($model['chemical'])) {
            $errors['error'] = 'Chemical is required.';
        }
        
        if (empty($model['email'])) {
            $errors['error'] = 'Email is required.';
        }else{
            if(!validEmail($model['email'])){
                $errors['error'] = 'Email is not valid.';
            }
        }
        
        
        if ($model['type'] != 'inquiry') {
            if (empty($model['target_offer_price'])) {
                $errors['error'] = 'Target/Offer Price is required.';
            }
        }
        
        
        if (empty($model['details'])) {
            $errors['error'] = 'Details field is required.';
        }
        
        
        
        $em_photo = 'product.png';
        $photo = isset($_FILES['photo']) ? $_FILES['photo'] : '';
        
        $target_dir = "../../assets/img/offer/";
        
        
        
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
        
        
        function checkUser($db, $mobile, $userType, $user)
        {
            $data = ($userType == 'old') ? fetchUser($db, $mobile) : addUser($db, $user);
            return $data->id;
        }
        
        
        function addUser($db, $user)
        {
            $mobile = $user['mobile'];
            $user_type = ($user['type'] == 'inquiry') ? 'buyer' : 'supplier';
            $country_code = $user['country_code'];
            $email = $user['email'];
            $created_at = date('Y-m-d H:i:s', time());
            $countryModel = fetch_object($db, "SELECT * FROM `country` WHERE `phonecode`='{$country_code}'");
            $country = $countryModel->nicename;
            $userSlug = generateRandomKey();
            $k =  "`profile_photo`, `name`, `mobile`, `user_type`, `email`, `country_code`, `country`, `slug`, `created_at`";
            $val =  "'profile.png', 'Guest', '{$mobile}','{$user_type}', '{$email}', '{$country_code}', '{$country}', '{$userSlug}', '{$created_at}'";
        
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
        
        function addInquiryOffer($db, $model, $em_photo)
        {
            $created_at = date('Y-m-d H:i:s', time());
        
            $mobile = $model['mobile'];
            $chemical = $model['chemical'];
            $email = $model['email'];
            $target_offer_price = $model['target_offer_price'];
            $details = $model['details'];
            $type = $model['type'];
            $status = [];
        
            $usersql = mysqli_query($db, "SELECT mobile FROM user WHERE mobile='{$mobile}'");
            if (mysqli_num_rows($usersql) > 0) {
                $userType = 'old';
            } else {
                $userType = 'new';
            }
        
            if ($userType == 'old') {
                $uid = checkUser($db, $mobile, $userType, $model);
            
                $rfq = mt_rand(100000, 999999);
            
                if ($type == 'offer') {
            
                    $min_order_quantity = 1;
            
                    $sqlKey = "`image`, `uid`, `mobile`, `chemical`, `email`, `target_offer_price`, `min_order_quantity`, `details`, `type`, `rfq`, `created_at`";
                    $sqlValue = "'{$em_photo}', '{$uid}', '{$mobile}', '{$chemical}', '{$email}', '{$target_offer_price}',{$min_order_quantity}, '{$details}', '{$type}', '{$rfq}', '{$created_at}'";
                } else {
                    $min_order_quantity = 1;
                    $sqlKey = "`uid`, `mobile`, `chemical`, `email`, `target_offer_price`, `details`, `type`, `rfq`, `created_at`";
                    $sqlValue = "'{$uid}', '{$mobile}', '{$chemical}', '{$email}', '{$target_offer_price}', '{$details}', '{$type}', '{$rfq}', '{$created_at}'";
                }
            
                $sql = "INSERT INTO `inquiry_offer` ({$sqlKey}) VALUES ({$sqlValue})";
            
                $query = mysqli_query($db, $sql);
                $last_id = mysqli_insert_id($db);
                if ($type == 'offer') {
                    supplierInquiryMail($db, $last_id);
                } else {
                    buyerInquiryMail($db, $last_id);
                }
                $status['error'] = '';
                $status['status'] = true;
            } else {
                $status['error'] = 'Only register user can be posted here. please signup first.';
                $status['status'] = false;
            }
        
            return $status;
        }
    
    }else{
        $errors['error'] = 'Data not valid.';
    }
    
}else{
    $errors['error'] = 'Unauthorized access.';
}

if (!empty($errors)) {
    $data['errors'] = $errors;
} else {

    $m = addInquiryOffer($db, $model, $em_photo);

    $success = $m['status'] ? true : false;
    $errors['error'] = $success ? 'Successfully Login! Please wait for a while...' : $m['error'];
    $data['success'] = $success;
    $data['status'] = $success;
    $data['data'] = $m;
    $data['errors'] = $errors;
}

echo json_encode($data);
