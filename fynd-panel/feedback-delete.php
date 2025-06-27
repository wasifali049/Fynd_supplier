<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();

extract($_REQUEST);

$target_dir = "../assets/img/feedback/";
if(!empty($id)){

    $sql1 = "DELETE FROM `feedback` WHERE id='$id'";
    $sql2 = "SELECT * FROM `feedback` WHERE id='$id'";

    $model = mysqli_fetch_assoc(mysqli_query($db, $sql2));
    $file = $target_dir.$model['image'];

    if(unlink($file)){
        if(mysqli_query($db, $sql1)){
            header("location: feedback-all.php?msg=Feedback has been deleted successfully.&alert=success");
        }
    }
}