<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();

extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `chemical` WHERE id='$id'";
    $model = fetch_object($db, "SELECT * FROM `chemical` WHERE id='{$id}'");


    if (mysqli_query($db, $sql1)) {
        $error .= "Chemical has been deleted successfully";
        header('location: chemical-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error";
        header('location: chemical-all.php?msg=' . $error . '&alert=danger');
    }
}
