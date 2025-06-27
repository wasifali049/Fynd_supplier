<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

$countryModel = get_country_list($db);
$chemicalModel = get_chemical_list($db);
$cond = "user_type='supplier'";

$countryFilter = isset($_REQUEST['countryFilter']) ? $_REQUEST['countryFilter'] : '';
$searchText = isset($_REQUEST['searchText']) ? $_REQUEST['searchText'] : '';
$searchText = rtrim($searchText, ' ');




extract($_REQUEST);

if (isset($searchForm) || isset($countryFilter)) {
    $countryFilter = isset($_REQUEST['countryFilter']) ? mysqli_real_escape_string($db, $_REQUEST['countryFilter']) : '';
    $searchText = isset($_REQUEST['searchText']) ? mysqli_real_escape_string($db, $_REQUEST['searchText']) : '';

    $searchText = rtrim($searchText, ' ');

    if (!empty($countryFilter)) {
        $cond = "user_type='supplier' AND `country`='{$countryFilter}'";
    }

    if (!empty($searchText)) {
        $sql21 = "SELECT `uid` FROM `supplier_chemical_list` WHERE `product_name` LIKE '%{$searchText}%'";
        $sql22 = "SELECT `id` FROM `user` WHERE `name` LIKE '%{$searchText}%' OR `company_name` LIKE '%{$searchText}%'";

        $data = fetch_all($db, $sql21);
        $dataString = array_column($data, "uid");


        $data1 = fetch_all($db, $sql22);
        $dataString1 = array_column($data1, "id");


        $dataStringN = array_merge($dataString, $dataString1);



        $dataIds1 = implode(',', $dataStringN);
        $dataIds1 = !empty($dataIds1) ? $dataIds1 : 0;


        $cond = "`id` IN ({$dataIds1})";
    }

    if (!empty($countryFilter) && !empty($searchText)) {

        $dataIds2 = 0;
        $sql11 = "SELECT * FROM `user` WHERE user_type='supplier' AND `country`='{$countryFilter}'";
        if (num_rows($db, $sql11) > 0) {
            $data2 = fetch_all($db, $sql11);
            $dataString2 = array_column($data2, "id");
            $dataIds2 = implode(',', $dataString2);
            $dataIds2 = !empty($dataIds2) ? $dataIds2 : 0;
        }

        $sql31 = "SELECT `uid` FROM `supplier_chemical_list` WHERE `uid` IN ({$dataIds2}) AND `product_name` LIKE '%{$searchText}%'";
        $sql32 = "SELECT `id` FROM `user` WHERE `id` IN ({$dataIds2}) AND `name` LIKE '%{$searchText}%' OR `company_name` LIKE '%{$searchText}%'";



        $data31 = fetch_all($db, $sql31);
        $dataString31 = array_column($data31, "uid");


        $data32 = fetch_all($db, $sql32);
        $dataString32 = array_column($data32, "id");

        $dataStringN = array_merge($dataString31, $dataString32);

        $dataIds3 = implode(',', $dataStringN);
        $dataIds3 = !empty($dataIds3) ? $dataIds3 : 0;


        $cond = "user_type='supplier' AND `id` IN ({$dataIds3})";
    }
}


$limit = 18;

