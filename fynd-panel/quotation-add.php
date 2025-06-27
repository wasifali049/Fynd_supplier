<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

$userModel = fetch_all($db, "SELECT * FROM `user` WHERE `user_type`='supplier' AND status='1'");

$chemicalModel = get_chemical_list($db);

$countryModel = get_country_list($db);

$target_dir = "../assets/img/offer/";


if (isset($_POST['submit'])) {

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];

    $created_at = date('Y-m-d H:i:s', time());
    $updated_by = $userId;

    $name = mysqli_real_escape_string($db, $name);
    $mobile = mysqli_real_escape_string($db, $mobile);
    $email = mysqli_real_escape_string($db, $email);
    $chemical = mysqli_real_escape_string($db, $chemical);
    $country_code = mysqli_real_escape_string($db, $country_code);
    $target_offer_price = mysqli_real_escape_string($db, $target_offer_price);
    $min_order_quantity = mysqli_real_escape_string($db, $min_order_quantity);
    $details = mysqli_real_escape_string($db, $details);


    $mobile = $country_code . $mobile;



    $token1 = rand(1234, 6789);
    $iName1 = '';
    $true = 1;


    if (!empty($_FILES["image1"]["name"])) {

        $target_file1 = $target_dir . basename($token1 . $_FILES["image1"]["name"]);
        $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        $check1 = getimagesize($_FILES["image1"]["tmp_name"]);
        $kb_5 = 600000;

        if ($check1 !== false) {
            if ($_FILES["image1"]["size"] <= $kb_5) {
                if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file1)) {
                    $iName1 = htmlspecialchars(basename($token1 . $_FILES["image1"]["name"]));
                    $true = 1;
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                    $true = 0;
                }
            } else {
                $error = "home image Image size should not be more than 600 KB";
                $true = 0;
            }
        } else {
            $error = "Home Image, File is not an image.";
            $true = 0;
        }
    } else {
        $iName1 = "product.png";
        $true = 1;
    }

    if ($true == 1) {


        $newUserModel = fetch_object($db, "SELECT * FROM `user` WHERE mobile='{$mobile}'");
        $countryModel = fetch_object($db, "SELECT * FROM `country` WHERE `phonecode`='{$country_code}'");

        if (!empty($newUserModel) && !empty($newUserModel->id)) {
            $user_id = $newUserModel->id;
        } else {
            $userSlug = generateRandomKey();
            $userSqlKey = "`profile_photo`, `name`, `mobile`, `email`, `user_type`, `country`, `country_code`, `slug`, `created_at`";
            $userSqlVal = "'profile.png', '{$name}', '{$mobile}', '{$email}', 'buyer', '{$countryModel->nicename}' ,'{$country_code}', '{$userSlug}', '{$created_at}'";
            $userSql = "INSERT INTO `user` ({$userSqlKey}) VALUE ({$userSqlVal})";

            mysqli_query($db, $userSql);
            $user_id = mysqli_insert_id($db);
        }

        $rfq = mt_rand(100000, 999999);
        $offerKey = "`image`, `uid`, `mobile`, `email`, `chemical`, `meta_title`, `meta_description`, `meta_keyword`, `target_offer_price`, `min_order_quantity`, `details`, `created_at`, `updated_at`, `type`, `rfq`, `status`";
        $offerVal = "'{$iName1}', '{$user_id}', '{$mobile}', '{$email}', '{$chemical}', '{$chemical}', '{$chemical}', '{$chemical}', '{$target_offer_price}', '{$min_order_quantity}', '{$details}', '{$created_at}', '{$updated_at}', 'inquiry', '{$rfq}', 0";
        $s = "INSERT INTO `inquiry_offer` ({$offerKey}) VALUES ({$offerVal})";

        if (mysqli_query($db, $s)) {
            $error .= "Quotation Inquiry added successfully";
            header('location: quotation-all.php?&msg=' . $error . '&alert=success');
        } else {
            $error .= "Internal Server Error.";
            header('location: quotation-add.php?msg=' . $error . '&alert=danger');
        }
    } else {
        header('location: offer-add.php?msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Quotation Inquiry - <?= BRANDNAME ?> Admin Panel</title>

    <!-- Custom Head -->
    <?php include('./comman/head.php'); ?>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('./comman/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('./comman/navbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Quotation Page</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./quotation-all.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-solid fa-arrow-left"></i>
                                Back
                            </a>
                        </div>
                    </div>

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
                        <div class="col-md-10 mx-auto">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="my-3">

                                    <div class="border rounded shadow p-3 my-3">
                                        <h3 class="mb-2">Add Quotation Inquiry</h3>
                                        <hr>

                                        <div class="form-floating my-3">

                                            <label for="name" class="form-label">Buyer Name</label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Enter Name" required />
                                        </div>



                                        <div class="form-floating mb-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="mobile" class="form-label mobile-label">Mobile (Whatsapp)</label>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <select class="form-control combined-mobile" name="country_code">
                                                            <?php
                                                            foreach ($countryModel as $countryKey1 => $countryVal1) {
                                                                $countryValue1 = (object) $countryVal1;
                                                            ?>
                                                                <option value="<?= $countryValue1->phonecode ?>">+<?= $countryValue1->phonecode ?> - <?= $countryValue1->name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <input type="tel" id="mobile" class="form-control" name="mobile" placeholder="Mobile (Whatsapp)" required />
                                                    </div>
                                                    <div class="showErr"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-floating my-3" id="chemicalSelect">
                                            <label for="title" class="form-label">Select Chemical</label>
                                            <select class="form-select chemical-select-fields" id="inq-chemical" name="chemical" required>
                                                <?php
                                                foreach ($chemicalModel as $chemicalKey2 => $chemicalVal2) {
                                                    $chemicalValue2 = (object) $chemicalVal2;
                                                ?>
                                                    <option value="<?= $chemicalValue2->chemical_name ?>"><?= $chemicalValue2->chemical_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required value="" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="target_offer_price" class="form-label">Target Price (In $ / MT)</label>
                                            <input type="text" id="target_offer_price" class="form-control" name="target_offer_price" placeholder="Offer Price (In $ / MT)" required value="" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="min_order_quantity" class="form-label">Min Order Quantity</label>
                                            <input type="text" id="min_order_quantity" class="form-control" name="min_order_quantity" placeholder="Min Order Quantity" required value="1" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="formFile1" class="form-label">Image (Recommend: 1500X1000 PX)</label>
                                            <input class="form-control" type="file" id="formFile1" name="image1" style="height:100%;padding:0.275rem 0.275rem">
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="details" class="form-label">Details</label>
                                            <textarea id="details" class="form-control" name="details" placeholder="Details" cols="30" rows="5" required></textarea>
                                        </div>

                                    </div>

                                </div>
                                <div class="my-4 mx-auto">
                                    <input type="submit" name="submit" class="btn btn-success btn-block" value="ADD" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('./comman/footer.php'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include('./comman/logout-modal.php') ?>

    <!-- Delete Modal-->
    <?php include('./comman/delete-modal.php') ?>

    <!-- Comman JS Scripts -->
    <?php include('./comman/scripts.php'); ?>
    <script src="./js/deleteModal.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".chemical-select-fields").select2({
                tags: true,
                dropdownParent: $("#chemicalSelect")
                // tokenSeparators: [",", " "],
            });


            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });
        });
    </script>

    <style>
        .chemical-select-fields {
            width: 100%;
        }

        .select2-container .select2-selection--single {
            height: 38px;
        }
    </style>

</body>

</html>