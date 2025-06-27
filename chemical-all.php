<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

$countryFilter = isset($_REQUEST['countryFilter']) ? $_REQUEST['countryFilter'] : '';
$chemicalFilter = isset($_REQUEST['chemicalFilter']) ? $_REQUEST['chemicalFilter'] : '';

$countryModel = get_country_list($db);
$mainChemicalModel = get_chemical_list($db);

$cond = "status=1";

if (isset($countryFilter) || isset($chemicalFilter)) {
    $countryFilter = isset($_REQUEST['countryFilter']) ? mysqli_real_escape_string($db, $_REQUEST['countryFilter']) : '';
    $chemicalFilter = isset($_REQUEST['chemicalFilter']) ? mysqli_real_escape_string($db, $_REQUEST['chemicalFilter']) : '';

    if (!empty($countryFilter)) {
        $sql1 = "SELECT `id` FROM `user` WHERE `user_type`='supplier' AND `country`='{$countryFilter}'";
        $data1 = fetch_all($db, $sql1);
        $dataString1 = array_column($data1, "id");
        $dataIds1 = implode(',', $dataString1);
        $dataIds1 = !empty($dataIds1) ? $dataIds1 : 0;

        $cond = "`uid` IN ('{$dataIds1}')";
    }

    if (!empty($chemicalFilter)) {
        $sql2 = "SELECT `id` FROM `supplier_chemical_list` WHERE `product_name`='{$chemicalFilter}' AND `status`=1";
        $data1 = fetch_all($db, $sql2);
        $dataString1 = array_column($data1, "id");
        $dataIds1 = implode(',', $dataString1);
        $dataIds1 = !empty($dataIds1) ? $dataIds1 : 0;

        $cond = "`id` IN ('{$dataIds1}')";
    }

    if (!empty($countryFilter) && !empty($chemicalFilter)) {

        $dataIds2 = 0;
        $sql11 = "SELECT `id` FROM `user` WHERE user_type='supplier' AND `country`='{$countryFilter}'";
        if (num_rows($db, $sql11) > 0) {
            $data2 = fetch_all($db, $sql11);
            $dataString2 = array_column($data2, "id");
            $dataIds2 = implode(',', $dataString2);
            $dataIds2 = !empty($dataIds2) ? $dataIds2 : 0;
        }

        $sql3 = "SELECT `id` FROM `supplier_chemical_list` WHERE `uid` IN ({$dataIds2}) AND `product_name`='{$chemicalFilter}' AND `status`=1";
        $data3 = fetch_all($db, $sql3);
        $dataString3 = array_column($data3, "id");
        $dataIds3 = implode(',', $dataString3);
        $dataIds3 = !empty($dataIds3) ? $dataIds3 : 0;

        $cond = "status=1 AND `id` IN ('{$dataIds3}')";
    }
}


$limit = 18;

if (isset($_REQUEST["page"])) {

    $pn  = $_REQUEST["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;

$sql = "SELECT * FROM `supplier_chemical_list` WHERE {$cond} LIMIT $startFrom, $limit";
$chemicalModel = fetch_all($db, $sql);

$target_dir = "./assets/img/chemical/"

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

        <section class="section popular-chamical">
            <div class="container">
                <div class="row">



                    <div class="col-md-12 d-flex justify-content-center align-items-baseline">
                        <h2 class="text-center">All Chemicals</h2>
                    </div>

                    <div class="col-md-3">
                        <form action="./chemical-all">

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
                                                foreach ($mainChemicalModel as $mainChemicalKey11 => $mainChemicalVal11) {
                                                    $mainChemicalValue11 = (object) $mainChemicalVal11;
                                                ?>
                                                    <option value="<?= $mainChemicalValue11->chemical_name ?>" <?= ($mainChemicalValue11->chemical_name == $chemicalFilter) ? 'selected' : '' ?>><?= $mainChemicalValue11->chemical_name ?></option>
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
                                        <a href="./chemical-all" class="oc-btn">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-9">

                        <div class="row">

                            <?php
                            foreach ($chemicalModel as $chemicalKey => $chemicalVal) {
                                $chemicalValue = (object) $chemicalVal;
                                $onclick3 = pop_inquiry($chemicalValue)
                            ?>
                                <div class="col-md-6 mb-4">
                                    <div class="card popular-chemical-card">
                                        <img src="<?= $target_dir . $chemicalValue->chemical_photo ?>" class="card-img-top" alt="...">
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
                                                <p><?= textWithoutHtml($chemicalValue->price, 15) ?></p>
                                            </div>

                                           <?php /* <div class="popular-chamical-detail">
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
                                            <p>
                                                &nbsp;<?= textWithoutHtml($chemicalValue->manufacturer_details, 15) ?>
                                            </p>


                                            <div class="popular-chamical-detail">
                                                <p>
                                                    <b>Specifications</b>
                                                </p>
                                            </div>
                                            <p>&nbsp;<?= textWithoutHtml($chemicalValue->product_info, 70) ?></p>
*/ ?>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="oc-btn px-5" <?= $onclick3 ?>>Inquiry</a>
                                                <a class="my-1 oc-btn" href="<?= get_root() ?>chemical-view/<?= $chemicalValue->slug ?>">View Product Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                            <div class="col-12 mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm">
                                <?php


                                $sql = "SELECT COUNT(*) FROM `supplier_chemical_list` WHERE {$cond}";
                                $rs_result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];

                                $total_pages = ceil($total_records / $limit);
                                $pagLink = "";
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $pn) {
                                        $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='chemical-all?countryFilter={$countryFilter}&chemicalFilter={$chemicalFilter}&page="

                                            . $i . "'>" . $i . "</a></li>";
                                    } else {
                                        $pagLink .= "<li class='page-item'><a class='page-link' href='chemical-all?countryFilter={$countryFilter}&chemicalFilter={$chemicalFilter}&page=" . $i . "'>

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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="./assets/js/pages/user-check.js"></script>
    <script src="./assets/js/pages/inquiry-offer.js"></script>

    <script>
        $(".chemical-select-fields-3").select2({
            tags: false,
            // tokenSeparators: [",", " "],
        });
    </script>

</body>

</html>