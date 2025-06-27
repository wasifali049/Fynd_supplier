<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

extract($_REQUEST);

$limit = 20;

if (isset($_REQUEST["page"])) {

    $pn  = $_REQUEST["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;

$blogModel = fetch_all($db, "SELECT * FROM `blog` ORDER BY id DESC LIMIT $startFrom, $limit");
?>

<!doctype html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>
    <?= showSEOTag($db, basename($_SERVER['SCRIPT_NAME']), get_main_url()) ?>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/intlTelInput.css">


</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section latest-blog">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 d-flex justify-content-between align-items-baseline">
                        <h2>All Industry/Business Updates</h2>
                        <?php if (is_login()) { ?>
                            <a href="<?= get_root() ?>blog-post" class="oc-btn">Write a Blog</a>
                        <?php } else { ?>
                            <a class="oc-btn" onclick="checkMessageEligibility()">Write a Blog</a>
                        <?php } ?>

                    </div>

                    <div class="col-md-12 mx-auto">

                        <?php if (!empty($alert) && !empty($msg)) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-<?= $alert ?> alert-dismissible fade show" role="alert">
                                        <strong><?= ucfirst(($alert == 'danger') ? 'Error' : $alert) ?>!</strong> <?= $msg ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="row gap-3">
                            <?php
                            foreach ($blogModel as $blogKey => $blogVal) {
                                $blogValue = (object) $blogVal;
                                $userModel = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$blogValue->uid}'");
                            ?>
                                <div class="col-md-12">
                                    <div class="row shadow rounded bg-white">
                                        <div class="col-md-4">
                                            <a class="text-decoration-none" href="<?= get_root() ?>blog-view/<?= $blogValue->slug ?>">
                                                <img src="<?= get_root() ?>assets/img/blog/<?= $blogValue->image ?>" class="card-img-top" alt="...">
                                            </a>
                                        </div>

                                        <div class="col-md-8">
                                            <h5 class="card-title py-3">
                                                <a class="text-decoration-none" href="<?= get_root() ?>blog-view/<?= $blogValue->slug ?>"><?= $blogValue->title ?></a>
                                            </h5>
                                            <p class="mb-1"><b>Date: <?= formatDate($blogValue->created_at) ?></b></p>
                                            <p class="mb-1"><b>Post By: <?= $userModel->name ?></b></p>
                                            <p class="card-text">
                                                <?= textWithoutHtml($blogValue->content, 400) ?>
                                            </p>
                                            <a href="<?= get_root() ?>blog-view/<?= $blogValue->slug ?>" class="oc-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm">
                                <?php


                                $sql = "SELECT COUNT(*) FROM `blog`";
                                $rs_result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];

                                $total_pages = ceil($total_records / $limit);
                                $pagLink = "";
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $pn) {
                                        $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='".get_root()."blog-all?page="

                                            . $i . "'>" . $i . "</a></li>";
                                    } else {
                                        $pagLink .= "<li class='page-item'><a class='page-link' href='".get_root()."blog-all?page=" . $i . "'>

                                                " . $i . "</a></li>";
                                    }
                                };

                                echo $pagLink;
                                ?>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <?php include('./common/footer.php') ?>
    <?php include('./common/social-link.php') ?>
    <?php include('./common/modal.php') ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script> -->


    <?php include('./common/script.php') ?>
    <!-- javascript -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="<?= get_root() ?>assets/js/pages/group-chat.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/inquiry-offer.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/user-check.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/index.js"></script>

</body>

</html>