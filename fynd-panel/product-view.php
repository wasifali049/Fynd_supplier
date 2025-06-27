<?php
include('../lib/bpconn.php');

include('../lib/config-details.php');

check_admin_auth();

extract($_REQUEST);



$productSql = "SELECT * FROM product WHERE id='" . $id . "'";

$productImageSql = "SELECT * FROM product_image WHERE product_id='" . $id . "'";

$productBulletSql = "SELECT * FROM product_bullets WHERE product_id='" . $id . "'";

$productDescriptionSql = "SELECT * FROM product_description WHERE product_id='" . $id . "'";

$productAdditionalInfoSql = "SELECT * FROM product_additional_info WHERE product_id='" . $id . "'";



$productModel = fetch_object($db, $productSql);

$productImageModel = fetch_all($db, $productImageSql);

$productBulletModel = fetch_all($db, $productBulletSql);

$productDescriptionModel = fetch_all($db, $productDescriptionSql);

$productAdditionalInfoModel = fetch_all($db, $productAdditionalInfoSql);



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <title>View Product Details - <?= BRANDNAME ?> Admin Panel</title>



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



                    <div class="my-3 d-flex justify-content-between align-items-center">

                        <a href="./product-all.php" class="btn btn-primary btn-sm">

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

                        <div class="col-12">

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                                <h1 class="h3 mb-0 text-gray-800">Product Info</h1>

                                <a class="btn btn-success" href="./product-edit.php?id=<?= $id ?>">Edit</a>

                            </div>

                        </div>



                        <div class="col-12">

                            <table class="table table-bordered">

                                <tr>

                                    <th scope="col">Product Category</th>

                                    <td>

                                        <?php

                                        $productCategorySql = "SELECT * FROM category WHERE id='" . $productModel->category_id . "'";

                                        $productCategoryModel = fetch_object($db, $productCategorySql);

                                        echo $productCategoryModel->cat_name;

                                        ?>



                                </tr>

                                <tr>

                                    <th scope="col">Product Name</th>

                                    <td> <?= $productModel->name ?> </td>

                                </tr>

                                <tr>

                                    <th scope="col">Product Description</th>

                                    <td> <?= $productModel->product_description ?> </td>

                                </tr>

                                <tr>

                                    <th scope="col">Price</th>

                                    <td> <?= $productModel->price ?> </td>

                                </tr>

                                <tr>

                                    <th scope="col">Quantity</th>

                                    <td> <?= $productModel->quantity ?> </td>

                                </tr>

                                <tr>

                                    <th scope="col">Size</th>

                                    <td>

                                        <?php

                                        $sizeSql = "SELECT * FROM size WHERE id IN (" . $productModel->size . ")";

                                        $sizeModel = fetch_all($db, $sizeSql);

                                        foreach ($sizeModel as $sizeKey => $sizeVal) {

                                            $sizeValue = (object) $sizeVal; ?>

                                            <span class="badge badge-pill badge-secondary"><?= $sizeValue->size_name ?></span>

                                        <?php }  ?>

                                    </td>

                                </tr>

                                <tr>

                                    <th scope="col">Color</th>

                                    <td>

                                        <?php

                                        $colorSql = "SELECT * FROM color WHERE id IN (" . $productModel->color . ")";

                                        $colorModel = fetch_all($db, $colorSql);

                                        foreach ($colorModel as $colorKey => $colorVal) {

                                            $colorValue = (object) $colorVal; ?>

                                            <span class="badge badge-pill badge-secondary" style="background-color: #<?= $colorValue->color_code ?>;"><?= $colorValue->color_name ?></span>

                                        <?php }

                                        ?>

                                    </td>

                                </tr>

                                <tr>

                                    <th scope="col">Default Size</th>

                                    <td>

                                        <?php

                                        $defaultSizeSql = "SELECT * FROM size WHERE id='" . $productModel->default_size . "'";

                                        $defaultSizeModel = fetch_object($db, $defaultSizeSql);

                                        ?>

                                        <span class="badge badge-pill badge-secondary"><?= $defaultSizeModel->size_name ?></span>

                                    </td>

                                </tr>

                                <tr>

                                    <th scope="col">Default Color</th>

                                    <td>

                                        <?php

                                        $defaultColorSql = "SELECT * FROM color WHERE id='" . $productModel->default_color . "'";

                                        $defaultColorModel = fetch_object($db, $defaultColorSql);

                                        ?>

                                        <span class="badge badge-pill badge-secondary" style="background-color: #<?= $defaultColorModel->color_code ?>;"><?= $defaultColorModel->color_name ?></span>

                                    </td>

                                </tr>

                                <tr>

                                    <th scope="col">SKU</th>

                                    <td> <?= $productModel->sku ?> </td>

                                </tr>

                                <tr>

                                    <th scope="col">Status</th>

                                    <td>

                                        <span class="badge badge-pill badge-<?= ($productModel->status == 1) ? 'success' : 'danger'; ?>"><?= ($productModel->status == 1) ? 'active' : 'deactive'; ?></span>

                                    </td>

                                </tr>

                                <tr>

                                    <th scope="col">Created At</th>

                                    <td> <?= date("d/m/Y h:m A", strtotime($productModel->created_at)) ?> </td>

                                </tr>

                            </table>

                        </div>

                    </div>



                    <div class="row">

                        <div class="col-12">

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                                <h1 class="h3 mb-0 text-gray-800">Product Image</h1>

                                <a class="btn btn-success" href="./product-image-add.php?product_id=<?= $id ?>">Add Images</a>

                            </div>

                        </div>

                        <div class="col-12">

                            <table class="table table-bordered">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Product Image</th>

                                        <th scope="col">Cover Image</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>



                                    <?php

                                    if (count($productImageModel) > 0) {

                                        $countImage = 1;

                                        $productImagePath = '../assets/images/product-image/';

                                        foreach ($productImageModel as $productImageKey => $productImageValue) { ?>

                                            <tr>

                                                <th scope="row">

                                                    <?= $countImage ?>

                                                </th>

                                                <td>

                                                    <img style="width:250px" src="<?= $productImagePath.$productImageValue['product_image']; ?>" alt="Product Image">

                                                </td>

                                                <td><?=($productImageValue['is_cover'] == 1)? 'Yes':''?></td>

                                                <td>

                                                    <a href="product-image-edit.php?id=<?= $productImageValue['id'] ?>&product_id=<?=$id?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">

                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>

                                                        Edit

                                                    </a>

                                                    <a data-toggle="modal" data-target="#deleteModal" href="#" data-url="product-image-delete.php?id=<?= $productImageValue['id'] ?>&product_id=<?=$id?>" class="mx-1 my-1 btn btn-sm btn-danger image-delete-btn text-nowrap">

                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>

                                                        Delete

                                                    </a>



                                                </td>

                                            </tr>

                                        <?php $countImage++;

                                        }

                                    } else { ?>

                                        <tr>

                                            <td colspan="4">No Product Image found!</td>

                                        </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>

                    </div>



                    <br><br>

                    <div class="row">

                        <div class="col-12">

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                                <h1 class="h3 mb-0 text-gray-800">Product Bullets Point</h1>

                                <a class="btn btn-success" href="./product-bullet-add.php?product_id=<?= $id ?>">Add Bullets Point</a>

                            </div>

                        </div>

                        <div class="col-12">

                            <table class="table table-bordered">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Product Bullet</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>



                                    <?php

                                    if (count($productBulletModel) > 0) {

                                        $countBullet = 1;

                                        foreach ($productBulletModel as $productBulletKey => $productBulletValue) { ?>

                                            <tr>

                                                <th scope="row">

                                                    <?= $countBullet ?>

                                                </th>

                                                <td><?= $productBulletValue['bullets']; ?></td>

                                                <td>

                                                    <a href="product-bullet-edit.php?id=<?= $productBulletValue['id'] ?>&product_id=<?= $id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">

                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>

                                                        Edit

                                                    </a>

                                                    <a data-toggle="modal" data-target="#deleteModal" href="#" data-url="product-bullet-delete.php?id=<?= $productBulletValue['id'] ?>&product_id=<?= $id ?>" class="mx-1 my-1 btn btn-sm btn-danger image-delete-btn text-nowrap">

                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>

                                                        Delete

                                                    </a>



                                                </td>

                                            </tr>

                                        <?php $countBullet++;

                                        }

                                    } else { ?>

                                        <tr>

                                            <td colspan="4">No Product Bullets found!</td>

                                        </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>

                    </div>



                    <br><br>

                    <div class="row">

                        <div class="col-12">

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                                <h1 class="h3 mb-0 text-gray-800">Product Description</h1>

                                <a class="btn btn-success" href="./product-description-add.php?product_id=<?= $id ?>">Add Description</a>

                            </div>

                        </div>

                        <div class="col-12">

                            <table class="table table-bordered">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Title</th>

                                        <th scope="col">Text</th>

                                        <th scope="col">Image</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>



                                    <?php

                                    if (count($productDescriptionModel) > 0) {

                                        $countDescription = 1;

                                        $descriptionImagePath = '../assets/images/product-desc-image/';

                                        foreach ($productDescriptionModel as $productDescriptionKey => $productDescriptionValue) { ?>

                                            <tr>

                                                <th scope="row">

                                                    <?= $countDescription ?>

                                                </th>

                                                <td><?= $productDescriptionValue['block_title']; ?></td>

                                                <td><?= $productDescriptionValue['block_text']; ?></td>

                                                <td><img style="width:200px" src="<?= $descriptionImagePath.$productDescriptionValue['block_image']; ?>" alt="Description Image"></td>

                                                <td>

                                                    <a href="product-description-edit.php?id=<?= $productDescriptionValue['id'] ?>&product_id=<?= $id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">

                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>

                                                        Edit

                                                    </a>

                                                    <a data-toggle="modal" data-target="#deleteModal" href="#" data-url="product-description-delete.php?id=<?= $productDescriptionValue['id'] ?>&product_id=<?= $id ?>" class="mx-1 my-1 btn btn-sm btn-danger image-delete-btn text-nowrap">

                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>

                                                        Delete

                                                    </a>



                                                </td>

                                            </tr>

                                        <?php $countDescription++;

                                        }

                                    } else { ?>

                                        <tr>

                                            <td colspan="4">No Product Description found!</td>

                                        </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>

                    </div>



                    <br><br>

                    <div class="row">

                        <div class="col-12">

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                                <h1 class="h3 mb-0 text-gray-800">Product Additional Info</h1>

                                <a class="btn btn-success" href="./product-additional-info-add.php?product_id=<?= $id ?>">Add Additional Info</a>

                            </div>

                        </div>

                        <div class="col-12">

                            <table class="table table-bordered">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Product Option</th>

                                        <th scope="col">Product Value</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>



                                    <?php

                                    if (count($productAdditionalInfoModel) > 0) {

                                        $countAdditionalInfo = 1;

                                        foreach ($productAdditionalInfoModel as $productAdditionalInfoKey => $productAdditionalInfoValue) { ?>

                                            <tr>

                                                <th scope="row">

                                                    <?= $countAdditionalInfo; ?>

                                                </th>

                                                <td><?= $productAdditionalInfoValue['p_option']; ?></td>

                                                <td><?= $productAdditionalInfoValue['p_value']; ?></td>

                                                <td>

                                                    <a href="product-additional-info-edit.php?id=<?= $productAdditionalInfoValue['id'] ?>&product_id=<?= $id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">

                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>

                                                        Edit

                                                    </a>

                                                    <a data-toggle="modal" data-target="#deleteModal" href="#" data-url="product-additional-info-delete.php?id=<?= $productAdditionalInfoValue['id'] ?>&product_id=<?= $id ?>" class="mx-1 my-1 btn btn-sm btn-danger image-delete-btn text-nowrap">

                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>

                                                        Delete

                                                    </a>



                                                </td>

                                            </tr>

                                        <?php $countAdditionalInfo++;

                                        }

                                    } else { ?>

                                        <tr>

                                            <td colspan="4">No Product Additional Information found!</td>

                                        </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

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