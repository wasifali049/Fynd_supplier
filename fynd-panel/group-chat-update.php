<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

if (empty($id)) {
    header('location: ./group-chat-all.php');
}

$model = fetch_object($db, "SELECT * FROM `group_chat` WHERE id='{$id}'");

$userModel = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$model->uid}'");


$countryModel = get_country_list($db);


if (isset($_POST['submit'])) {

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];

    $updated_at = date('Y-m-d H:i:s', time());

    $edit_id = mysqli_real_escape_string($db, $edit_id);
    $uid = mysqli_real_escape_string($db, $uid);

    $name = mysqli_real_escape_string($db, $name);
    $country_code = mysqli_real_escape_string($db, $country_code);
    $mobile = mysqli_real_escape_string($db, $mobile);
    $message = mysqli_real_escape_string($db, $message);

    $mobile = $country_code . $mobile;

    $newUserModel = fetch_object($db, "SELECT * FROM `user` WHERE mobile='{$mobile}'");
    $countryModel = fetch_object($db, "SELECT * FROM `country` WHERE `phonecode`='{$country_code}'");

    if (!empty($newUserModel) && !empty($newUserModel->id)) {
        if ($newUserModel->id != $uid) {
            $user_id = $newUserModel->id;
        } else {
            $user_id = $uid;
        }
    } else {

        $userSlug = generateRandomKey();
        $userSql = "`profile_photo`, `name`, `mobile`, `user_type`, `country`, `country_code`, `slug`, `created_at`";
        $userSqlVal = "'profile.png', '{$name}', '{$mobile}', 'buyer', '{$countryModel->nicename}' ,'{$country_code}', '{$userSlug}', '{$updated_at}'";
        mysqli_query($db, "INSERT INTO `user` ({$userSql}) VALUE ({$userSqlVal})");
        $user_id = mysqli_insert_id($db);
    }

    $s = "UPDATE `group_chat` SET 
        `uid`='" . $user_id . "',
        `message`='" . $message . "',
        `updated_at`='" . $updated_at . "',
        `updated_by`='" . $updated_by . "' WHERE id='" . $edit_id . "'";

    if (mysqli_query($db, $s)) {
        $error .= "Chat updated successfully";
        header('location: group-chat-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error.";
        header('location: group-chat-update.php?id=' . $id . '&msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Group Chat - <?= BRANDNAME ?> Admin Panel</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Update Group Chat</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./group-chat-all.php" class="btn btn-primary btn-sm">
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

                                        <div class="form-floating my-3">

                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Enter Name" required value="<?= $userModel->name ?>" />
                                        </div>



                                        <div class="form-floating mb-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="mobile" class="form-label mobile-label">Mobile (Whatsapp)</label>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="d-flex">
                                                        <select class="form-control combined-mobile" name="country_code">
                                                            <?php
                                                            foreach ($countryModel as $countryKey1 => $countryVal1) {
                                                                $countryValue1 = (object) $countryVal1;
                                                            ?>
                                                                <option value="<?= $countryValue1->phonecode ?>" <?= ($countryValue1->phonecode == $userModel->country_code) ? 'selected' : '' ?>>+<?= $countryValue1->phonecode ?> - <?= $countryValue1->name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <input type="tel" id="mobile" class="form-control" name="mobile" placeholder="Mobile (Whatsapp)" value="<?= getOriginalMobile($userModel->mobile, $userModel->country_code) ?>" required />
                                                    </div>
                                                    <div class="showErr"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea id="content" class="form-control" name="message" placeholder="Enter Message" cols="30" rows="5" required><?= $model->message ?></textarea>
                                        </div>

                                        <input type="hidden" name="edit_id" value="<?= $model->id ?>">
                                        <input type="hidden" name="uid" value="<?= $userModel->id ?>">

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