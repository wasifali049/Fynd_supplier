<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

$countryModel = get_country_list($db);
$chemicalModel = get_chemical_list($db);
$countryFilter = isset($_REQUEST['countryFilter']) ? $_REQUEST['countryFilter'] : '';
$chemicalFilter = isset($_REQUEST['chemicalFilter']) ? $_REQUEST['chemicalFilter'] : '';

$cond = "user_type='supplier'";

if (isset($countryFilter) || isset($chemicalFilter)) {
    $countryFilter = isset($_REQUEST['countryFilter']) ? mysqli_real_escape_string($db, $_REQUEST['countryFilter']) : '';
    $chemicalFilter = isset($_REQUEST['chemicalFilter']) ? mysqli_real_escape_string($db, $_REQUEST['chemicalFilter']) : '';

    if (!empty($countryFilter)) {
        $cond = "user_type='supplier' AND `country`='{$countryFilter}'";
    }

    if (!empty($chemicalFilter)) {
        $sql2 = "SELECT `uid` FROM `supplier_chemical_list` WHERE `product_name`='{$chemicalFilter}'";
        $data1 = fetch_all($db, $sql2);
        $dataString1 = array_column($data1, "uid");
        $dataIds1 = implode(',', $dataString1);
        $dataIds1 = !empty($dataIds1) ? $dataIds1 : 0;

        $cond = "`id` IN ('{$dataIds1}')";
    }

    if (!empty($countryFilter) && !empty($chemicalFilter)) {

        $dataIds2 = 0;
        $sql11 = "SELECT * FROM `user` WHERE user_type='supplier' AND `country`='{$countryFilter}'";
        if (num_rows($db, $sql11) > 0) {
            $data2 = fetch_all($db, $sql11);
            $dataString2 = array_column($data2, "id");
            $dataIds2 = implode(',', $dataString2);
            $dataIds2 = !empty($dataIds2) ? $dataIds2 : 0;
        }

        $sql3 = "SELECT `uid` FROM `supplier_chemical_list` WHERE `uid` IN ({$dataIds2}) AND `product_name`='{$chemicalFilter}'";
        $data3 = fetch_all($db, $sql3);
        $dataString3 = array_column($data3, "uid");
        $dataIds3 = implode(',', $dataString3);
        $dataIds3 = !empty($dataIds3) ? $dataIds3 : 0;

        $cond = "user_type='supplier' AND `id` IN ('{$dataIds3}')";
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
                        <h2 class="text-center">All Chemicals Suppliers</h2>
                    </div>

                    <div class="col-md-3">
                        <form action="./supplier">

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

                                    <div class="col-md-3">
                                        <label for="mobile" class="form-label country-label">Chemical</label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <select class="form-select chemical-select-fields-3" id="chemical" name="chemicalFilter">
                                                <option value="">Select</option>
                                                <?php
                                                foreach ($chemicalModel as $chemicalKey11 => $chemicalVal11) {
                                                    $chemicalValue11 = (object) $chemicalVal11;
                                                ?>
                                                    <option value="<?= $chemicalValue11->chemical_name ?>" <?= ($chemicalValue11->chemical_name == $chemicalFilter) ? 'selected' : '' ?>><?= $chemicalValue11->chemical_name ?></option>
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
                                        <a href="./supplier" class="oc-btn">Reset</a>
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
                                        $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='supplier?countryFilter={$countryFilter}&chemicalFilter={$chemicalFilter}&page="

                                            . $i . "'>" . $i . "</a></li>";
                                    } else {
                                        $pagLink .= "<li class='page-item'><a class='page-link' href='supplier?countryFilter={$countryFilter}&chemicalFilter={$chemicalFilter}&page=" . $i . "'>

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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="./assets/js/pages/user-check.js"></script>

    <script>
        $(".chemical-select-fields-3").select2({
            tags: false,
            // tokenSeparators: [",", " "],
        });
    </script>

</body>

</html>