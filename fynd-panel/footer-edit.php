<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);

$model = fetch_object($db, "SELECT * FROM footer");

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    $user = $_SESSION['adminUser'];
    $userId = $user['user_id'];

    $updated_at = date('Y-m-d H:i:s', time());

    $userId = $user['user_id'];
    $updated_by = $userId;

    $about = mysqli_real_escape_string($db, $about);

    $heading1 = mysqli_real_escape_string($db, $heading1);

    $link1 = mysqli_real_escape_string($db, $link1);
    $text1 = mysqli_real_escape_string($db, $text1);

    $link2 = mysqli_real_escape_string($db, $link2);
    $text2 = mysqli_real_escape_string($db, $text2);

    $link3 = mysqli_real_escape_string($db, $link3);
    $text3 = mysqli_real_escape_string($db, $text3);


    $email = mysqli_real_escape_string($db, $email);

    $heading2 = mysqli_real_escape_string($db, $heading2);

    $link4 = mysqli_real_escape_string($db, $link4);
    $text4 = mysqli_real_escape_string($db, $text4);

    $link5 = mysqli_real_escape_string($db, $link5);
    $text5 = mysqli_real_escape_string($db, $text5);

    $link6 = mysqli_real_escape_string($db, $link6);
    $text6 = mysqli_real_escape_string($db, $text6);

    $link7 = mysqli_real_escape_string($db, $link7);
    $text7 = mysqli_real_escape_string($db, $text7);

    $link8 = mysqli_real_escape_string($db, $link8);
    $text8 = mysqli_real_escape_string($db, $text8);

    $link9 = mysqli_real_escape_string($db, $link9);
    $text9 = mysqli_real_escape_string($db, $text9);

    $heading3 = mysqli_real_escape_string($db, $heading3);

    $address = mysqli_real_escape_string($db, $address);
    $copyright = mysqli_real_escape_string($db, $copyright);

    $iName = '';

    //`logo`='{$iName}',
    $s = "UPDATE `footer` SET 
        `about`='{$about}',
        `heading1`='{$heading1}',
        `link1`='{$link1}',
        `text1`='{$text1}',
        `link2`='{$link2}',
        `text2`='{$text2}',
        `link3`='{$link3}',
        `text3`='{$text3}',
        `email`='{$email}',
        `heading2`='{$heading2}',
        `link4`='{$link4}',
        `text4`='{$text4}',
        `link5`='{$link5}',
        `text5`='{$text5}',
        `link6`='{$link6}',
        `text6`='{$text6}',
        `link7`='{$link7}',
        `text7`='{$text7}',
        `link8`='{$link8}',
        `text8`='{$text8}',
        `link9`='{$link9}',
        `text9`='{$text9}',
        `heading3`='{$heading3}',
        `address`='{$address}',
        `copyright`='{$copyright}',
        `updated_at`='{$updated_at}',
        `updated_by`='{$updated_by}'
        WHERE id='" . $id . "'";

    if (mysqli_query($db, $s)) {
        $error .= "Footer Updated successfully.";
        header('location: footer.php?msg=' . $error . '&alert=success');
    } else {
        $error .= "Internal Server Error.";
        header('location: footer-edit.php?id=' . $edit_id . '&msg=' . $error . '&alert=danger');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Footer - <?= BRANDNAME ?> Admin Panel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Footer</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <a href="./footer.php" class="btn btn-primary btn-sm">
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="my-3">

                                    <div class="border rounded shadow p-3 my-3">
                                        <h3 class="mb-2">Contact Info</h3>
                                        <hr>

                                        <div class="form-floating my-3">
                                            <label for="about" class="form-label">About</label>
                                            <textarea type="text" id="about" class="form-control" name="about" placeholder="About" cols="20" rows="3"><?= $model->about ?></textarea>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="heading1" class="form-label">Heading 1</label>
                                            <input type="text" id="heading1" class="form-control" name="heading1" placeholder="Heading 1" required value="<?= $model->heading1 ?>" />
                                        </div>



                                        <div class="form-floating my-3">
                                            <label for="link1" class="form-label">Link 1</label>
                                            <input type="text" id="link1" class="form-control" name="link1" placeholder="Link 1" required value="<?= $model->link1 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text1" class="form-label">Text 1</label>
                                            <input type="text" id="text1" class="form-control" name="text1" placeholder="Text 1" required value="<?= $model->text1 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="link2" class="form-label">Link 2</label>
                                            <input type="text" id="link2" class="form-control" name="link2" placeholder="Link 2" required value="<?= $model->link2 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text2" class="form-label">Text 2</label>
                                            <input type="text" id="text2" class="form-control" name="text2" placeholder="Text 2" required value="<?= $model->text2 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="link3" class="form-label">Link 3</label>
                                            <input type="text" id="link3" class="form-control" name="link3" placeholder="Link 3" required value="<?= $model->link3 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text3" class="form-label">Text 3</label>
                                            <input type="text" id="text3" class="form-control" name="text3" placeholder="Text 3" required value="<?= $model->text3 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required value="<?= $model->email ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="heading2" class="form-label">Heading 2</label>
                                            <input type="text" id="heading2" class="form-control" name="heading2" placeholder="Heading 2" required value="<?= $model->heading2 ?>" />
                                        </div>



                                        <div class="form-floating my-3">
                                            <label for="link4" class="form-label">Link 4</label>
                                            <input type="text" id="link4" class="form-control" name="link4" placeholder="Link 4" required value="<?= $model->link4 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text4" class="form-label">Text 4</label>
                                            <input type="text" id="text4" class="form-control" name="text4" placeholder="Text 4" required value="<?= $model->text4 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="link5" class="form-label">Link 5</label>
                                            <input type="text" id="link5" class="form-control" name="link5" placeholder="Link 5" required value="<?= $model->link5 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text5" class="form-label">Text 5</label>
                                            <input type="text" id="text5" class="form-control" name="text5" placeholder="Text 5" required value="<?= $model->text5 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="link6" class="form-label">Link 6</label>
                                            <input type="text" id="link6" class="form-control" name="link6" placeholder="Link 6" required value="<?= $model->link6 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text6" class="form-label">Text 6</label>
                                            <input type="text" id="text6" class="form-control" name="text6" placeholder="Text 6" required value="<?= $model->text6 ?>" />
                                        </div>


                                        <div class="form-floating my-3">
                                            <label for="link7" class="form-label">Link 7</label>
                                            <input type="text" id="link7" class="form-control" name="link7" placeholder="Link 7" required value="<?= $model->link7 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text7" class="form-label">Text 7</label>
                                            <input type="text" id="text7" class="form-control" name="text7" placeholder="Text 7" required value="<?= $model->text7 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="link8" class="form-label">Link 8</label>
                                            <input type="text" id="link8" class="form-control" name="link8" placeholder="Link 8" required value="<?= $model->link8 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text8" class="form-label">Text 8</label>
                                            <input type="text" id="text8" class="form-control" name="text8" placeholder="Text 8" required value="<?= $model->text8 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="link9" class="form-label">Link 9</label>
                                            <input type="text" id="link9" class="form-control" name="link9" placeholder="Link 9" required value="<?= $model->link9 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="text9" class="form-label">Text 9</label>
                                            <input type="text" id="text9" class="form-control" name="text9" placeholder="Text 9" required value="<?= $model->text9 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="heading3" class="form-label">Heading 3</label>
                                            <input type="text" id="heading3" class="form-control" name="heading3" placeholder="Heading 3" required value="<?= $model->heading3 ?>" />
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea type="text" id="address" class="form-control" name="address" placeholder="Address" cols="20" rows="3"><?= $model->address ?></textarea>
                                        </div>

                                        <div class="form-floating my-3">
                                            <label for="copyright" class="form-label">Copyright</label>
                                            <input type="text" id="copyright" class="form-control" name="copyright" placeholder="Copyright" required value="<?= $model->copyright ?>" />
                                        </div>



                                        <input type="hidden" name="id" required value="<?= $model->id ?>" />


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