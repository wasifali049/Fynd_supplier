<?php

$doman = 'https://www.fyndsupplier.com';

if (isset($_POST['submit'])) {

    $useremail = mysqli_real_escape_string($con, $_POST['useremail']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $sub = mysqli_real_escape_string($con, $_POST['sub']);
    $myemail = mysqli_real_escape_string($con, $_POST['myemail']);
    $msg = mysqli_real_escape_string($con, $_POST['msg']);


    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $to = $myemail;
    $from = $useremail;
    $subject = $sub;
    $message = "
    Full Name : $name
    Subject : $sub
    Message: $msg
    ";
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
} else {
    echo "<script>window.open('$doman/', '_self');</script>";
    exit();
}
