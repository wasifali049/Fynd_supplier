<?php
include_once('./lib/bpconn.php');
include_once('./lib/config-details.php');

$homeBannerModel = fetch_all($db, "SELECT * FROM `home_banner` ORDER BY id DESC");
$target_dir5 = get_root() . "assets/img/banner/";
$target_dir6 = get_root() . "assets/img/home-inquiry/";
$homeBannerTitle = fetch_object($db, "SELECT * FROM `home_banner_title`");


$storyModel = fetch_all($db, "SELECT * FROM `fynd_story` ORDER BY id DESC");
$storyTitle = fetch_object($db, "SELECT * FROM `fynd_story_title`");
$buyerSupplierInquiryTitle = fetch_object($db, "SELECT * FROM `home_buyer_supplier_inquiry_title`");


$countryModel = get_country_list($db);
$chemicalModel = get_chemical_list($db);
$supplierChemicalModel = get_supplier_chemical_list($db);

$latestSearchModel = fetch_all($db, "SELECT chemical, MIN(id) AS id, MIN(created_at) AS `created_at` FROM `search_chemical` GROUP BY `chemical` ORDER BY `id` DESC LIMIT 14");

$mobile = '';
$country_code = '';
$email = '';
$name = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>
    <?= showSEOTag($db, basename($_SERVER['SCRIPT_NAME']), get_main_url()) ?>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/intlTelInput.css">


    <?php
    $homeHeadScriptModel = fetch_object($db, "SELECT * FROM `home_head_script` WHERE 1");
    echo $homeHeadScriptModel->content
    ?>
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/landing-page.css">


    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

</head>

