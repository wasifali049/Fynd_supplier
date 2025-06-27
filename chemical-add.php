<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');
check_auth();
extract($_REQUEST);

//$target_dir = get_root() . "assets/img/chemical/";
$target_dir = "./assets/img/chemical/";

$chemicalModel = get_chemical_list($db);

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    $created_at = date('Y-m-d H:i:s', time());
    $user_id =  get_user_id();


    $chemical = mysqli_real_escape_string($db, $chemical);
    $chemical = mysqli_real_escape_string($db, $chemical);
    $productModel1 = fetch_object($db, "SELECT `product_name` FROM `supplier_chemical_list` WHERE product_name LIKE '%{$chemical}%'");
    $product_name = !empty($productModel1->product_name) ? $productModel1->product_name : $chemical;
    $min_order_quantity = mysqli_real_escape_string($db, $min_order_quantity);
    $price = mysqli_real_escape_string($db, $price);
    $density = mysqli_real_escape_string($db, $density);
    $product_info = mysqli_real_escape_string($db, $product_info);
    $product_specification = mysqli_real_escape_string($db, $product_specification);
    $manufacturer_details = mysqli_real_escape_string($db, $manufacturer_details);

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
                    die();
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
    }

    if ($true == 1) {

        $chemNum = num_rows($db, "SELECT * FROM `chemical` WHERE `chemical_name`='{$chemical}'");

        if ($chemNum) {
            $chemModel = fetch_object($db, "SELECT * FROM `chemical` WHERE `chemical_name`='{$chemical}'");
            $chemical_id = $chemModel->id;
            $status = 1;
        } else {
            $chemQuery = mysqli_query($db, "INSERT INTO `chemical` (`chemical_name`, `status`) VALUES ('{$chemical}', 0)");
            $chemical_id = mysqli_insert_id($db);
            $status = 0;
        }


        $slug = slug($db, $product_name, 'supplier_chemical_list');


        $s = "INSERT INTO `supplier_chemical_list`(`uid`, `manufacturer_details`, `product_specification`, `chemical_id`, `chemical_photo`, `product_name`, `min_order_quantity`, `price`, `density`, `product_info`, `meta_title`, `meta_description`, `meta_keyword`, `slug`, `status`, `created_at`)
         VALUES 
        ('{$user_id}', '{$manufacturer_details}', '{$product_specification}', '{$chemical_id}', '{$iName1}', '{$product_name}', '{$min_order_quantity}', '{$price}', '{$density}', '{$product_info}', '{$product_name}', '{$product_name}', '{$product_name}', '{$slug}', '{$status}', '{$created_at}')";

        if (mysqli_query($db, $s)) {
            $error .= "Chemical Added successfully";
            header('location: ' . get_root() . 'profile?msg=' . $error . '&alert=success');
        } else {
            $error .= "Internal Server Error.";
            header('location: ' . get_root() . 'chemical-add?msg=' . $error . '&alert=danger');
        }
    } else {
        header('location: ' . get_root() . 'chemical-add?msg=' . $error . '&alert=danger');
    }
}


?>

<!doctype html>
<html lang="en">

<head>

    <title>Chemical Add - Oilfiled Chemical</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">

    <style>
        .select2-container .select2-selection--single {
            height: 38px;
        }
    </style>

</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section profile-section site-bg">
            <div class="container">

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

                    <div class="col-md-12">
                        <div class="card custom-card main-content-body-profile">

                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-title mb-0 ">Chemical Form</h6>
                                    <a href="<?= get_root() ?>profile" class="oc-btn">Back</a>
                                </div>
                            </div>

                            <div class="card-body tab-content h-100">

                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="my-3">
                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label website_label">Type Chemical Name Or Select From List</label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <select class="form-select chemical-select-fields" id="inq-chemical" name="chemical" required>
                                                                <?php
                                                                foreach ($chemicalModel as $chemicalKey2 => $chemicalVal2) {
                                                                    $chemicalValue2 = (object) $chemicalVal2;
                                                                ?>
                                                                    <option value="<?= $chemicalValue2->chemical_name ?>"><?= $chemicalValue2->chemical_name ?></option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label website_label">Chemical Photo<br> (Recommend: 1500x1000 PX)</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="file" id="formFile1" name="image1" style="height:100%;padding:0.275rem 0.275rem">
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php /*
                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label website_label">Product Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                                                        </div>
                                                    </div>
                                                </div> */ ?>


                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label website_label">Min Order Quantity</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="min_order_quantity" name="min_order_quantity" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label website_label">Packaging</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="product_specification" name="product_specification" required>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label website_label">Price (In $ / MT)</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="price" name="price" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3" style="display:none">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label website_label">Density</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="density" name="density">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label website_label">Product Info</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" id="product_info" name="product_info" rows="4" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label website_label">Manufacturer Details</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" id="manufacturer_details" name="manufacturer_details" rows="4" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="my-4 mx-auto text-center">
                                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="ADD CHEMICAL" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
    <script src="<?= get_root() ?>assets/js/pages/user-edit.js"></script>

</body>

</html>