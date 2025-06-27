<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();

extract($_REQUEST);

if (!isset($id) || empty($id)) {
    header('location: ./supplier-chemical-all.php');
}

if (isset($_SESSION['userLogin'])) {
    unset($_SESSION['userLogin']);
}

setLogin1($db, $id);
header("location: ../chemical-edit.php?id={$id}");


function setLogin1($db, $id)
{
    $chemicalModel = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE id='{$id}'");
    $userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$chemicalModel->uid}'");

    $_SESSION['userLogin'] = $userModel->id;
}
