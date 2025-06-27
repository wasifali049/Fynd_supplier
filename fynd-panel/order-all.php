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



$categoryQuery = "SELECT * FROM numak_order ORDER by id DESC LIMIT $startFrom, $limit";

$categorySql = mysqli_query($db, $categoryQuery);

$imageArray = (mysqli_num_rows($categorySql) > 0) ? mysqli_fetch_all($categorySql, MYSQLI_ASSOC) : [];

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <title>All Order - <?= BRANDNAME ?> Admin Panel</title>



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

                        <h1 class="h3 mb-0 text-gray-800">All Order</h1>

                    </div>



                    <div class="my-3 d-flex justify-content-between align-items-center">

                        <a href="./index.php" class="btn btn-primary btn-sm">

                            <i class="fas fa-solid fa-arrow-left"></i>

                            Back

                        </a>



                    </div>



                    <?php if (!empty($alert) && !empty($msg)) { ?>

                        <div class="row">

                            <div class="col-md-8">

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

                        <div class="col-12 overflow-auto">

                            <table class="table table-bordered">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Order ID</th>

                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Coupon</th>

                                        <th scope="col">User</th>

                                        <th scope="col">Payment Status</th>

                                        <th scope="col">Payment Status</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>



                                    <?php

                                    if (count($imageArray) > 0) {

                                        $j = 1;

                                        foreach ($imageArray as $key => $value) {

                                            $valueobject = (object) $value;

                                            $sql1 = "SELECT * FROM payment_details WHERE order_id='" . $value['order_id'] . "'";

                                            $que1 = mysqli_query($db, $sql1);

                                            $num1 = mysqli_num_rows($que1);

                                            $orderStatus = $orderStatusText[$value['status']];
                                            $orderStatusColor1 = $orderStatusColor[$value['status']];

                                            $paymentStatus = ($num1 == 0) ? 'Pending' : 'Success';
                                            $paymentStatusColor = ($num1 == 0) ? 'warning' : 'success';

                                            $couponModel = fetch_object($db, "SELECT * FROM `numak_order_coupon` WHERE order_id='{$valueobject->id}'");

                                            $coupon_code = !empty($couponModel) ? $couponModel->code : '';

                                    ?>

                                            <tr>

                                                <th scope="row">

                                                    <?php echo ($pn > 1) ? (20 * ($pn - 1) + $j) : $j; ?>

                                                </th>

                                                <td><?= $value['order_id']; ?></td>

                                                <td>Rs. <?= $value['amount']; ?>/-</td>
                                                <td>Rs. <?= $value['discount']; ?>/-</td>
                                                <td>Rs. <?= $value['total']; ?>/-</td>
                                                <td><?= $coupon_code ?></td>

                                                <td><?= getUser($value['user_id'], $db)->name; ?></td>

                                                <td><span class="badge badge-<?= $paymentStatusColor ?>"><?= $paymentStatus ?></span></td>
                                                <td><span class="badge badge-<?= $orderStatusColor1 ?>"><?= $orderStatus ?></span></td>

                                                <td>

                                                    <a href="order-view.php?id=<?= $value['id'] ?>" class="mx-1 my-1 btn btn-sm btn-primary">

                                                        <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>

                                                        View

                                                    </a>
                                                    <a href="order-status-update.php?id=<?= $value['id'] ?>" class="mx-1 my-1 btn btn-sm btn-success">
                                                        <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Order Status
                                                    </a>

                                                    <a href="view-invoice.php?id=<?= $value['id'] ?>" target="_BLANK" class="mx-1 my-1 btn btn-sm btn-secondary">
                                                        <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Print
                                                    </a>

                                                </td>

                                            </tr>

                                        <?php $j++;
                                        }
                                    } else { ?>

                                        <tr>

                                            <td colspan="4">No Order found!</td>

                                        </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>

                        <div class="col-12">



                            <nav aria-label="Page navigation example">

                                <ul class="pagination pagination-sm">

                                    <?php

                                    $sql = "SELECT COUNT(*) FROM numak_order";

                                    $rs_result = mysqli_query($db, $sql);

                                    $row = mysqli_fetch_row($rs_result);

                                    $total_records = $row[0];



                                    // Number of pages required.

                                    $total_pages = ceil($total_records / $limit);

                                    $pagLink = "";

                                    for ($i = 1; $i <= $total_pages; $i++) {

                                        if ($i == $pn) {



                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='order-all.php?page="

                                                . $i . "'>" . $i . "</a></li>";
                                        } else {



                                            $pagLink .= "<li class='page-item'><a class='page-link' href='order-all.php?page=" . $i . "'>

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