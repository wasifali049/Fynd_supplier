<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();

extract($_REQUEST);

$limit = 20;

if (isset($_GET["page"])) {

    $pn  = $_GET["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;


$imageQuery = "SELECT * FROM `short_on_time` ORDER BY id DESC LIMIT $startFrom, $limit";

$model = fetch_all($db, $imageQuery);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Short On Time Inquiry - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Short On Time Inquiry Management</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12 d-flex justify-content-between">
                            <a href="./index.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-solid fa-arrow-left"></i>
                                Back
                            </a>

                            <!-- <a href="./blog-add.php" class="btn btn-success btn-sm">
                                <i class="fas fa-solid fa-plus"></i>
                                Add
                            </a> -->
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Time</th>
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
                                                <td><?= $value->name ?></td>
                                                <td><a target="_blank" href="http://wa.me/<?= $value->mobile ?>"><?= $value->mobile ?></a></td>
                                                <td><a href="mailto:<?= $value->email ?>"><?= $value->email ?></a></td>
                                                <td><?= $value->message ?></td>
                                                <td><?= $value->location ?></td>
                                                <td><?= date("d/m/y h:m:s a", strtotime($value->created_at)) ?></td>
                                            </tr>
                                        <?php $j++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">No Short On Time Inquiry found!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 my-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm">
                                    <?php

                                    $sql = "SELECT COUNT(*) FROM `short_on_time`";
                                    $rs_result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_row($rs_result);
                                    $total_records = $row[0];

                                    $total_pages = ceil($total_records / $limit);
                                    $pagLink = "";
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $pn) {
                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='short-on-time-inquiry.php?page="

                                                . $i . "'>" . $i . "</a></li>";
                                        } else {
                                            $pagLink .= "<li class='page-item'><a class='page-link' href='short-on-time-inquiry.php?page=" . $i . "'>

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