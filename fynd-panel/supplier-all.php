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
    $cond = "`name` LIKE '%{$searchSupplier}%' AND `user_type`='supplier'";
} else {
    $searchSupplier = '';
    $cond = "`user_type`='supplier'";
}


$imageQuery = "SELECT * FROM `user` WHERE {$cond} ORDER BY id DESC LIMIT $startFrom, $limit";

$model = fetch_all($db, $imageQuery);

$target_dir = "../assets/img/profile/";


$supplierAlignment = fetch_object($db, "SELECT * FROM `supplier_alignment`");
$supplierTitle = fetch_object($db, "SELECT * FROM `supplier_title`");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Supplier - <?= BRANDNAME ?> Admin Panel</title>

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
                        <div class="col-4 d-flex justify-content-between">
                            <a href="./index.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-solid fa-arrow-left"></i>
                                Back
                            </a>

                            <!-- <a href="./blog-add.php" class="btn btn-success btn-sm">
                                <i class="fas fa-solid fa-plus"></i>
                                Add
                            </a> -->
                        </div>
                        <div class="col-md-8">
                                <form action="">
                                    <div class="form-group d-flex justify-content-between">
                                        <input type="text" class="form-control" name="searchSupplier" placeholder="Search Supplier Name" value="<?= $searchSupplier ?>" required>
                                        <input type="submit" name="submit" class="btn btn-primary mx-1" value="Search" />
                                        <a href="./supplier-all.php" class="btn btn-danger">Clear</a>
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
                                        <th scope="col">Supplier Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="supplier-title-edit.php?id=<?= $supplierTitle->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td><?= $supplierTitle->title ?></td>
                                        <td>
                                            <img src="../assets/img/supplier/<?= $supplierTitle->cover ?>" class="card-img-top fixed-size" alt="...">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>




                        <div class="col-12" style="width:100%;overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Supplier Alignment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="supplier-alignment-edit.php?id=<?= $supplierAlignment->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Manage Supplier Alignment
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
                                        <th scope="col">Profile Photo</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">About</th>
                                        <th scope="col">Country Code</th>
                                        <th scope="col">Established Year</th>
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

                                                    <a target="_blank" href="supplier-profile-login.php?id=<?= $value->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                        <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        View Profile
                                                    </a>

                                                    <a data-toggle="modal" data-target="#deleteModal" href="#" data-url="supplier-delete.php?id=<?= $value->id ?>" class="text-nowrap mx-1 my-1 btn btn-sm btn-danger image-delete-btn">
                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                                <td><img src="<?php echo $target_dir . $value->profile_photo ?>" style="width:100px; height:100px; border-radius:50%"></td>
                                                <td><?= $value->name ?></td>
                                                <td><a target="_blank" href="http://wa.me/<?= $value->mobile ?>"><?= $value->mobile ?></a></td>
                                                <td><?= $value->email ?></td>
                                                <td><?= $value->company_name ?></td>
                                                <td><?= $value->country ?></td>
                                                <td><?= $value->website ?></td>
                                                <td><?= textWithoutHtml($value->about, 30) ?></td>
                                                <td><?= $value->country_code ?></td>
                                                <td><?= $value->established_year ?></td>
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

                                    $sql = "SELECT COUNT(*) FROM `user` WHERE {$cond}";
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