<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

check_auth();

extract($_REQUEST);

$id = get_user_id();

$userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$id}'");

$supplier = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `user_type`='supplier'"));

$countryModel = get_country_list($db);
$chemicalModel = get_chemical_list($db);



$limit = 18;

if (isset($_REQUEST["page"])) {

    $pn  = $_REQUEST["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;


$supplierChemicalListModel = fetch_all($db, "SELECT * FROM supplier_chemical_list WHERE uid='{$userModel->id}' ORDER BY id DESC LIMIT $startFrom, $limit");

$targetDir = './assets/img/profile/';
$targetDir2 = './assets/img/chemical/';



$target_dir = "./assets/img/chemical/";


if (isset($_POST['submit'])) {
    extract($_REQUEST);

    $created_at = date('Y-m-d H:i:s', time());
    $user_id =  get_user_id();


    $chemical = mysqli_real_escape_string($db, $chemical);
    $product_name = $chemical; //mysqli_real_escape_string($db, $product_name);
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

    <title><?= $userModel->name ?> Profile - Oilfiled Chemical</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>

    <link rel="stylesheet" href="./assets/css/profile.css">

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
                                    <p class="pro-user-desc text-muted mb-1">(<?= strtoupper($userModel->user_type) ?>)</p>
                                    <?= get_premium_badge($db, $id) ?>
                                </div>
                            </div>
                        </div>

                        <?php /*<div class="card custom-card">
                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div>
                                    <h6 class="card-title mb-0">Contact Information</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="main-profile-contact-list main-profile-work-list">
                                    <div class="media">
                                        <div class="media-logo bg-light text-dark"> <i class="bi bi-phone"></i> </div>
                                        <div class="media-body"> <span>Mobile</span>
                                            <div> <?= $userModel->mobile ?> </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-logo bg-light text-dark"> <i class="bi bi-envelope"></i> </div>
                                        <div class="media-body"> <span>Email</span>
                                            <div> <?= $userModel->email ?> </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-logo bg-light text-dark"> <i class="bi bi-globe"></i> </div>
                                        <div class="media-body"> <span>Country</span>
                                            <div> <?= $userModel->country ?> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>*/ ?>

                        <div class="card custom-card">
                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div>
                                    <h6 class="card-title mb-0">Navigation</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="./blog-panel" class="oc-btn">Blog Panel</a>
                                
                                

                                <?php if ($userModel->user_type == 'supplier') { ?>
                                    <a href="./inquiry-panel" class="oc-btn">Inquiry Panel</a>
                                <?php } ?>

                                <?php if ($userModel->user_type == 'supplier') { ?>
                                    <a href="./chemical-add" class="oc-btn mt-2">Add Chemical / List Your Product</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-8 col-md-12">

                        <div class="card custom-card main-content-body-profile">

                            <div class="card-header custom-card-header rounded-bottom-0 d-flex justify-content-between align-items-center flex-wrap">
                                <div>
                                    <h3 class="card-title mb-0 "><?= ucfirst($userModel->user_type) ?> Profile</h3>
                                </div>

                                <?php /* if ($userModel->user_type == 'supplier') { ?>
                                    <a href="./inquiry-panel" class="oc-btn">Inquiry Panel</a>
                                <?php }*/ ?>
                                
                                <?php if (is_premium_member($db)) { ?>
                                <a href="./all-enquires" class="oc-btn">All Buyer's Inquiry</a>
                                <?php } ?>
                            </div>

                            <div class="card-body tab-content h-100">

                                <form class="form-horizontal" id="<?= ($userModel->user_type == 'supplier') ? 'supplier' : 'buyer' ?>EditForm" action="./inc/user/edit-user.php" method="post">


                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="photo" class="photo_label">Upload Photo (file format: jpg,png | Size: 500kb)</label>
                                            <input type="file" class="form-control photo" id="photo" name="photo" placeholder="profile">
                                            <div class="showErr"></div>

                                            <?php

                                            $photoImg = (!empty($userModel->profile_photo)) ? $userModel->profile_photo : 'male.png';
                                            echo "<img width='100px' src='" . $targetDir . $userModel->profile_photo . "' class='mt-1 img-responsive edit-avt-img img-thumbnail'>";

                                            ?>

                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">User Type</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="user[user_type]" id="userType1" value="buyer" <?= ($userModel->user_type == 'buyer') ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="userType1">Buyer</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="user[user_type]" id="userType2" value="supplier" <?= ($userModel->user_type == 'supplier') ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="userType2">Supplier</label>
                                                </div>
                                                
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="user[user_type]" id="userType3" value="trader" <?= ($userModel->user_type == 'trader') ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="userType3">Trader</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label name_label">Full Name</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="name" name="user[name]" value="<?= $userModel->name ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="mobile" class="form-label mobile-label">Mobile (Whatsapp)</label>
                                            </div>

                                            <div class="col-md-9">
                                                <div class="d-flex">
                                                    <select class="form-select combined-mobile" name="user[country_code]">
                                                        <?php
                                                        foreach ($countryModel as $countryKey1 => $countryVal1) {
                                                            $countryValue1 = (object) $countryVal1;
                                                        ?>
                                                            <option value="<?= $countryValue1->phonecode ?>" <?= ($countryValue1->phonecode == $userModel->country_code) ? 'selected' : '' ?>><?= $countryValue1->name ?> - +<?= $countryValue1->phonecode ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <input type="tel" id="mobile" class="form-control" name="user[mobile]" placeholder="Mobile (Whatsapp)" value="<?= getOriginalMobile($userModel->mobile, $userModel->country_code) ?>" required />
                                                </div>
                                                <div class="showErr"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label email_label">Email</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="email" name="user[email]" value="<?= $userModel->email ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label email_label">Designation</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="designation" name="user[designation]" value="<?= $userModel->designation ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label company_name_label">Company Name</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="company_name" name="user[company_name]" value="<?= $userModel->company_name ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label company_name_label">Established Year</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="established_year" placeholder="ex: 2000" name="user[established_year]" value="<?= $userModel->established_year ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="mobile" class="form-label country-label">Country</label>
                                            </div>

                                            <div class="col-md-9">
                                                <div class="d-flex">
                                                    <select class="form-select" id="country" name="user[country]">
                                                        <?php
                                                        foreach ($countryModel as $countryKey11 => $countryVal11) {
                                                            $countryValue11 = (object) $countryVal11;
                                                        ?>
                                                            <option value="<?= $countryValue11->nicename ?>" <?= ($countryValue11->nicename == $userModel->country) ? 'selected' : '' ?>><?= $countryValue11->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="showErr"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label website_label">Website</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="website" name="user[website]" value="<?= $userModel->website ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label website_label">Chemicals</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="chemicals" name="user[chemicals]" value="<?= $userModel->chemicals ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label origin_label">Origin</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="origin" name="user[origin]" value="<?= $userModel->origin ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">About Yourself</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="about" name="user[about]" rows="4" placeholder=""><?= $userModel->about ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="user[id]" value="<?= $userModel->id ?>">

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary d-block w-100">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <?php if ($userModel->user_type == 'supplier') { ?>

                        <div class="col-md-12">
                            <div class="card custom-card main-content-body-profile">


                                <div class="card-header custom-card-header rounded-bottom-0 d-flex justify-content-between align-items-center flex-wrap">
                                    <div>
                                        <h4 class="card-title mb-0 ">Chemical Form</h4>
                                    </div>

                                    <?php if ($userModel->user_type == 'supplier') { ?>
                                        <a href="./chemical-add" class="oc-btn mt-2">Add Chemical / List Your Product</a>
                                    <?php } ?>
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


                                        <div class="col-md-12">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="my-3">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label class="form-label website_label">Chemical Name</label>
                                                            <div class="mb-3">
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

                                                        <div class="col-md-2">
                                                            <label class="form-label website_label">Chemical Photo</label>
                                                            <div class="mb-3">
                                                                <input class="form-control" type="file" id="formFile1" name="image1" style="height:100%;padding:0.275rem 0.275rem">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label class="form-label website_label">Min Order Quantity</label>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="min_order_quantity" name="min_order_quantity" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label class="form-label website_label">Packaging</label>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="product_specification" name="product_specification" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label class="form-label website_label">Price (In $ / MT)</label>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="price" name="price" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 d-none">
                                                            <label class="form-label website_label">Density</label>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="density" name="density">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label class="form-label website_label">Product Info</label>
                                                            <div class="mb-3">
                                                                <textarea class="form-control" id="product_info" name="product_info" rows="1" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 d-none">
                                                            <label class="form-label website_label">Manufacturer Details</label>
                                                            <div class="mb-3">
                                                                <textarea class="form-control" id="manufacturer_details" name="manufacturer_details" rows="1"></textarea>
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

                        <div class="col-md-12">


                            <div class="card custom-card main-content-body-profile">

                                <div class="card-header custom-card-header rounded-bottom-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title mb-0 ">Chemical List</h6>
                                        <?php /*<a href="./chemical-add" class="oc-btn">Add Chemical</a>*/ ?>
                                    </div>
                                </div>

                                <div class="card-body tab-content h-100">




                                    <div class="row">
                                        <?php
                                        if (count($supplierChemicalListModel)) {
                                            foreach ($supplierChemicalListModel as $chemicalListKey => $chemicalListVal) {
                                                $chemicalListValue = (object) $chemicalListVal;
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
                                                                    <b>Manufacturer</b>
                                                                </p>
                                                            </div>
                                                            <p><?= $chemicalListValue->manufacturer_details ?></p>

                                                            <div class="letest-offer-detail">
                                                                <p>
                                                                    <b>Specifications</b>
                                                                </p>
                                                            </div>
                                                            <p><?= $chemicalListValue->product_info ?></p>
                                                            <a href="./chemical-edit?id=<?= $chemicalListValue->id ?>" class="oc-outline-btn">Edit</a>
                                                            <a href="./chemical-delete?id=<?= $chemicalListValue->id ?>" class="oc-outline-btn">Delete</a>
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
                                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='./profile?page="

                                                                . $i . "'>" . $i . "</a></li>";
                                                        } else {
                                                            $pagLink .= "<li class='page-item'><a class='page-link' href='./profile?page=" . $i . "'>

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
                    <?php } ?>

                </div>
            </div>
        </section>


    </main>

    <?php include('./common/footer.php') ?>
    <?php include('./common/social-link.php') ?>
    <?php include('./common/modal.php') ?>

    <?php include('./common/script.php') ?>
    <!-- javascript -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="./assets/js/pages/user-edit.js"></script>

</body>

</html>