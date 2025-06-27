<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');

check_admin_auth();

extract($_REQUEST);

$model = fetch_all($db, "SELECT * FROM `inquiry_offer` WHERE type='inquiry' AND status=1 ORDER BY id DESC");

$quotationAlignment = fetch_object($db, "SELECT * FROM `quotation_alignment` WHERE id='{$id}'");

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

    $s = "UPDATE `quotation_alignment` SET 
        `box1`='" . $box1 . "',
        `box2`='" . $box2 . "',
        `box3`='" . $box3 . "',
        `updated_at`='" . $updated_at . "'
        WHERE id='" . $id . "'";

    if (mysqli_query($db, $s)) {
        $error .= "Quotation Alignment saved successfully";
        header('location: quotation-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error.";
        header('location: quotation-alignment-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Quotation Alignment - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Add Quotation Alignment Page</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./quotation-all.php" class="btn btn-primary btn-sm">
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
                                        <h3 class="mb-2">Quotation Alignment</h3>
                                        <hr>

                                        <div class="form-floating my-3">
                                            <label for="title" class="form-label">Box 1</label>
                                            <select name="box1" class="form-control" required>
                                                <?php
                                                foreach ($model as $userKey1 => $userVal1) {
                                                    $userValue1 = (object) $userVal1;
                                                    $userModel1 = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$userValue1->uid}'");
                                                    $selected1 = ($quotationAlignment->box1 == $userValue1->id) ? 'selected' : '';
                                                    echo "<option value='{$userValue1->id}' {$selected1}>{$userValue1->chemical} - {$userModel1->name} - {$userValue1->created_at}</option>";
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
                                                    $userModel2 = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$userValue2->uid}'");
                                                    $selected2 = ($quotationAlignment->box2 == $userValue2->id) ? 'selected' : '';
                                                    echo "<option value='{$userValue2->id}' {$selected2}>{$userValue2->chemical} - {$userModel2->name} - {$userValue2->created_at}</option>";
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
                                                    $userModel3 = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$userValue3->uid}'");
                                                    $selected3 = ($quotationAlignment->box3 == $userValue3->id) ? 'selected' : '';
                                                    echo "<option value='{$userValue3->id}' {$selected3}>{$userValue3->chemical} - {$userModel3->name} - {$userValue3->created_at}</option>";
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