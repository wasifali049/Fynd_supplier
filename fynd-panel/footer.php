<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
extract($_REQUEST);
$target_dir = "../assets/img/";
$value = fetch_object($db, "SELECT * FROM `footer`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Footer - <?= BRANDNAME ?> Admin Panel</title>

    <!-- Custom Head -->
    <?php include './comman/head.php'; ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './comman/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include './comman/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Footer </h1>
                    </div>

                    <div class="my-3 d-flex justify-content-between align-items-center">
                        <a href="./index.php" class="btn btn-primary btn-sm">
                            <i class="fas fa-solid fa-arrow-left"></i>
                            Back
                        </a>
                        <a class="btn btn-success" href="./footer-edit.php">Edit</a>
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
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th scope="col">Logo</th>
                                    <td>
                                        <img src="<?= $target_dir . $value->logo ?>" style="width:100px">

                                    </td>
                                </tr>

                                <tr>
                                    <th scope="col">About</th>
                                    <td><?= $value->about ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Heading 1</th>
                                    <td><?= $value->heading1 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Link 1</th>
                                    <td><?= $value->link1 ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Text 1</th>
                                    <td><?= $value->text1 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Link 2</th>
                                    <td><?= $value->link2 ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Text 2</th>
                                    <td><?= $value->text2 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Link 3</th>
                                    <td><?= $value->link3 ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Text 3</th>
                                    <td><?= $value->text3 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Email</th>
                                    <td><?= $value->email ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Heading 2</th>
                                    <td><?= $value->heading2 ?></td>
                                </tr>


                                <tr>
                                    <th scope="col">Link 4</th>
                                    <td><?= $value->link4 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Text 4</th>
                                    <td><?= $value->text4 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Link 5</th>
                                    <td><?= $value->link5 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Text 5</th>
                                    <td><?= $value->text5 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Link 6</th>
                                    <td><?= $value->link6 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Text 6</th>
                                    <td><?= $value->text6 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Link 7</th>
                                    <td><?= $value->link7 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Text 7</th>
                                    <td><?= $value->text7 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Link 8</th>
                                    <td><?= $value->link8 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Text 8</th>
                                    <td><?= $value->text8 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Link 9</th>
                                    <td><?= $value->link9 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Text 9</th>
                                    <td><?= $value->text9 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Heading 3</th>
                                    <td><?= $value->heading3 ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Address</th>
                                    <td><?= $value->address ?></td>
                                </tr>

                                <tr>
                                    <th scope="col">Copyright</th>
                                    <td><?= $value->copyright ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include './comman/footer.php'; ?>
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
    <?php include './comman/logout-modal.php' ?>

    <!-- Delete Modal-->
    <?php include './comman/delete-modal.php' ?>

    <!-- Comman JS Scripts -->
    <?php include './comman/scripts.php'; ?>
    <script src="./js/deleteModal.js"></script>

</body>

</html>