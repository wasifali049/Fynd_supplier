<?php
include('../lib/bpconn.php');

include('../lib/config-details.php');

check_admin_auth();



extract($_REQUEST);

if (!empty($id)) {


    $updated_at = date('Y-m-d H:i:s', time());

    $productSql = "SELECT * FROM supplier_chemical_list WHERE id='".$id."'";

    $productModel = fetch_object($db, $productSql);

    $newStatus = ($productModel->status == 1) ? 0:1;

    $sql1 = "UPDATE `supplier_chemical_list` SET `status`='{$newStatus}', `updated_at`='{$updated_at}' WHERE id='{$id}'";

    if (mysqli_query($db, $sql1)) {

        header("location: supplier-chemical-all.php?msg=Chemical approved successfully.&alert=success");

    }else{

        header("location: supplier-chemical-all.php?msg=Internet Server Error&alert=danger");

    }

}

