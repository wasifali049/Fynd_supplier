<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

if (empty($id)) {
    header('location: ./search-modal-inquiry.php');
}

$target_dir = "../assets/img/search/";

$model = fetch_object($db, "SELECT * FROM `search_modal` WHERE id='{$id}'");

if (isset($_POST['submit'])) {

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];

    $updated_at = date('Y-m-d H:i:s', time());
    $updated_by = $userId;

    $buy = mysqli_real_escape_string($db, $buy);
    $chemical = mysqli_real_escape_string($db, $chemical);
    $name = mysqli_real_escape_string($db, $name);
    $mobile = mysqli_real_escape_string($db, $mobile);
    $email = mysqli_real_escape_string($db, $email);
    $message = mysqli_real_escape_string($db, $message);
    $page = mysqli_real_escape_string($db, $page);

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

                    $s = "UPDATE `search_modal` SET 
                    `buy`='" . $buy . "',
                    `chemical`='" . $chemical . "',
                    `name`='" . $name . "',
                    `mobile`='" . $mobile . "',
                    `email`='" . $email . "',
                    `message`='" . $message . "',
                    `page`='" . $page . "',
                    `attachment`='" . $iName . "',
                    `updated_at`='" . $updated_at . "',
                    `updated_by`='" . $updated_by . "' WHERE id='" . $edit_id . "'";

                    //$sql = "UPDATE `home_banner` SET `banner`='" . $iName . "', `title1`='" . $title1 . "', `title2`='" . $title2 . "' WHERE id='" . $id . "'";

                    if (mysqli_query($db, $s)) {
                        //$error = "Image file " . $iName . " has been uploaded.";
                        $error .= "Inquiry updated successfully.";
                        header('location: search-modal-inquiry.php?&msg=' . $error . '&alert=success');
                    } else {
                        $error .= "Internal Server Error.";
                        header('location: search-modal-inquiry-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
                    }
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                    header('location: search-modal-inquiry-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
                }
            } else {
                $error = "Image size should not be more than 600 KB";
                header('location: search-modal-inquiry-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
            }
        } else {
            $error .= "File is not an image.";
            header('location: search-modal-inquiry-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
        }
    } else {

        $s = "UPDATE `search_modal` SET 
        `buy`='" . $buy . "',
        `chemical`='" . $chemical . "',
        `name`='" . $name . "',
        `mobile`='" . $mobile . "',
        `email`='" . $email . "',
        `message`='" . $message . "',
        `page`='" . $page . "',
        `updated_at`='" . $updated_at . "',
        `updated_by`='" . $updated_by . "' WHERE id='" . $edit_id . "'";


        if (mysqli_query($db, $s)) {
            $error .= "Inquiry updated successfully";
            header('location: search-modal-inquiry.php?&msg=' . $error . '&alert=success');
        } else {
            $error .= "Internal Server Error.";
            header('location: search-modal-inquiry-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Search Modal Inquiry - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Update Search Modal Inquiry</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./search-modal-inquiry.php" class="btn btn-primary btn-sm">
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
                                        <h3 class="mb-2">Edit Search Modal Inquiry</h3>
                                        <hr>

                                        <input type="hidden" name="edit_id" value="<?= $model->id ?>">


                                        <div class="col-md-12 mb-3">
                                            <label for="signFor" class="form-label">I Want To *</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="buy" id="buy" value="I Want To Buy" <?= ($model->buy == 'I Want To Buy') ? 'checked':'' ?>>
                                                        <label class="form-check-label" for="buy">I Want To Buy</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="buy" id="sell" value="I Want To Sell" <?= ($model->buy == 'I Want To Sell') ? 'checked':'' ?>>
                                                        <label class="form-check-label" for="sell">I Want To Sell</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text" class="form-label">Chemical</label>
                                            <input type="text" id="chemical" class="form-control" name="chemical" placeholder="Chemical" required value="<?= $model->chemical ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Name" required value="<?= $model->name ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="mobile" class="form-label">Mobile</label>
                                            <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile" required value="<?= $model->mobile ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required value="<?= $model->email ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea id="message" class="form-control" name="message" placeholder="Message" cols="30" rows="5"><?= $model->message ?></textarea>
                                        </div>


                                        <div class="form-floating my-3">
                                            <label for="page" class="form-label">Inquiry From</label>
                                            <input type="text" id="page" class="form-control" name="page" placeholder="Page" required value="<?= $model->page ?>" />
                                        </div>


                                        <div class="form-floating mb-3">
                                            <label for="formFile" class="form-label">Choose Image (Recommend Size: 1500x1000 PX)</label>
                                            <input class="form-control" type="file" id="formFile" name="fileToUpload" style="height:100%;padding:0.275rem 0.275rem">
                                        </div>

                                        <div class="my-3">
                                            <?php
                                            if (!empty($model->attachment)) {
                                                echo "<p>Old Iamge:</p>";
                                                echo '<img src="' . $target_dir . $model->attachment . '" style="width:100px">';
                                            }
                                            ?>
                                            <input type="hidden" name="old_image" value="<?= $model->attachment ?>">
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