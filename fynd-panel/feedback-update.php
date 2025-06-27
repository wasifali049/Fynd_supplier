<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

if (empty($id)) {
    header('location: ./feedback-all.php');
}

$model = fetch_object($db, "SELECT * FROM `feedback` WHERE id='{$id}'");

$target_dir = "../assets/img/feedback/";

if (isset($_POST['submit'])) {

    extract($_REQUEST);

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];

    $updated_at = date('Y-m-d H:i:s', time());
    $name = mysqli_real_escape_string($db, $name);
    $content = mysqli_real_escape_string($db, $content);

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
                    unlink($target_dir . $old_image);

                    $sql = "UPDATE `feedback` SET 
                    `image`='" . $iName . "',
                    `name`='" . $name . "',
                    `content`='" . $content . "',
                    `content`='" . $content . "',
                    `updated_at`='" . $updated_at . "',
                    `updated_by`='" . $updated_by . "' WHERE id='" . $edit_id . "'";

                    //$sql = "UPDATE `home_banner` SET `banner`='" . $iName . "', `title1`='" . $title1 . "', `title2`='" . $title2 . "' WHERE id='" . $id . "'";
                    
                    if (mysqli_query($db, $sql)) {
                        //$error = "Image file " . $iName . " has been uploaded.";
                        $error .= "Feedback updated successfully.";
                        header('location: feedback-all.php?&msg=' . $error . '&alert=success');
                    } else {
                        $error .= "Internal Server Error.";
                        header('location: feedback-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
                    }
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                    header('location: feedback-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
                }
            } else {
                $error = "Image size should not be more than 600 KB";
                header('location: feedback-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
            }
        } else {
            $error .= "File is not an image.";
            header('location: feedback-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
        }
    } else {

        $s = "UPDATE `feedback` SET 
        `name`='" . $name . "',
        `content`='" . $content . "',
        `content`='" . $content . "',
        `updated_at`='" . $updated_at . "',
        `updated_by`='" . $updated_by . "' WHERE id='" . $edit_id . "'";

        if (mysqli_query($db, $s)) {
            $error .= "Feedback updated successfully";
            header('location: feedback-all.php?msg=' . $error . '&alert=success');
        } else {
            $error .= "Internal Server Error.";
            header('location: feedback-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Feedback - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Update Feedback Page</h1>
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
                                        <h3 class="mb-2">Edit Feedback</h3>
                                        <hr>

                                        <div class="form-floating mb-3">
                                            <label for="formFile" class="form-label">Choose Banner Image (Recommend Size: 1000x1406 PX)</label>
                                            <input class="form-control" type="file" id="formFile" name="fileToUpload" style="height:100%;padding:0.275rem 0.275rem">
                                        </div>
                                        <div class="my-3">
                                            <?php
                                            if (!empty($model)) {
                                                echo "<p>Old Iamge:</p>";
                                                echo '<img src="' . $target_dir . $model->image . '" style="width:100px">';
                                            }
                                            ?>
                                            <input type="hidden" name="old_image" value="<?= $model->image ?>">
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Name" required value="<?= $model->name ?>" />
                                            <input type="hidden" name="edit_id" value="<?= $model->id ?>">
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea id="content" class="form-control" name="content" placeholder="Enter Content" cols="30" rows="10"><?= $model->content ?></textarea>
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