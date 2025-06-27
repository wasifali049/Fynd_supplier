<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
check_admin_auth();
$groupChat = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `group_chat`"));
$supplier = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `user_type`='supplier'"));
$buyer = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `user_type`='buyer'"));
$faq = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `faq`"));
$feedback = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `feedback`"));
$chemical = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `chemical`"));
$supplierChemical = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `supplier_chemical_list`"));
$inquiry = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `inquiry_offer` WHERE `type`='inquiry'"));
$offer = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `inquiry_offer` WHERE `type`='offer'"));
$blog = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `blog`"));
$homeBanner = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `home_banner`"));

$supplierInquiry = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `inquiry`"));
$contactInquiry = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `contact_inquiry`"));
// $banner = mysqli_num_rows(mysqli_query($db, "SELECT * FROM homepage_banner"));
// $order = mysqli_num_rows(mysqli_query($db, "SELECT * FROM numak_order"));
// $review = mysqli_num_rows(mysqli_query($db, "SELECT * FROM product_review"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard - <?= BRANDNAME ?> Admin Panel</title>
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">


                        <div class="col-md-4 mb-4">
                            <a href="./home-banner-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Homepage Banner</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $homeBanner ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>



                        <div class="col-md-4 mb-4">
                            <a href="./group-chat-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Group Chat</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $groupChat ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4">
                            <a href="./supplier-all" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Supplier</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $supplier ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4">
                            <a href="./buyer-all" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Buyer</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $buyer ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./supplier-inquiry-all" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Product Inquiry</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $supplierInquiry ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./contact-inquiry-all" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Contact Inquiry</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $contactInquiry ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4">
                            <a href="./faq-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    FAQ</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $faq ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-boxs fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4">
                            <a href="./feedback-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Feedback</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $feedback ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-palette fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./chemical-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Chemical</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $chemical ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-palette fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./supplier-chemical-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Supplier Chemical</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $supplierChemical ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-palette fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./quotation-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Quotation Inquiry</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $inquiry ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-expand fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./offer-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Send Offers to Buyers</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $offer ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-expand fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4 mb-4">
                            <a href="./blog-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Blog</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $blog ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-percentage fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- <div class="col-md-4 mb-4">
                            <a href="./blog-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Blog</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $blog ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-percentage fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->

                        <?php /*
                        <div class="col-md-4 mb-4">
                            <a href="./homebanner-all.php" class="text-decoration-none">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Home Banner</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $banner ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-images fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4">
                            <a href="./order-all.php" class="text-decoration-none">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Order</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bags-shopping fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-4">
                            <a href="./review-all.php" class="text-decoration-none">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Review</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $review ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bags-shopping fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>*/ ?>


                        <div class="col-md-4 mb-4">
                            <a href="./message-panel.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Message Panel</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./footer.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Footer</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <a href="./basic-page-seo.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Basic Page SEO</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./supplier-page-seo.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Supplier Page SEO</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./inquiry-offer-page-seo.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Inquiry/Offer Page SEO</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./head-script.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Head Script</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./home-head-script.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                   Home Head Script</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>



                        <div class="col-md-4 mb-4">
                            <a href="./short-on-time-inquiry.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                   Short On Time Inquiry</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4 mb-4">
                            <a href="./search-modal-inquiry.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                   Search Modal Inquiry</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4 mb-4">
                            <a href="./feedback-inquiry.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                   Feedback Inquiry</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./payment-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                   Payments History</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-4">
                            <a href="./membership-all.php" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                   Membership Users</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-solid fa-bars fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
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