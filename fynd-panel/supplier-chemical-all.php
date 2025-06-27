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


if (isset($_REQUEST['searchSupplier']) && !empty($_REQUEST['searchSupplier'])) {
    $searchSupplier = mysqli_real_escape_string($db, $_REQUEST['searchSupplier']);
    $cond = "`product_name` LIKE '%{$searchSupplier}%'";
} else {
    $searchSupplier = '';
    $cond = "1";
}


$model = fetch_all($db, "SELECT * FROM `supplier_chemical_list` WHERE {$cond} ORDER BY id DESC LIMIT $startFrom, $limit");

$chemicalAlignment = fetch_object($db, "SELECT * FROM `chemical_alignment`");
$chemicalTitle = fetch_object($db, "SELECT * FROM `chemical_title`");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Supplier Chemical - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Supplier Chemical Management</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-4">
                            <a href="./index.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-solid fa-arrow-left"></i>
                                Back
                            </a>
                        </div>

                        <div class="col-md-8">
                            <form action="">
                                <div class="form-group d-flex justify-content-between">
                                    <input type="text" class="form-control" name="searchSupplier" placeholder="Search Chemical Name" value="<?= $searchSupplier ?>" required>
                                    <input type="submit" name="submit" class="btn btn-primary mx-1" value="Search" />
                                    <a href="./buyer-all.php" class="btn btn-danger">Clear</a>
                                </div>
                            </form>
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
                                            <a href="supplier-chemical-title-edit.php?id=<?= $chemicalTitle->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td><?= $chemicalTitle->title ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>




                        <div class="col-12" style="width:100%;overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Chemical Alignment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="supplier-chemical-alignment-edit.php?id=<?= $chemicalAlignment->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Manage Chemical Alignment
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
                                        <th scope="col">#</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Chemical Photo</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Supplier Name</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($model) > 0) {
                                        $j = 1;
                                        foreach ($model as $key => $value) {

                                            $userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$value['uid']}'") ?>

                                            <tr>
                                                <td>
                                                    <a href="supplier-chemical-update.php?id=<?= $value['id'] ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                        <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        View
                                                    </a>

                                                    <?php if ($value['status'] == 0) { ?>

                                                        <a href="supplier-chemical-status-update.php?id=<?= $value['id'] ?>" class="mx-1 my-1 btn btn-sm btn-success text-nowrap">
                                                            <i class="fas fa-arrow-up fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Approve
                                                        </a>
                                                    <?php } else { ?>

                                                        <a href="#" class="mx-1 my-1 btn btn-sm btn-info text-nowrap">
                                                            <i class="fas fa-check fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Approved
                                                        </a>
                                                    <?php } ?>
                                                </td>

                                                <td scope="row">

                                                    <?php echo ($pn > 1) ? (20 * ($pn - 1) + $j) : $j; ?>

                                                </td>

                                                <td>
                                                    <?php if ($value['status'] == 0) { ?>
                                                        <span class="badge badge-warning">Pending</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success">Approved</span>
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <img src="../assets/img/chemical/<?= $value['chemical_photo'] ?>" class="card-img-top fixed-size" alt="...">
                                                </td>
                                                <td><?= $value['product_name']; ?></td>
                                                <td><?= $userModel->name; ?></td>
                                            </tr>
                                        <?php $j++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">No Supplier Chemical found!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm">
                                    <?php

                                    $sql = "SELECT COUNT(*) FROM supplier_chemical_list WHERE {$cond}";
                                    $rs_result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_row($rs_result);
                                    $total_records = $row[0];

                                    $total_pages = ceil($total_records / $limit);
                                    $pagLink = "";
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $pn) {
                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='supplier-chemical-all.php?page="

                                                . $i . "'>" . $i . "</a></li>";
                                        } else {
                                            $pagLink .= "<li class='page-item'><a class='page-link' href='supplier-chemical-all.php?page=" . $i . "'>

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