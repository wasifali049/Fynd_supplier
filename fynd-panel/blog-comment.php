<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();

extract($_REQUEST);

$imageQuery = "SELECT * FROM `blog_comment` WHERE bid='{$id}'";
$model = fetch_all($db, $imageQuery);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Blog Comment - <?= BRANDNAME ?> Admin Panel</title>

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
                                        <th scope="col">User</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($model) > 0) {
                                        $j = 1;
                                        foreach ($model as $key => $val) {
                                            $value = (object) $val;
                                            $blogUserModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$value->uid}'");
                                    ?>
                                            <tr>
                                                <td>
                                                    <a data-toggle="modal" data-target="#deleteModal" href="#" data-url="blog-comment-delete.php?id=<?= $value->id ?>" class="mx-1 my-1 btn btn-sm btn-danger image-delete-btn">
                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                                <td><?= $blogUserModel->name ?></td>
                                                <td><?= $value->comment ?></td>
                                                <td><?= $value->created_at ?></td>
                                            </tr>
                                        <?php $j++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">No Blog Comment found!</td>
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