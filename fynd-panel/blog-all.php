<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();

extract($_REQUEST);

$imageQuery = "SELECT * FROM `blog` ORDER BY id DESC";
$model = fetch_all($db, $imageQuery);

$target_dir = "../assets/img/blog/";

$blogTitle = fetch_object($db, "SELECT * FROM `blog_title`");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Blog - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Blog Management</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12 d-flex justify-content-between">
                            <a href="./index.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-solid fa-arrow-left"></i>
                                Back
                            </a>

                            <a href="./blog-add.php" class="btn btn-success btn-sm">
                                <i class="fas fa-solid fa-plus"></i>
                                Add
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

                        <div class="col-12" style="width:100%;overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">Home Page Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="blog-title-edit.php?id=<?= $blogTitle->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td><?= $blogTitle->title ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12" style="width:100%;overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Meta Description</th>
                                        <th scope="col">Meta Keyword</th>
                                        <!-- <th scope="col">Slug</th> -->
                                        <th scope="col">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($model) > 0) {
                                        $j = 1;
                                        foreach ($model as $key => $val) {
                                            $value = (object) $val;
                                    ?>
                                            <tr>
                                                <td>
                                                    <a href="blog-view.php?id=<?= $value->id ?>" class="mx-1 my-1 btn btn-sm btn-success text-nowrap">
                                                        <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        View
                                                    </a>

                                                    <a href="blog-update.php?id=<?= $value->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Edit
                                                    </a>

                                                    <a data-toggle="modal" data-target="#deleteModal" href="#" data-url="blog-delete.php?id=<?= $value->id ?>" class="mx-1 my-1 btn btn-sm btn-danger image-delete-btn">
                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Delete
                                                    </a>

                                                    <a href="blog-comment.php?id=<?= $value->id ?>" class="mx-1 my-1 btn btn-sm btn-info text-nowrap">
                                                        <i class="fas fa-comment fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        View Comment
                                                    </a>
                                                </td>
                                                <td><img src="<?php echo $target_dir . $value->image ?>" style="width:100px"></td>
                                                <td><?= $value->title ?></td>
                                                <td><?= $value->meta_description ?></td>
                                                <td><?= $value->meta_keyword ?></td>
                                                <!-- <td><?= $value->slug ?></td> -->
                                                <td><?= $value->created_at ?></td>
                                            </tr>
                                        <?php $j++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">No Blog found!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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