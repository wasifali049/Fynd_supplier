<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();

extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `faq` WHERE id='$id'";

    $model = fetch_object($db, "SELECT * FROM `faq` WHERE id='{$id}'");


    // if (file_exists($target_dir . $model->image)) {
    //     unlink($target_dir . $model->image);
    // }

    if (mysqli_query($db, $sql1)) {
        $error .= "FAQ has been deleted successfully";
        header('location: faq-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error";
        header('location: faq-all.php?msg=' . $error . '&alert=danger');
    }
}
