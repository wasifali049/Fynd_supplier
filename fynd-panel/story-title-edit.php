<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

$model = fetch_object($db, "SELECT * FROM `fynd_story_title`");

if (isset($_POST['submit'])) {

    $updated_at = date('Y-m-d H:i:s', time());

    $title1 = mysqli_real_escape_string($db, $title1);
    $title2 = mysqli_real_escape_string($db, $title2);
    $title3 = mysqli_real_escape_string($db, $title3);
    $title4 = mysqli_real_escape_string($db, $title4);

    $s = "UPDATE `fynd_story_title` SET `title1`='{$title1}', `title2`='{$title2}', `title3`='{$title3}', `title4`='{$title4}', `updated_at`='{$updated_at}' WHERE id='{$edit_id}'";

    if (mysqli_query($db, $s)) {
        $error .= "Story Title Updated successfully.";
        header('location: story-all.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error.";
        header('location: story-title-edit.php?id=' . $id . '&msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Story Title - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Story Title</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./story-all.php" class="btn btn-primary btn-sm">
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
                                        <h3 class="mb-2">Edit Titles</h3>
                                        <hr>

                                        <div class="form-floating my-3">
                                            <label for="pageTitle1" class="form-label">Story Title</label>
                                            <input type="text" id="pageTitle1" class="form-control" name="title1" placeholder="Title" required value="<?= $model->title1 ?>" />
                                        </div>
                                        
                                        <div class="form-floating my-3">
                                            <label for="pageTitle3" class="form-label">Story Sub Title</label>
                                            <input type="text" id="pageTitle3" class="form-control" name="title3" placeholder="Sub Title"  value="<?= $model->title3 ?>" />
                                        </div>
                                        
                                        <hr>

                                        <div class="form-floating my-3">
                                            <label for="pageTitle2" class="form-label">Search Chemical Section Title 2</label>
                                            <input type="text" id="pageTitle2" class="form-control" name="title2" placeholder="Title" required value="<?= $model->title2 ?>" />
                                        </div>
                                        
                                       
                                        
                                        <div class="form-floating my-3">
                                            <label for="pageTitle4" class="form-label">Search Chemical Section Sub Title 2</label>
                                            <input type="text" id="pageTitle4" class="form-control" name="title4" placeholder="Sub Title"  value="<?= $model->title4 ?>" />
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