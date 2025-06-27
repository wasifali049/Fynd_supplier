<?php
include('../lib/bpconn.php');

include('../lib/config-details.php');

extract($_REQUEST);



// if(!isset($m)){

//     is_auth();

// }

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <title>Login - <?=BRANDNAME?> Admin Panel</title>



    <!-- Custom Head -->

    <?php include('./comman/head.php'); ?>



</head>



<body class="bg-gradient-primary">



    <div class="container">



        <!-- Outer Row -->

        <div class="row justify-content-center">



            <div class="col-xl-6 col-lg-6 col-md-6">



                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->

                        <div class="row">

                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->

                            <div class="col-lg-12">

                                <div class="p-5">

                                    <div class="text-center">

                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>

                                    </div>

                                    <?php



                                    if (isset($m)) {

                                        if ($type == 'success') {

                                            echo '<div class="alert alert-' . $type . '" role="alert">';

                                            echo $m;

                                            echo "&nbsp; <a href='login.php'>click here</a> to login";

                                            echo "</div>";

                                        } else {

                                            echo '<div class="alert alert-' . $type . '" role="alert">';

                                            echo $m;

                                            echo "</div>";

                                        }

                                    }

                                    ?>



                                    <form class="user" action="./conf/action.php" method="post">

                                        <div class="form-group">

                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">

                                        </div>

                                        <div class="form-group">

                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">

                                        </div>

                                        <!-- <div class="form-group">

                                            <div class="custom-control custom-checkbox small">

                                                <input type="checkbox" name="rememberMe" class="custom-control-input" id="customCheck">

                                                <label class="custom-control-label" for="customCheck">Remember

                                                    Me</label>

                                            </div>

                                        </div> -->

                                        <button type="submit" name="signin" class="btn btn-primary btn-user btn-block">

                                            Login

                                        </button>

                                    </form>

                                    <hr>

                                    <div class="text-center">

                                        <!-- <a class="small" href="./forgot-password.php">Forgot Password?</a> -->

                                    </div>

                                    <div class="text-center">

                                        <!-- <a class="small" href="./register.php">Create an Account!</a> -->

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    </div>



    <!-- Comman JS Scripts -->

    <?php include('./comman/scripts.php'); ?>



</body>



</html>