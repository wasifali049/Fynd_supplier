<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

if (empty($id)) {
    header('location: ./supplier-page-seo.php');
}

$model = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE id='{$id}'");

if (isset($_POST['submit'])) {

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];

    $updated_at = date('Y-m-d H:i:s', time());

    $edit_id = mysqli_real_escape_string($db, $edit_id);

    $meta_title = mysqli_real_escape_string($db, $meta_title);
    $meta_description = mysqli_real_escape_string($db, $meta_description);
    $meta_keyword = mysqli_real_escape_string($db, $meta_keyword);
    $slug = mysqli_real_escape_string($db, $slug);

    if ($model->slug != $slug) {
        $slug = slug($db, $slug, 'supplier_chemical_list');
    }

    $s = "UPDATE `supplier_chemical_list` SET `meta_title`='{$meta_title}', `meta_description`='{$meta_description}', `meta_keyword`='{$meta_keyword}', `slug`='{$slug}' WHERE id='{$edit_id}'";

    if (mysqli_query($db, $s)) {
        $error .= "SEO Details updated successfully";
        header('location: supplier-chemical-seo.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error.";
        header('location: supplier-chemical-seo-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Supplier CHEMICAL SEO - <?= BRANDNAME ?> Admin Panel</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Update SEO</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./supplier-page-seo.php" class="btn btn-primary btn-sm">
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
                                        <h3 class="mb-2">Edit SUPPLIER CHEMICAL SEO</h3>
                                        <hr>

                                        <div class="form-floating my-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" id="title" class="form-control" name="meta_title" placeholder="Enter Supplier Title" required value="<?= $model->meta_title ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea id="description" class="form-control" name="meta_description" placeholder="Enter Description" cols="30" rows="5" required><?= $model->meta_description ?></textarea>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="keyword" class="form-label">Keyword</label>
                                            <textarea id="keyword" class="form-control" name="meta_keyword" placeholder="Enter Keyword" cols="30" rows="5" required><?= $model->meta_keyword ?></textarea>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="slug" class="form-label">Slug</label>
                                            <textarea id="slug" class="form-control" name="slug" placeholder="Enter Slug" cols="30" rows="5" required><?= $model->slug ?></textarea>
                                        </div>

                                        <input type="hidden" name="edit_id" value="<?= $model->id ?>">


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

    <!-- Delete Modal-->
    <?php include('./comman/delete-modal.php') ?>

    <!-- Comman JS Scripts -->
    <?php include('./comman/scripts.php'); ?>
    <script src="./js/deleteModal.js"></script>

</body>

</html>