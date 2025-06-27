<?php
$searchText = isset($_REQUEST['searchText']) ? $_REQUEST['searchText'] : '';

$searchText = rtrim($searchText, ' ');

?>

<header>
    <nav class="navbar navbar-expand-lg oc-navbar">
        <div class="container">

            <div class="row d-flex justify-content-between align-items-center header-logo-contianer">
                <div class="col-md-3 header-logo-wrapper">
                    <h2 class="text-white m-0">
                        <a href="<?= get_root() ?>" class="text-decoration-none text-white">
                            <img style="width:50%" src="<?= get_root() ?>assets/img/logo.png" class="main-logo-header">
                        </a>
                    </h2>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>


                <div class="col-md-5 header-search-contianer">
                    <form class="" role="search" method="get" action="<?= get_root() ?>search">
                        <div class="navbar-form px-2 py-1">
                            <input class="form-control me-2 navbar-search-filed" type="search" name="searchText" placeholder="Search" aria-label="Search" value="<?= $searchText ?>" required>
                            <button class="oc-btn" type="submit" name="searchForm">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <?php if (is_login()) { ?>
                                    <a class="oc-outline-btn" aria-current="page" href="<?= get_root() ?>profile">Profile</a>
                                    <a class="oc-btn oc-border-0-btn" aria-current="page" href="<?= get_root() ?>logout">Logout</a>
                                <?php } else { ?>
                                    <a class="oc-outline-btn" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#signinModel">Sign In / Join Free</a>
                                <?php } ?>

                            </li>

                            <?php if (!is_login()) { ?>
                                <li class="nav-item">
                                    <!-- <a class="oc-outline-btn" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#supplierModel">Become Supplier</a> -->
                                    <!-- <a class="oc-outline-btn" aria-current="page" href="./membership">Become Supplier</a> -->
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</header>