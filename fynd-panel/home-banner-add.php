<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);


if (isset($_POST['submit'])) {
    extract($_REQUEST);
    $target_dir = "../assets/img/banner/";
    $token = rand(1234, 6789);
    $target_file = $target_dir . basename($token . $_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $kb_5 = 600000;
    if ($check !== false) {
        if ($_FILES["fileToUpload"]["size"] <= $kb_5) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $iName = htmlspecialchars(basename($token . $_FILES["fileToUpload"]["name"]));
                $user = $_SESSION['user'];
                $userId = $user['user_id'];
                $createdAt = date('Y-m-d H:i:s', time());
                $sql = "INSERT INTO `home_banner`(`banner`,`title1`, `title2`, `created_at`) VALUES ('$iName', '{$title1}', '{$title2}', '{$createdAt}')";
                if (mysqli_query($db, $sql)) {
                    $error = "Banner Image file " . $iName . " has been uploaded.";
                    header('location: home-banner-all.php?msg=' . $error . '&alert=success');
                }
            } else {
                $error = "Sorry, there was an error uploading your file.";
                header('location: home-banner-add.php?msg=' . $error . '&alert=danger');
            }
        } else {
            $error = "Image size should not be more than 600 KB";
            header('location: home-banner-add.php?msg=' . $error . '&alert=danger');
        }
    } else {
        $error .= "File is not an image.";
        header('location: home-banner-add.php?msg=' . $error . '&alert=danger');
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Banner Image - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Add Banner Image</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./index.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-solid fa-arrow-left"></i>
                                Back
                            </a>
                        </div>
                    </div>

                    <?php if (!empty($alert) && !empty($msg)) { ?>
                        <div class="row">
                            <div class="col-md-8">
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
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Choose Banner Image (Recommend Size: 1000x1406 PX)</label>
                                    <input class="form-control" type="file" id="formFile" name="fileToUpload" style="height:100%;padding:0.275rem 0.275rem" required>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Title</label>
                                    <input class="form-control" type="text" name="title1" style="height:100%;padding:0.275rem 0.275rem" required>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Content</label>
                                    <textarea class="form-control" name="title2" rows="5" cols="10" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Banner" />
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