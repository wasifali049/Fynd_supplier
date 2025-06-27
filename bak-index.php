<?php
include_once('./lib/bpconn.php');
include_once('./lib/config-details.php');

$homeBannerModel = fetch_all($db, "SELECT * FROM `home_banner` ORDER BY id DESC");
$target_dir5 = get_root() . "assets/img/banner/";
$homeBannerTitle = fetch_object($db, "SELECT * FROM `home_banner_title`");

$supplier = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `user_type`='supplier'"));
$buyer = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `user_type`='buyer'"));

$quotationAlignment = fetch_object($db, "SELECT * FROM `quotation_alignment`");
$quotationTitle = fetch_object($db, "SELECT * FROM `quotation_title`");

$inquiryModel1 = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE id='{$quotationAlignment->box1}'");
$inquiryModel2 = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE id='{$quotationAlignment->box2}'");
$inquiryModel3 = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE id='{$quotationAlignment->box3}'");

$inquiryModel[0] = $inquiryModel1;
$inquiryModel[1] = $inquiryModel2;
$inquiryModel[2] = $inquiryModel3;

$offerAlignment = fetch_object($db, "SELECT * FROM `offer_alignment`");
$offerTitle = fetch_object($db, "SELECT * FROM `offer_title`");

$offerModel1 = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE `id`='{$offerAlignment->box1}'");
$offerModel2 = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE `id`='{$offerAlignment->box2}'");
$offerModel3 = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE `id`='{$offerAlignment->box3}'");

$offerModel[0] = $offerModel1;
$offerModel[1] = $offerModel2;
$offerModel[2] = $offerModel3;

$supplierAlignment = fetch_object($db, "SELECT * FROM `supplier_alignment`");
$supplierTitle = fetch_object($db, "SELECT * FROM `supplier_title`");

$supplierModel1 = fetch_object($db, "SELECT * FROM `user` WHERE id='{$supplierAlignment->box1}'");
$supplierModel2 = fetch_object($db, "SELECT * FROM `user` WHERE id='{$supplierAlignment->box2}'");
$supplierModel3 = fetch_object($db, "SELECT * FROM `user` WHERE id='{$supplierAlignment->box3}'");
$supplierModel4 = fetch_object($db, "SELECT * FROM `user` WHERE id='{$supplierAlignment->box4}'");

$supplierModel[0] = $supplierModel1;
$supplierModel[1] = $supplierModel2;
$supplierModel[2] = $supplierModel3;
$supplierModel[3] = $supplierModel4;

$buyerAlignment = fetch_object($db, "SELECT * FROM `buyer_alignment`");
$buyerTitle = fetch_object($db, "SELECT * FROM `buyer_title`");

$buyerModel1 = fetch_object($db, "SELECT * FROM `user` WHERE id='{$buyerAlignment->box1}'");
$buyerModel2 = fetch_object($db, "SELECT * FROM `user` WHERE id='{$buyerAlignment->box2}'");
$buyerModel3 = fetch_object($db, "SELECT * FROM `user` WHERE id='{$buyerAlignment->box3}'");
$buyerModel4 = fetch_object($db, "SELECT * FROM `user` WHERE id='{$buyerAlignment->box4}'");

$buyerModel[0] = $buyerModel1;
$buyerModel[1] = $buyerModel2;
$buyerModel[2] = $buyerModel3;
$buyerModel[3] = $buyerModel4;

$target_dir4 = get_root() . "assets/img/profile/";


$chemicalAlignment = fetch_object($db, "SELECT * FROM `chemical_alignment`");
$chemicalTitle = fetch_object($db, "SELECT * FROM `chemical_title`");

$chemicalModel1 = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE id='{$chemicalAlignment->box1}'");
$chemicalModel2 = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE id='{$chemicalAlignment->box2}'");
$chemicalModel3 = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE id='{$chemicalAlignment->box3}'");

$chemicalModel[0] = $chemicalModel1;
$chemicalModel[1] = $chemicalModel2;
$chemicalModel[2] = $chemicalModel3;

$target_dir3 = get_root() . "assets/img/chemical/";