if (isset($_REQUEST["page"])) {

    $pn  = $_REQUEST["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;

$sql = "SELECT * FROM `user` WHERE {$cond} LIMIT $startFrom, $limit";

$supplierModel = fetch_all($db, $sql);

if (!empty($searchText)) {
    if ( count( $supplierModel ) > 0 ) {
        $created_at = date('Y-m-d H:i:s', time());
        mysqli_query($db, "INSERT INTO `search_chemical`(`chemical`, `created_at`) VALUES ('{$searchText}','{$created_at}')");
    }
}

$target_dir = "./assets/img/profile/";


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

?>

<!doctype html>
<html lang="en">

<head>

    <title>Search Result - Oilfiled Chemical</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>
    <?= showSEOTag($db, basename($_SERVER['SCRIPT_NAME']), get_main_url()) ?>


</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section top-supplier">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between align-items-baseline">
                        <h2 class="text-center">Suppliers Profile</h2>

                        <!--<a aria-current="page" data-bs-toggle="modal" data-bs-target="#getQuoteModel" class="oc-btn">Send Inquiry To All</a>-->
                    </div>
                    <div class="col-md-3 position-relative">
                        <form class="">

                            <div>
                                <h3 class="text-left">Filter</h3>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">

                                    <div class="col-md-3">
                                        <label for="mobile" class="form-label country-label">Country</label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <select class="form-select" id="country" name="countryFilter">
                                                <option value="">Select</option>
                                                <?php
                                                foreach ($countryModel as $countryKey11 => $countryVal11) {
                                                    $countryValue11 = (object) $countryVal11;
                                                ?>
                                                    <option value="<?= $countryValue11->nicename ?>" <?= ($countryValue11->nicename == $countryFilter) ? 'selected' : '' ?>><?= $countryValue11->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="searchText" value="<?= $searchText ?>">

                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="searchForm" class="oc-btn">Apply Filter</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <br>
                        <hr style="border-width:2px;color: var(--primary-bg-color);opacity:1">
                        <br>

                        <div class="row position-sticky rounded" style="background-color:#fff;top: 3%;">
                            <div class="col-md-12 shadow rounded" style="border: 2px solid var(--primary-bg-color);">
                                <form class="" id="shortOnTimeForm" method="post" action="<?= get_root() ?>inc/search/search-add.php">

                                    <div class="pt-2">
                                        <h3>Short On Time: <br>Let <?= ucfirst($searchText) ?> Seller Contact You.</h3>
                                    </div>


                                    <hr style="border-width:2px;color: var(--primary-bg-color);opacity:1">


                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="search[buy]" id="buy" value="I Want To Buy" checked>
                                                        <label class="form-check-label" for="buy">I Want To Buy</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="search[buy]" id="sell" value="I Want To Sell">
                                                        <label class="form-check-label" for="sell">I Want To Sell</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        


                                        <div class="col-md-12 mb-3">
                                            <label for="sort-on-time-chemical" class="form-label sort-on-time-chemical-label">Chemical *</label>
                                            <input type="text" id="sort-on-time-chemical" class="form-control" name="search[chemical]" placeholder="Type Chemical Name ..." value="<?= $searchText ?>" required />
                                            <div class="showErr"></div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="sort-on-time-name" class="form-label sort-on-time-name-label">Name *</label>
                                            <input type="text" id="sort-on-time-name" class="form-control" name="search[name]" placeholder="Enter Your Name" value="<?= $name ?>" required />
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
                                                <input type="tel" id="sort-on-time-mobile" class="w-100 form-control" name="search[mobile]" placeholder="Mobile (Whatsapp)" value="<?= $mobile ?>" required />
                                            </div>
                                            <div class="showErr"></div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="sort-on-time-email" class="form-label sort-on-time-email-label">Email</label>
                                            <input type="email" id="sort-on-time-email" class="form-control" name="search[email]" placeholder="Enter Your Email" value="<?= $email ?>" />
                                            <div class="showErr"></div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="sort-on-time-message" class="form-label sort-on-time-message-label">Message *</label>
                                            <textarea id="sort-on-time-message" class="form-control" name="search[message]" cols="30" rows="3" placeholder='Provide details about your <?= $searchText ?> buying requirement so supplier can contact you with their quotes.' required></textarea>
                                            <div class="showErr"></div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="search-photo-new" class="search-photo-new-label">Upload File (Extension: jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx | Size: 500kb | 1500x1000 px)</label>
                                                <input type="file" class="form-control search-photo-new" id="search-photo-new" name="photo" placeholder="Attachment">
                                                <div class="showErr"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3 text-center">
                                            <input type="hidden" name="search[page]" value="Search Page">
                                            <input type="hidden" name="in_site" value="in site">
                                            <input type="submit" class="btn btn-primary d-block w-100">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="owl-carousel-wrapper">

                            <div class="row top-chemical-supplier">

                                <?php

                                if (count($supplierModel) > 0) {

                                    foreach ($supplierModel as $supplierKey => $supplierVal) {
                                        $supplierValue = (object) $supplierVal;


                                        $chemicalListModel = fetch_all($db, "SELECT `chemical_id` FROM supplier_chemical_list WHERE uid='{$supplierValue->id}'");

                                        $chemicalListArray = array_column($chemicalListModel, 'chemical_id');
                                        $chemicalListIds = implode(',', $chemicalListArray);
                                        $chemicalListIds = !empty($chemicalListIds) ? $chemicalListIds : 0;
                                        $supplierChemicalListModel = fetch_all($db, "SELECT * FROM `chemical` WHERE id IN ({$chemicalListIds}) LIMIT 4");

                                        $supplierMail = $supplierValue->email ? $supplierValue->email : 'support@fyndsupplier.com';

                                        $onclick5 = pop_contact($supplierValue);

                                ?>
                                        <div class="col-md-4">

                                            <div class="supplier-image-wrapper">
                                                <div class="supplier-image-box">
                                                    <img src="<?= $target_dir . $supplierValue->profile_photo ?>" class="w-100" style="border-radius:50%" alt="Malw">
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
                                                        <p><?= $supplierValue->country ?></p>
                                                    </div>

                                                    <div class="top-supplier-detail">
                                                        <p>
                                                            <b>Company </b>
                                                        </p>
                                                        <p style="padding-left:4px"> <?= $supplierValue->company_name ?></p>
                                                    </div>

                                                    <div class="top-supplier-detail">
                                                        <p>
                                                            <b>Details</b>
                                                        </p>
                                                        <p></p>
                                                    </div>

                                                    <p class="card-text"><?= textWithoutHtml($supplierValue->about, 80) ?></p>

                                                    <div>
                                                        <?php /*
                                                            if (count($supplierChemicalListModel) > 0) {
                                                                foreach ($supplierChemicalListModel as $supplierChemicalListKey => $supplierChemicalListVal) {
                                                            ?>
                                                                    <a href="#" class="oc-btn mb-1"><?= $supplierChemicalListVal['chemical_name'] ?></a>
                                                                <?php }
                                                            } else { ?>

                                                                <a href="#" class="oc-btn">No chemical Found!</a>
                                                            <?php } */
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="supplier-profile/<?= $supplierValue->slug ?>" class="oc-btn">View</a>
                                                    <a href="mailto: <?= $supplierMail ?>" class="oc-btn">Email</a>
                                                    <a <?= $onclick5 ?> class="oc-btn">Whatsapp</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="col-md-12 mx-auto">
                                        <p>No supplier found!!</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-sm">
                                        <?php


                                        $sql = "SELECT COUNT(*) FROM `user` WHERE {$cond}";
                                        $rs_result = mysqli_query($db, $sql);
                                        $row = mysqli_fetch_row($rs_result);
                                        $total_records = $row[0];

                                        $total_pages = ceil($total_records / $limit);
                                        $pagLink = "";
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            if ($i == $pn) {
                                                $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='search?countryFilter={$countryFilter}&searchText={$searchText}&page="

                                                    . $i . "'>" . $i . "</a></li>";
                                            } else {
                                                $pagLink .= "<li class='page-item'><a class='page-link' href='search?countryFilter={$countryFilter}&searchText={$searchText}&page=" . $i . "'>

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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="./assets/js/pages/user-check.js"></script>
    

    <style>
        .top-supplier .top-supplier-card {
            height: 430px;
        }
    </style>

    <?php if (!empty($searchText)) { ?>
        <script>
            $(document).ready(function() {
                setTimeout(() => {
                    searchModal()
                }, 5000);
            })
        </script>
    <?php } ?>

</body>

</html>