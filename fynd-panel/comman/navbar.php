<?php

$user = $_SESSION['adminUser'];

?>

<!-- Topbar -->

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



    <!-- Sidebar Toggle (Topbar) -->

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">

        <i class="fa fa-bars"></i>

    </button>



    <div class="mx-auto">

        <img src="../assets/img/logo.png" style="height: 50px;" alt="" srcset="">

        <p class="d-inline"></p>

    </div>

    <div>

        <h5 class="text-dark p-0 m-0">
            Timezone: <b><?= getTimeZone() ?></b>
        </h5>
    </div>



    <!-- Topbar Navbar -->

    <ul class="navbar-nav">



        <div class="topbar-divider d-none d-sm-block"></div>



        <!-- Nav Item - User Information -->

        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user ? $user['user'] : '' ?></span>

                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">

            </a>

            <!-- Dropdown - User Information -->

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <!-- <a class="dropdown-item" href="#">

                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>

                    Profile

                </a>

                <a class="dropdown-item" href="#">

                    <i class="fas fa-solid fa-key fa-sm fa-fw mr-2 text-gray-400"></i>

                    Edit Password

                </a> -->

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">

                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                    Logout

                </a>

            </div>

        </li>



    </ul>



</nav>

<!-- End of Topbar -->