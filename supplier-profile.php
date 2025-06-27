    <?php

    include('./lib/bpconn.php');
    include('./lib/config-details.php');

    $slug = mysqli_real_escape_string($db, $_REQUEST['slug']);
    $slug = str_replace(".php", "", $slug);

    // $userModel = fetch_object($db, "SELECT * FROM `user` WHERE slug='qz3wGLRfwh'");



    $userModel = fetch_object($db, "SELECT * FROM `user` WHERE slug='{$slug}'");

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


    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <?php
        $supplierSEOModel = fetch_object($db, "SELECT * FROM `supplier_seo` WHERE 1");
        $title = !empty($userModel->meta_title) ? $userModel->meta_title : $supplierSEOModel->meta_title;
        ?>
        <title><?= $title ?></title>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <?php include('./common/head.php') ?>
        <!-- Owl Stylesheets -->
        <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?= get_root() ?>assets/css/intlTelInput.css">
        <link rel="stylesheet" href="<?= get_root() ?>assets/css/profile.css">

        <?= showSupplierSEOTag($db, $userModel, get_main_url()) ?>

        <style>
            .custom-card {
        border: 1px solid #ddd; /* Add a border for definition */
        border-radius: 10px; /* Round corners */
        padding: 20px; /* Add some padding */
        background: #fff; /* Background color */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
    }

    .main-img-user img {
        width: 100px; /* Set a fixed width */
        height: 100px; /* Set a fixed height */
        border-radius: 50%; /* Make the image circular */
        border: 2px solid #007bff; /* Optional border color */
    }

    .pro-user-desc, .text-muted {
        font-size: 0.9em; /* Slightly smaller text */
    }


        </style>

    </head>

    <body>
        <?php include('./common/header.php') ?>

        <main>

            <section class="section profile-section site-bg">
                <div class="container">



                    <div class="row">
                        <div class="col-xl-4 col-md-12">
                            <div class="card custom-card">
                                <div class="card-body text-center">
                                    <div class="main-profile-overview widget-user-image text-center">
                                        <div class="main-img-user">
                                            <img alt="avatar" src="<?= $targetDir . $userModel->profile_photo ?>">
                                        </div>
                                    </div>
                                    <div class="item-user pro-user">

                                    <h4 class="pro-user-username text-dark mt-2 mb-0"><?= $userModel->name ?></h4>
                                        <p class="pro-user-desc text-muted mb-1">(Supplier)</p>
                                        <p class=" mb-1" style=" text-align:left;font-size:15px !important;    "><strong>Designation:</strong> <?= $userModel->designation ?></p>
                                        <p class=" mb-1" style=" text-align:left;    "><strong>Company:</strong> <?= $userModel->company_name ?></p>
                                        <p class=" mb-1" style=" text-align:left;    "><strong>Established:</strong> <?= $userModel->established_year ?></p>
                                        <!-- <p class="text-muted mb-1" style=" text-align:left;    "><strong>Country:</strong> <?= $countryValue11->name ?>                                        </p> -->
                                        <p class=" mb-1" style=" text-align:left;    "><strong>Website:</strong> <a href="<?php echo $userModel->website; ?>" target="_blank" class="text-primary"><?= $userModel->website ?></a></p>
                                        <p class=" mb-1" style=" text-align:left;    "><strong>Origin: </strong><?= $userModel->origin ?></p>
                                        <p class=" mb-1" style=" text-align:left;    "><strong>About: </strong><?= $userModel->about ?></p>
                                        <!-- <h4 class="pro-user-username text-dark mt-2 mb-0"><?= $userModel->name ?></h4>
                                        <p class="pro-user-desc text-muted mb-1">(<?= strtoupper($userModel->user_type) ?>)</p> -->

                                        <!-- <p class="d-inline-block px-1 mt-1 border rounded text-success border-success"><i class="fa fa-check"></i> Verified</p> -->
                                        <?=get_premium_badge($db, $userModel->id)?>
                                    </div>
                                </div>
                            </div>

                            <div class="card custom-card">
                                <div class="card-header custom-card-header rounded-bottom-0">
                                    <div>
                                        <h6 class="card-title mb-0">Contact Information</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="main-profile-contact-list main-profile-work-list">
                                        <div class="media">
                                            <div class="media-logo bg-light text-dark"> <i class="bi bi-phone"></i> </div>
                                            <div class="media-body">
                                                <!-- <span>Mobile</span> -->
                                                <div><?php if (is_login()) { ?>
                                                        <p class="mb-0"><?= $userModel->mobile ?> </p>
                                                    <?php } else { ?>
                                                        <a class="btn btn-outline-primary px-5" onclick="checkMessageEligibility()"> <i class="bi bi-telephone-fill"></i> View Number</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="media">
                                            <div class="media-logo bg-light text-dark"> <i class="bi bi-chat"></i> </div>
                                            <div class="media-body">
                                                <!-- <span>Chat</span> -->
                                                <div>
                                                    <?php $onclick5 = pop_contact($userModel); ?>
                                                    <a class="btn btn-outline-primary px-5" <?= $onclick5 ?>> Whatsapp Chat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-logo bg-light text-dark"> <i class="bi bi-envelope"></i> </div>
                                            <div class="media-body">
                                                <!-- <span>Email</span> -->
                                                <div>
                                                    <?php if (is_login()) { ?>
                                                        <p class="mb-0"><a class="text-decoration-none" href="mailto:<?= $userModel->email ?>"><?= $userModel->email ?></a></p>
                                                    <?php } else { ?>
                                                        <a class="btn btn-outline-primary px-5" onclick="checkMessageEligibility()">Show Email</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-logo bg-light text-dark"> <i class="bi bi-globe"></i> </div>
                                            <div class="media-body">
                                                <!-- <span>Country</span> -->
                                                <p class="mb-0"> <?= $userModel->country ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-8 col-md-12">

                        <?php if ($userModel->user_type == 'supplier') { ?>
                            <div class="card custom-card main-content-body-profile">

                                <div class="card-header custom-card-header rounded-bottom-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title mb-0 ">Chemical List</h6>
                                    </div>
                                </div>

                                <div class="card-body tab-content h-100">

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


                                    <div class="row">
                                        <?php
                                        if (count($supplierChemicalListModel)) {
                                            foreach ($supplierChemicalListModel as $chemicalListKey => $chemicalListVal) {
                                                $chemicalListValue = (object) $chemicalListVal;
                                                $onclick3 = pop_inquiry($chemicalListValue);
                                        ?>
                                                <div class="col-md-6 letest-offer ">
                                                    <div class="card">
                                                        <img src="<?= $targetDir2 . $chemicalListValue->chemical_photo ?>" class="card-img-top" alt="...">
                                                        <div class="card-body">

                                                            <div class="letest-offer-detail">
                                                                <p>
                                                                    <b>Product name</b>
                                                                </p>
                                                                <p><?= $chemicalListValue->product_name ?></p>
                                                            </div>

                                                            <div class="letest-offer-detail">
                                                                <p>
                                                                    <b>Price</b>
                                                                </p>
                                                                <p><?= $chemicalListValue->price ?></p>
                                                            </div>

                                                            <?php /*<div class="letest-offer-detail">
                                                                <p>
                                                                    <b>Min Order Quantity</b>
                                                                </p>
                                                                <p><?= $chemicalListValue->min_order_quantity ?></p>
                                                            </div>

                                                            <div class="letest-offer-detail">
                                                                <p>
                                                                    <b>Manufacturer</b>
                                                                </p>
                                                            </div>
                                                            <p><?= $chemicalListValue->manufacturer_details ?></p>

                                                            <div class="letest-offer-detail">
                                                                <p>
                                                                    <b>Specifications</b>
                                                                </p>
                                                            </div>
                                                            <p><?= textWithoutHtml($chemicalListValue->product_info, 100) ?></p>
                                                                                */ ?>
                                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                                <a class="my-1 oc-btn" <?= $onclick3 ?> style="padding-inline:20px;border-radius:10px;padding-top:10px;padding-bottom:10px;">Inquiry</a>
                                                                <a class="my-1 oc-btn" style="padding-inline:10px;border-radius:10px;padding-top:10px;padding-bottom:10px;" href="<?= get_root() ?>chemical-view/<?= $chemicalListValue->slug ?>">View Product Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p>No chemical found</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="col-12 mt-4">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination pagination-sm">
                                                    <?php

                                                    $sql = "SELECT COUNT(*) FROM `supplier_chemical_list` WHERE uid='{$userModel->id}'";
                                                    $rs_result = mysqli_query($db, $sql);
                                                    $row = mysqli_fetch_row($rs_result);
                                                    $total_records = $row[0];

                                                    $total_pages = ceil($total_records / $limit);
                                                    $pagLink = "";
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        if ($i == $pn) {
                                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='" . get_root() . "supplier-profile/{$slug}&page="

                                                                . $i . "'>" . $i . "</a></li>";
                                                        } else {
                                                            $pagLink .= "<li class='page-item'><a class='page-link' href='" . get_root() . "supplier-profile/{$slug}&page=" . $i . "'>

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
                            </div>
                        <?php } ?>
                        </div>
                        
                    </div>
























































                    <?php /*


                    <div class="row rounded bg-white shadow mb-4 align-items-center py-3">

                        <div class="col-xl-4">
                            <p class="px-1 border rounded text-success border-success"><i class="fa fa-check"></i> Verified</p>
                            <p class="px-1 border rounded fs-3"><?= ($userModel->company_name) ? $userModel->company_name : 'Company Name' ?></p>

                            <div class="d-flex justify-content-between gap-2">
                                <p class="w-100 px-1 border rounded"><?= ($userModel->country) ? $userModel->country : 'Country' ?></p>
                                <p class="w-100 px-1 border rounded"><?= ($userModel->established_year) ? $userModel->established_year : 'Established Year' ?></p>
                            </div>

                            <p class="px-1 border rounded"><?= ($userModel->about) ? $userModel->about : 'About' ?></p>

                        </div>

                        <div class="col-xl-4">
                            <div class="">
                                <div class="card-body text-center">
                                    <div class="main-profile-overview widget-user-image text-center">
                                        <div class="main-img-user border">
                                            <img alt="avatar" src="<?= $targetDir . $userModel->profile_photo ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">

                            <?php $onclick5 = pop_contact($userModel); ?>

                            <div class="d-flex justify-content-between gap-2">
                                <p class="w-100 px-1 border rounded" <?= $onclick5 ?>>Chat</p>

                                <?php if (is_login()) { ?>
                                    <p class="w-100 px-1 border rounded"><?= $userModel->mobile ?> </p>
                                <?php } else { ?>
                                    <p class="w-100 px-1 border rounded"><a class="text-decoration-none" onclick="checkMessageEligibility()"><i class="bi bi-eye"></i> Show phone no</a></p>
                                <?php } ?>
                            </div>

                            <p class="px-1 border rounded"><?= ($userModel->name) ? $userModel->name : 'Name' ?></p>
                            <p class="px-1 border rounded"><?= ($userModel->designation) ? $userModel->designation : 'Designation' ?></p>

                            <?php if (is_login()) { ?>
                                <p class="px-1 border rounded"><?= $userModel->email ?></p>
                            <?php } else { ?>
                                <p class="px-1 border rounded"><a class="text-decoration-none" onclick="checkMessageEligibility()"><i class="bi bi-eye"></i> Show Email</a></p>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row rounded bg-white shadow pt-4">

                        <?php if ($userModel->user_type == 'supplier') { ?>
                            <div class="col-xl-12 col-md-12">
                                <div class="row">
                                    <?php
                                    if (count($supplierChemicalListModel)) {
                                        foreach ($supplierChemicalListModel as $chemicalListKey => $chemicalListVal) {
                                            $chemicalListValue = (object) $chemicalListVal;

                                            $onclick3 = pop_inquiry($chemicalListValue);
                                    ?>
                                            <div class="col-md-4 letest-offer ">
                                                <div class="card">
                                                    <img src="<?= $targetDir2 . $chemicalListValue->chemical_photo ?>" class="card-img-top" alt="...">
                                                    <div class="card-body">

                                                        <div class="letest-offer-detail">
                                                            <p>
                                                                <b>Product name</b>
                                                            </p>
                                                            <p><?= $chemicalListValue->product_name ?></p>
                                                        </div>

                                                        <div class="letest-offer-detail">
                                                            <p>
                                                                <b>Price</b>
                                                            </p>
                                                            <p><?= $chemicalListValue->price ?></p>
                                                        </div>

                                                        <div class="letest-offer-detail">
                                                            <p>
                                                                <b>Min Order Quantity</b>
                                                            </p>
                                                            <p><?= $chemicalListValue->min_order_quantity ?></p>
                                                        </div>

                                                        <div class="letest-offer-detail">
                                                            <p>
                                                                <b>Specifications</b>
                                                            </p>
                                                        </div>
                                                        <p><?= $chemicalListValue->product_info ?></p>

                                                        <a <?= $onclick3 ?> class="oc-outline-btn">Inquiry</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p>No chemical found</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            </div>
                    </div>

                    <?php */ ?>
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


    </body>

    </html>