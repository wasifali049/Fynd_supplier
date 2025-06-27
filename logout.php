<?php

session_start();
unset($_SESSION['userLogin']);

if (isset($_COOKIE['user_id'])) {
    unset($_COOKIE['user_id']); 
    setcookie('user_id', '', -1, '/'); 
}

header('location: ./index');
