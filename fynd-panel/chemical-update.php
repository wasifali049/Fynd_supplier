<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

if (empty($id)) {
    header('location: ./chemical-all.php');
}

$model = fetch_object($db, "SELECT * FROM `chemical` WHERE id='{$id}'");


if (isset($_POST['submit'])) {

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];

    $updated_at = date('Y-m-d H:i:s', time());

    $chemical_name = mysqli_real_escape_string($db, $chemical_name);

    $s = "UPDATE `chemical` SET 
        `chemical_name`='" . $chemical_name . "',
        `updated_at`='" . $updated_at . "',
        `updated_by`='" . $updated_by . "' WHERE id='" . $edit_id . "'";

    if (mysqli_query($db, $s)) {
        $error .= "Chemical updated successfully";
        header('location: chemical-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error.";
        header('location: chemical-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Chemical - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Update Chemical Page</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
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
                        <div class="col-md-10 mx-auto">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="my-3">

                                    <div class="border rounded shadow p-3 my-3">
                                        <h3 class="mb-2">Edit Chemical</h3>
                                        <hr>

                                        <div class="form-floating my-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" id="chemical_name" class="form-control" name="chemical_name" placeholder="Chemical Name" required value="<?= $model->chemical_name ?>" />
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