$faqModel = fetch_all($db, "SELECT * FROM `faq`");
$faqTitle = fetch_object($db, "SELECT * FROM `faq_title`");

$blogModel = fetch_all($db, "SELECT * FROM `blog` ORDER BY id DESC LIMIT 3");
$blogTitle = fetch_object($db, "SELECT * FROM `blog_title`");

$feedbackModel = fetch_all($db, "SELECT * FROM `feedback` ORDER BY id DESC");
$feedbackTitle = fetch_object($db, "SELECT * FROM `feedback_title`");
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
    <link rel="stylesheet" href="<?= get_root() ?>/assets/css/intlTelInput.css">


    <?php
    $homeHeadScriptModel = fetch_object($db, "SELECT * FROM `home_head_script` WHERE 1");
    echo $homeHeadScriptModel->content
    ?>
    
    <style>
        .msg-main-wrapper{
            background:#fff !important;
            padding:10px;
            border-radius:10px;
            margin-bottom:20px;
        }
        
    </style>
</head>

<body>
    <?php include('./common/header.php') ?>

    <main>
        <section class="section banner-section site-bg pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 pt-4 banner-title d-flex justify-content-between align-items-baseline flex-wrap">
                        <h2 class="p-0"><?= $homeBannerTitle->title ?></h2>


                        <div class="banner-main-btn">
                            <a aria-current="page" data-bs-toggle="modal" data-bs-target="#getQuoteModel" class="oc-btn">Get Quote Now</a>
                            <a aria-current="page" data-bs-toggle="modal" data-bs-target="#exchangeOfferModel" class="oc-btn">Send Offers to Buyers</a>
                        </div>
                    </div>


                    <div class="col-md-4 banner-wrapper">
                        <div id="carouselExampleCaptions" class="carousel slide">
                            <div class="carousel-indicators">
                                <?php foreach ($homeBannerModel as $homeBannerKey1 => $homeBannerVal1) { ?>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $homeBannerKey1 ?>" class="<?= $homeBannerKey1 == 0 ? 'active' : '' ?>" aria-current="true" aria-label="Slide <?= $homeBannerKey1 ?>"></button>
                                <?php } ?>
                            </div>
                            <div class="carousel-inner">

                                <?php foreach ($homeBannerModel as $homeBannerKey2 => $homeBannerVal2) {
                                    $homeBannerValue2 = (object) $homeBannerVal2;
                                ?>
                                    <div class="carousel-item <?= $homeBannerKey2 == 0 ? 'active' : '' ?>">
                                        <img src="<?= $target_dir5 . $homeBannerValue2->banner ?>" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5><?= $homeBannerValue2->title1 ?></h5>
                                            <p><?= $homeBannerValue2->title2 ?></p>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8 chat-wrapper">

                        <div class="card" id="chat2">
                            <div class="card-header d-flex justify-content-between align-items-center p-3 flex-wrap">
                                <h5 class="mb-0"><i class="fas fa-users"></i> Buyer/Suppliers Group Chat</h5>
                                <div>
                                    <a class="oc-btn" <?= pop_buyers($db) ?>>Buyer <?= $buyer ?>+</a>
                                    <a class="oc-btn" href="<?= get_root() ?>supplier">Suppliers <?= $supplier ?>+</a>
                                </div>
                            </div>
                            <div class="card-body chat-body" style="scroll-behavior: smooth;">

                            </div>
                            <div class="card-footer text-white d-flex justify-content-start align-items-center p-3">
                                <a class="mx-3 oc-outline-btn" href="#"><i class="fas fa-paperclip"></i></a>
                                <input type="text" class="form-control form-control-lg" id="chat-input" onclick="checkMessageEligibility()" placeholder="Type message">
                                <a class="ms-3 oc-outline-btn" id="send-message" onclick="sendGroupMessage()"><i class="fas fa-paper-plane"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="section letest-enquiry">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between align-items-baseline">
                        <h2><?= $quotationTitle->title ?></h2>
                        <a href="<?= get_root() ?>inquiry-all" class="oc-btn">View More</a>
                    </div>

                    <?php foreach ($inquiryModel as $inquiryKey => $inquiryVal) {
                        if (empty($inquiryVal)) {
                            continue;
                        }
                        $inquiryValue = (object) $inquiryVal;
                        $inquiryUserModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$inquiryValue->uid}'");

                        $onclick1 = pop_contact($inquiryValue, 'buyer')
                    ?>
                        <div class="col-md-4">
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

        <section class="section letest-offer site-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between align-items-baseline">
                        <h2><?= $offerTitle->title ?></h2>
                        <a href="<?= get_root() ?>offer-all" class="oc-outline-btn">View More</a>
                    </div>

                    <?php foreach ($offerModel as $offerKey => $offerVal) {
                        if (empty($offerVal)) {
                            continue;
                        }

                        $offerValue = (object) $offerVal;

                        $onclick2 = pop_contact($offerValue, 'supplier');
                    ?>

                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= get_root() ?>assets/img/offer/<?= $offerValue->image ?>" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="letest-offer-detail flex-wrap">
                                        <p class="text-wrap pe-2">
                                            <b>Product name</b>
                                        </p>
                                        <p class="text-wrap"><?= $offerValue->chemical ?></p>
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
                                        <a class="oc-btn" href="<?= get_root() ?>view/<?= $offerValue->rfq ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </section>




        <section class="section top-supplier">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-md-12 d-flex justify-content-between align-items-baseline">
                        <h2 class="text-center"><?= $supplierTitle->title ?></h2>
                        <a href="<?= get_root() ?>supplier" class="oc-btn">View More</a>
                    </div>
                    <div class="col-md-5">
                        <img class="w-100" src="<?= get_root() ?>assets/img/supplier/<?= $supplierTitle->cover ?>" height="600px">
                    </div>
                    <div class="col-md-7">
                        <div class="owl-carousel-wrapper">

                            <div class="top-chemical-supplier owl-carousel owl-theme">
                                <?php

                                if (count($supplierModel) > 0) {

                                    foreach ($supplierModel as $supplierKey => $supplierVal) {

                                        if (empty($supplierVal)) {
                                            continue;
                                        }

                                        $supplierValue = (object) $supplierVal;


                                        $chemicalListModel = fetch_all($db, "SELECT `chemical_id` FROM supplier_chemical_list WHERE uid='{$supplierValue->id}'");

                                        $chemicalListArray = array_column($chemicalListModel, 'chemical_id');
                                        $chemicalListIds = implode(',', $chemicalListArray);
                                        $chemicalListIds = !empty($chemicalListIds) ? $chemicalListIds : 0;
                                        $supplierChemicalListModel = fetch_all($db, "SELECT * FROM `chemical` WHERE id IN ({$chemicalListIds}) LIMIT 4");

                                ?>
                                        <div class="">

                                            <div class="supplier-image-wrapper">
                                                <div class="supplier-image-box">
                                                    <img src="<?= $target_dir4 . $supplierValue->profile_photo ?>" class="w-100" style="border-radius:50%" alt="Malw">
                                                </div>
                                            </div>

                                            <div class="card top-supplier-card">
                                                <div class="card-body">
                                                    <div class="top-supplier-detail">
                                                        <p>
                                                            <b>Name</b>
                                                        </p>
                                                        <p><?= $supplierValue->name ?></p>
                                                    </div>

                                                    <div class="top-supplier-detail">
                                                        <p>
                                                            <b>Country</b>
                                                        </p>
                                                        <p><?= textWithoutHtml($supplierValue->country, 20) ?></p>
                                                    </div>

                                                    <div class="top-supplier-detail">
                                                        <p>
                                                            <b>Company</b>
                                                        </p>
                                                        <p><?= textWithoutHtml($supplierValue->company_name, 20) ?></p>
                                                    </div>

                                                    <div class="top-supplier-detail">
                                                        <p>
                                                            <b>Details</b>
                                                        </p>
                                                        <p></p>
                                                    </div>

                                                    <p class="card-text">
                                                        <?= textWithoutHtml($supplierValue->about, 30) ?>
                                                    </p>


                                                </div>
                                                <div class="card-footer">
                                                    <div>
                                                        <a href="supplier-profile/<?= $supplierValue->slug ?>" class="oc-btn">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="">
                                        <p>No supplier found!!</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php /* ?>

        <section class="section top-buyer site-bg">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-md-12 d-flex justify-content-center align-items-baseline">
                        <h2 class="text-center"><?= $buyerTitle->title ?></h2>
                        <!-- <a href="./#" class="oc-outline-btn">View More</a> -->
                    </div>
                    <div class="col-md-7">
                        <div class="owl-carousel-wrapper">

                            <div class="top-chemical-buyer owl-carousel owl-theme">
                                <?php
                                if (count($buyerModel) > 0) {

                                    foreach ($buyerModel as $buyerKey => $buyerVal) {
                                        $buyerValue = (object) $buyerVal;

                                        //$chemicalListModel = fetch_all($db, "SELECT `chemical_id` FROM supplier_chemical_list WHERE uid='{$supplierValue->id}'");

                                        //$chemicalListArray = array_column($chemicalListModel, 'chemical_id');
                                        //$chemicalListIds = implode(',', $chemicalListArray);
                                        //$chemicalListIds = !empty($chemicalListIds) ? $chemicalListIds : 0;
                                        //$supplierChemicalListModel = fetch_all($db, "SELECT * FROM `chemical` WHERE id IN ({$chemicalListIds}) LIMIT 4");

                                ?>
                                        <div class="">
                                            <div class="top-buyer-image-wrapper">
                                                <div class="top-buyer-image-box">
                                                    <img src="<?= $target_dir4 . $buyerValue->profile_photo ?>" class="w-100" style="border-radius:50%" alt="Malw">
                                                </div>
                                            </div>
                                            <div class="card top-buyer-card">

                                                <div class="card-body">
                                                    <div class="top-buyer-detail">
                                                        <p>
                                                            <b>Name</b>
                                                        </p>
                                                        <p><?= $buyerValue->name ?></p>
                                                    </div>

                                                    <div class="top-buyer-detail">
                                                        <p>
                                                            <b>Country</b>
                                                        </p>
                                                        <p><?= $buyerValue->country ?></p>
                                                    </div>

                                                    <div class="top-buyer-detail">
                                                        <p>
                                                            <b>Company</b>
                                                        </p>
                                                        <p><?= $buyerValue->company_name ?></p>
                                                    </div>

                                                    <div class="top-buyer-detail">
                                                        <p>
                                                            <b>Details</b>
                                                        </p>
                                                        <!-- <p>Pakistan</p> -->
                                                    </div>

                                                    <p class="card-text">
                                                        <?= $buyerValue->about ?>
                                                    </p>

                                                    <!-- <div>
                                                <a href="#" class="oc-btn">chemical</a>
                                                <a href="#" class="oc-btn">chemical</a>
                                                <a href="#" class="oc-btn">chemical</a>
                                                <a href="#" class="oc-btn">chemical</a>
                                            </div> -->
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="">
                                        <p>No supplier found!!</p>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img class="w-100" src="./assets/img/buyer/<?= $buyerTitle->cover ?>" alt="">
                    </div>
                </div>
            </div>
        </section>
*/ ?>

        <section class="section popular-chamical">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between align-items-baseline">
                        <h2 class="text-center"><?= $chemicalTitle->title ?></h2>
                        <a href="<?= get_root() ?>chemical-all" class="oc-btn">View More</a>
                    </div>


                    <?php
                    foreach ($chemicalModel as $chemicalKey => $chemicalVal) {

                        if (empty($chemicalVal)) {
                            continue;
                        }

                        $chemicalValue = (object) $chemicalVal;

                        $onclick3 = pop_inquiry($chemicalValue);


                        $userModel33 =    fetch_object($db, "SELECT * FROM `user` WHERE id='{$chemicalValue->uid}'");
                        
                        $onclick333 = pop_contact($userModel33);
                    ?>
                        <div class="col-md-4 mb-4">
                            <div class="card popular-chemical-card">
                                <img src="<?= $target_dir3 . $chemicalValue->chemical_photo ?>" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="popular-chamical-detail">
                                        <p class="text-nowrap me-4">
                                            <b>Product name</b>
                                        </p>
                                        <p class="text-truncate"><?= $chemicalValue->product_name ?></p>
                                    </div>

                                    <div class="popular-chamical-detail">
                                        <p>
                                            <b>Price</b>
                                        </p>
                                        <p><?= $chemicalValue->price ?></p>
                                    </div>

                                    <?php /*
                                    <div class="popular-chamical-detail">
                                        <p>
                                            <b>Min Order Qty</b>
                                        </p>
                                        <p><?= $chemicalValue->min_order_quantity ?></p>
                                    </div>

                                    <div class="popular-chamical-detail">
                                        <p>
                                            <b>Manufacturer</b>
                                        </p>
                                    </div>
                                    <p><?= textWithoutHtml($chemicalValue->manufacturer_details, 112) ?></p>

                                    <div class="popular-chamical-detail">
                                        <p>
                                            <b>Specifications</b>
                                        </p>
                                    </div>
                                    <p><?= textWithoutHtml($chemicalValue->product_info, 112) ?></p>*/ ?>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between align-items-center">

                                        <a class="oc-btn mx-1" <?= $onclick333 ?>>Contact On Whatsapp</a>

                                        

                                        
                                        <a class="my-1 oc-btn mx-1" href="<?= get_root() ?>chemical-view/<?= $chemicalValue->slug ?>">View Product Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </section>

        <section class="section faq-section site-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-left"><?= $faqTitle->title ?></h2>
                    </div>

                    <div class="col-md-12">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <?php

                            if (count($faqModel) > 0) {
                                foreach ($faqModel as $faqKey => $faqVal) {
                                    $faqValue = (object) $faqVal;
                            ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne<?= $faqKey ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne<?= $faqKey ?>">
                                                <?= $faqValue->title ?>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne<?= $faqKey ?>" class="accordion-collapse collapse <?= ($faqKey == 0) ? 'show' : '' ?>">
                                            <div class="accordion-body">
                                                <p>
                                                    <?= $faqValue->content ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                            <?php }
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section latest-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center"><?= $blogTitle->title ?></h2>
                    </div>

                    <?php
                    foreach ($blogModel as $blogKey => $blogVal) {
                        $blogValue = (object) $blogVal;
                    ?>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <a href="<?= get_root() ?>blog-view/<?= $blogValue->slug ?>"><img src="<?= get_root() ?>assets/img/blog/<?= $blogValue->image ?>" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a class="text-decoration-none" href="<?= get_root() ?>blog-view/<?= $blogValue->slug ?>"><?= textWithoutHtml($blogValue->title, 20) ?></a>
                                    </h5>
                                    <p class="card-text">
                                        <?= textWithoutHtml($blogValue->content, 100) ?>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="<?= get_root() ?>blog-view/<?= $blogValue->slug ?>" class="oc-btn">Read More</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <div class="col-md-12 pt-4 text-center">
                        <a href="<?= get_root() ?>blog-all" class="oc-btn">View More</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section feedback-section site-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center"><?= $feedbackTitle->title ?></h2>
                    </div>


                    <div class="col-md-12">

                        <div class="feedback-slider owl-carousel owl-theme">

                            <?php if (count($feedbackModel) > 0) {
                                foreach ($feedbackModel as $feedbackKey => $feedbackVal) {
                                    $feedbackValue = (object) $feedbackVal;
                            ?>
                                    <div>
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="<?= get_root() ?>assets/img/icon/feeed-quotes.png" class="feedback-quotes" alt="Fedback Image">
                                                <p class="card-text px-1">
                                                    <?= textWithoutHtml($feedbackValue->content, 100) ?>
                                                </p>

                                                <div class="feedback-footer">
                                                    <img style="width:80px;height:80px;border-radius:50%;fit-object:fit;" src="<?= get_root() ?>assets/img/feedback/<?= $feedbackValue->image ?>" alt="">
                                                    <h6 class="mx-2 mb-0"><?= $feedbackValue->name ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>

                        </div>

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

    <script>
        setTimeout(() => {
            feedbackModal()
        }, 20000);
    </script>


</body>

</html>