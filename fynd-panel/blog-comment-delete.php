<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();
check_auth();

extract($_REQUEST);
if (!empty($id)) {

    $sql1 = "DELETE FROM `blog_comment` WHERE id='$id'";
    $model = fetch_object($db, "SELECT * FROM blog_comment WHERE id='{$id}'");
    $bid = $model->bid;

    if (mysqli_query($db, $sql1)) {
        $error .= "Blog has been deleted successfully";
        header("location: blog-comment.php?id={$bid}&msg='{$error}'&alert=success");
    } else {
        $error .= "Internal Server Error";
        header("location: blog-comment.php?id={$bid}&msg='{$error}'&alert=danger");
    }
}
