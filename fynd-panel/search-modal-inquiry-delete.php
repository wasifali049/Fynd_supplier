<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();
check_auth();

extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `search_modal` WHERE id='$id'";

    $model = fetch_object($db, "SELECT * FROM search_modal WHERE id='{$id}'");

    $target_dir = "../assets/img/search/";

    if (file_exists($target_dir . $model->attachment)) {
        if (file_exists($model->attachment)) {
            unlink($target_dir . $model->attachment);
        }
    }

    if (mysqli_query($db, $sql1)) {
        $error .= "Inquiry has been deleted successfully";
        header('location: search-modal-inquiry.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error";
        header('location: search-modal-inquiry.php?msg=' . $error . '&alert=danger');
    }
}
