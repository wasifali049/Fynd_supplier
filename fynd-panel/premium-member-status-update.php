<?php
include('../lib/bpconn.php');

include('../lib/config-details.php');

check_admin_auth();



extract($_REQUEST);

if (!empty($id)) {

    $updated_at = date('Y-m-d H:i:s', time());

    $productSql = "SELECT * FROM `user` WHERE id='".$id."'";

    $productModel = fetch_object($db, $productSql);

    $newStatus = ($productModel->is_verified == 1) ? 0:1;

    $sql1 = "UPDATE `user` SET `is_verified`='{$newStatus}', `updated_at`='{$updated_at}' WHERE id='{$id}'";

    if (mysqli_query($db, $sql1)) {

        header("location: premium-member-all.php?msg=User status updated successfully.&alert=success");

    }else{

        header("location: premium-member-all.php?msg=Internet Server Error&alert=danger");

    }

}

