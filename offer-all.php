<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

$limit = 18;

if (isset($_REQUEST["page"])) {

    $pn  = $_REQUEST["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;

$offerModel = fetch_all($db, "SELECT * FROM `inquiry_offer` WHERE type='offer' AND status='1' ORDER BY id DESC LIMIT $startFrom, $limit");


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

</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section letest-offer site-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center align-items-baseline ">
                        <h2>All offers and surplus chemicals</h2>
                    </div>

                    <div class="col-md-12">
                        <div class="row">

                            <?php foreach ($offerModel as $offerKey => $offerVal) {
                                $offerValue = (object) $offerVal;

                                $onclick2 = pop_contact($offerValue, 'supplier');
                            ?>

                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <?php /*<img src="./assets/img/chemical/<?= get_product_image($db, $offerValue->chemical) ?>" class="card-img-top" alt="...">*/ ?>
                                        <img src="./assets/img/offer/<?= $offerValue->image ?>" class="card-img-top" alt="...">
                                        <div class="card-body">

                                            <div class="letest-offer-detail flex-wrap">
                                                <p>
                                                    <b>Product name</b>
                                                </p>
                                                <p class="text-wrap"><?= textWithoutHtml($offerValue->chemical, 20) ?></p>
                                            </div>

                                            <div class="letest-offer-detail">
                                                <p>
                                                    <b>Price 1kg</b>
                                                </p>
                                                <p><?= $offerValue->target_offer_price ?></p>
                                            </div>

                                            <div class="letest-offer-detail">
                                                <p>
                                                    <b>Min Order Quantity</b>
                                                </p>
                                                <p><?= $offerValue->min_order_quantity ?></p>
                                            </div>

                                            <div class="letest-offer-detail">
                                                <p>
                                                    <b>Date</b>
                                                </p>
                                                <p><?= dateFormat($offerValue->updated_at, "d/m/Y") ?></p>
                                            </div>

                                            <div class="letest-offer-detail">
                                                <p>
                                                    <b>Specifications</b>
                                                </p>
                                                <p><?= get_split_string($offerValue->details, 10) ?></p>
                                            </div>

                                           
                                        </div>
                                        <div class="card-footer">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <a class="oc-outline-btn" <?= $onclick2 ?>>Contact Now</a>
                                                <a class="oc-btn" href="./view/<?= $offerValue->rfq ?>">Read More</a>
                                            </div>
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


                                $sql = "SELECT COUNT(*) FROM `inquiry_offer` WHERE type='offer' AND status='1'";
                                $rs_result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];

                                $total_pages = ceil($total_records / $limit);
                                $pagLink = "";
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $pn) {
                                        $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='offer-all?page="

                                            . $i . "'>" . $i . "</a></li>";
                                    } else {
                                        $pagLink .= "<li class='page-item'><a class='page-link' href='offer-all?page=" . $i . "'>

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

    <script src="./assets/js/pages/group-chat.js"></script>
    <script src="./assets/js/pages/inquiry-offer.js"></script>
    <script src="./assets/js/pages/user-check.js"></script>
    <script src="./assets/js/pages/index.js"></script>

</body>

</html>