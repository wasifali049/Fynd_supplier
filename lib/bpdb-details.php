<?php


if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false) {
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "fynd");
} else {
    define("DBHOST", "localhost");
    define("DBUSER", "thebri46_udr24fyd");
    define("DBPASSWORD", "m5mfutTHUdUg");
    define("DBNAME", "thebri46_fynd_demo");
}


function get_protocol()
{
    if (
        isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
    ) {
        $protocol = 'https://';
    } else {
        $protocol = 'http://';
    }
    return $protocol;
}


define("SMSUSERNAME", "WESMARTYBWA");
define("SMSPASSWORD", "123456");
define("SMSSENDERID", "BUZWAP");
define("SMSURL", get_protocol() . "bhashsms.com/api/sendmsg.php");
