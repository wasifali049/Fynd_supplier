<?php
include('../../lib/bpconn.php');
include('../../lib/fynd-post/mail-config.php');


$errors = [];

$data = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $model = $_REQUEST['homeInquiry'];

        $model['login_uid'] = get_user_id();

        

        if (empty($model['details'])) {
            $errors['error'] = 'Details field is required.';
        }

        function addInquiryOffer($db, $model)
        {
            $created_at = date('Y-m-d H:i:s', time());
            $login_uid = $model['login_uid'];
            $details = $model['details'];

            $sqlKey = "`login_uid`, `details`, `created_at`";
            $sqlValue = " '{$login_uid}', '{$details}', '{$created_at}'";

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
