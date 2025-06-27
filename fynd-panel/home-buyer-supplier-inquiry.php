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


$imageQuery = "SELECT * FROM `home_buyer_supplier_inquiry` ORDER BY id DESC LIMIT $startFrom, $limit";

$model = fetch_all($db, $imageQuery);

$supplierTitle = fetch_object($db, "SELECT * FROM `home_buyer_supplier_inquiry_title`");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Home Inquiry - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Supplier Management</h1>
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
                                        <th scope="col">Action</th>
                                        <th scope="col">Title 1</th>
                                        <th scope="col">Sub Title 1</th>
                                        <th scope="col">Title 2</th>
                                        <th scope="col">Sub Title 2</th>
                                        <th scope="col">Cover 1</th>
                                        <th scope="col">Cover 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="home-buyer-supplier-inquiry-title-edit.php?id=<?= $supplierTitle->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td><?= $supplierTitle->title1 ?></td>
                                        <td><?= $supplierTitle->title3 ?></td>
                                        <td><?= $supplierTitle->title2 ?></td>
                                        <td><?= $supplierTitle->title4 ?></td>
                                        <td>
                                            <img src="../assets/img/home-inquiry/<?= $supplierTitle->cover ?>" class="card-img-top fixed-size" alt="...">
                                        </td>
                                        <td>
                                            <img src="../assets/img/home-inquiry/<?= $supplierTitle->cover2 ?>" class="card-img-top fixed-size" alt="...">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12" style="width:100%;overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Buyer/Supplier</th>
                                        <!-- <th>Mobile</th> -->
                                        <th>Chemical</th>
                                        <th>Who To Contact</th>
                                        <th>Country</th>
                                        <th>Details</th>
                                        <!-- <th>Quantity</th> -->
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($model) > 0) {
                                        $j = 1;
                                        foreach ($model as $key => $val) {
                                            $value = (object) $val;
                                            $userModel = fetch_all($db, "SELECT name FROM `user` WHERE id IN ({$value->uid})");
                                            $userModel = array_column($userModel, 'name');
                                            $userNames = implode(', ',$userModel);
                                    ?>
                                            <tr>
                                                <td>
                                                    <?php if($value->status == 0){ ?>
                                                        <a href="home-buyer-supplier-inquiry-status.php?id=<?=$value->id?>" class="mx-1 my-1 btn btn-sm btn-success text-nowrap">
                                                        <i class="fas fa-paper-plane fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Approve Inquiry
                                                    </a>

                                                    <a href="home-buyer-supplier-inquiry-edit.php?id=<?=$value->id?>" class="mx-1 my-1 btn btn-sm btn-info text-nowrap">
                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Edit
                                                    </a>

                                                    <?php }else{ ?>
                                                        <a class="mx-1 my-1 btn btn-sm btn-success text-nowrap">
                                                        <i class="fas fa-check fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Approved
                                                    </a>
                                                    <?php } ?>

                                                    
                                                </td>
                                                <td><?= $userNames ?></td>
                                                <?php /*<td><a target="_blank" href="http://wa.me/<?= $value->mobile ?>"><?= $value->mobile ?></a></td>*/ ?>
                                                <td><?= $value->chemical ?></td>
                                                <td><?= $value->who_to_contact ?></td>
                                                <td><?= $value->destination ?></td>
                                                <td><?= $value->details ?></td>
                                                <!-- <td><?= $value->quantity ?></td> -->
                                                <td><?= $value->created_at ?></td>

                                            </tr>
                                        <?php $j++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">No Supplier found!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 my-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm">
                                    <?php

                                    $sql = "SELECT COUNT(*) FROM `home_buyer_supplier_inquiry`";
                                    $rs_result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_row($rs_result);
                                    $total_records = $row[0];

                                    $total_pages = ceil($total_records / $limit);
                                    $pagLink = "";
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $pn) {
                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='supplier-all.php?page="

                                                . $i . "'>" . $i . "</a></li>";
                                        } else {
                                            $pagLink .= "<li class='page-item'><a class='page-link' href='supplier-all.php?page=" . $i . "'>

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