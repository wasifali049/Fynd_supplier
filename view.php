<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

$rfq = mysqli_real_escape_string($db, $_REQUEST['rfq']);
$rfq = str_replace(".php", "", $rfq);

$model = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE rfq='{$rfq}'");
$userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$model->uid}'");

$targetDir = get_root() . 'assets/img/offer/';


$homeBannerTitle = fetch_object($db, "SELECT * FROM `home_banner_title`");


if (is_login()) {
    $finalMobile = "+" . $model->mobile;
} else {
    $length = strlen($model->mobile);
    $hiddenLength = (int) ($length / 2);
    $prefix = str_repeat('x', $length - $hiddenLength);
    $prefix = $prefix . substr($model->mobile, -$hiddenLength);
    $finalMobile = "+" . $prefix;
}

$allModel = fetch_all($db, "SELECT * FROM `inquiry_offer` WHERE type='{$model->type}' AND status=1 ORDER BY id DESC LIMIT 3");
?>

<!doctype html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>
    <?= showInquiryOfferSEOTag($db, $model, get_main_url()) ?>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/intlTelInput.css">
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/profile.css">


    <style>
        .form-group p {
            margin-bottom: 0px
        }
    </style>

</head>

<body>
    <?php include('./common/header.php') ?>

    <main>


        <?php /*<section class="section banner-section site-bg pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt-4 banner-title d-flex justify-content-between align-items-baseline flex-wrap">
                        <h2 class="p-0"><?= $homeBannerTitle->title ?></h2>
                        <div class="banner-main-btn">
                            <a aria-current="page" data-bs-toggle="modal" data-bs-target="#getQuoteModel" class="oc-btn">Get Quote Now</a>
                            <a aria-current="page" data-bs-toggle="modal" data-bs-target="#exchangeOfferModel" class="oc-btn">Send Offers to Buyers</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>*/ ?>

        <section class="section profile-section site-bg">
            <div class="container">
                <div class="row">
                    <?php
                    if (!empty($model->image)) {
                    ?>
                        <div class="col-md-10 mb-4 mx-auto  rounded shadow-sm">
                            <img class="w-100" src="<?= $targetDir . $model->image ?>" alt="">
                        </div>
                    <?php } ?>

                    <div class="col-md-10 mx-auto">

                        <div class="card custom-card main-content-body-profile">

                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div>
                                    <h2 class="text-center card-title mb-0 "><?= $model->chemical ?></h2>
                                </div>
                            </div>

                            <div class="card-body tab-content h-100">
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label name_label">Mobile</label>
                                        </div>
                                        <div class="col-md-9 border rounded">


                                            <?php

                                            $onclick3 = pop_contact($userModel, 'group chat');

                                            ?>

                                            <?= "<p style='font-size:14px' class='cursor-pointer'><a class='text-decoration-none' target='_self' {$onclick3}><i class='bi bi-whatsapp'></i> {$finalMobile}</a></p>"; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label company_name_label">Email</label>
                                        </div>
                                        <div class="col-md-9 border rounded">
                                            <p><?= $model->email ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label email_label">Chemical</label>
                                        </div>
                                        <div class="col-md-9 border rounded">
                                            <p><?= $model->chemical ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label company_name_label">Target Offer Price</label>
                                        </div>
                                        <div class="col-md-9 border rounded">
                                            <p><?= $model->target_offer_price ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="mobile" class="form-label country-label">RFQ</label>
                                        </div>

                                        <div class="col-md-9 border rounded">
                                            <p><?= $model->rfq ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label website_label">Min Order Quantity</label>
                                        </div>
                                        <div class="col-md-9 border rounded">
                                            <p><?= $model->min_order_quantity ?></p>
                                        </div>
                                    </div>
                                </div>

                                <?php /*?>
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label website_label">Type</label>
                                        </div>
                                        <div class="col-md-9 border rounded">
                                            <p><?= $model->type ?></p>
                                        </div>
                                    </div>
                                </div><?php */ ?>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Details</label>
                                        </div>
                                        <div class="col-md-9 border rounded">
                                            <p><?= $model->details ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-md-10 mx-auto d-flex justify-content-center align-items-center">
                        <div class="align-center">
                            <a class="oc-btn" onclick="copyLink(this)">Copy Link</a>
                            <input type="hidden" id="cplink" value="<?= get_main_url() ?>">
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="section letest-enquiry">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between align-items-baseline">
                        <h2>Our Letest <?= ucfirst($model->type) ?></h2>
                        <a href="<?= get_root() ?><?= $model->type ?>-all" class="oc-btn">View All</a>
                    </div>

                    <?php foreach ($allModel as $inquiryKey => $inquiryVal) {
                        if (empty($inquiryVal)) {
                            continue;
                        }

                        $inquiryValue = (object) $inquiryVal;
                        $inquiryUserModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$inquiryValue->uid}'");

                        $onclick1 = pop_contact($inquiryValue, 'buyer')
                    ?>
                        <div class="col-md-4 mb-4">
                            <div class="card letest-inquiry-card">
                                <div class="card-body">
                                    <div class="letest-inquiry-detail flex-wrap">
                                        <p class="text-wrap pe-2">
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
                                        <a class="oc-btn" href="<?= get_root() ?>view/<?= $inquiryValue->rfq ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </section>


    </main>

    <?php include('./common/footer.php') ?>
    <?php include('./common/social-link.php') ?>
    <?php //include('./common/social-link.php') 
    ?>
    <?php include('./common/modal.php') ?>

    <?php include('./common/script.php') ?>
    <!-- javascript -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script src="<?= get_root() ?>assets/js/pages/user-check.js"></script>

    <script src="<?= get_root() ?>assets/js/pages/inquiry-offer.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="<?= get_root() ?>assets/js/toastify-js.js"></script>


    <style>
        .banner-section {
            height: 100%;
        }
    </style>


    <script>
        function showAlert(message, bgcolor = "green") {
            Toastify({
                text: message,
                close: true,
                gravity: "top",
                position: "right",
                className: "info",
                style: {
                    background: bgcolor,
                },
            }).showToast();
        }

        function copyLink(elem) {

            var pglink = document.getElementById('cplink');

            //pglink.select();
            //pglink.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(pglink.value);


            showAlert("Link Copied successfully!");


            Swal.fire({
                icon: 'success',
                title: 'Link Copied successfully!',
                text: '',
            })


        }
    </script>


</body>

</html>