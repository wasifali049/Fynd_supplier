<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();

extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `payments` WHERE id='$id'";

    if (mysqli_query($db, $sql1)) {
        $error .= "Membership record has been deleted successfully";
        header('location: membership-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error";
        header('location: membership-all.php?msg=' . $error . '&alert=danger');
    }
}
