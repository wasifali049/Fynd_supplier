<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();

$userModel = fetch_all($db, "SELECT * FROM `user` WHERE status='1'");

extract($_REQUEST);

$target_dir = "../assets/img/blog/";

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];
    $updated_by = $userId;

    $updated_at = date('Y-m-d H:i:s', time());

    $uid = mysqli_real_escape_string($db, $uid);
    $title = mysqli_real_escape_string($db, $title);
    $meta_description = mysqli_real_escape_string($db, $meta_description);
    $meta_keyword = mysqli_real_escape_string($db, $meta_keyword);
    $content = mysqli_real_escape_string($db, $content);
    //$image = mysqli_real_escape_string($db, $image);
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
        $error = "Main Image, File is required.";
        $true = 0;
    }

    if ($true == 1) {


        // if (!empty($iName1)) {
        //     unlink($target_dir . $model->image);
        // }

        // $iName1 = (empty($iName1)) ? $model->image : $iName1;


        $slug = slug($db, $title, 'blog');

        $s = "INSERT INTO 
        `blog`
         (`uid`, `image`, `title`, `meta_description`, `meta_keyword`, `slug`, `content`, `created_at`)
         VALUES 
        ('{$uid}', '{$iName1}', '{$title}', '{$meta_description}', '{$meta_keyword}', '{$slug}', '{$content}', '{$updated_at}')";
        
        if (mysqli_query($db, $s)) {
            $error .= "Blog Added successfully";
            $lastId = mysqli_insert_id($db);
            header('location: blog-view.php?id=' . $lastId . '&msg=' . $error . '&alert=success');
        } else {
            $error .= "Internal Server Error.";
            header('location: blog-add.php?msg=' . $error . '&alert=danger');
        }
    } else {
        header('location: blog-add.php?msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Blog - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Add Blog Page</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./blog-all.php" class="btn btn-primary btn-sm">
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
                                        <h3 class="mb-2">Add Blog</h3>
                                        <hr>

                                        <div class="form-floating my-3">
                                            <label for="title" class="form-label">Publish by</label>
                                            <select name="uid" class="form-control" required>
                                                <?php
                                                foreach ($userModel as $userKey => $userVal) {
                                                    $userValue = (object) $userVal;
                                                    echo "<option value='{$userValue->id}'>{$userValue->name}</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" id="title" class="form-control" name="title" placeholder="Title" required />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <textarea id="meta_description" class="form-control" name="meta_description" placeholder="Meta Description" cols="10" rows="3" required></textarea>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                            <textarea id="meta_keyword" class="form-control" name="meta_keyword" placeholder="Meta Keyword" cols="10" rows="3" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formFile1" class="form-label">Image (Recommend: 900X768 PX)</label>
                                            <input class="form-control" type="file" id="formFile1" name="image1" style="height:100%;padding:0.275rem 0.275rem">
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea id="content1" class="form-control" name="content" placeholder="Enter Content" cols="30" rows="10"></textarea>
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

            <script src="https://cdn.tiny.cloud/1/2zispgsi9t6oj6rci9l5oy0k8hbggycfdg7zxbufa9mirfaq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

            <script>
                tinymce.init({
                    selector: '#content1',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | spellcheckdialog | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                });
            </script>
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

    <!-- Delete Modal-->
    <?php include('./comman/delete-modal.php') ?>

    <!-- Comman JS Scripts -->
    <?php include('./comman/scripts.php'); ?>
    <script src="./js/deleteModal.js"></script>

</body>

</html>