<?php
require_once "../../lib/bpconn.php";

extract($_REQUEST);

$data['success'] = false;
$data['status'] = '';
$data['data'] = '';


if (!empty($id)) {
    $mainSql = "SELECT * FROM `supplier_chemical_list` WHERE `id`={$id}";
    $model = fetch_assoc($db, $mainSql);

    $supplierUserModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$model['uid']}'");
    $loginId = get_user_id();
    $buyerUserModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$loginId}'");

    $model['buyer_name'] = $buyerUserModel->name;
    $model['buyer_mobile'] = $buyerUserModel->mobile;
    $model['supplier_name'] = $supplierUserModel->name;
    $model['supplier_country'] = $supplierUserModel->country;

    $model = (object) $model;

    $data['success'] = true;
    $data['status'] = 'success';
    $data['data'] = $model;
}

echo json_encode($data);
