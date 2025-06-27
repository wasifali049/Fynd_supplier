<?php
include('../lib/bpconn.php');

include('../lib/config-details.php');

check_admin_auth();



extract($_REQUEST);

if (!empty($id)) {

    $updated_at = date('Y-m-d H:i:s', time());


    $productSql = "SELECT * FROM inquiry_offer WHERE id='" . $id . "'";

    $productModel = fetch_object($db, $productSql);

    $newStatus = ($productModel->status == 1) ? 0 : 1;

    $sql1 = "UPDATE `inquiry_offer` SET `status`='{$newStatus}', `updated_at`='{$updated_at}' WHERE id='{$id}'";

    $message = "<b>Quotation</b><br><b>Email:</b> {$productModel->email}<br><b>Chemical required:</b> {$productModel->chemical}<br><b>Target Price:</b> {$productModel->target_offer_price}<br><b>Details:</b> {$productModel->details}";


    addGroupMessage($db, $productModel->uid, $message);



    sendSupplierWP($db, $id);


    if (mysqli_query($db, $sql1)) {

        header("location: quotation-all.php?msg=Quotation Inquiry status updated successfully.&alert=success");
    } else {

        header("location: quotation-all.php?msg=Internet Server Error&alert=danger");
    }
}


function addGroupMessage($db, $uid, $message)
{

    $created_at = date('Y-m-d H:i:s', time());
    $sql = "INSERT INTO `group_chat` (`uid`, `message`, `created_at`) VALUES ({$uid}, '{$message}', '{$created_at}')";
    $query = mysqli_query($db, $sql);
    $id = mysqli_insert_id($db);
    $model = fetch_object($db, "SELECT * FROM `group_chat` WHERE id='{$id}'");
    return $model;
}
