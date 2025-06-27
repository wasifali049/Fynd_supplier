<?php

include './lib/bpconn.php';
include './lib/config-details.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<?php include './common/head.php' ?>
	<?= showSEOTag($db, basename($_SERVER['SCRIPT_NAME']), get_main_url()) ?>
	<!-- Owl Stylesheets -->
	<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="./assets/css/intlTelInput.css">
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">

	<style>
		.c-member-list-w .row {
			justify-content: center;
		}

		.c-member-list-w .col-lg-4 span {
			display: block;
			width: 150px;
			height: 150px;
			border-radius: 50%;
			margin: 0 auto;
			margin-bottom: 10px;
			overflow: hidden;
		}

		.c-member-list-w .col-lg-4 span img {
			width: 150px;
			height: 150px;
			border-radius: 50%;
			object-fit: cover;
		}
	</style>

</head>

<body>
	<?php include './common/header.php' ?>

	<main>
		<section class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 shadow rounded mt-3">
						<div class="content-padding">
							<h1 itemprop="name">Refund & Cancellation Policy </h1>
							<div class="white-popup mfp-with-anim"> 
	<span> <br><br> <br>
	100% Money Back Guarantee <br><br> 
	
	We are offering 100% refund within 30 days—no questions asked. You will get 100% money back if you find our data is wrong. Or not receiving Results as per plan<br><br> 
	<b>How to Claim Your Refund:</b><br> 
	
	Please raise a concern from registered email, contact on our support mail id or number and Our team will get in touch to issue a refund.<br> 
	Your Satisfaction Comes First: While you don’t have to explain to us why you want a refund, we’ll be thankful if you would let us know, as it will help us to understand where exactly we failed to serve you. Our goal is that you are totally satisfied. We constantly improve our services through the feedback we get from our customers.<br><br> 
	
	We have always striven to structure our company around client satisfaction and long-term relationships. </span> <br><br> <br><br> 
	
	Rise Refund Request at - Email ID - support@fyndsupplier.com <br> or <br> 

WhatsApp - +918882335624
	<br><br> <br><br> <br><br> 
	</div>


						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php include './common/footer.php' ?>
	<?php include('./common/social-link.php') ?>
	<?php include './common/modal.php' ?>

	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script> -->


	<?php include './common/script.php' ?>
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