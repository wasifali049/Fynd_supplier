<?php
include('./lib/bpconn.php');
include('./lib/config-details.php');

redirect_buyer($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>
    <?= showSEOTag($db, basename($_SERVER['SCRIPT_NAME']), get_main_url()) ?>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/intlTelInput.css">


    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3.5.2/dist/style.css"> -->

    <?php
    $homeHeadScriptModel = fetch_object($db, "SELECT * FROM `home_head_script` WHERE 1");
    echo $homeHeadScriptModel->content
    ?>
</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section letest-enquiry">
            <div class="container">
                <div class="p-3 pb-md-4 mx-auto text-center">
                    <p>Limited Time Offer</p>
                    <h1 class="text-primary">Save 50% for 12 months</h1>
                    <p class="">
                        Maximise your chemical sale and market reach with higher number of sales leads at the best subscription price.<br>
                        Switch plans or cancel any time. Offer Terms


                    </p>
                </div>


                <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0">Free</h4>
                            </div>
                            <div class="card-body">
                                <br>
                                <h1 class="card-title">0$<small class="">/Year</small></h1>
                                <br>
                                <div class="table-responsive w-100">
                                    <table class="table text-left">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="">Buyers Contact Access</th>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="">Monthly Purchase Inquiry</th>
                                                <td>0-3</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" class="">Marketing of Products</th>
                                                <td><i class="bi bi-x-lg"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="">Profile Search Priority</th>
                                                <td><i class="bi bi-x-lg"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="">Trusted Profile Tag</th>
                                                <td><i class="bi bi-x-lg"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="">Support</th>
                                                <td>24x7</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if (!is_login()) { ?>
                                    <button type="button" class="w-100 btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#signupModel">Join Free</button>
                                <?php } else { ?>
                                    <button type="button" class="w-100 btn btn-lg btn-primary">Activated</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-primary">
                            <div class="card-header py-3 text-bg-primary border-primary">
                                <h4 class="my-0">Premium</h4>
                            </div>
                            <div class="card-body">
                                <br>
                                <h1 class="card-title">99$<small class="">/Year</small></h1>
                                <br>
                                <div class="table-responsive w-100">
                                    <table class="table text-left">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="">Buyers Contact Access</th>
                                                <td>10-20</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="">Monthly Purchase Inquiry</th>
                                                <td>20-30</td>
                                            </tr>

                                            <tr>
                                                <th scope="row" class="">Marketing of Products</th>
                                                <td><i class="bi bi-check2"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="">Profile Search Priority</th>
                                                <td><i class="bi bi-check2"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="">Trusted Profile Tag</th>
                                                <td><i class="bi bi-check2"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="">Support</th>
                                                <td>24x7</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <form method="post" action="https://www.paypal.com/cgi-bin/webscr">
                                    <input type="hidden" name="business" value="rameshwar@fyndsupplier.com">
                                    <input type="hidden" name="item_name" value="FYNDSUPPLIER MEMBERSHIP">
                                    <input type="hidden" name="item_number" value="<?= get_user_id() ?>">
                                    <input type="hidden" name="amount" value="99">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="no_shipping" value="1">
                                    <input type="hidden" name="cmd" value="_xclick">
                                    <input type="hidden" name="return" value="<?= get_root() ?>payment-success.php">
                                    <input type="hidden" name="cancel_return" value="<?= get_root() ?>payment-cancel.php">
                                    
                                    <?php if (!is_login()) { ?>
                                    <button type="button" class="w-100 btn btn-lg btn-outline-primary" data-bs-toggle="modal" data-bs-target="#signupModel">Become Paid Member</button>
                                <?php } else { ?>
                                    <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Become Paid Member</button>
                                <?php } ?>
                                
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <div>
                            <p class="text-center">First 60 Days FREE and cancel subscription anytime with full refund remaining.</p>
                            <p class="text-center mt-5">if you have question or query contact to our sale executive.</p>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" target="_blank" href="http://wa.me/918882335624">Contact To Sales Support</a>
                        </div>
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

    <!-- <script src="<?= get_root() ?>assets/js/pages/group-chat.js"></script> -->
    <script src="<?= get_root() ?>assets/js/pages/inquiry-offer.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/user-check.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/index.js"></script>

</body>

</html>