<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

$target_dir = "../assets/img/banner/";
if(!empty($id)){

    $sql1 = "DELETE FROM `home_banner` WHERE id='$id'";
    $sql2 = "SELECT * FROM `home_banner` WHERE id='$id'";

    $model = mysqli_fetch_assoc(mysqli_query($db, $sql2));
    $file = $target_dir.$model['banner'];

    if(unlink($file)){
        if(mysqli_query($db, $sql1)){
            header("location: home-banner-all.php?msg=Banner has been deleted successfully.&alert=success");
        }
    }
}


?>