<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);
$sql = "SELECT * FROM `numak_order` WHERE id='{$id}'";
$model = fetch_object($db, $sql);

if (isset($_POST['submit'])) {
    extract($_REQUEST);
    $updated_at = date('Y-m-d H:i:s', time());
    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];
    $updated_by = $userId;
    $status = mysqli_real_escape_string($db, $status);
    $s = "UPDATE `numak_order` SET `status`='" . $status . "', `updated_at`='" . $updated_at . "' WHERE id='" . $edit_id . "'";


    if (mysqli_query($db, $s)) {
        $error .= "Order Status Updated successfully.";
        header('location: order-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error.";
        header('location: order-status-update.php?id=' . $edit_id . '&msg=' . $error . '&alert=danger');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Order Status - <?= BRANDNAME ?> Admin Panel</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Update Order Status</h1>
                    </div>
                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./order-all.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-solid fa-arrow-left"></i>
                                Back
                            </a>
                        </div>
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
                        <div class="col-md-10 mx-auto">
                            <form action="" method="post">
                                <div class="my-3">
                                    <div class="border rounded shadow p-3 my-3">
                                        <div class="form-floating my-3">
                                            <label for="status" class="form-label">Select Status</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="">select</option>
                                                <?php
                                                foreach ($orderStatusText as $orderStatusTextKey => $orderStatusTextVal) {
                                                ?>
                                                    <option value="<?= $orderStatusTextKey ?>" <?= ($orderStatusTextKey == $model->status) ? 'selected' : '' ?>><?= $orderStatusTextVal ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="hidden" name="edit_id" value="<?= $model->id ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="my-4 mx-auto">
                                    <input type="submit" name="submit" class="btn btn-success btn-block" value="UPDATE" />
                                </div>
                            </form>
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
    <!-- Comman JS Scripts -->
    <?php include('./comman/scripts.php'); ?>
</body>

</html>