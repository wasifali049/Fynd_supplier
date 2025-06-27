<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();

extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `group_chat` WHERE id='$id'";

    if (mysqli_query($db, $sql1)) {
        $error .= "Chat has been deleted successfully";
        header('location: group-chat-all.php?id=' . $service_id . '&msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error";
        header('location: group-chat-all.php?id=' . $service_id . '&msg=' . $error . '&alert=danger');
    }
}
