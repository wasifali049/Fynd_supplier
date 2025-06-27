<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

$slug = isset($_REQUEST['slug']) ? $_REQUEST['slug'] : '';

$limit = get_number_from_slug($slug);

$countryFilter = get_country_from_slug($db, $slug);

$limit = $limit > 0 ? $limit : 10;

$cond = "user_type='supplier'";


if (!empty($countryFilter)) {
    $cond = "user_type='supplier' AND `country`='{$countryFilter}'";
}


$sql = "SELECT * FROM `user` WHERE {$cond} ORDER by id DESC LIMIT $limit";
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

                    <div class="col-md-12">
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