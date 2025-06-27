<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

$slug = mysqli_real_escape_string($db, $_REQUEST['slug']);
$slug = str_replace(".php", "", $slug);

$chemicalModel = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE slug='{$slug}'");
$userModel =    fetch_object($db, "SELECT * FROM `user` WHERE id='{$chemicalModel->uid}'");


$targetDir = get_root() . 'assets/img/profile/';
$targetDir2 = get_root() . 'assets/img/chemical/';

$countryModel = get_country_list($db);




$limit = 18;

if (isset($_REQUEST["page"])) {
    $pn  = $_REQUEST["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;


$chemical_list_sql = "SELECT * FROM supplier_chemical_list WHERE uid='{$userModel->id}' ORDER BY id DESC LIMIT $startFrom, $limit";

$supplierChemicalListModel = fetch_all($db, $chemical_list_sql);



if (is_login()) {
    $login_user_id = get_user_id();
    $loginUserModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$login_user_id}'");

    $mobile = getOriginalMobile($loginUserModel->mobile, $loginUserModel->country_code);
    $country_code = $loginUserModel->country_code;
    $email = $loginUserModel->email;
    $name = $loginUserModel->name;
} else {
    $mobile = '';
    $country_code = '';
    $email = '';
    $name = '';
}


$latestOfferModel = fetch_all($db, "SELECT * FROM `inquiry_offer` ORDER BY `id` DESC LIMIT 4");

$onclick3 = pop_inquiry($chemicalModel);

$onclick5 = pop_contact($userModel);
?>

<!doctype html>
<html lang="en">

<head>
    <?php
    //$supplierSEOModel = fetch_object($db, "SELECT * FROM `supplier_seo` WHERE 1");
    //$title = !empty($userModel->meta_title) ? $userModel->meta_title : $supplierSEOModel->meta_title;
    ?>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>
    <!-- Owl Stylesheets -->

    <?= showSupplierChemicalSEOTag($db, $chemicalModel, get_main_url()) ?>

    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/intlTelInput.css">
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/profile.css">




</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section profile-section site-bg">
            <div class="container">



                <div class="row">



                    <div class="col-md-9 letest-offer">

                        <div class="card custom-card main-content-body-profile" style="height:100%">

                            <div class="card-body tab-content h-100">

                                <div class="row">
                                    <div class="col-md-5">
                                        <div>
                                            <img class="w-100 border rounded p-1" alt="avatar" src="<?= $targetDir2 . $chemicalModel->chemical_photo ?>">
                                        </div>

                                        <div class="border mt-3 p-2 rounded">


                                            <div class="d-flex justify-content-between align-items-center">

                                                <div><i class="bi bi-share-fill"></i> Share: </div>
                                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                    <!-- <a class="a2a_dd" href="https://www.addtoany.com/share"></a> -->
                                                    <a class="a2a_button_facebook"></a>
                                                    <a class="a2a_button_linkedin"></a>
                                                    <a class="a2a_button_whatsapp"></a>
                                                    <a class="a2a_button_twitter"></a>
                                                    <a class="a2a_button_copy_link"></a>
                                                </div>
                                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h2 style="color: var(--primary-bg-color);"><?= $chemicalModel->product_name ?></h2>
                                        <hr>


                                        <div class="letest-offer-detail">
                                            <h3 style="color: var(--primary-bg-color);">
                                                <b>Min Order Quantity</b>
                                            </h3>
                                            <p><?= $chemicalModel->min_order_quantity ?></p>
                                        </div>
                                        <br>

                                        <div class="letest-offer-detail">
                                            <h3 style="color: var(--primary-bg-color);">
                                                <b>Price</b>
                                            </h3>
                                            <p><?= $chemicalModel->price ?></p>
                                        </div>
                                        <br>

                                        <div class="letest-offer-detail">
                                            <h3 style="color: var(--primary-bg-color);">
                                                <b>Density</b>
                                            </h3>
                                            <p><?= $chemicalModel->density ?></p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <a class="btn btn-primary" <?= $onclick5 ?>>Contact On Whatsapp</a>
                                <a class="btn btn-primary outline-btn" <?= $onclick3 ?>> Send Enquiry </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="card custom-card" style="height:100%">
                            <div class="card-body text-center">
                                <div class="main-profile-overview widget-user-image text-center">
                                    <div class="main-img-user">
                                        <img alt="avatar" src="<?= $targetDir . $userModel->profile_photo ?>">
                                    </div>
                                </div>
                                <div class="item-user pro-user mb-3">
                                    <h4 class="pro-user-username text-dark mt-2 mb-0"><?= $userModel->name ?></h4>
                                    <!-- <p class="d-inline-block px-1 mt-1 border rounded text-success border-success"><i class="fa fa-check"></i> Verified</p> -->
                                    <?= get_premium_badge($db, $userModel->id) ?>
                                </div>

                                <div class="main-profile-contact-list letest-offer">

                                    <div class="letest-offer-detail">
                                        <p class="">
                                            <b>Established Year</b>
                                        </p>
                                        <p class="">
                                            <?= $userModel->established_year ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="letest-offer-detail flex-wrap justify-content-center  rounded text-center">
                                    <a href="<?= get_root() ?>supplier-profile/<?= $userModel->slug ?>" class="btn btn-outline-primary px-5">Visit Store</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 mt-4">
                        <div class="card custom-card main-content-body-profile h-100">
                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-title mb-0 "><?= ucfirst($chemicalModel->product_name) ?></h6>
                                </div>
                            </div>

                            <div class="card-body tab-content h-100">
                                <div class="letest-offer-detail">
                                    <p style="padding-right:10px">
                                        <b>Product Specification</b>
                                    </p>
                                    <p><?= $chemicalModel->product_specification ?></p>
                                </div>

                                <div class="letest-offer-detail">
                                    <p style="padding-right:10px">
                                        <b>Product Info</b>
                                    </p>
                                    <p><?= $chemicalModel->product_info ?></p>
                                </div>


                                <div class="letest-offer-detail">
                                    <p style="padding-right:10px">
                                        <b>Manufacturer Details</b>
                                    </p>
                                    <p><?= $chemicalModel->manufacturer_details ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">

                        <div class="card custom-card main-content-body-profile h-100 position-relative">
                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6>Get the Best Price for</h6>
                                </div>
                            </div>

                            <div class="card-body tab-content h-100 position-sticky shadow rounded">

                                <div class="">
                                    <form class="" id="shortOnTimeForm" method="post" action="<?= get_root() ?>inc/search/short-on-time-add.php">

                                        <div class="pt-2">
                                            <h6><?= ucfirst($chemicalModel->product_name) ?></h6>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12 mb-3 d-none">
                                                <label for="sort-on-time-name" class="form-label sort-on-time-name-label">Name *</label>
                                                <input type="text" id="sort-on-time-name" class="form-control" name="shortOnTime[name]" placeholder="Enter Your Name" value="<?= $name ?>" />
                                                <div class="showErr"></div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="sort-on-time-mobile" class="form-label sort-on-time-mobile-label">Mobile Number *</label>

                                                <div class="">
                                                    <select class="w-100 form-select text-left combined-mobile" name="country_code">
                                                        <?php
                                                        foreach ($countryModel as $countryKey4 => $countryVal4) {
                                                            $countryValue4 = (object) $countryVal4;
                                                        ?>
                                                            <option value="<?= $countryValue4->phonecode ?>" <?= ($countryValue4->phonecode == $country_code) ? 'selected' : '' ?>><?= $countryValue4->name ?> - +<?= $countryValue4->phonecode ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <input type="tel" id="sort-on-time-mobile" class="w-100 form-control" name="shortOnTime[mobile]" placeholder="Mobile (Whatsapp)" value="<?= $mobile ?>" />
                                                </div>
                                                <div class="showErr"></div>
                                            </div>

                                            <div class="col-md-12 mb-3 d-none">
                                                <label for="sort-on-time-email" class="form-label sort-on-time-email-label">Email *</label>
                                                <input type="email" id="sort-on-time-email" class="form-control" name="shortOnTime[email]" placeholder="Enter Your Email" value="<?= $email ?>" />
                                                <div class="showErr"></div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="sort-on-time-message" class="form-label sort-on-time-message-label">Message *</label>
                                                <textarea id="sort-on-time-message" class="form-control" name="shortOnTime[message]" cols="30" rows="3" placeholder='Provide details about your <?= $searchText ?> buying requirement so supplier can contact you with their quotes.'></textarea>
                                                <div class="showErr"></div>
                                            </div>

                                            <div class="col-md-12 mb-3 text-center">
                                                <input type="hidden" name="shortOnTime[location]" value="Chemical Page">
                                                <input type="submit" class="btn btn-primary d-block w-100">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-9 mt-4">
                        <div class="card custom-card main-content-body-profile h-100">

                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-title mb-0 ">Seller Information</h6>
                                </div>
                            </div>

                            <div class="card-body tab-content h-100">


                                <div class="main-profile-contact-list letest-offer">

                                    <div class="letest-offer-detail">
                                        <p class="">
                                            <b>Company Name</b>
                                        </p>
                                        <p class="">
                                            <?= $userModel->company_name ?>
                                        </p>
                                    </div>


                                    <div class="letest-offer-detail">
                                        <p class="">
                                            <b>Country</b>
                                        </p>
                                        <p class="">
                                            <?= $userModel->country ?>
                                        </p>
                                    </div>

                                    <div class="letest-offer-detail">
                                        <p>
                                            <b>Designation</b>
                                        </p>
                                        <p><?= $userModel->designation ?></p>
                                    </div>
                                    <div class="letest-offer-detail">
                                        <p>
                                            <b>Website</b>
                                        </p>
                                        <p><?= $userModel->website ?></p>
                                    </div>

                                    <div class="letest-offer-detail">
                                        <p>
                                            <b>About</b>
                                        </p>
                                        <p><?= $userModel->about ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">
                        <div class="card custom-card main-content-body-profile h-100" style="overflow:auto">
                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-title mb-0 ">Latest offers and surplus chemicals</h6>
                                </div>
                            </div>

                            <div class="card-body tab-content h-100">

                                <?php
                                foreach ($latestOfferModel as $latestOfferKey => $latestOfferVal) {
                                    $latestOfferValue = (object) $latestOfferVal;

                                    $offerImage = $latestOfferValue->image ? $latestOfferValue->image : 'product.png';
                                ?>

                                    <a href="<?= get_root() ?>view/<?= $latestOfferValue->rfq ?>" class="d-block">
                                        <div class="row border rounded mb-2">
                                            <div class="col-md-4">
                                                <img width="100%" src="<?= get_root() ?>assets/img/offer/<?= $offerImage ?>" alt="">
                                            </div>
                                            <div class="col-md-8">
                                                <?= $latestOfferValue->chemical ?>
                                            </div>
                                        </div>


                                    </a>

                                <?php } ?>
                            </div>
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


    <script src="<?= get_root() ?>assets/js/pages/user-check.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/inquiry-offer.js"></script>

    <script src="<?= get_root() ?>assets/js/pages/search.js"></script>


</body>

</html>