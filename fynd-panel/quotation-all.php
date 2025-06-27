<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

$model = fetch_all($db, "SELECT * FROM `inquiry_offer` WHERE type='inquiry' ORDER BY id DESC");
$quotationAlignment = fetch_object($db, "SELECT * FROM `quotation_alignment`");
$quotationTitle = fetch_object($db, "SELECT * FROM `quotation_title`");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Quotation Inquiry - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Quotation Inquiry Management</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12 d-flex justify-content-between">
                            <a href="./index.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-solid fa-arrow-left"></i>
                                Back
                            </a>

                            <a href="./quotation-add.php" class="btn btn-success btn-sm">
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
                                            <a href="quotation-title-edit.php?id=<?= $quotationTitle->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td><?= $quotationTitle->title ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>




                        <div class="col-12" style="width:100%;overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Quotation Alignment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="quotation-alignment-edit.php?id=<?= $quotationAlignment->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Manage Quotation Alignment
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12" style="width:100%;overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Chemical</th>
                                        <th scope="col">Target Price</th>
                                        <th scope="col">RFQ</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($model) > 0) {
                                        $j = 1;
                                        foreach ($model as $key => $value) {
                                            $valueInq = (object) $value;
                                            $userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$valueInq->uid}'");

                                    ?>

                                            <tr>
                                                <td>
                                                    <a href="quotation-update.php?id=<?= $value['id'] ?>" class="d-block mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Edit
                                                    </a>

                                                    <?php if ($value['status'] == 0) { ?>
                                                        <a href="quotation-status-update.php?id=<?= $value['id'] ?>" class="d-block mx-1 my-1 btn btn-sm btn-info text-nowrap">
                                                            <i class="fas fa-arrow-up fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Approve
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#" class="d-block mx-1 my-1 btn btn-sm btn-success text-nowrap">
                                                            <i class="fas fa-check fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Approved
                                                        </a>
                                                    <?php } ?>

                                                    <a data-toggle="modal" data-target="#deleteModal" href="#" data-url="quotation-delete.php?id=<?= $value['id'] ?>" class="d-block mx-1 my-1 btn btn-sm btn-danger image-delete-btn">
                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                                <td><?= $userModel->name ?></td>
                                                <td><a target="_blank" href="http://wa.me/<?= $valueInq->mobile ?>"><?= $valueInq->mobile ?></a></td>
                                                <td><?= $valueInq->email ?></td>
                                                <td><?= $valueInq->chemical ?></td>
                                                <td><?= $valueInq->target_offer_price ?></td>
                                                <td><?= $valueInq->rfq ?></td>
                                                <td><?= textWithoutHtml($valueInq->details, 100) ?></td>
                                                <td><?= dateFormat($valueInq->created_at) ?></td>
                                            </tr>
                                        <?php $j++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">No Quotation Inquiry found!</td>
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