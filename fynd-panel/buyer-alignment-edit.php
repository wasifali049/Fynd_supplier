<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();

extract($_REQUEST);

$model = fetch_all($db, "SELECT * FROM `user` WHERE user_type='buyer' AND status=1 ORDER BY id DESC");

$buyerAlignment = fetch_object($db, "SELECT * FROM `buyer_alignment` WHERE id='{$id}'");

extract($_REQUEST);

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];
    $updated_by = $userId;

    $updated_at = date('Y-m-d H:i:s', time());

    $box1 = mysqli_real_escape_string($db, $box1);
    $box2 = mysqli_real_escape_string($db, $box2);
    $box3 = mysqli_real_escape_string($db, $box3);
    $box4 = mysqli_real_escape_string($db, $box4);

    $s = "UPDATE `buyer_alignment` SET 
        `box1`='" . $box1 . "',
        `box2`='" . $box2 . "',
        `box3`='" . $box3 . "',
        `box4`='" . $box4 . "',
        `updated_at`='" . $updated_at . "'
        WHERE id='" . $id . "'";

    if (mysqli_query($db, $s)) {
        $error .= "Buyer Alignment saved successfully";
        header('location: buyer-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error.";
        header('location: buyer-alignment-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Buyer Alignment - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Add Buyer Alignment Page</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./buyer-all.php" class="btn btn-primary btn-sm">
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
                            <form action="" method="post">
                                <div class="my-3">

                                    <div class="border rounded shadow p-3 my-3">
                                        <h3 class="mb-2">Buyer Alignment</h3>
                                        <hr>

                                        <div class="form-floating my-3">
                                            <label for="title" class="form-label">Box 1</label>
                                            <select name="box1" class="form-control" required>
                                                <?php
                                                foreach ($model as $userKey1 => $userVal1) {
                                                    $userValue1 = (object) $userVal1;
                                                    $selected1 = ($buyerAlignment->box1 == $userValue1->id) ? 'selected' : '';
                                                    echo "<option value='{$userValue1->id}' {$selected1}>{$userValue1->name} - {$userValue1->mobile}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="title" class="form-label">Box 2</label>
                                            <select name="box2" class="form-control" required>
                                                <?php
                                                foreach ($model as $userKey2 => $userVal2) {
                                                    $userValue2 = (object) $userVal2;
                                                    $selected2 = ($buyerAlignment->box2 == $userValue2->id) ? 'selected' : '';
                                                    echo "<option value='{$userValue2->id}' {$selected2}>{$userValue2->name} - {$userValue2->mobile}</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="title" class="form-label">Box 3</label>
                                            <select name="box3" class="form-control" required>
                                                <?php
                                                foreach ($model as $userKey3 => $userVal3) {
                                                    $userValue3 = (object) $userVal3;
                                                    $selected3 = ($buyerAlignment->box3 == $userValue3->id) ? 'selected' : '';
                                                    echo "<option value='{$userValue3->id}' {$selected3}>{$userValue3->name} - {$userValue3->mobile}</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="title" class="form-label">Box 4</label>
                                            <select name="box4" class="form-control" required>
                                                <?php
                                                foreach ($model as $userKey4 => $userVal4) {
                                                    $userValue4 = (object) $userVal4;
                                                    $selected4 = ($buyerAlignment->box4 == $userValue4->id) ? 'selected' : '';
                                                    echo "<option value='{$userValue4->id}' {$selected4}>{$userValue4->name} - {$userValue4->mobile}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="my-4 mx-auto">
                                    <input type="submit" name="submit" class="btn btn-success btn-block" value="SAVE" />
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