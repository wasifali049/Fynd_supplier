<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

$supplierChemicalModel = get_supplier_chemical_list($db);

$allUserModel = fetch_all($db, "SELECT * FROM `user` WHERE status='1'");

if (empty($id)) {
    header('location: ./home-buyer-supplier-inquiry.php');
}

$model = fetch_object($db, "SELECT * FROM `home_buyer_supplier_inquiry` WHERE id='{$id}'");


$dbUserArr = explode(',', $model->uid);


$countryModel = get_country_list($db);


if (isset($_POST['submit'])) {

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];

    $updated_at = date('Y-m-d H:i:s', time());

    $edit_id = mysqli_real_escape_string($db, $edit_id);
    $user_id = $_REQUEST['user_id'];
    $chemical = mysqli_real_escape_string($db, $chemical);
    $who_to_contact = mysqli_real_escape_string($db, $who_to_contact);
    $destination = mysqli_real_escape_string($db, $destination);
    $details = mysqli_real_escape_string($db, $details);

    $uid = implode(',', $user_id);


    $s = "UPDATE `home_buyer_supplier_inquiry` SET 
        `uid`='" . $uid . "',
        `chemical`='" . $chemical . "',
        `who_to_contact`='" . $who_to_contact . "',
        `destination`='" . $destination . "',
        `details`='" . $details . "',
        `updated_at`='" . $updated_at . "'
        WHERE id='" . $edit_id . "'";


    if (mysqli_query($db, $s)) {
        $error .= "Inquiry updated successfully";
        header('location: home-buyer-supplier-inquiry.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error.";
        header('location: home-buyer-supplier-inquiry-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Home Inquiry - <?= BRANDNAME ?> Admin Panel</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Update Inquiry</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./home-buyer-supplier-inquiry.php" class="btn btn-primary btn-sm">
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
                                        <h3 class="mb-2">Edit Group Chat Message</h3>
                                        <hr>

                                        <label for="text" class="form-label home-inq-user-label w-100 text-start">Buyer/Supplier (Note: Select Multiple user by pressing Control Button)</label>
                                        <select class="form-select px-1 form-control my-3" id="home-inq-user" name="user_id[]" required multiple>
                                            <?php
                                            foreach ($allUserModel as $userKey4 => $userVal4) {
                                                $userValue4 = (object) $userVal4;

                                                $findkey = array_search($userValue4->id, $dbUserArr);

                                                $is_User_selected = false;
                                                if ($findkey !== false) {
                                                    unset($dbUserArr[$findkey]);
                                                    $is_User_selected = true;
                                                }
                                            ?>
                                                <option value="<?= $userValue4->id ?>" <?= $is_User_selected ? 'selected':''?>><?= $userValue4->name ?></option>
                                            <?php } ?>
                                        </select>



                                        <label for="text" class="form-label home-inq-chemical-label w-100 text-start">Choose Chemical</label>
                                        <select class="form-select px-1 form-control my-3" id="home-inq-chemical" name="chemical" required>
                                            <?php
                                            foreach ($supplierChemicalModel as $chemicalKey4 => $chemicalVal4) {
                                                $chemicalValue4 = (object) $chemicalVal4;
                                            ?>
                                                <option value="<?= $chemicalValue4->product_name ?>" <?= $chemicalValue4->product_name == $model->chemical ? 'selected':''?>><?= $chemicalValue4->product_name ?></option>
                                            <?php } ?>
                                        </select>


                                        <div class="form-floating my-3">

                                            <label for="home-inq-who_to_contact" class="form-label home-inq-who_to_contact-label w-100 text-start">Who to Contact</label>
                                            <select class="form-select form-control" id="home-inq-who_to_contact" name="who_to_contact" required>
                                                <option value="Buyer" <?= $model->who_to_contact == 'Buyer' ? 'selected' : '' ?>>Buyer</option>
                                                <option value="Supplier" <?= $model->who_to_contact == 'Supplier' ? 'selected' : '' ?>>Supplier</option>
                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="mobile" class="form-label mobile-label">Country</label>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <select class="form-control combined-mobile" name="destination">
                                                        <option value="all" <?= ('all' == $model->destination) ? 'selected' : '' ?>>All</option>
                                                            <?php
                                                            foreach ($countryModel as $countryKey1 => $countryVal1) {
                                                                $countryValue1 = (object) $countryVal1;
                                                            ?>
                                                                <option value="<?= $countryValue1->nicename ?>" <?= ($countryValue1->nicename == $model->destination) ? 'selected' : '' ?>><?= $countryValue1->name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="showErr"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="content" class="form-label">Details</label>
                                            <textarea id="content" class="form-control" name="details" placeholder="Enter Message" cols="30" rows="5" required><?= $model->details ?></textarea>
                                        </div>

                                        <input type="hidden" name="edit_id" value="<?= $model->id ?>">

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

            <script src="https://cdn.tiny.cloud/1/ll17ereycqofre4fs1z8yd5stdfp3c5shtio7f84jcdm55ut/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


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