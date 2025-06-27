<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

$model = fetch_object($db, "SELECT * FROM `home_buyer_supplier_inquiry_title`");

$target_dir = "../assets/img/home-inquiry/";
if (isset($_POST['submit'])) {

    extract($_REQUEST);

    $updated_at = date('Y-m-d H:i:s', time());

    $title1 = mysqli_real_escape_string($db, $title1);
    $title2 = mysqli_real_escape_string($db, $title2);
    $title3 = mysqli_real_escape_string($db, $title3);
    $title4 = mysqli_real_escape_string($db, $title4);

    $token1 = rand(1234, 6789);
    $token2 = rand(1234, 6789);
    $target_file1 = $target_dir . basename($token1 . $_FILES["fileToUpload1"]["name"]);
    $target_file2 = $target_dir . basename($token2 . $_FILES["fileToUpload2"]["name"]);
    $uploadOk = 1;
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $iName1 = $model->cover;
    $iName2 = $model->cover2;
    $error = '';
    // Check if image file is a actual image or fake image
    if (isset($_FILES["fileToUpload1"]["name"]) && !empty($_FILES["fileToUpload1"]["name"])) {
        $check1 = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
        $kb_5 = 600000;
        if ($check1 !== false) {
            if ($_FILES["fileToUpload1"]["size"] <= $kb_5) {
                if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {
                    $iName1 = htmlspecialchars(basename($token1 . $_FILES["fileToUpload1"]["name"]));
                    $createdAt = date('Y-m-d H:i:s', time());
                    if (file_exists($target_dir . $old_image1)) {
                        unlink($target_dir . $old_image1);
                    }
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                    header('location: home-buyer-supplier-inquiry-title-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
                }
            } else {
                $error = "Image size should not be more than 600 KB";
                header('location: home-buyer-supplier-inquiry-title-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
            }
        } else {
            $error .= "File is not an image.";
            header('location: home-buyer-supplier-inquiry-title-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
        }
    }

    if (isset($_FILES["fileToUpload2"]["name"]) && !empty($_FILES["fileToUpload2"]["name"])) {
        $check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
        $kb_5 = 600000;
        if ($check2 !== false) {
            if ($_FILES["fileToUpload2"]["size"] <= $kb_5) {
                if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
                    $iName2 = htmlspecialchars(basename($token2 . $_FILES["fileToUpload2"]["name"]));
                    $createdAt = date('Y-m-d H:i:s', time());
                    if (file_exists($target_dir . $old_image2)) {
                        unlink($target_dir . $old_image2);
                    }
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                    header('location: home-buyer-supplier-inquiry-title-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
                }
            } else {
                $error = "Image size should not be more than 600 KB";
                header('location: home-buyer-supplier-inquiry-title-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
            }
        } else {
            $error .= "File is not an image.";
            header('location: home-buyer-supplier-inquiry-title-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
        }
    }

    if (empty($error)) {
        $s = "UPDATE `home_buyer_supplier_inquiry_title` SET `title1`='{$title1}', `title2`='{$title2}', `title3`='{$title3}', `title4`='{$title4}', `cover`='{$iName1}', `cover2`='{$iName2}', `updated_at`='{$updated_at}' WHERE id='{$edit_id}'";
        if (mysqli_query($db, $s)) {
            $error .= "Title Updated successfully.";
            header('location: home-buyer-supplier-inquiry.php?msg=' . $error . '&alert=success');
        } else {
            $error .= "Internal Server Error.";
            header('location: home-buyer-supplier-inquiry-title-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
        }
    } else {
        header('location: home-buyer-supplier-inquiry-title-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Home Inquiry Title - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Home Inquiry Title</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./home-buyer-supplier-inquiry.php" class="btn btn-primary btn-sm">
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
                                        <h3 class="mb-2">Edit Title</h3>
                                        <hr>

                                        <div class="form-floating mb-3">
                                            <label for="formFile" class="form-label">Choose Banner Image (Recommend Size: 416x676 PX)</label>
                                            <input class="form-control" type="file" id="formFile" name="fileToUpload1" style="height:100%;padding:0.275rem 0.275rem">
                                        </div>
                                        <div class="my-3">
                                            <?php
                                            if (!empty($model)) {
                                                echo "<p>Old Image:</p>";
                                                echo '<img src="' . $target_dir . $model->cover . '" style="width:100px">';
                                            }
                                            ?>
                                            <input type="hidden" name="old_image1" value="<?= $model->cover ?>">
                                        </div>


                                        <div class="form-floating mb-3">
                                            <label for="formFile2" class="form-label">Choose Banner Image (Recommend Size: 440x676 PX)</label>
                                            <input class="form-control" type="file" id="formFile2" name="fileToUpload2" style="height:100%;padding:0.275rem 0.275rem">
                                        </div>
                                        <div class="my-3">
                                            <?php
                                            if (!empty($model)) {
                                                echo "<p>Old Image:</p>";
                                                echo '<img src="' . $target_dir . $model->cover2 . '" style="width:100px">';
                                            }
                                            ?>
                                            <input type="hidden" name="old_image2" value="<?= $model->cover2 ?>">
                                        </div>


                                        <div class="form-floating my-3">
                                            <label for="pageTitle1" class="form-label">Buyer/Supplier Enquiry Title</label>
                                            <input type="text" id="pageTitle1" class="form-control" name="title1" placeholder="Title 1" required value="<?= $model->title1 ?>" />
                                        </div>
                                        
                                        <div class="form-floating my-3">
                                            <label for="pageTitle3" class="form-label">Buyer/Supplier Enquiry Sub Title</label>
                                            <input type="text" id="pageTitle3" class="form-control" name="title3" placeholder="Sub Title 1"  value="<?= $model->title3 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="pageTitle2" class="form-label">Chatbox Title</label>
                                            <input type="text" id="pageTitle2" class="form-control" name="title2" placeholder="Title 2" required value="<?= $model->title2 ?>" />
                                        </div>
                                        
                                        <div class="form-floating my-3">
                                            <label for="pageTitle4" class="form-label">Chatbox Sub Title</label>
                                            <input type="text" id="pageTitle4" class="form-control" name="title4" placeholder="Sub Title 2"  value="<?= $model->title4 ?>" />
                                            <input type="hidden" name="edit_id" value="<?= $model->id ?>">
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

            <!-- End of Footer -->

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

    <!-- Comman JS Scripts -->
    <?php include('./comman/scripts.php'); ?>

</body>

</html>