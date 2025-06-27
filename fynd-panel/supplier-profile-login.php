<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();

extract($_REQUEST);

if (!isset($id) || empty($id)) {
    header('location: ./supplier-all.php');
}

if (isset($_SESSION['userLogin'])) {
    unset($_SESSION['userLogin']);
}
setLogin1($id);
header('location: ../profile.php');


function setLogin1($id)
{
    $_SESSION['userLogin'] = $id;
}
