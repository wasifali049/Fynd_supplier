<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();

if (isset($_REQUEST['id'])) {
    extract($_REQUEST);

    $model = fetch_object($db, "SELECT * FROM `home_buyer_supplier_inquiry` WHERE id='{$id}'");
    $message_type = $model->who_to_contact;

    if (sendHomePremiumBuyerSupplierWP($db, $id)) {
        mysqli_query($db, "UPDATE home_buyer_supplier_inquiry SET status=1 WHERE id='{$model->id}'");
        header("location: home-buyer-supplier-inquiry.php?alert=success&msg=Message send to " . $message_type . " successfully");
    } else {
        header("location: home-buyer-supplier-inquiry.php?alert=danger&msg=Internal server error");
    }
}
