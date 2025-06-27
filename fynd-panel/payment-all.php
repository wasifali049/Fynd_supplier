<?php
include '../lib/bpconn.php';
include '../lib/config-details.php';
check_admin_auth();
extract($_REQUEST);

$limit = 20;

if (isset($_GET["page"])) {

    $pn = $_GET["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;

$model = fetch_all($db, "SELECT * FROM `payments` ORDER BY id DESC LIMIT $startFrom, $limit");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Payment History - <?= BRANDNAME ?> Admin Panel</title>

    <!-- Custom Head -->
    <?php include './comman/head.php'; ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './comman/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include './comman/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Payment Management</h1>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Payer ID</th>
                                        <th scope="col">Payment Type</th>
                                        <th scope="col">Payment Fee</th>
                                        <th scope="col">Payment Amount</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($model) > 0) {
                                        $j = 1;
                                        foreach ($model as $key => $val) {
                                            $chatValue = (object) $val;
                                            $userModel = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$chatValue->item_number}'");
                                    ?>

                                            <tr>
                                                <td>
                                                    <?php if ($chatValue->payment_status != 'Completed') { ?>
                                                        <a href="#" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                            <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Mark Paid
                                                        </a>
                                                    <?php } ?>
                                                </td>

                                                <td scope="row">

                                                    <?php echo ($pn > 1) ? (20 * ($pn - 1) + $j) : $j; ?>

                                                </td>
                                                <td><?= $userModel->name; ?></td>
                                                <td><a target="_blank" href="http://wa.me/<?= $userModel->mobile; ?>"><?= $userModel->mobile; ?></a></td>
                                                <td><?= $chatValue->PayerID; ?></td>
                                                <td><?= $chatValue->payment_type; ?></td>
                                                <td><?= $chatValue->mc_fee; ?></td>
                                                <td><?= $chatValue->amount; ?></td>
                                                <td><?= $chatValue->payment_status; ?></td>
                                                <td><?= dateFormat($chatValue->created_at); ?></td>
                                            </tr>
                                        <?php $j++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">No Message found!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm">
                                    <?php

                                    $sql = "SELECT COUNT(*) FROM payments";
                                    $rs_result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_row($rs_result);
                                    $total_records = $row[0];

                                    $total_pages = ceil($total_records / $limit);
                                    $pagLink = "";
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $pn) {
                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='payment-all.php?page="

                                                . $i . "'>" . $i . "</a></li>";
                                        } else {
                                            $pagLink .= "<li class='page-item'><a class='page-link' href='payment-all.php?page=" . $i . "'>

                                                " . $i . "</a></li>";
                                        }
                                    };

                                    echo $pagLink;
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include './comman/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include './comman/logout-modal.php' ?>

    <!-- Delete Modal-->
    <?php include './comman/delete-modal.php' ?>

    <!-- Comman JS Scripts -->
    <?php include './comman/scripts.php'; ?>
    <script src="./js/deleteModal.js"></script>

</body>

</html>