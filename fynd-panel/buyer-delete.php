<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();
check_auth();

extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `user` WHERE id='$id'";

    $model = fetch_object($db, "SELECT * FROM user WHERE id='{$id}'");

    $target_dir = "../assets/img/profile/";

    if (file_exists($target_dir . $model->profile_photo)) {
        if ($model->profile_photo != 'profile.png') {
            unlink($target_dir . $model->profile_photo);
        }
    }

    if (mysqli_query($db, $sql1)) {
        $error .= "Buyer has been deleted successfully";
        header('location: buyer-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error";
        header('location: buyer-all.php?msg=' . $error . '&alert=danger');
    }
}
