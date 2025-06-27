<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();

extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `inquiry_offer` WHERE id='$id'";

    $model = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE id='{$id}'");

    $target_dir = "../assets/img/offer/";

    if ($model->image != 'product.png') {

        if (file_exists($target_dir . $model->image)) {
            unlink($target_dir . $model->image);
        }
    }

    if (mysqli_query($db, $sql1)) {
        $error .= "Offer has been deleted successfully";
        header('location: offer-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error";
        header('location: offer-all.php?msg=' . $error . '&alert=danger');
    }
}
