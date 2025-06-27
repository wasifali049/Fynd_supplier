<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

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
    <link rel="stylesheet" href="./assets/css/intlTelInput.css">

</head>

<body>
    <?php include('./common/header.php') ?>

    <main>
        <section class="bg-white py-3 my-3">
            <div id="container" class="container webp contact_type">

                <div class="content">
                    <div class="content-padding">
                        <h1 itemprop="name">FAQ</h1>
                        <div class="text">
                            <strong>What is FyndSUPPLIER?</strong><br>
                            <p>
                                FyndSUPPLIER is a B2B online portal to assist oil and gas companies in procurement of oilfield chemicals. It makes procurement easy, quick and safe so that oil service companies and E&amp;P companies minimize their time in procurement and receive desired quality and price
                            </p><br>
                            <strong>How can it assist suppliers?</strong><br>
                            <p>
                                The major commitment FyndSUPPLIER makes to suppliers is to maximize their explore to buyers and therefore sale. Our success lies with supplier’s success and therefore we put every effort possible so that we help supplier to close as many deals as possible.

                            </p>
                            <br>
                            <strong>How can it assist buyers?</strong><br>

                            <p>

                                The portal works connect buyers with suppliers to streamline process of procurement and make procurement easy, quick and safe. In traditional approach of procurement, thousands of manhours are invested in due diligence, paperwork, communication and logistics. FyndSUPPLIER makes whole process of procurement streamline and therefore significantly minimize time in procurement.
                            </p><br>
                            <strong>How to make complaint and feedback against your experiences?</strong><br>

                            <p>
                                On portal, there is a form available to submit your complaint and feedback. Please write to us and our team will respond quickly to resolve your issue.
                            </p>
                            <br>
                            <strong>How to contact customer service for any support?</strong><br>
                            <p>
                                Through contact us page
                            </p>
                            <br>
                            <strong>How does oilfield use pre-qualification to verify suppliers?</strong><br>
                            <p>

                                FyndSUPPLIER have international standard prequalification defined scope. Before registering any supplier to fyndsupplier portal, they have to pass those international term and go under legal agreement with oilfield to commit for their ethical, professional and legal business practice.
                            </p>
                            <br>
                            <strong>How oilfield make sure to keep payment safe from buyers?</strong><br>
                            <p>
                                After buyer make payment to fyndsupplier, we take full responsibility to keep payment safe and secure. Buyers will have to deliver as agree specification, quality and quantity. If there will be discrepancy, then we will make sure to rectify and deliver as per initial written promise by supplier.
                            </p>
                            <br>
                            <strong>How FyndSUPPLIER make sure that supplier deliver quality products as promised? </strong><br>

                            <p>
                                FyndSUPPLIER do prequalification to identify quality buyers and track record. Their term of collaboration with buyers is based on their history check about quality and professionalism. Therefore, if a supplier is registered on our portal, then its already verified and is under legal contract with us to deliver quality as agreed.

                            </p>
                            <br>
                            <strong>What if buyer choose to go directly to procure from supplier?</strong><br>
                            <p>
                                FyndSUPPLIER take full responsibility of quality of chemicals and payment safety if buyer chose to make payment via our portal. However, buyers are fee to go directly to supplier and FyndSUPPLIER will not be responsible if buyer choose to go directly to supplier.

                            </p>
                            <br>
                            <strong>How my RFQ submitted to portal will receive quotation?</strong><br>
                            <p>
                                Once a buyer submits his RFQ, we send their RFQ to thousands of registered and prequalified suppliers. We then received the quotes based on availability, will then be shared with buyer to select and proceed.

                            </p>
                            <br>
                            <strong>How can I order sample of chemical or MSDS, and PSD?</strong><br>
                            <p>
                                You can request to supplier directly after identified your supplier who want to work with and who meet your requirements
                            </p><br>
                            <strong>How can I ask if my specified chemicals are not available on portal?</strong><br>
                            <p>

                                You can submit your specification through submit RFQ and we will take your RFQ to suppliers to find the match of your specification or alternative available
                            </p><br>
                            <strong>How to approach fyndSUPPLIER team if my chemical specification or target price of required chemical, does not available on portal?
                            </strong><br>
                            <p>

                                You can write to us through our contact us form and our sales team will shorty contact you to know your specification and target price. They will then work accordingly with supplier to match your specs and price if possible.
                            </p><br>
                            <strong>Who take responsibility of supplier does not supply chemicals as promised?</strong><br>
                            <p>
                                If buyer make payment through fyndSUPPLIER portal, then fyndSUPPLIER take full responsibility to deliver product quality by supplier to buyer as promised. Buyer payment is 100% safe and will be released to supplier only after they have delivered quality as promised/agreed.

                            </p>
                        </div>
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

    <script src="./assets/js/pages/group-chat.js"></script>
    <script src="./assets/js/pages/inquiry-offer.js"></script>
    <script src="./assets/js/pages/user-check.js"></script>
    <script src="./assets/js/pages/index.js"></script>

</body>

</html>