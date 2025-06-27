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


$ssql = "SELECT * FROM `inquiry_offer` WHERE type='inquiry' AND `updated_at` >= DATE_SUB(CURDATE(), INTERVAL 60 DAY) AND status='1' ORDER BY id DESC LIMIT $startFrom, $limit";
$inquiryModel = fetch_all($db, $ssql);


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
    <link rel="stylesheet" href="./assets/css/intlTelInput.css">


</head>

<body>
    <?php include('./common/header.php') ?>

    <main>
        <section class="section letest-enquiry">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center align-items-baseline">
                        <h2>All Purchase Inquiries</h2>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <?php foreach ($inquiryModel as $inquiryKey => $inquiryVal) {
                                $inquiryValue = (object) $inquiryVal;
                                $inquiryUserModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$inquiryValue->uid}'");

                                $onclick1 = pop_contact($inquiryValue, 'buyer');

                            ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card letest-inquiry-card">
                                        <div class="card-body">
                                            <div class="letest-inquiry-detail flex-wrap">
                                                <p class="text-wrap pe-1">
                                                    <b>Product name</b>
                                                </p>
                                                <p class="text-wrap"><?= $inquiryValue->chemical ?></p>
                                            </div>

                                        

                                            <div class="letest-inquiry-detail">
                                                <p>
                                                    <b>Buyer name</b>
                                                </p>
                                                <p><?= $inquiryUserModel->name ?></p>
                                            </div>

                                            

                                            <div class="letest-inquiry-detail">
                                                <p>
                                                    <b>Date</b>
                                                </p>
                                                <p><?= dateFormat($inquiryValue->updated_at, "d/m/Y") ?></p>
                                            </div>

                                            

                                            
                                        </div>
                                        <div class="card-footer">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <a class="oc-btn" <?= $onclick1 ?>>Contact Now</a>
                                                <a class="oc-btn" href="./view/<?= $inquiryValue->rfq ?>">Read More</a>
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


                                $sql = "SELECT COUNT(*) FROM `inquiry_offer` WHERE type='inquiry' AND `updated_at` >= DATE_SUB(CURDATE(), INTERVAL 60 DAY) AND status='1'";
                                $rs_result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];

                                $total_pages = ceil($total_records / $limit);
                                $pagLink = "";
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $pn) {
                                        $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='inquiry-all?page="

                                            . $i . "'>" . $i . "</a></li>";
                                    } else {
                                        $pagLink .= "<li class='page-item'><a class='page-link' href='inquiry-all?page=" . $i . "'>

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