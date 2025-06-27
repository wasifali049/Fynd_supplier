<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');
check_auth();
extract($_REQUEST);

$id = get_user_id();
$userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$id}'");


$targetDir = './assets/img/profile/';
$targetDir2 = './assets/img/chemical/';

$limit = 20;

if (isset($_GET["page"])) {

    $pn  = $_GET["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;

$model = fetch_all($db, "SELECT * FROM `inquiry` WHERE `supplier_id`='{$id}' ORDER BY id DESC LIMIT $startFrom, $limit");


?>

<!doctype html>
<html lang="en">

<head>

    <title><?= $userModel->name ?> Profile - Oilfiled Chemical</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="./assets/css/profile.css">

</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section profile-section site-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <div class="main-profile-overview widget-user-image text-center">
                                    <div class="main-img-user">
                                        <img alt="avatar" src="<?= $targetDir . $userModel->profile_photo ?>">
                                    </div>
                                </div>
                                <div class="item-user pro-user">
                                    <h4 class="pro-user-username text-dark mt-2 mb-0"><?= $userModel->name ?></h4>
                                    <p class="pro-user-desc text-muted mb-1">(<?= $userModel->user_type ?>)</p>
                                </div>
                            </div>
                        </div>

                        <div class="card custom-card">
                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div>
                                    <h6 class="card-title mb-0">Contact Information</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="main-profile-contact-list main-profile-work-list">
                                    <div class="media">
                                        <div class="media-logo bg-light text-dark"> <i class="bi bi-phone"></i> </div>
                                        <div class="media-body"> <span>Mobile</span>
                                            <div> <?= $userModel->mobile ?> </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-logo bg-light text-dark"> <i class="bi bi-envelope"></i> </div>
                                        <div class="media-body"> <span>Email</span>
                                            <div> <?= $userModel->email ?> </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-logo bg-light text-dark"> <i class="bi bi-globe"></i> </div>
                                        <div class="media-body"> <span>Country</span>
                                            <div> <?= $userModel->country ?> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card custom-card">
                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div>
                                    <h6 class="card-title mb-0">Navigation</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="./blog-post" class="oc-btn">Post Blog</a>
                            </div>
                        </div>
                    </div>



                    <?php if ($userModel->user_type == 'supplier') { ?>
                        <div class="col-xl-8 col-md-12">


                            <div class="card custom-card main-content-body-profile">

                                <div class="card-header custom-card-header rounded-bottom-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title mb-0 ">Inquiry List</h6>
                                    </div>
                                </div>

                                <div class="card-body tab-content h-100">
                                    <div class="row">
                                        <div class="col-12" style="width:100%;overflow: auto;">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Buyer Name</th>
                                                        <th scope="col">Buyer Number</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">price</th>
                                                        <th scope="col">Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    if (count($model) > 0) {
                                                        $j = 1;
                                                        foreach ($model as $key => $value) {
                                                            $inquiryValue = (object) $value;
                                                            $buyerModel = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$inquiryValue->buyer_id}'");

                                                    ?>

                                                            <tr>

                                                                <td scope="row">

                                                                    <?php echo ($pn > 1) ? (20 * ($pn - 1) + $j) : $j; ?>

                                                                </td>
                                                                <td><?= $buyerModel->name ?></td>
                                                                <td><a target="_blank" href="http://wa.me/<?= $buyerModel->mobile ?>"><?= $buyerModel->mobile ?></a></td>
                                                                <td><?= $inquiryValue->product_name ?></td>
                                                                <td><?= $inquiryValue->price ?></td>
                                                                <td><?= date("d/m/y h:m:s a", strtotime($inquiryValue->created_at)) ?></td>
                                                            </tr>
                                                        <?php $j++;
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="4">No Inquiry found!</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-12">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination pagination-sm">
                                                    <?php

                                                    $sql = "SELECT COUNT(*) FROM `inquiry`";
                                                    $rs_result = mysqli_query($db, $sql);
                                                    $row = mysqli_fetch_row($rs_result);
                                                    $total_records = $row[0];

                                                    $total_pages = ceil($total_records / $limit);
                                                    $pagLink = "";
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        if ($i == $pn) {
                                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='inquiry-panel.php?page="

                                                                . $i . "'>" . $i . "</a></li>";
                                                        } else {
                                                            $pagLink .= "<li class='page-item'><a class='page-link' href='inquiry-panel.php?page=" . $i . "'>

                                                " . $i . "</a></li>";
                                                        }
                                                    };

                                                    echo $pagLink;
                                                    ?>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>


    </main>

    <?php include('./common/footer.php') ?>
    <?php include('./common/social-link.php') ?>
    <?php include('./common/modal.php') ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script> -->

    <?php include('./common/script.php') ?>
    <!-- javascript -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="./assets/js/pages/user-edit.js"></script>

</body>

</html>