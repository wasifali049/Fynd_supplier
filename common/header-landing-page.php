<?php
$buyer_total = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `user_type`='buyer'"));
$searchText = isset($_REQUEST['searchText']) ? $_REQUEST['searchText'] : '';
$chemical_total = count($chemicalModel);


$searchText = rtrim($searchText, ' ');

?>
<!-- code by hamza  -->
<style>
    .btnn {
        color: black;
        border: none;
        padding: 10px 20px;
        margin: 5px;
        border-radius: 6px;
        border: 2px solid black;
        font-size: 16px;
        cursor: pointer;
        bottom: 18px;
        right: 29px;
        text-decoration: none;


    }

    .nav-item {
        position: relative;
    }

    .btn-container {
        position: absolute;
        bottom: 25px;
        right: 29px;
        display: flex;
        gap: 10px;
    }
</style>

<header>
    <nav class="navbar navbar-expand-lg oc-navbar">
        <div class="container">

            <div class="row d-flex justify-content-between align-items-center header-logo-contianer">
                 <!-- code by hamza  -->
                <div class="nav">
                    <ul>
                        <li><a href="">Manufactures: X+</a></li>
                        <li><a href="">Traders: Y+</a></li>
                        <!-- <li><a href="">Buyers: Z+</a></li> -->
                         <li><a <?= pop_buyers($db) ?>>Buyers: <?= $buyer_total ?>+</a></li>
                       <li><a href="<?=get_root()?>chemical-all.php">Chemicals <?= $chemical_total ?>+</a></li> 
                    </ul>
                </div>
                <!-- code by hamza  -->
                <div class="col-md-2 header-logo-wrapper">
                    <h2 class="text-white m-0">
                        <a href="<?= get_root() ?>" class="text-decoration-none text-white">
                            <img style="width:50%" src="<?= get_root() ?>/assets/img/logo.png" class="main-logo-header">
                        </a>
                    </h2>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-md-6 header-search-contianer hide-seach-mobile">
                    <form class="form-style" role="search" method="get" action="<?= get_root() ?>search">
                        <div class="navbar-form px-2 py-1">
                            <input class="form-control me-2 navbar-search-filed" type="search" name="searchText" placeholder="Search buyer & supplier.." aria-label="Search" value="<?= $searchText ?>" required>
                            <button class="oc-btn" type="submit" name="searchForm">Search</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div class="btn-container">
                            <?php if (is_login()) { ?>
                                <a class="oc-btn" aria-current="page" href="<?= get_root() ?>profile">Profile</a>
                                <a class="oc-btn" aria-current="page" href="<?= get_root() ?>logout">Logout</a>
                                 
                                <!-- <a class=" oc-outline-btn" href="membership.php" class="oc-btn">Upgrade</a> -->
                                </div>
                            <?php } else { ?>
                                <a class=" oc-btn" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#signinModel">Login/SignUp</a>
                                 <a class=" oc-btn" href="membership.php" class="oc-btn">Upgrade</a>
                                
                            <?php } ?>

                            </li>
                            <li class="nav-item">
                                <!-- <a class="oc-outline-btn" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#supplierModel">Become Supplier</a> -->
                                <!-- <a class="oc-btn " aria-current="page" href="./membership">Become Supplier</a> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</header>

<div class="w-100">
    <div class="header-search-contianer bg-white rounded shadow my-2 hide-seach-desktop">
        <form class="" role="search" method="get" action="<?= get_root() ?>search">
            <div class="px-2 py-1 d-flex justify-content-between align-items-center">
                <input class="form-control me-2 navbar-search-filed" type="search" name="searchText" placeholder="Search buyer & supplier.." aria-label="Search" value="<?= $searchText ?>" required>
                <button class="oc-btn" type="submit" name="searchForm">Search</button>
            </div>
        </form>
    </div>
</div>