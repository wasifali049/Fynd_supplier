<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');


check_buyer_auth($db);


$countryModel = get_country_list($db);
$countryFilter = isset($_REQUEST['countryFilter']) ? $_REQUEST['countryFilter'] : '';

$cond = "user_type='buyer'";

if (isset($countryFilter)) {
    $countryFilter = isset($_REQUEST['countryFilter']) ? mysqli_real_escape_string($db, $_REQUEST['countryFilter']) : '';

    if (!empty($countryFilter)) {
        $cond = "user_type='buyer' AND `country`='{$countryFilter}'";
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

$target_dir = "./assets/img/profile/";

?>

<!doctype html>
<html lang="en">

<head>


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
                    <div class="col-md-12 d-flex justify-content-center align-items-baseline">
                        <h2 class="text-center">All Buyers</h2>
                    </div>

                    <div class="col-md-3">
                        <form action="./buyer">

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

                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="filterForm" class="oc-btn">Apply Filter</button>
                                        <a href="./buyer" class="oc-btn">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                                        <p><?= textWithoutHtml($supplierValue->name, 15) ?></p>
                                                    </div>

                                                    <div class="top-supplier-detail">
                                                        <p>
                                                            <b>Country</b>
                                                        </p>
                                                        <p><?= textWithoutHtml($supplierValue->country, 15) ?></p>
                                                    </div>

                                                    <div class="top-supplier-detail">
                                                        <p>
                                                            <b>Company</b>
                                                        </p>
                                                        <p><?= textWithoutHtml($supplierValue->company_name, 15) ?></p>
                                                    </div>

                                                    <div class="top-supplier-detail">
                                                        <p>
                                                            <b>Details</b>
                                                        </p>
                                                        <p></p>
                                                    </div>

                                                    <p class="card-text">
                                                        <?= textWithoutHtml($supplierValue->about, 20) ?>
                                                    </p>


                                                </div>
                                                <div class="card-footer">
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
                                                        <a href="supplier-profile/<?= $supplierValue->slug ?>" class="oc-btn">View Profile</a>
                                                    </div>
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
                    </div>
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
                                        $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='buyer?countryFilter={$countryFilter}&page="
                                            . $i . "'>" . $i . "</a></li>";
                                    } else {
                                        $pagLink .= "<li class='page-item'><a class='page-link' href='buyer?countryFilter={$countryFilter}&page=" . $i . "'>
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

    <?php include('./common/script.php') ?>
    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="./assets/js/pages/user-check.js"></script>

</body>

</html>