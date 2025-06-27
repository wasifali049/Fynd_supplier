<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

$userMobile = isset($userMobile) ? $userMobile : '';
$cond = 1;

if (!empty($userMobile)) {
    $cond = "`mobile` LIKE '%{$userMobile}%' OR `name` LIKE '%{$userMobile}%'";
}

$limit = 20;

if (isset($_GET["page"])) {

    $pn  = $_GET["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;

$imageQuery = "SELECT * FROM `user` WHERE {$cond} ORDER BY id DESC LIMIT $startFrom, $limit";

$model = fetch_all($db, $imageQuery);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Users - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">All Users</h1>

                        <form action="" class="d-flex justify-content-between align-items-center">
                            <div class="form-field m-1">
                                <input type="text" class="form-control" name="userMobile" name="<?= $userMobile ?>" placeholder="Enter Name or Mobile Number">
                            </div>

                            <div class="form-field m-1">
                                <a type="button" href="./premium-member-all.php" class="btn btn-danger">Clear</a>
                            </div>

                            <div class="form-field m-1">
                                <button type="submit" class="btn btn-primary">Find</button>
                            </div>

                        </form>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">User Type</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($model) > 0) {
                                        $j = 1;
                                        foreach ($model as $key => $value) {
                                            $valueInq = (object) $value;
                                    ?>

                                            <tr>
                                                <td>
                                                    <?php if ($value['is_verified'] == 0) { ?>
                                                        <a href="premium-member-status-update.php?id=<?= $value['id'] ?>" class="d-block mx-1 my-1 btn btn-sm btn-success text-nowrap">
                                                            <i class="fas fa-arrow-up fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Verified
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="premium-member-status-update.php?id=<?= $value['id'] ?>" class="d-block mx-1 my-1 btn btn-sm btn-danger text-nowrap">
                                                            <i class="fas fa-check fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Cancel
                                                        </a>
                                                    <?php } ?>

                                                </td>
                                                <td><?= $valueInq->name; ?></td>
                                                <td><a target="_blank" href="http://wa.me/<?= $valueInq->mobile; ?>"><?= $valueInq->mobile ?></a></td>
                                                <td><?= $valueInq->email; ?></td>
                                                <td><?= $valueInq->user_type; ?></td>

                                            </tr>
                                        <?php $j++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">No User found!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>


                        <div class="col-12 my-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm">
                                    <?php

                                    $sql = "SELECT COUNT(*) FROM `user`";
                                    $rs_result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_row($rs_result);
                                    $total_records = $row[0];

                                    $total_pages = ceil($total_records / $limit);
                                    $pagLink = "";
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $pn) {
                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='premium-member-all.php?page="

                                                . $i . "'>" . $i . "</a></li>";
                                        } else {
                                            $pagLink .= "<li class='page-item'><a class='page-link' href='premium-member-all.php?page=" . $i . "'>

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