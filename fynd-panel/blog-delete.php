<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();
check_auth();

extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `blog` WHERE id='$id'";

    $model = fetch_object($db, "SELECT * FROM blog WHERE id='{$id}'");

    $target_dir = "../assets/img/blog/";

    if (file_exists($target_dir . $model->image)) {
        unlink($target_dir . $model->image);
    }

    if (mysqli_query($db, $sql1)) {
        $error .= "Blog has been deleted successfully";
        header('location: blog-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error";
        header('location: blog-all.php?msg=' . $error . '&alert=danger');
    }
}
