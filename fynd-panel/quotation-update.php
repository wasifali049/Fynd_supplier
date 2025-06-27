<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

if (empty($id)) {
    header('location: ./quotation-all.php');
}



$target_dir = "../assets/img/offer/";

$model = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE id='{$id}'");

if (isset($_POST['submit'])) {

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];

    $updated_at = date('Y-m-d H:i:s', time());
    $updated_by = $userId;

    // $mobile = mysqli_real_escape_string($db, $mobile);
    $chemical = mysqli_real_escape_string($db, $chemical);
    $target_offer_price = mysqli_real_escape_string($db, $target_offer_price);
    $details = mysqli_real_escape_string($db, $details);


    $token = rand(1234, 6789);
    $target_file = $target_dir . basename($token . $_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_FILES["fileToUpload"]["name"]) && !empty($_FILES["fileToUpload"]["name"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        $kb_5 = 600000;
        if ($check !== false) {
            if ($_FILES["fileToUpload"]["size"] <= $kb_5) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $iName = htmlspecialchars(basename($token . $_FILES["fileToUpload"]["name"]));
                    $createdAt = date('Y-m-d H:i:s', time());

                    if ($old_image != 'product.png') {
                        unlink($target_dir . $old_image);
                    }

                    $s = "UPDATE `inquiry_offer` SET 
        -- `mobile`='" . $mobile . "',
        `image`='" . $iName . "',
        `chemical`='" . $chemical . "',
        `target_offer_price`='" . $target_offer_price . "',
        `details`='" . $details . "',
        `updated_at`='" . $updated_at . "',
        `updated_by`='" . $updated_by . "' WHERE id='" . $edit_id . "'";

                    if (mysqli_query($db, $s)) {
                        $error .= "Quotation Inquiry updated successfully";
                        header('location: quotation-all.php?&msg=' . $error . '&alert=success');
                    } else {
                        $error .= "Internal Server Error.";
                        header('location: quotation-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
                    }
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                    header('location: quotation-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
                }
            } else {
                $error = "Image size should not be more than 600 KB";
                header('location: quotation-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
            }
        } else {
            $error .= "File is not an image.";
            header('location: quotation-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
        }
    } else {

        $s = "UPDATE `inquiry_offer` SET 
    -- `mobile`='" . $mobile . "',
    `chemical`='" . $chemical . "',
    `target_offer_price`='" . $target_offer_price . "',
    `min_order_quantity`='" . $min_order_quantity . "',
    `details`='" . $details . "',
    `updated_at`='" . $updated_at . "',
    `updated_by`='" . $updated_by . "' WHERE id='" . $edit_id . "'";

        if (mysqli_query($db, $s)) {
            $error .= "Quotation updated successfully";
            header('location: quotation-all.php?&msg=' . $error . '&alert=success');
        } else {
            $error .= "Internal Server Error.";
            header('location: quotation-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Quotation Inquiry - <?= BRANDNAME ?> Admin Panel</title>

    <!-- Custom Head -->
    <?php include('./comman/head.php'); ?>

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
                        <h1 class="h3 mb-0 text-gray-800">Update Quotation Inquiry Page</h1>
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
                                        <h3 class="mb-2">Edit Quotation Inquiry</h3>
                                        <hr>

                                        <input type="hidden" name="edit_id" value="<?= $model->id ?>">
                                        <!-- <div class="form-floating my-3">
                                            <label for="mobile" class="form-label">Mobile (Whatsapp)</label>
                                            <input type="tel" id="mobile" class="form-control" name="mobile" placeholder="Mobile (Whatsapp)" required value="<?= $model->mobile ?>" />
                                        </div> -->

                                        <div class="form-floating my-3">
                                            <label for="text" class="form-label">Chemical</label>
                                            <input type="text" id="chemical" class="form-control" name="chemical" placeholder="Chemical" required value="<?= $model->chemical ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required value="<?= $model->email ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="target_offer_price" class="form-label">Offer Price (In $ / MT)</label>
                                            <input type="text" id="target_offer_price" class="form-control" name="target_offer_price" placeholder="Offer Price (In $ / MT)" required value="<?= $model->target_offer_price ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="details" class="form-label">Details</label>
                                            <textarea id="details" class="form-control" name="details" placeholder="Details" cols="30" rows="10"><?= $model->details ?></textarea>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <label for="formFile" class="form-label">Choose Image (Recommend Size: 1500x1000 PX)</label>
                                            <input class="form-control" type="file" id="formFile" name="fileToUpload" style="height:100%;padding:0.275rem 0.275rem">
                                        </div>

                                        <div class="my-3">
                                            <?php
                                            if (!empty($model->image)) {
                                                echo "<p>Old Iamge:</p>";
                                                echo '<img src="' . $target_dir . $model->image . '" style="width:100px">';
                                            }
                                            ?>
                                            <input type="hidden" name="old_image" value="<?= $model->image ?>">
                                        </div>

                                    </div>

                                </div>
                                <div class="my-4 mx-auto">
                                    <input type="submit" name="submit" class="btn btn-success btn-block" value="UPDATE" />
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

</body>

</html>