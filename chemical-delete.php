<?php
include('./lib/bpconn.php');
include('./lib/config-details.php');
check_auth();
extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `supplier_chemical_list` WHERE id='$id'";

    $model = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE id='{$id}'");

    $target_dir = "./assets/img/chemical/";

    if (file_exists($target_dir . $model->chemical_photo)) {
        if ($model->chemical_photo != 'product.png') {
            unlink($target_dir . $model->chemical_photo);
        }
    }

    if (mysqli_query($db, $sql1)) {
        $error .= "Chemical has been deleted successfully";
        header('location: profile?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error";
        header('location: profile?msg=' . $error . '&alert=danger');
    }
}