<body>
    <?php include('./common/header-landing-page.php') ?>

    <main>
        <section class="section banner-section pt-0 banner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt-4 banner-title banner-wrapper-1 main-heading-wrapper d-flex justify-content-between align-items-center flex-wrap">
                        <h2 class="p-0 landing-banner-heading"><?= $homeBannerTitle->title ?></h2>


                        <div class="banner-main-btn">
                            <a aria-current="page" data-bs-toggle="modal" data-bs-target="#getQuoteModel" class="oc-btn">Get Quote Now</a>
                            <a aria-current="page" data-bs-toggle="modal" data-bs-target="#exchangeOfferModel" class="oc-btn">Send Offers to Buyers</a>
                        </div>
                    </div>

                    <div class="col-md-8 banner-wrapper banner-wrapper-2 main-map-wrapper">
                        <div class="shadow-lg rounded w-100 bg-white p-3 banner-form">
                            <h3 class="text-left"><?= $buyerSupplierInquiryTitle->title1 ?></h3>
                            <div class="progress-bar-wrapper">
                                <div class="progress-bar"></div>
                            </div>
                            <form class="" id="getHomeInquiryForm" method="post" action="<?= get_root() ?>/inc/home-inquiry/home-buyer-supplier-inquiry-add.php">
                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="home-inq-who_to_contact" class="form-label home-inq-who_to_contact-label w-100 text-start">Who to Contact</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select class="form-select" id="home-inq-who_to_contact" name="homeInquiry[who_to_contact]" required onchange="userTypeChangeAndChemical()">
                                                        <option value="Buyer">Buyer</option>
                                                        <option value="Supplier">Supplier</option>
                                                    </select>
                                                    <div class="showErr"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="home-inq-destination" class="form-label home-inq-destination-label w-100 text-start">Country</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select class="form-select px-1 text-left combined-mobile" id="home-inq-destination" name="homeInquiry[destination]" required onchange="userTypeChangeAndChemical()">
                                                        <?php
                                                        foreach ($countryModel as $countryKey5 => $countryVal5) {
                                                            $countryValue5 = (object) $countryVal5;
                                                        ?>
                                                            <option value="<?= $countryValue5->nicename ?>"><?= $countryValue5->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="showErr"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="text" class="form-label home-inq-chemical-label w-100 text-start">Chemical Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="w-100">
                                                        <select class="form-select px-1 text-left combined-mobile" id="home-inq-chemical" name="homeInquiry[chemical_id]" required onchange="userTypeChangeAndChemical()">
                                                            <?php
                                                            foreach ($supplierChemicalModel as $chemicalKey4 => $chemicalVal4) {
                                                                $chemicalValue4 = (object) $chemicalVal4;
                                                            ?>
                                                                <option value="<?= $chemicalValue4->chemical_id ?>"><?= $chemicalValue4->product_name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <input type="hidden" class="form-control " id="home-inq-quantity" name="homeInquiry[quantity]" placeholder="">
                                                        <div class="showErr"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mb-3 visibility-hidden">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="country_code" class="form-label home-inq-mobile-label text-start w-100">Country Code</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="w-100">
                                                        <select class="form-select px-1 text-left combined-mobile w-100" id="country_code" name="country_code" required>
                                                            <?php
                                                            foreach ($countryModel as $countryKey4 => $countryVal4) {
                                                                $countryValue4 = (object) $countryVal4;
                                                            ?>
                                                                <option value="<?= $countryValue4->phonecode ?>"><?= $countryValue4->name ?> - +<?= $countryValue4->phonecode ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 visibility-hidden">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="home-inq-mobile" class="form-label home-inq-mobile-label text-start w-100">Number</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="tel" id="home-inq-mobile" class="form-control w-100" name="homeInquiry[mobile]" placeholder="Whatsapp Number" value="" required />
                                                    <div class="showErr"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 visibility-hidden">
                                            <div class="w-100">
                                                <label for="home-inq-details" class="form-label home-inq-details-label w-100 text-start">Type Your Message</label>
                                                <textarea id="home-inq-details" class="form-control" name="homeInquiry[details]" placeholder="Details" cols="15" rows="3" required></textarea>
                                                <div class="showErr"></div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <label for="text" class="form-label home-inq-buyer_supplier-label w-100 text-start">List of Buyers/Suppliers</label>
                                        <div id="all-user-wrapper">
                                            <ul class="list-group" id="wrapperBox">
                                                <li class="list-group-item active">Total Record: <b>0</b></li>
                                                <li class="list-group-item active">
                                                    <input onkeyup="filterList()" placeholder="Search Name/Number" type="text" id="userFilter" class="form-control">

                                                    <div class="d-flex gap-1">
                                                        <div class="my-2 mx-4">
                                                            <input class="form-check-input" type="radio" name="checkUncheck" id="checkUncheck1" onclick="checkAll()">
                                                            <label for="checkUncheck1">Check</label>
                                                        </div>

                                                        <div class="my-2 mx-4">
                                                            <input class="form-check-input" type="radio" name="checkUncheck" id="checkUncheck2" onclick="uncheckAll()">
                                                            <label for="checkUncheck2">Uncheck</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="list-group" id="filterable-wrapper">
                                            </ul>
                                        </div>
                                        <div class="showErr"></div>
                                    </div>
                                    <div class="col-md-12 mb-3 text-center visibility-hidden">
                                        <input type="submit" value="Send" class="btn oc-btn px-5">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 banner-wrapper-3">
                        <img src="<?= $target_dir6 . $buyerSupplierInquiryTitle->cover ?>" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="section story-section bg-white pt-100 banner-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 banner-wrapper-1">
                        <div class="shadow-lg rounded chat-wrapper">

                        <div class="w-100 p-3">
                            <h3 class="text-left"><?= $buyerSupplierInquiryTitle->title2 ?></h3>
                        </div>

                            <div class="w-100">
                                <div class="btn-group w-80 p-3">
                                    <a href="#" class="btn oc-btn message-tabs-links active-rfq-btn" onclick="wpMessageTabs(event, 'active-rfq')" aria-current="page">Active RFQ's</a>
                                    <a href="#" class="btn oc-outline-btn message-tabs-links" onclick="wpMessageTabs(event, 'available-stock')">Available Stock</a>
                                </div>
                            </div>

                            <div class="card border-0 message-tabs-content active-rfq" id="chat2" style="background:transparent">
                                <div class="p-3" style="border-bottom:1px solid #E4E4E4">
                                    <h5 class="mb-0">Active RFQ’s</h5>
                                </div>
                                <div class="card-body chat-body chat-body-rfq" style="scroll-behavior: smooth;">

                                </div>
                                <div class="card-footer text-white d-flex justify-content-start align-items-center bg-white">
                                    <input type="text" class="form-control form-control-lg border-0" id="chat-input-rfq" onclick="checkMessageEligibility()" placeholder="Type message..">
                                    <a class="mx-1 oc-outline-btn border-0" href="#"><i class="fas fa-paperclip"></i></a>
                                    <a class="oc-btn" id="send-message" onclick="sendGroupMessage()"><i class="fas fa-paper-plane"></i></a>
                                </div>
                            </div>

                            <div class="card border-0 message-tabs-content available-stock" id="chat3" style="background:transparent">
                                <div class="p-3" style="border-bottom:1px solid #E4E4E4">
                                    <h5 class="mb-0">Available Stock</h5>
                                </div>
                                <div class="card-body chat-body chat-body-stock" style="scroll-behavior: smooth;">

                                </div>
                                <div class="card-footer text-white d-flex justify-content-start align-items-center bg-white">
                                    <input type="text" class="form-control form-control-lg border-0" id="chat-input-stock" onclick="checkMessageEligibility()" placeholder="Type message..">
                                    <a class="mx-1 oc-outline-btn border-0" href="#"><i class="fas fa-paperclip"></i></a>
                                    <a class="oc-btn" id="send-message" onclick="sendGroupMessage()"><i class="fas fa-paper-plane"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 banner-wrapper-2">
                        <img src="<?= $target_dir6 . $buyerSupplierInquiryTitle->cover ?>" class="w-100" alt="">
                    </div>

                </div>
            </div>
        </section>


        <section class="section story-section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center"><?= $storyTitle->title1 ?></h3>
                    </div>
                    <div class="col-md-12 mt-4 text-center">
                        <div class="story-section-wrapper">
                            <?php if (count($storyModel) > 0) { ?>
                                <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": 2500, "pauseAutoPlayOnHover": false, "adaptiveHeight": true }'>
                                    <?php
                                    foreach ($storyModel as $storyKey => $storyVal) {
                                        $storyValue = (object) $storyVal;
                                    ?>
                                        <div class="carousel-cell">
                                            <div class="video-block">
                                                <a href="<?= $storyValue->content ?>" data-fancybox="gallery">
                                                    <img src="<?= get_root() ?>assets/img/story/<?= $storyValue->image ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <p>No Story found</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section chemical-section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center"><?= $storyTitle->title2 ?></h3>
                    </div>
                    <div class="col-md-12 mt-4 text-center">
                        <?php
                        foreach ($latestSearchModel as $latestSearchKey => $latestSearchVal) {
                            $latestSearchValue = (object) $latestSearchVal;
                            $latestOfferValue = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE product_name LIKE '%{$latestSearchValue->chemical}%'");
                            if (!empty($latestOfferValue)) {
                        ?>
                                <a href="<?=get_root()?>search?searchText=<?=urlencode($latestSearchValue->chemical)?>&searchForm=" class="btn landing-chemical-btn overflow-hidden m-1">
                                    <?= $latestOfferValue->product_name ?>
                                </a>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include('./common/footer-landing-page.php') ?>
    <?php include('./common/social-link-landing-page.php') ?>
    <?php include('./common/modal.php') ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script> -->


    <?php include('./common/script.php') ?>
    <!-- javascript -->
    <!-- <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <script src="<?= get_root() ?>assets/js/pages/group-chat-rfq.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/group-chat-stock.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/inquiry-offer.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/user-check.js"></script>
    <!-- <script src="<?= get_root() ?>assets/js/pages/index.js"></script> -->
    <script src="<?= get_root() ?>assets/js/pages/landing-page.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script>
        setTimeout(() => {
            feedbackModal()
        }, 20000);
    </script>

<script>
      Fancybox.bind('[data-fancybox]', {
        // Custom options
      });    
    </script>


</body>

</html>