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
							<h1 itemprop="name">Terms of use</h1>

							<div class="content-text">
								By using this website you agree to the term of use as defined below. It is your responsibility to read and understand all terms. If you do not agree with this term, you can leave this website.
								<br><br>
								<b>Who can use the site?</b><br>
								You must be at least 18 years use this site. Account holder is responsible for everything done with that account. If you think any user is under age 18, please report to us.
								<br><br>
								<b>Privacy Policy</b><br>
								leherchat.com provides a detailed of Privacy-Policy, accessable from the bottom of every page. For more information, please read back our Privacy Policy
								<br><br>
								<b>Proprietary Rights</b><br>
								Company owns and retains all rights to leherchat.com and the contents therein, including but not limited to all Content, Software, copyrights and Trademarks. This proprietary right excludes information which is public domain, or for which we have obtained a license or have been given permission to use by a 3rd party. You may not copy, distribute, or sell any such proprietary information without the expressed permission of they Company.
								<br><br>
								<b>Limitation of Liability</b><br>
								Company claims immunity from liability to the fullest extent under the law and as provided under the Communications Decency Act for Content provided by third parties and members and nothing in this Agreement is intended to waive, remove, or usurp such immunity. Further, under no circumstances shall Company be responsible for any loss or damage resulting from anyone's use of the Site or the service and/or any content posted on chatblink.com or transmitted to Community members. The Site and the service are provided "AS-IS" and Company expressly disclaims any warranty of fitness for a particular purpose or non-infringement. Moreover, Company cannot guarantee and does not promise any specific results from use of leherchat.com.
								<br><br>
								<b>Indemnity</b><br>
								You agree to indentify and hold Company, its subsidiaries, affiliates, officers, agents, and partners from any loss, liability, claim, or demand, including reasonable attorney's fees, made by any third party due to or arising out of your use of the service in violation of this Agreement and/or arising from a breach of these Terms of Use and/or any breach of your representations and warranties set forth above.
								<br><br>
								<b>Cost of Membership</b><br>
								leherchat offers both basic and premium memberships. Basic membership is free and requires no credit card to setup. This membership allows you to view the member community, engage in community forums, create a profile, and respond to messages. Users have the option to upgrade to a premium membership for an annual membership and this provides them the ability to view personality compatibility details and contact other members. Note - because the basic membership provides a deep level preview of the community and because the cost of premium membership upgrade is so low, no refunds are offered for upgraded premium memberships.
								<br>
								<br>
								<br>
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