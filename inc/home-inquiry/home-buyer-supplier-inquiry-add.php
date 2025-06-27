<?php
include('../../lib/bpconn.php');
include('../../lib/fynd-post/mail-config.php');


$errors = [];

$data = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_REQUEST['homeInquiry']) && isset($_REQUEST['homeInquiry']['user_id'])){
        $model = $_REQUEST['homeInquiry'];
        $mobile = $_REQUEST['country_code'] . $model['mobile'];
        $model['mobile'] = $mobile;
        $model['country_code'] = $_REQUEST['country_code'];

        // if (empty($model['mobile'])) {
        //     $errors['error'] = 'Mobile is required.';
        // }else{
        //     if (!validNumber($model['mobile'])) {
        //     $errors['error'] = 'Mobile is not valid.';
        //     }
        // }

        if (empty($model['who_to_contact'])) {
            $errors['error'] = 'User Type is required.';
        }

        if (empty($model['destination'])) {
            $errors['error'] = 'Destination is required.';
        }

        if (empty($model['chemical_id'])) {
            $errors['error'] = 'Chemical is required.';
        }

        // if (empty($model['quantity'])) {
        //     $errors['error'] = 'Quantity is required.';
        // }

        $model['user_id'] = implode(',', $model['user_id']);
        $model['login_uid'] = get_user_id();

        if (empty($model['user_id'])) {
            $errors['error'] = 'User is required.';
        }

        if (empty($model['details'])) {
            $errors['error'] = 'Details field is required.';
        }

        function addInquiryOffer($db, $model)
        {
            $created_at = date('Y-m-d H:i:s', time());

            $uid = $model['user_id'];
            $login_uid = $model['login_uid'];
            $mobile = $model['mobile'];
            $chemical = $model['chemical_id'];
            $who_to_contact = $model['who_to_contact'];
            $destination = $model['destination'];
            $details = $model['details'];
            $quantity = $model['quantity'];

            $sqlKey = "`uid`, `login_uid`, `mobile`, `chemical`, `who_to_contact`, `destination`, `details`, `quantity`, `created_at`";
            $sqlValue = "'{$uid}', '{$login_uid}', '{$mobile}', '{$chemical}', '{$who_to_contact}', '{$destination}', '{$details}', '{$quantity}', '{$created_at}'";

            $sql = "INSERT INTO `home_buyer_supplier_inquiry` ({$sqlKey}) VALUES ({$sqlValue})";

            $query = mysqli_query($db, $sql);
            $last_id = mysqli_insert_id($db);

            // if ($type == 'offer') {
            //     supplierInquiryMail($db, $last_id);
            // } else {
            //     buyerInquiryMail($db, $last_id);
            // }

            return $query ? true : false;
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

    $m = addInquiryOffer($db, $model);

    $data['success'] = true;
    $data['status'] = true;
    $data['data'] = $m;
    $data['errors'] = false;
}

echo json_encode($data);
