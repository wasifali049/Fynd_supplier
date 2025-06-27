<?php
include('../lib/bpconn.php');

include('../lib/config-details.php');

check_admin_auth();



extract($_REQUEST);

if (!empty($id)) {


    $updated_at = date('Y-m-d H:i:s', time());

    $productSql = "SELECT * FROM inquiry_offer WHERE id='".$id."'";

    $productModel = fetch_object($db, $productSql);

    $newStatus = ($productModel->status == 1) ? 0:1;

    $sql1 = "UPDATE `inquiry_offer` SET `status`='{$newStatus}', `updated_at`='{$updated_at}' WHERE id='{$id}'";

    sendBuyerWP($db, $id);

    if (mysqli_query($db, $sql1)) {

        header("location: offer-all.php?msg=Offer status updated successfully.&alert=success");

    }else{

        header("location: offer-all.php?msg=Internet Server Error&alert=danger");

    }

}

