<?php

include('../../lib/bpconn.php');



if(isset($_POST['signin'])){

    extract($_REQUEST);

    $email = mysqli_real_escape_string($db, $email);

    $password = mysqli_real_escape_string($db, $password);

    $rememberMe = isset($rememberMe) ? mysqli_real_escape_string($db, $rememberMe) : '';



    $sql = "SELECT * FROM admin_user WHERE email='$email'";



    $query = mysqli_query($db, $sql);

    $res = mysqli_fetch_assoc($query);

    

    if(password_verify($password, $res['password'])) {

        $userArray = 

        [

            'user' => $res['name'],

            'user_id' => $res['id']

        ];

        $_SESSION['adminUser'] = $userArray;

        header('location: ../index.php');

    }else{

        $m = "Invalid Password";

        header('location: ../login.php?m='.$m.'&type=danger');

    }



}else{

    //header('location: ../index.php');

}



if(isset($_POST['signup'])){



    extract($_REQUEST);

    $name = mysqli_real_escape_string($db, $name);

    $email = mysqli_real_escape_string($db, $email);

    $password = mysqli_real_escape_string($db, $password);

    $cpassword = mysqli_real_escape_string($db, $cpassword);

    $createdAt = date('Y-m-d H:i:s', time());

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);



    if(empty($name) || empty($email) || empty($password) || empty($cpassword)){

        $error = "Field must be required";

    }



    if($password != $cpassword){

        $error = "Password and Confirm Password not Matched!";

    }



    $s = "SELECT email FROM `admin_user` WHERE email='$email'";

    $chkSql = mysqli_num_rows(mysqli_query($db, $s));



    if($chkSql > 0){

        $error = "User already exist";

    }



    if(!empty($error)){

        header('location: ../register.php?m='.$error.'&type=danger');

    }else{

        $sql = mysqli_query($db, "INSERT INTO `admin_user`(`name`, `email`, `password`, `password_plane`, `created_at`) VALUES ('$name', '$email', '$hashed_password', '$password', '$createdAt')");

        if($sql){

            $m = "Successfully Register!";

            return header('location: ../register.php?m='.$m.'&type=success');

        }else{

            $m = "server error";

            return header('location: ../register.php?m='.$m.'&type=danger');

        }

    }

}else{

    //header('location: ../index.php');

}





?>