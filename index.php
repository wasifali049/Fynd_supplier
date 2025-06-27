<?php
include_once('./lib/bpconn.php');
include_once('./lib/config-details.php');
$db = dbCon();

$homeBannerModel = fetch_all($db, "SELECT * FROM `home_banner` ORDER BY id DESC");
$target_dir5 = get_root() . "assets/img/banner/";
$target_dir6 = get_root() . "assets/img/home-inquiry/";
$homeBannerTitle = fetch_object($db, "SELECT * FROM `home_banner_title`");
$countryModel = get_country_list($db);

$storyModel = fetch_all($db, "SELECT * FROM `supplier_chemical_list` WHERE `uid` IN (92,3117,108) AND `price` != '-' AND `chemical_photo` != 'product.png' AND `chemical_photo` != '5183Creative BioMart-Logo.png' AND `chemical_photo` != '3466Creative BioMart-Logo.png'");

$model2 = fetch_all($db, "SELECT `uid` FROM `supplier_chemical_list` WHERE `price` != '-'");

$ids = array_column($model2, 'uid');
$idss = implode(',', $ids);
$idss = !empty($idss) ? $idss : 0;

$destination = 'all';

$who_to_contact = 'Supplier';

$who_to_contact = strtolower($who_to_contact);

$is_buyer_select = false;
if ($who_to_contact === 'buyer' && is_premium_member($db)) {
    $is_buyer_select = true;
}

$is_buyer_select_cond = !$is_buyer_select ? "id IN ({$idss}) AND" : "";

if ('all' != $destination) {
    $cond = "{$is_buyer_select_cond} status=1 AND user_type='{$who_to_contact}' AND country='{$destination}'";
} else {
    $cond = "{$is_buyer_select_cond} status=1 AND user_type='{$who_to_contact}'";
}

$sql = "SELECT * FROM `user` WHERE {$cond}";
// echo $sql;
// exit;
$model = fetch_all($db, $sql);

$total_records = count($model);

// print_r($model);
// exit;

// echo "SELECT * FROM `supplier_chemical_list` WHERE `price` != '-' AND `chemical_photo` != 'product.png' AND `chemical_photo` != '5183Creative BioMart-Logo.png' AND `chemical_photo` != '3466Creative BioMart-Logo.png'";
// exit;
// $storyModel = fetch_all($db, "SELECT * FROM `fynd_story` ORDER BY id DESC");
$storyTitle = fetch_object($db, "SELECT * FROM `fynd_story_title`");
$buyerSupplierInquiryTitle = fetch_object($db, "SELECT * FROM `home_buyer_supplier_inquiry_title`");

$countryModel = get_country_list($db);
$chemicalModel = get_chemical_list($db);
$supplierChemicalModel = get_supplier_chemical_list($db);
$latestSearchModel = fetch_all($db, "SELECT * FROM `search_chemical` ORDER BY id DESC LIMIT 500");

$mobile = '';
$country_code = '';
$email = '';
$name = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="google-site-verification" content="5C09XjHbvGzAxsezdB1SEH572CydNRKmHRxUmBjuPX4" />

    <title> Oilfield Chemical Suppliers- fynd supplier </title>
    <meta name="description" content="Fynd Supplier offers high-quality oilfield chemicals in Dubai for drilling, production, and maintenance." />
    <meta name="keywords" content="Oilfield Chemical Suppliers, Oilfield Chemical Suppliers in Dubai, Oilfield Chemical in Dubai, Oilfield Chemical suppliers in UAE, Oilfield Chemical Suppliers in Saudi Arabia, Oilfield Chemical Manufacturers & Suppliers in UAE, Oil Field Chemicals Suppliers in Sharjah, UAE" />
    <link rel="canonical" href="https://fyndsupplier.com/" />
    <meta name="geo.placename" content="Centrum Business Centre, 214 Union Street, Aberdeen, UK AB10 1TL," />
    <meta name="geo.position" content="57.144798, -2.106169" />
    <meta name="copyright" content="fynd supplier" />
    <meta name="abstract" content="Oilfield Chemical Suppliers, Oilfield Chemical Suppliers in Dubai, Oilfield Chemical in Dubai, Oilfield Chemical suppliers in UAE, Oilfield Chemical Suppliers in Saudi Arabia, Oilfield Chemical Manufacturers & Suppliers in UAE, Oil Field Chemicals Suppliers in Sharjah, UAE" />
    <meta name="generator" content="https://fyndsupplier.com/" />
    <meta name="language" content="english" />
    <meta name="author" content="fynd supplier" />
    <meta name="distribution" content="global" />
    <meta name="rating" content="general" />
    <meta name="Googlebot" content="Index, Follow">
    <meta name="Slurp" content="index,follow" />
    <meta NAME="msnbot" content="Index, Follow">
    <meta name="robots" content="Index, Follow" />
    <meta name="revisit-after" content=" 2 days" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="YahooSeeker" content="Index, Follow">
    <meta name="document-type" content="Public" />
    <meta name="Expires" content="never" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Fynd Supplier offers high-quality oilfield chemicals in Dubai for drilling, production, and maintenance." />
    <meta name="twitter:title" content="Oilfield Chemical Suppliers- fynd supplier" />
    <meta name="dc.source" content="https://fyndsupplier.com/" />
    <meta name="dc.title" content="Oilfield Chemical Suppliers- fynd supplier" />
    <meta name="dc.keywords" content="Oilfield Chemical Suppliers, Oilfield Chemical Suppliers in Dubai, Oilfield Chemical in Dubai, Oilfield Chemical suppliers in UAE, Oilfield Chemical Suppliers in Saudi Arabia, Oilfield Chemical Manufacturers & Suppliers in UAE, Oil Field Chemicals Suppliers in Sharjah, UAE" />
    <meta name="dc.subject" content="fynd supplier" />
    <meta name="dc.description" content="Fynd Supplier offers high-quality oilfield chemicals in Dubai for drilling, production, and maintenance." />
    <meta name="og:type" content="product" />
    <meta name="og:title" content="Oilfield Chemical Suppliers- fynd supplier" />
    <meta name="og:site_name" content="fynd supplier" />
    <meta name="og:description" content="Fynd Supplier offers high-quality oilfield chemicals in Dubai for drilling, production, and maintenance.">

    <?php include('./common/head.php') ?>
    <?= showSEOTag($db, basename($_SERVER['SCRIPT_NAME']), get_main_url()) ?>
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/intlTelInput.css">
    <?php
    $homeHeadScriptModel = fetch_object($db, "SELECT * FROM `home_head_script` WHERE 1");
    echo $homeHeadScriptModel->content
    ?>
    <link rel="stylesheet" href="<?= get_root() ?>assets/css/landing-page.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .full-text {
            display: none;
            /* Hide the full text initially */
        }

        .read-more-btn {
            color: #007bff;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        .table-responsive {
            max-height: 400px;
            /* Set a maximum height */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }

        /* Slideshow container */
        .slideshow-container {
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 30px;
            position: absolute;
            bottom: 50%;
            top: 50%;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* .prev {
            left: 10px;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            background: #5F45EA;
            border: 2px solid #5F45EA;
            color: white
        }

        .next {
            right: 10px;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            background: #5F45EA;
            border: 2px solid #5F45EA;
            color: white;
            margin-bottom: 10px;
        }

        .active {
            background-color: #717171;
        } */

        /* --- Stylish Dots --- */


         /* Banner heading */
         /* Responsive heading text */
.heading_title {
    font-size: 1.5rem;
    font-weight: 600;
    /* padding-left:30px; */
}

@media (max-width: 768px) {
    .heading_title {
        font-size: 1.2rem;
        text-align: center;
    }

    .banner-main-btn {
        margin-top: 10px;
        text-align: center;
        width: 100%;
    }

    .banner-main-btn a {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .heading_title {
        font-size: 1rem;
    }

    .banner-main-btn a {
        font-size: 13px;
    }
}





        /* Slideshow container */
        .slideshow-container {
            position: relative;
            margin: auto;
            max-width: 100%;
            overflow: hidden;
        }
        /* Slide image for web version */
.slide-img-web {
    width: 100%;
    height: auto;
    object-fit: cover;
    max-height: 450px;
}

        /* Arrows overlay */
        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            z-index: 100;
            cursor: pointer;
            font-size: 22px;
            line-height: 36px;
            text-align: center;
        }

        .carousel-arrow.prev {
            left: 10px;
        }

        .carousel-arrow.next {
            right: 10px;
        }

        /* Dot indicators overlay */
        .dots-wrapper {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            z-index: 100;
        }

        .dot {
            display: inline-block;
            height: 12px;
            width: 12px;
            margin: 0 4px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            transition: background-color 0.3s ease;
            cursor: pointer;
            border: 1px solid #fff;
        }

        .dot.active,
        .dot:hover {
            background-color: #5F45EA;
            border-color: #5F45EA;
        }

/* slider for tablet and mobile */

/* Mobile Slide Specific Image Styling */
.slide-img-mob {
    width: 100%;
}

/* Carousel Arrows Over Image */
.slideshow-container .carousel-arrow {
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border-radius: 50%;
    width: 36px;
    height: 36px;
    font-size: 18px;
    z-index: 10;
    position: absolute;
}
.slideshow-container .carousel-arrow.prev { left: 10px; }
.slideshow-container .carousel-arrow.next { right: 10px; }

/* Dot Indicators Overlay */
.dots-wrapper {
    position: absolute;
    bottom: 10px;
    width: 100%;
    text-align: center;
    z-index: 10;
}
.dotmob {
    height: 10px;
    width: 10px;
    margin: 0 3px;
    background-color: rgba(255, 255, 255, 0.6);
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.3s ease;
    border: 1px solid white;
}
.dotmob.active,
.dotmob:hover {
    background-color: #5F45EA;
    border-color: #5F45EA;
}

/* Tablet & Mobile Responsive Height */
@media (max-width: 768px) {
    /* .slide-img-mob {
        max-height: 250px;
    } */
}
@media (max-width: 480px) {
    /* .slide-img-mob {
        max-height: 200px;
    } */
}


        /* Fading animation */
        .slide {
            animation-name: fade;
            animation-duration: 0.5s;
            animation-timing-function: ease-in-out;
        }

        @keyframes fade {
            from {
                opacity: 0.5;
            }

            to {
                opacity: 1;
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }

        }

        /* Change the border and height to match form-control */
        .select2-container .select2-selection--single {
            height: 38px;
            /* Same height as form-control */
            border: 1px solid #ced4da;
            /* Bootstrap default border */
            border-radius: 0.25rem;
            /* Bootstrap default border-radius */
            padding: 6px 12px;
            /* Padding to match the form-control padding */
            font-size: 16px;
            /* Match form-control font-size */
        }

        /* Change the hover and focus state */
        .select2-container .select2-selection--single:hover,
        .select2-container .select2-selection--single:focus {
            border-color: #80bdff;
            /* Bootstrap form-control focus border color */
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            /* Bootstrap form-control focus shadow */
        }

        /* Change the dropdown arrow to look like Bootstrap form-control */
        .select2-container .select2-selection__arrow {
            height: 38px;
            /* Same height as the selection box */
            top: 1px;
            /* Align the arrow vertically */
            right: 10px;
            /* Space to the right */
        }

        /* Optional: change dropdown item styles */
        .select2-container .select2-dropdown {
            border: 1px solid #ced4da;
            /* Bootstrap default border */
            border-radius: 0.25rem;
            /* Rounded corners for dropdown */
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 10px 15px;
            /* Adjust padding for better spacing inside the item */
            color: var(--bs-list-group-color);
            /* Maintain your custom color variable */
            background-color: var(--bs-list-group-bg);
            /* Maintain your custom background variable */
            border: 1px solid var(--bs-list-group-border-color);
            /* Solid border for a cleaner look */
            border-radius: 8px;
            /* Add some border radius for rounded corners */
            margin-bottom: 15px;
            /* Add spacing between list items */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Add subtle shadow for depth */
            transition: all 0.3s ease;
            /* Smooth transition for hover effect */
            text-decoration: none;
            /* Remove any default text decoration */
            font-size: 1.1em;
            /* Increase font size slightly for readability */
        }

        /* Hover effect for better interactivity */
        .list-group-item:hover {
            background-color: #f0f0f0;
            /* Lighten background on hover */
            color: #333;
            /* Darker text color on hover */
            transform: translateY(-5px);
            /* Add slight lift on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            /* Enhance shadow on hover */
        }

        /* First and last child adjustments (optional) */
        .list-group-item:first-child {
            margin-top: 10px;
            /* If you need some space at the top */
        }

        .list-group-item:last-child {
            margin-bottom: 10px;
            /* If you need space at the bottom */
        }

        /* Base styling */
        .story-section-wrapper {
            position: relative;
            width: 100%;
        }

        .overlay-container {
            position: relative;
            display: inline-block;
            overflow: hidden;
        }

        .overlay-container img {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            opacity: 0;
            /* Hidden by default */
            transition: opacity 0.3s ease-in-out;
            background-color: rgba(0, 0, 0, 0.6);
            /* Semi-transparent background */
            padding: 20px;
            border-radius: 10px;
        }

        .overlay-container:hover .overlay-content {
            opacity: 1;
            /* Show on hover */
        }

        .overlay-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .overlay-content p {
            font-size: 14px;
            margin-bottom: 15px;
        }

        .overlay-button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .overlay-button:hover {
            background-color: #005f73;
        }

        .carousel-cell {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center align items */
            text-align: center;
            /* Center align text */
            width: 20%;
        }

        .video-block {
            position: relative;
            overflow: hidden;
            width: 100%;
            /* Ensure the block takes full width */
        }

        .video-block img {
            width: 100%;
            /* Make images responsive */
            height: 200px;
            /* Set a fixed height */
            object-fit: cover;
            /* Ensures the image covers the area */
            object-position: center;
            /* Center the image */
        }

        .text-block {
            padding: 10px;
            /* Add some spacing */
            background-color: rgba(255, 255, 255, 0.8);
            /* Optional: background for text */
            width: 100%;
            /* Full width */
        }

        .text-block {
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            width: 100%;
            text-align: center;
            /* Center align text */
        }

        .product-title {
            font-size: 1.2em;
            /* Adjust font size */
            font-weight: bold;
            margin: 0;
            /* Remove default margin */
            overflow: hidden;
            /* Hide overflow text */
            text-overflow: ellipsis;
            /* Add ellipsis for overflow text */
            white-space: nowrap;
            /* Prevent text wrapping */
            max-width: 100%;
            /* Constrain the title to its container */
        }

        .product-price {
            font-size: 1em;
            /* Adjust price font size */
            color: #333;
            /* Change color for better visibility */
            margin-top: 5px;
            /* Add some space above the price */
        }


        .slider {
            height: 100px;
            overflow: hidden;
            position: relative;
            width: 100%;
            /* Make the slider responsive */
        }

        .slide-track {
            display: flex;
            width: calc(250px * 14);
            /* Total width based on slides */
            animation: scroll 40s linear infinite;
        }

        .slides {
            height: 100px;
            width: 250px;
            display: flex;
            align-items: center;
            /* Center images vertically */
            justify-content: center;
            /* Center images horizontally */
        }

        .slides img {
            height: 100%;
            /* Full height of the slide */
            width: auto;
            /* Maintain aspect ratio */
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-250px * 7));
                /* Scroll 7 images */
            }
        }

        @media only screen and (max-width: 768px) {
            .carousel-cell {
                width: 33.33%;
                /* Show 3 images on mobile */
            }

            .submit_btn {

                margin-left: 36% !important;

            }

            .mobile_attachment {
                display: block !important;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .attachment {

                display: none;
                margin-bottom: 10px;
                justify-content: center !important;
                margin-top: 0px !important;
                margin-left: 0px !important;


            }

            .user_input_web {

                display: block !important;
                /*align-items: center;*/


            }

            .checkboxes2 {
                margin-top: 0px !important;
            }

            .landing-banner-heading {

                font-size: 17px !important;
                line-height: 0px !important;
            }

            .btn_arrow {
                text-align: center;
            }

            .d-flex-mobile {
                flex-direction: column;
                /* Stack items vertically */
                text-align: center;
                /* Center-align text */
            }

            .d-flex-mobile .oc-btn {
                margin-top: 10px;
                /* Add space between text and button */
                width: auto;
                /* Optional: Adjust width to fit content */
            }

            .heading_title {
                text-align: center;
            }

            .banner-title {
                flex-direction: column;
                /* Stack items vertically */
                text-align: center;
                /* Center-align text */
            }

            .banner-main-btn {
                margin-top: 10px;
                /* Add spacing between text and button */
            }

            .banner-form {

                padding-inline: 0px !important;
            }

            .scrollbar {
                padding: 0px !important;
            }

            .chat-wrapper {
                font-size: 12px;
                word-wrap: break-word;
                overflow-wrap: break-word;
                align-items: center;
            }
        }

        .write_msg {
            width: 100%;
            min-height: 40px;
            max-height: 200px;
            /* Limit growth */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            resize: none;
            overflow-y: hidden;
            line-height: 1.4;
            font-size: 14px;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
            padding: 10px;
        }

        .input_msg_write {
            position: relative;
            display: flex;
            align-items: flex-end;
        }

        .write_msg {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
            padding-right: 50px;
            resize: none;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            bottom: 0;
            width: 33px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .msg_send_btn i {
            font-size: 16px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {

            .mobile_slideshow {
                display: block !important;
            }

            .web_slideshow {
                display: none !important;
            }

            .inbox_people {
                width: 100%;
                border-right: none;
            }

            .mesgs {
                width: 100%;
                padding: 15px 10px;
            }

            .chat_img {
                width: 12%;
            }

            .chat_ib {
                width: 85%;
            }

            .chat_list {
                padding: 10px 8px;
            }

            .type_msg {
                padding: 10px;
            }

            .input_msg_write input {
                font-size: 14px;
            }

            .msg_send_btn {
                height: 53px;
                width: 53px;
                top: 14px;
            }

        }

        @media (max-width: 480px) {
            .recent_heading h4 {
                font-size: 18px;
            }

            .srch_bar input {
                width: 70%;
            }

            .input_msg_write input {
                font-size: 13px;
            }

            .msg_send_btn {
                height: 53px;
                width: 53px;
                top: 14px;
            }

        }

        /* scroll bar css for supply and demand sections */
        .card-body {
    scrollbar-width: thin;
    scrollbar-color: #ccc #f1f1f1;
}
.card-body::-webkit-scrollbar {
    width: 6px;
}
.card-body::-webkit-scrollbar-thumb {
    background-color: #aaa;
    border-radius: 3px;
}

    </style>
</head>

<body>
    <?php include('./common/header-landing-page.php') ?>

    <section class="section banner-section pt-0 " style="background-color:#F3F3F3;">
        <div class="container">
            <div class="row">
                <div class="row">
                  <!-- Heading Block - Always shows above slideshow -->
<div class="col-md-12 pt-2 banner-title banner-wrapper-1 main-heading-wrapper d-flex justify-content-between align-items-center flex-wrap"
     style="background-color:#F3F3F3;">
    <h5 class="p-0 landing-banner-headingg">
        <div class="heading_title">Welcome to Chemical Buyers & Supplier Community, fyndSupplier.com</div>
    </h5>
    <div class="banner-main-btn" style="background-color:#F3F3F3;">
        <!-- <button style="border:none;">
            <a aria-current="page" class="oc-btn" data-bs-toggle="modal" data-bs-target="#searchModel" data-bs-whatever="buyer">
                Send Inquiry/Offer
            </a>
        </button> -->
        <a aria-current="page" class="oc-btn" data-bs-toggle="modal" data-bs-target="#searchModel" data-bs-whatever="buyer">
                Send Inquiry/Offer
            </a>
    </div>
</div>

<!-- Web Slider -->
<div class="col-md-12 web_slideshow">
    <div class="slideshow-container">
        <!-- Slides -->
        <div class="mySlides slide">
            <div class="numbertext">1 / 4</div>
            <img src="assets/img/banner/slide1.jpeg" class="slide-img-web">
        </div>
        <div class="mySlides slide">
            <div class="numbertext">2 / 4</div>
            <img src="assets/img/banner/slide2.jpeg" class="slide-img-web">
        </div>
        <div class="mySlides slide">
            <div class="numbertext">3 / 4</div>
            <img src="assets/img/banner/slide3.jpeg" class="slide-img-web">
        </div>
        <div class="mySlides slide">
            <div class="numbertext">4 / 4</div>
            <img src="assets/img/banner/slide4.jpeg" class="slide-img-web">
        </div>

        <!-- Navigation Arrows -->
        <button class="carousel-arrow prev" onclick="plusSlides(-1)">&#10094;</button>
        <button class="carousel-arrow next" onclick="plusSlides(1)">&#10095;</button>

        <!-- Dots -->
        <div class="dots-wrapper">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
        </div>
    </div>
</div>

                        <br>
                        <script>
                            let slideIndex = 1;
                            showSlides(slideIndex);

                            function plusSlides(n) {
                                showSlides(slideIndex += n);
                            }

                            function currentSlide(n) {
                                showSlides(slideIndex = n);
                            }

                            function showSlides(n) {
                                let i;
                                const slides = document.getElementsByClassName("mySlides");
                                const dots = document.getElementsByClassName("dot");

                                if (n > slides.length) slideIndex = 1;
                                if (n < 1) slideIndex = slides.length;

                                for (i = 0; i < slides.length; i++) {
                                    slides[i].style.display = "none";
                                }

                                for (i = 0; i < dots.length; i++) {
                                    dots[i].classList.remove("active");
                                }

                                slides[slideIndex - 1].style.display = "block";
                                dots[slideIndex - 1].classList.add("active");
                            }

                            setInterval(() => {
                                plusSlides(1);
                            }, 5000); // auto-slide
                        </script>


                    </div>
                    <div class="col-md-12 mobile_slideshow">
    <div class="slideshow-container">
        <div class="mySlidesmob slide">
            <div class="numbertext">1 / 4</div>
            <img src="assets/img/banner/slide1.png" class="slide-img-mob">
        </div>
        <div class="mySlidesmob slide">
            <div class="numbertext">2 / 4</div>
            <img src="assets/img/banner/slide2.png" class="slide-img-mob">
        </div>
        <div class="mySlidesmob slide">
            <div class="numbertext">3 / 4</div>
            <img src="assets/img/banner/slide3.png" class="slide-img-mob">
        </div>
        <div class="mySlidesmob slide">
            <div class="numbertext">4 / 4</div>
            <img src="assets/img/banner/slide4.png" class="slide-img-mob">
        </div>

        <!-- Arrows (overlayed center vertically) -->
        <button class="carousel-arrow prev" onclick="plusSlidesmob(-1)">&#10094;</button>
        <button class="carousel-arrow next" onclick="plusSlidesmob(1)">&#10095;</button>

        <!-- Dot indicators -->
        <div class="dots-wrapper">
            <span class="dotmob" onclick="currentSlideMob(1)"></span>
            <span class="dotmob" onclick="currentSlideMob(2)"></span>
            <span class="dotmob" onclick="currentSlideMob(3)"></span>
            <span class="dotmob" onclick="currentSlideMob(4)"></span>
        </div>
    </div>
</div>

<script>
    let slideIndexmob = 1;
    showSlidesmob(slideIndexmob);

    function plusSlidesmob(n) {
        showSlidesmob(slideIndexmob += n);
    }

    function currentSlideMob(n) {
        showSlidesmob(slideIndexmob = n);
    }

    function showSlidesmob(n) {
        let i;
        let slides = document.getElementsByClassName("mySlidesmob");
        let dots = document.getElementsByClassName("dotmob");

        if (n > slides.length) { slideIndexmob = 1 }
        if (n < 1) { slideIndexmob = slides.length }

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].classList.remove("active");
        }
        slides[slideIndexmob - 1].style.display = "block";
        dots[slideIndexmob - 1].classList.add("active");
    }

    // Auto slideshow
    setInterval(() => {
        plusSlidesmob(1);
    }, 5000);
</script>

                    <!-- <div class="col-md-12 banner-wrapper banner-wrapper-2 main-map-wrapper">
                        <div class="shadow-lg rounded w-100 bg-white p-3 banner-form">
                            <h3 class="text-left"><// $buyerSupplierInquiryTitle->title1 ?></h3> -->
                    <?php //if(!empty($buyerSupplierInquiryTitle->title3)){ echo "<h5 class='text-left'>{$buyerSupplierInquiryTitle->title3}</h5>"; } 
                    ?>
                    <!-- <div class="progress-bar-wrapper">
                                <div class="progress-bar"></div>
                            </div> -->
                    <!-- <form class="" id="getHomeInquiryForm" method="post" action="< get_root() ?>/inc/home-inquiry/home-buyer-supplier-inquiry-add.php">
                                <div class="row" style="border: 1px solid black;padding-top: 13px;margin-left: 10px;margin-right: 10px;">
                        -->
                    <style>
                        .mobile_slideshow {
                            display: none !important;
                        }

                        .web_slideshow {
                            display: block !important;
                        }

                        .chemical-selection {
                            position: relative;
                            /* width: 300px; */
                        }

                        .suggestions {
                            /* border: 1px solid #ccc; */
                            border-top: none;
                            position: absolute;
                            z-index: 1000;
                            width: 100%;
                            background-color: white;
                        }

                        .suggestion-item {
                            padding: 10px;
                            cursor: pointer;
                        }

                        .suggestion-item:hover {
                            background-color: #f0f0f0;
                        }

                        .d-flex {
                            /* display: flex;
    align-items: center; Vertically center-aligns items */
                        }

                        .me-2 {
                            margin-right: 0.5rem;
                            /* Add some space between the select and button */
                        }

                        .btn-block {
                            flex: 0 0 auto;
                            /* Prevent button from stretching */
                        }
                    </style>
                    
                    <!-- <div class="col-md-12"> -->
                    <!-- <div class="row">
                                        <div class="col-md-4 mb-2" >
                                            <div class="w-100">
                                            <div class="chemical-selection">
                                                <input type="text" id="home-inq-chemical" class="form-control" placeholder="Type a chemical name..." name="homeInquiry[chemical_id]" value="-Dihydroxypyrimidine" onkeyup="showSuggestions(this.value)">
                                                <div id="suggestions" class="suggestions"></div>
                                            </div> -->
                    <!-- <select class="form-select px-1 text-left combined-mobile home-inquiry-chemical-fields" id="home-inq-chemical" name="homeInquiry[chemical_id]" required >
                                                    <option value="">Select Chemical</option>
                                                    <?php
                                                    // foreach ($supplierChemicalModel as $chemicalKey4 => $chemicalVal4) {
                                                    //     $chemicalValue4 = (object) $chemicalVal4;
                                                    ?>
                                                        <option value="< $chemicalValue4->product_name ?>">< $chemicalValue4->product_name ?></option>
                                                    <?php //} 
                                                    ?>
                                                </select> -->
                    <!-- <input type="hidden" class="form-control " id="home-inq-quantity" name="homeInquiry[quantity]" placeholder="">
                                                <div class="showErr"></div>
                                            </div>
                                        </div> -->
                    <!-- <div class="col-md-4 mb-2" >
                                            <select class="form-select" id="home-inq-who_to_contact" name="homeInquiry[who_to_contact]" required >
                                                <option value="Buyer">Buyer</option>
                                                <option value="Supplier" selected>Supplier</option>
                                            </select>
                                            <div class="showErr"></div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="d-flex align-items-center">
                                                <select class="form-select px-1 text-left combined-mobile me-2" id="home-inq-destination" name="homeInquiry[destination]" required>
                                                    <option value="all">Global</option> -->
                    <?php //foreach ($countryModel as $countryKey5 => $countryVal5) {
                    //   $countryValue5 = (object) $countryVal5; 
                    ?>
                    <!-- <option value="< $countryValue5->nicename ?>">< $countryValue5->name ?></option> -->
                    <?php //} 
                    ?>
                    <!-- </select>
                                                <button class="oc-btn px-4 btn-block searchchemical" type="button" id="searchchemical">Search</button>
                                            </div>
                                            <div class="showErr"></div>
                                        </div>
                                    </div>
                                </div> -->
                    <div class="col-md-12">
                        <div class="mb-3 visibility-hidden" style="display: none;">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="country_code" class="form-label home-inq-mobile-label text-start w-100">Country Code</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="w-100">
                                        <select class="form-select px-1 text-left combined-mobile w-100" id="country_code" name="country_code">
                                            <?php
                                            foreach ($countryModel as $countryKey4 => $countryVal4) {
                                                $countryValue4 = (object) $countryVal4;
                                            ?>
                                                <option value="<?= $countryValue4->phonecode ?>"><?= $countryValue4->name ?> - +<?= $countryValue4->phonecode ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 visibility-hidden" style="display:none">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="home-inq-mobile" class="form-label home-inq-mobile-label text-start w-100">Number</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="tel" id="home-inq-mobile" class="form-control w-100" name="homeInquiry[mobile]" placeholder="Whatsapp Number" value="" />
                                    <div class="showErr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div id="all-user-wrapper">
                            <ul class="list-group" id="filterable-wrapper">
                            </ul>
                        </div>
                        <div class="showErr"></div>
                    </div>
                    <div class="col-md-12 my-3 text-center">
                    </div>
                </div>
                </form>
            </div>
        </div>
        <section class="py-5" style="background-color:#fff;">
    <div class="container">
        <div class="row">
<!---top Sections--->
<div class="col-12 mb-3">
    <div class="row">
        <!-- Search Form -->
        <div class="col-md-8">
            <form method="GET" action="" onsubmit="return validateSearch()">
                <div class="input-group">
                    <input type="text" class="form-control" id="chemical" name="search_chemical" placeholder="Search Chemical Name"
                        value="<?= isset($_GET['search_chemical']) ? htmlspecialchars($_GET['search_chemical']) : '' ?>">

                    <input type="text" class="form-control" id="country" name="search_country" placeholder="Search Country Name"
                        value="<?= isset($_GET['search_country']) ? htmlspecialchars($_GET['search_country']) : '' ?>">

                    <input type="text" class="form-control" id="reference" name="search_reference" placeholder="Search Reference No"
                        maxlength="5" minlength="5" pattern="\d{5}" title="Enter exactly 5 digits"
                        value="<?= isset($_GET['search_reference']) ? htmlspecialchars($_GET['search_reference']) : '' ?>">

                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </form>
        </div>

        <!-- Buttons -->
        <div class="col-md-4 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#purchaseModal">Post Supply</button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#stockModal">Post Demand</button>
        </div>
    </div>
</div>


<?php
$chemical = isset($_GET['search_chemical']) ? trim($_GET['search_chemical']) : '';
$country = isset($_GET['search_country']) ? trim($_GET['search_country']) : '';
$reference = isset($_GET['search_reference']) ? trim($_GET['search_reference']) : '';

$chemical_safe = mysqli_real_escape_string($db, $chemical);
$country_safe = mysqli_real_escape_string($db, $country);
$reference_safe = mysqli_real_escape_string($db, $reference);

// Server-side validation for reference
if ($reference !== '' && !preg_match('/^\d{5}$/', $reference)) {
    die("Invalid Reference No. It must be exactly 5 digits.");
}

// ===== Supply Query =====
$whereSupply = "WHERE verified_status = 'Verified'";
if ($chemical !== '') {
    $whereSupply .= " AND product_name LIKE '%$chemical_safe%'";
}
if ($country !== '') {
    $whereSupply .= " AND location_of_stock LIKE '%$country_safe%'";
}
if ($reference !== '') {
    $whereSupply .= " AND reference_no LIKE '%$reference_safe%'";
}
$querySupply = "SELECT * FROM stock_listings $whereSupply ORDER BY id DESC";
$resultSupply = mysqli_query($db, $querySupply);
$supplyCount = mysqli_num_rows($resultSupply);

// ===== Demand Query =====
$whereDemand = "WHERE verified_status = 'Verified'";
if ($chemical !== '') {
    $whereDemand .= " AND product_name LIKE '%$chemical_safe%'";
}
if ($country !== '') {
    $whereDemand .= " AND (preferred_location LIKE '%$country_safe%' OR destination LIKE '%$country_safe%')";
}
if ($reference !== '') {
    $whereDemand .= " AND reference_no LIKE '%$reference_safe%'";
}
$queryDemand = "SELECT * FROM purchase_inquiries $whereDemand ORDER BY id DESC";
$resultDemand = mysqli_query($db, $queryDemand);
$demandCount = mysqli_num_rows($resultDemand);
?>

<!-- validation for seacrch bar ----->
<script>
function validateSearch() {
    const chemical = document.getElementById('chemical').value.trim();
    const country = document.getElementById('country').value.trim();
    const reference = document.getElementById('reference').value.trim();

    if (!chemical && !country && !reference) {
        alert("Please enter a chemical name, country name, or reference number.");
        return false;
    }

    const lettersOnly = /^[a-zA-Z\s]+$/;
    const fiveDigitNumber = /^\d{5}$/;

    if (chemical && !lettersOnly.test(chemical)) {
        alert("Chemical name should contain only letters.");
        return false;
    }

    if (country && !lettersOnly.test(country)) {
        alert("Country name should contain only letters.");
        return false;
    }

    if (reference && !fiveDigitNumber.test(reference)) {
        alert("Reference number must be exactly 5 digits.");
        return false;
    }

    return true;
}
</script>



            <!-- SUPPLY SECTION -->
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="mb-0 text-primary">Supply</h3>
        

                    
                </div>

                <!-- Latest Supply (This Week) -->
                <div class="card mb-3">
                    <div class="card-header bg-light fw-bold">Latest (This Week)</div>
                    <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
                    <?php if ($chemical || $country || $reference): ?>
    <div class="alert alert-info">
        <?= $supplyCount ?> supply record<?= $supplyCount !== 1 ? 's' : '' ?> found 
        for 
        <?= $chemical ? "chemical '<strong>$chemical</strong>' " : '' ?>
        <?= $country ? "from '<strong>$country</strong>' " : '' ?>
        <?= $reference ? "with reference '<strong>$reference</strong>'" : '' ?>.
    </div>
<?php endif; ?>


                        <ul class="list-group list-group-flush">
                            <?php
                            $now = time();
                            $query = "SELECT * FROM stock_listings WHERE verified_status = 'Verified' ORDER BY id DESC";
                            $result = mysqli_query($db, $query);
                            $hasLatest = false;

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $createdAt = strtotime($row['created_at']);
                                    if (($now - $createdAt) <= 604800) { // within 7 days
                                        $hasLatest = true;
                                        echo '
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong><span class="w-25">Chemical Name:</span></strong>   
                                                <div class="text-muted" title="' . htmlspecialchars($row['product_name']) . '">' . htmlspecialchars($row['product_name']) . '</div>
                                               <strong><span class="w-25">Reference No:</span></strong>  
                                                <small class="text-muted">' . htmlspecialchars($row['reference_no']) . '</small><br>
                                                <strong><span class="w-25">Publish Status:</span></strong>  
                                                <small class="bg-primary text-white px-2 py-1 rounded">' . htmlspecialchars($row['verified_status']) . '</small><br>  
                                            </div>
                                            <a href="supply_detail.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" target="_blank">View</a>
                                        </li>';
                                    }
                                }
                            }
                            

                            if (!$hasLatest) {
                                echo '<li class="list-group-item text-muted">No recent supplies.</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="text-decoration-none">Show Older ▼</a>
                    </div>
                </div>

                <!-- Older Supply -->
                <div class="card">
                    <div class="card-header bg-light fw-bold">Older</div>
                    <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
                        <ul class="list-group list-group-flush">
                            <?php
                            $queryOlder = "SELECT * FROM stock_listings WHERE verified_status = 'Verified' ORDER BY id DESC";
                            $resultOlder = mysqli_query($db, $queryOlder);
                            $hasOlder = false;

                            if ($resultOlder && mysqli_num_rows($resultOlder) > 0) {
                                while ($row = mysqli_fetch_assoc($resultOlder)) {
                                    $createdAt = strtotime($row['created_at']);
                                    if (($now - $createdAt) > 604800) {
                                        $hasOlder = true;
                                        echo '
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>    
                                            <strong><span class="w-25">Chemical Name:</span></strong>    <div class="text-muted" title="' . htmlspecialchars($row['product_name']) . '">' . htmlspecialchars($row['product_name']) . '</div>
                                            <strong><span class="w-25">Reference No:</span></strong>  <small class="text-muted">' . htmlspecialchars($row['reference_no']) . '</small><br>
                                            <strong><span class="w-25" >Publish Status:</span></strong>  <small class="bg-primary text-white px-2 py-1 rounded" >' . htmlspecialchars($row['verified_status']) . ' ' . '</small><br>  
                                     
                                            
                                                </div>
                                                </li>';
                                                echo '<a href="supply_detail.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" target="_blank">View</a>';
                                               
                                    }
                                }
                            }

                            if (!$hasOlder) {
                                echo '<li class="list-group-item text-muted">No older supplies found.</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- DEMAND SECTION -->
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="mb-0 text-success">Demand</h3>
              
                    
                </div>

                <!-- Latest Demand (This Week) -->
                <div class="card mb-3">
                    <div class="card-header bg-light fw-bold">Latest (This Week)</div>
                    <div class="card-body p-0" style="max-height: 350px; overflow-y: auto;">

                    <?php if ($chemical || $country || $reference): ?>
    <div class="alert alert-info">
        <?= $demandCount ?> demand record<?= $demandCount !== 1 ? 's' : '' ?> found 
        for 
        <?= $chemical ? "chemical '<strong>$chemical</strong>' " : '' ?>
        <?= $country ? "from '<strong>$country</strong>' " : '' ?>
        <?= $reference ? "with reference '<strong>$reference</strong>'" : '' ?>.
    </div>
<?php endif; ?>


                        <ul class="list-group list-group-flush">
                            <?php
                            $queryLatest = "SELECT * FROM purchase_inquiries WHERE verified_status = 'Verified' ORDER BY id DESC";
                            $resultLatest = mysqli_query($db, $queryLatest);
                            $hasLatest = false;

                            if ($resultLatest && mysqli_num_rows($resultLatest) > 0) {
                                while ($row = mysqli_fetch_assoc($resultLatest)) {
                                    $createdAt = strtotime($row['created_at']);
                                    if (($now - $createdAt) <= 604800) {
                                        $hasLatest = true;
                                        echo '
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong><span class="w-25">Chemical Name:</span></strong>
                                                <div class="text-muted" title="' . htmlspecialchars($row['product_name']) . '">' . htmlspecialchars($row['product_name']) . '</div>
                            
                                            
                                                <strong><span class="w-25">Reference No:</span></strong>
                                                <small class="text-muted">' . htmlspecialchars($row['reference_no']) . '</small><br>
                            
                                                <strong><span class="w-25">Publish Status:</span></strong>
                                                <small class="bg-success text-white px-2 py-1 rounded">' . htmlspecialchars($row['verified_status']) . '</small><br>
                                            </div>
                                            <a href="demand_detail.php?id=' . $row['id'] . '" class="btn btn-success btn-sm" target="_blank">Offers</a>
                                        </li>';
                                    }
                                }
                            }
                            

                            if (!$hasLatest) {
                                echo '<li class="list-group-item text-muted">No recent inquiries.</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="text-decoration-none">Show Older ▼</a>
                    </div>
                </div>

                <!-- Older Demand -->
                <div class="card">
                    <div class="card-header bg-light fw-bold">Older</div>
                    <div class="card-body p-0" style="max-height: 350px; overflow-y: auto;">


                        <ul class="list-group list-group-flush">
                            <?php
                            $queryOlder = "SELECT * FROM purchase_inquiries WHERE verified_status = 'Verified' ORDER BY id DESC";
                            $resultOlder = mysqli_query($db, $queryOlder);
                            $hasOlder = false;

                            if ($resultOlder && mysqli_num_rows($resultOlder) > 0) {
                                while ($row = mysqli_fetch_assoc($resultOlder)) {
                                    $createdAt = strtotime($row['created_at']);
                                    if (($now - $createdAt) > 604800) {
                                        $hasOlder = true;
                                        echo '
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                            <strong><span class="w-25">Chemical Name:</span></strong>    <div class="text-muted" title="' . htmlspecialchars($row['product_name']) . '">' . htmlspecialchars($row['product_name']) . '</div>
                                           
                    <strong><span class="w-25">Reference No:</span></strong>
                    <small class="text-muted">' . htmlspecialchars($row['reference_no']) . '</small><br>

                    <strong><span class="w-25">Publish Status:</span></strong>
                    <small class="bg-success text-white px-2 py-1 rounded">' . htmlspecialchars($row['verified_status']) . '</small><br>
                </div>
                <a href="demand_detail.php?id=' . $row['id'] . '" class="btn btn-success btn-sm" target="_blank">Offers</a>
            </li>';
                                    }
                                }
                            }

                            if (!$hasOlder) {
                                echo '<li class="list-group-item text-muted">No older inquiries found.</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

        <!-- CHEMICAL INQUIRIES (DEMAND) -->
<section class="py-5" style="background-color:#f9f9f9;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Chemical Inquiries (Demand)</h1>
            <!-- Trigger Buttons -->

<!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#purchaseModal">
  Post a Purchase Inquiry
</button> -->

            <a href="submit-inquiry.php" class="btn btn-outline-primary">Submit Inquiry</a>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT * FROM inquiry ORDER BY id DESC LIMIT 3";
            $result = mysqli_query($db, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $chemical = isset($row['product_name']) ? htmlspecialchars($row['product_name']) : 'N/A';
                    $destination = isset($row['destination']) ? htmlspecialchars($row['destination']) : 'N/A';
                    $price = isset($row['target_price']) ? htmlspecialchars($row['target_price']) : 'N/A';
                    $date = isset($row['created_at']) ? date('d M Y', strtotime($row['created_at'])) : 'N/A';
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= $chemical ?></h5>
                                <p class="card-text"><strong>Destination:</strong> <?= $destination ?></p>
                                <p class="card-text"><strong>Target Price:</strong> <?= $price ?></p>
                                <hr>
                                <p class="card-text text-muted"><strong>Date Posted:</strong> <?= $date ?></p>
                                <a href="inquiry.php?id=<?= $row['id'] ?>" class="btn btn-primary">Inquire</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="text-muted">No inquiries found.</p>';
            }
            ?>
        </div>
    </div>
</section>

<!-- AVAILABLE STOCK (SUPPLY) -->
<section class="py-5" style="background-color:#fff;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Available Stock (Supply)</h1>
            <!-- Button to Open 'List Stock for Sale' Modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stockModal">
  List Your Stock for Sale
</button> -->
            <a href="submit-stock.php" class="btn btn-outline-success">Submit Available Stock</a>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT * FROM supplier_chemical_list ORDER BY id DESC LIMIT 3";
            $result = mysqli_query($db, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $chemical = isset($row['product_name']) ? htmlspecialchars($row['product_name']) : 'N/A';
                    $origin = isset($row['origin_country']) ? htmlspecialchars($row['origin_country']) : 'N/A';
                    $price = isset($row['price']) ? htmlspecialchars($row['price']) : 'N/A';
                    $date = isset($row['created_at']) ? date('d M Y', strtotime($row['created_at'])) : 'N/A';
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= $chemical ?></h5>
                                <p class="card-text"><strong>Origin:</strong> <?= $origin ?></p>
                                <p class="card-text"><strong>Price:</strong> <?= $price ?></p>
                                <hr>
                                <p class="card-text text-muted"><strong>Date Posted:</strong> <?= $date ?></p>
                                <a href="stock-inquiry.php?id=<?= $row['id'] ?>" class="btn btn-success">Inquire</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="text-muted">No available stock found.</p>';
            }
            ?>
        </div>
    </div>
</section>
        <!-- <div class="col-md-12 banner-wrapper banner-wrapper-2 main-map-wrapper">
                        <div class="shadow-lg rounded w-100 bg-white p-3 banner-form">
                            <h3 class="text-left"><?= $buyerSupplierInquiryTitle->title1 ?></h3>
                            <?php if (!empty($buyerSupplierInquiryTitle->title3)) {
                                echo "<h5 class='text-left'>{$buyerSupplierInquiryTitle->title3}</h5>";
                            } ?>
                            <div class="progress-bar-wrapper">
                                <div class="progress-bar"></div>
                            </div>
                            <form id="getHomeInquiryForm" method="post"
                                action="<?= get_root() ?>/inc/home-inquiry/home-buyer-supplier-inquiry-add.php">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row" style="background-color: #ced4da ;color:white;padding:20px;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="w-100">
                                                            <select
                                                                class="form-select px-1 text-left combined-mobile home-inquiry-chemical-fields"
                                                                id="home-inq-chemical" name="homeInquiry[chemical_id]"
                                                                required>
                                                                <?php
                                                                foreach ($supplierChemicalModel as $chemicalKey4 => $chemicalVal4) {
                                                                    $chemicalValue4 = (object) $chemicalVal4;
                                                                ?>
                                                                    <option value="<?= $chemicalValue4->product_name ?>">
                                                                        <?= $chemicalValue4->product_name ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                            <input type="hidden" class="form-control "
                                                                id="home-inq-quantity" name="homeInquiry[quantity]"
                                                                placeholder="">
                                                            <div class="showErr"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select class="form-select" id="home-inq-who_to_contact"
                                                            name="homeInquiry[who_to_contact]" required>
                                                            <option value="Buyer">Buyer</option>
                                                            <option value="Supplier" selected>Supplier</option>
                                                        </select>
                                                        <div class="showErr"></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select class="form-select px-1 text-left combined-mobile"
                                                            id="home-inq-destination" name="homeInquiry[destination]"
                                                            required>
                                                            <option value="all">Global</option>
                                                            <?php
                                                            foreach ($countryModel as $countryKey5 => $countryVal5) {
                                                                $countryValue5 = (object) $countryVal5;
                                                            ?>
                                                                <option value="<?= $countryValue5->nicename ?>">
                                                                    <?= $countryValue5->name ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="showErr"></div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <button class=" oc-btn px-4 btn-block" type="button"
                                                            id="btnSearch">Search</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="chemical-select-wrapper">
                                        <div class="mb-3">
                                            <div class="row"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3 visibility-hidden" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="country_code"
                                                        class="form-label home-inq-mobile-label text-start w-100">Country
                                                        Code</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="w-100">
                                                        <select class="form-select px-1 text-left combined-mobile w-100"
                                                            id="country_code" name="country_code">
                                                            <?php
                                                            foreach ($countryModel as $countryKey4 => $countryVal4) {
                                                                $countryValue4 = (object) $countryVal4;
                                                            ?>
                                                                <option value="<?= $countryValue4->phonecode ?>">
                                                                    <?= $countryValue4->name ?> -
                                                                    +<?= $countryValue4->phonecode ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 visibility-hidden" style="display:none">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="home-inq-mobile"
                                                        class="form-label home-inq-mobile-label text-start w-100">Number</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="tel" id="home-inq-mobile" class="form-control w-100"
                                                        name="homeInquiry[mobile]" placeholder="Whatsapp Number"
                                                        value="" />
                                                    <div class="showErr"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 ">
                                            <div class="w-100">
                                                <label for="home-inq-details"
                                                    class="form-label home-inq-details-label w-100 text-start">Type Your
                                                    Message</label>
                                                <textarea id="home-inq-details" class="form-control"
                                                    name="homeInquiry[details]" placeholder="Details" cols="15"
                                                    rows="3"></textarea>
                                                <div class="showErr"></div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <label for="text"
                                            class="form-label home-inq-buyer_supplier-label w-100 text-start">List of
                                            Buyers/Suppliers</label>
                                        <div id="all-user-wrapper">
                                            <ul class="list-group" id="wrapperBox">
                                                <li class="list-group-item active">Total Record: <b>0</b></li>
                                                <li class="list-group-item active" style="display:none">
                                                    <input onkeyup="filterList()" placeholder="Search Name/Number"
                                                        type="text" id="userFilter" class="form-control">

                                                    <div class="d-flex gap-1">
                                                        <div class="my-2 mx-4">
                                                            <input class="form-check-input" type="radio"
                                                                name="checkUncheck" id="checkUncheck1"
                                                                onclick="checkAll()">
                                                            <label for="checkUncheck1">Check</label>
                                                        </div>

                                                        <div class="my-2 mx-4">
                                                            <input class="form-check-input" type="radio"
                                                                name="checkUncheck" id="checkUncheck2"
                                                                onclick="uncheckAll()">
                                                            <label for="checkUncheck2">Uncheck</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="list-group" id="filterable-wrapper" style="margin-top: 20px;">
                                            </ul>
                                        </div>
                                        <div class="showErr"></div>
                                    </div>
                                    <div class="col-md-12 my-3 text-center">
                                        <button type="submit" id="btnSend" class="btn oc-btn px-5">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
        <!-- <div class="col-md-4 banner-wrapper-3">
                        <img src="<?= $target_dir6 . $buyerSupplierInquiryTitle->cover ?>" class="w-100" alt="">
                    </div> -->
        </div>
        </div>
    </section>

    <style>
        .scrollbar {
            max-height: 400px;
            overflow-y: scroll;
            padding: 14px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .chat-wrapper {
            border: 1px solid lightgrey;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        /* Scrollbar Styles */
        #style-1::-webkit-scrollbar-track {
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        #style-1::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        #style-1::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #555;
            box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        }

        /* Code by hamza */
        .nav ul {
            list-style-type: none;
            display: flex;
            gap: 10px;
            padding: 0px 300px;
            margin: 10px 0px;
            font-size: 12px;
           
           
        }
       
        .nav ul li a {
            text-decoration: none;
            color: black;
            padding: 8px 12px;
            background: #E3DFFA !important;
            /* border: none; */
              border-radius: 7px;
              font-weight: bold;
            
            
        }
        .nav ul li a:hover{
            color: #e7e0da !important;
    background-color: var(--primary-bg-color) !important;
        }
   
       
      
        /* code by hamza  */
        
    </style>

    <section class="section story-section bg-white banner-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- <div class="col-md-12 mt-4 text-center">
                            <div class="story-section-wrapper"> -->
                <!-- Title and Price Button Section -->
                <!-- <div class="d-flex justify-content-between align-items-center mb-3"  style="margin-top:30px;">
                                    <h4 style="font-weight:bold;">Key Chemical Prices</h4> -->
                <!--<button style="border: 1px solid #0C68F0;border-radius: 20px;color: #0C68F0;font-size:12px;" class="btn ">View Price &nbsp;&nbsp;<i class="fas fa-chevron-right"></i>-->
                <!--</button>-->
            </div>

            <!-- <div class="row chat-wrapper" style="
                                        border: 1px solid #f3f3f3;
                                        padding-top: 10px;
                                        padding-bottom: 10px;
                                        background: blue;
                                        color:white;
                                        border-radius: 8px;
                                        /* box-shadow: rgba(0, 0, 0, 0.1) 0px 12px 12px; */
                                        margin-bottom:10px;
                                        margin-left:0px;
                                        width:100%;">
                                    <div class="col-3">Chemical Prices</div>
                                    <div class="col-3">Location</div>
                                    <div class="col-3">Price</div>
                                    <div class="col-3"> Action</div> 
                                </div>
                                <div class="scrollbar" id="style-1">
                                    <div class="force-overflow"></div -->
            <?php
            // foreach ($model as $key => $value) {
            //     $chemical_price = '-';

            //     // Query to fetch all data for the current uid
            //     $query = "SELECT * FROM `supplier_chemical_list` WHERE uid = 108";
            //     $stmt = $db->prepare($query);
            //     if (!$stmt) {
            //         die("Query preparation failed: " . $db->error);
            //     }

            // Bind the `uid` parameter
            //$stmt->bind_param('s', '108'); // Assuming `uid` is a string
            // $stmt->execute();
            // $result = $stmt->get_result();

            // if ($result->num_rows > 0) {
            //     while ($chemical_price_model = $result->fetch_object()) {
            //         // Skip this row if the price is '-' or null
            //         if ($chemical_price_model->price === '-' || empty($chemical_price_model->price)) {
            //             continue; // Skip this record
            //         }

            //         // Ensure $chemical_price_model is not null
            //         $product_name = $chemical_price_model->product_name ?? 'Unknown Product';
            //         $chemical_price = $chemical_price_model->price ?? '-';
            //         $slug = $chemical_price_model->slug ?? '#';

            //         // Mask email
            //         $email = empty($value['email']) ? 'N/A' : '**' . substr($value['email'], 2);

            //         // Mask mobile number
            //         $mobile = $value['mobile'];
            //         $hiddenMobile = substr($mobile, 0, -4) . '****';

            //         // Country information
            //         $country = $value['country'] ?? 'Unknown Country';
            ?>
            <!-- <div class="row chat-wrapper">
                <div class="col-3"> -->
            <!-- <a style="text-decoration:none;color:black;" href="< get_root() ?>chemical-view/< htmlspecialchars($slug, ENT_QUOTES) ?>" target="_blank"> -->
            <!-- < htmlspecialchars($product_name, ENT_QUOTES) ?>
                    </a>
                </div>
                <div class="col-3">< htmlspecialchars($country, ENT_QUOTES) ?></div>
                <div class="col-3">< htmlspecialchars($chemical_price, ENT_QUOTES) ?></div>
                <div class="col-3">
                    <a href="http://wa.me/< htmlspecialchars($value['mobile'], ENT_QUOTES) ?>" target="_blank" style="background:white; border-radius:19px;" class="btn">
                        <img src="assets/img/whatsapp.png" alt="Oilfield Chemical Suppliers" style="height:25px;">
                    </a>
                </div>
            </div> -->
            <?php
            //  }
            // } else {
            // echo "<div>No data found for uid: {$value['id']}</div>";
            //}

            // $stmt->close();
            // }
            ?>

            <!-- foreach ($storyModel as $storyKey => $storyVal): 
                                            $storyValue = (object) $storyVal; 
                                            
                                            $maxLength = 20; // Set maximum length for the product name
                                            $productName = mb_strlen($storyValue->product_name) > $maxLength ? mb_substr($storyValue->product_name, 0, $maxLength) . '...' : $storyValue->product_name;
                                            ?> -->

            <!-- <div class="row chat-wrapper">
                                                <div class="col-md-3"><?= $productName ?></div>
                                                <div class="col-md-3">USA</div>
                                                <div class="col-md-3">$<?= $storyValue->price ?></div>
                                                <div class="col-md-3">
                                                    <a href="https://wa.me/1234567890" target="_blank" style="background:white; border-radius:19px;" class="btn">
                                                        <img src="assets/img/whatsapp.png" alt="" style="height:25px;">
                                                    </a>
                                                </div> 
                                            </div> -->

            <?php // endforeach; 
            ?>
        </div>
        </div>
        </div>

        <br><br><br>

        <div class="col-md-12 banner-wrapper-1" style="margin-top:80px;">
            <div class="shadow-lg rounded chat-wrapper">

                <style>
                    .mobile_attachment {
                        display: none;
                    }

                    .user_input_web {

                        display: flex;
                        align-items: center;


                    }

                    .attachment {

                        margin-left: -75px;
                        margin-top: 20px;
                        margin-bottom: 20px;
                        text-align: end;
                    }

                    .checkboxes1 {
                        margin-top: 20px;
                    }

                    .checkboxes2 {
                        margin-top: 20px;
                    }

                    img {
                        max-width: 100%;
                    }

                    .inbox_people {
                        background: #f8f8f8 none repeat scroll 0 0;
                        float: left;
                        overflow: hidden;
                        width: 30%;
                        border-right: 1px solid #c4c4c4;
                    }

                    .inbox_msg {
                        border: 1px solid #c4c4c4;
                        clear: both;
                        overflow: hidden;
                    }

                    .top_spac {
                        margin: 20px 0 0;
                    }

                    .recent_heading {
                        float: left;
                        width: 40%;
                    }

                    .srch_bar {
                        display: inline-block;
                        text-align: right;
                        width: 60%;
                    }

                    .headind_srch {
                        padding: 10px 29px 10px 20px;
                        overflow: hidden;
                        border-bottom: 1px solid #c4c4c4;
                    }

                    .recent_heading h4 {
                        color: #05728f;
                        font-size: 21px;
                        margin: auto;
                    }

                    .srch_bar input {
                        border: 1px solid #cdcdcd;
                        border-width: 0 0 1px 0;
                        width: 80%;
                        padding: 2px 0 4px 6px;
                        background: none;
                    }

                    .srch_bar .input-group-addon button {
                        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                        border: medium none;
                        padding: 0;
                        color: #707070;
                        font-size: 18px;
                    }

                    .srch_bar .input-group-addon {
                        margin: 0 0 0 -27px;
                    }

                    .chat_ib h5 {
                        font-size: 15px;
                        color: #464646;
                        margin: 0 0 8px 0;
                    }

                    .chat_ib h5 span {
                        font-size: 13px;
                        float: right;
                    }

                    .chat_ib p {
                        font-size: 14px;
                        color: #989898;
                        margin: auto;
                    }

                    .chat_img {
                        float: left;
                        width: 11%;
                    }

                    .chat_ib {
                        float: left;
                        padding: 0 0 0 15px;
                        width: 88%;
                    }

                    .chat_people {
                        overflow: hidden;
                        clear: both;
                    }

                    .chat_list {
                        border-bottom: 1px solid #c4c4c4;
                        margin: 0;
                        padding: 18px 16px 10px;
                    }

                    .inbox_chat {
                        height: 550px;
                        overflow-y: scroll;
                    }

                    .active_chat {
                        background: #ebebeb;
                    }

                    .incoming_msg_img {
                        display: inline-block;
                        width: 6%;
                    }

                    .received_msg {
                        display: inline-block;
                        padding: 0 0 0 10px;
                        vertical-align: top;
                        width: 92%;
                    }

                    .received_withd_msg p {
                        background: #ebebeb none repeat scroll 0 0;
                        border-radius: 3px;
                        color: #646464;
                        font-size: 14px;
                        margin: 0;
                        padding: 5px 10px 5px 12px;
                        width: 100%;
                    }

                    .time_date {
                        color: #747474;
                        display: block;
                        font-size: 12px;
                        margin: 8px 0 0;
                    }

                    .received_withd_msg {
                        width: 57%;
                    }

                    .mesgs {
                        float: left;
                        padding: 30px 15px 0 25px;
                        width: 70%;
                    }

                    .sent_msg p {
                        background: #05728f none repeat scroll 0 0;
                        border-radius: 3px;
                        font-size: 14px;
                        margin: 0;
                        color: #fff;
                        padding: 5px 10px 5px 12px;
                        width: 100%;
                    }

                    .outgoing_msg {
                        overflow: hidden;
                        margin: 26px 0 26px;
                    }

                    .sent_msg {
                        float: right;
                        width: 46%;
                    }

                    .input_msg_write input {
                        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                        border: medium none;
                        color: #4c4c4c;
                        font-size: 15px;
                        min-height: 48px;
                        width: 100%;
                    }

                    .type_msg {
                        border-top: 1px solid #c4c4c4;
                        position: relative;
                        padding: 10px;
                    }

                    .input_msg_write {
                        position: relative;
                        display: flex;
                        align-items: flex-end;
                    }

                    .write_msg {
                        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                        border: medium none;
                        color: #4c4c4c;
                        font-size: 15px;
                        min-height: 48px;
                        width: 100%;
                        padding-right: 50px;
                        resize: none;
                    }

                    .msg_send_btn {
                        background: #05728f none repeat scroll 0 0;
                        border: medium none;
                        border-radius: 50%;
                        color: #fff;
                        cursor: pointer;
                        font-size: 17px;
                        height: 33px;
                        position: absolute;
                        right: 0;
                        bottom: 0;
                        width: 33px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .msg_send_btn i {
                        font-size: 16px;
                    }

                    .messaging {
                        padding: 0 0 50px 0;
                    }

                    .msg_history {
                        height: 516px;
                        overflow-y: auto;
                    }

                    /* Media Queries for Responsiveness */
                    @media (max-width: 768px) {

                        .mobile_slideshow {
                            display: block !important;
                        }

                        .web_slideshow {
                            display: none !important;
                        }

                        .inbox_people {
                            width: 100%;
                            border-right: none;
                        }

                        .mesgs {
                            width: 100%;
                            padding: 15px 10px;
                        }

                        .chat_img {
                            width: 12%;
                        }

                        .chat_ib {
                            width: 85%;
                        }

                        .chat_list {
                            padding: 10px 8px;
                        }

                        .type_msg {
                            padding: 10px;
                        }

                        .input_msg_write input {
                            font-size: 14px;
                        }

                        .msg_send_btn {
                            height: 53px;
                            width: 53px;
                            top: 14px;
                        }

                    }

                    @media (max-width: 480px) {
                        .recent_heading h4 {
                            font-size: 18px;
                        }

                        .srch_bar input {
                            width: 70%;
                        }

                        .input_msg_write input {
                            font-size: 13px;
                        }

                        .msg_send_btn {
                            height: 53px;
                            width: 53px;
                            top: 14px;
                        }

                    }
                </style>

                <div class="container" id="chat-message">
                    <h3 class="text-center">Reverse Auction</h3>
                    <p class="text-center">Find suppliers based on buyers target price and specification.</p>
                    <div class="messaging">
                        <div class="inbox_msg">
                            <div class="inbox_people">
                                <div class="headind_srch">
                                    <div class="recent_heading">
                                        <h4>Recent</h4>
                                    </div>
                                    <div class="srch_bar">
                                        <div class="stylish-input-group">
                                            <input type="text" class="search-bar" placeholder="Search">
                                            <span class="input-group-addon">
                                                <button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- This section holds the chat users -->
                                <div class="inbox_chat chat-body chat-body-rfq">
                                    <!-- Example user list item -->

                                    <!-- More users will be added here dynamically -->
                                </div>
                            </div>

                            <div class="mesgs">
                                <div class="msg_history chat-body-history">
                                    <!-- Previous messages will go here -->
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <textarea
                                            name="message"
                                            id="chat-input-rfq"
                                            class="write_msg"
                                            placeholder="Type a message"
                                            oninput="autoResize(this)"
                                            rows="1"></textarea>
                                        <button class="msg_send_btn" id="send-message" onclick="startProcess()" type="button">
                                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buy/Sell Choice Modal -->
                    <div class="modal fade" id="buySellModal" tabindex="-1" role="dialog" aria-labelledby="buySellModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="buySellModalLabel">Choose Your Action</h5>
                                    <button type="button" class="close" id="closeBuySellModal" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Please select if you're looking to buy or sell.</p>
                                    <button type="button" id="buyButton" class="btn btn-primary btn-block">Want to Buy</button>
                                    <button type="button" id="sellButton" class="btn btn-secondary btn-block">Want to Sell</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buy Input Modal -->
                    <div class="modal fade" id="buyInputModal" tabindex="-1" role="dialog" aria-labelledby="buyInputModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="buyInputModalLabel">Buy Input Page</h5>
                                    <button type="button" class="close" id="closeBuyInputModal" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Please provide details for the product you're looking to buy.</p>
                                    <textarea
                                        id="buyDetails"
                                        class="form-control modal-textarea"
                                        placeholder="Enter Buy Details"
                                        rows="2"
                                        oninput="autoResize(this)"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="nextBuy">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sell Input Modal -->
                    <div class="modal fade" id="sellInputModal" tabindex="-1" role="dialog" aria-labelledby="sellInputModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sellInputModalLabel">Sell Input Page</h5>
                                    <button type="button" class="close" id="closeSellInputModal" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Please provide details for the product you're looking to sell.</p>
                                    <textarea
                                        id="sellDetails"
                                        class="form-control modal-textarea"
                                        placeholder="Enter Sell Details"
                                        rows="2"
                                        oninput="autoResize(this)"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="nextSell">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Identity Modal -->
                    <div class="modal fade" id="identityModal" tabindex="-1" role="dialog" aria-labelledby="identityModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="identityModalLabel">Choose How to Send Your Message</h5>
                                    <button type="button" class="close" id="closeIdentityModal" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Choose how you want your message to be shared:</p>
                                    <ul>
                                        <li><strong>Show my Identity</strong> – Your name and contact details will be visible.</li>
                                        <li><strong>Send Anonymously</strong> – Your identity will be hidden from public view.</li>
                                        <li><strong>Don't post publicly</strong> – The message will not appear on the website, but will be emailed directly to specific suppliers.</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button id="identityButton" class="btn btn-primary">Show My Identity</button>
                                    <button id="anonymousButton" class="btn btn-secondary">Send Anonymously</button>
                                    <button id="emailOnlyButton" class="btn btn-warning">Don't Post Publicly (Email Only)</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>




            </div>


            <!-- <div class="card border-0 message-tabs-content active-rfq" id="chat2"
                                style="background:transparent">
                                <div class="p-3" style="border-bottom:1px solid #E4E4E4">
                                    <h5 class="mb-0">Active RFQ's</h5>
                                </div>
                                <br><br>

                                

                               
                                <div class="card-body chat-body chat-body-rfq" style="scroll-behavior: smooth;">

                                
                                <div
                                    class="card-footer text-white d-flex justify-content-start align-items-center bg-white">
                                    <input type="text" class="form-control form-control-lg border-0" id="chat-input-rfq"
                                        onclick="checkMessageEligibility()" placeholder="Type message..">
                                    <a class="mx-1 oc-outline-btn border-0 d-none" href="#"><i
                                            class="fas fa-paperclip"></i></a>
                                    <a class="oc-btn" id="send-message" onclick="sendGroupMessageRFQ()"><i
                                            class="fas fa-paper-plane"></i></a>
                                </div>
                            </div> -->

            <!-- <div class="card border-0 message-tabs-content available-stock" id="chat3"
                                style="background:transparent">
                                <div class="p-3" style="border-bottom:1px solid #E4E4E4">
                                    <h5 class="mb-0">Available Stock</h5>
                                </div>
                                <div class="card-body chat-body chat-body-stock" style="scroll-behavior: smooth;">

                                </div>
                                <div
                                    class="card-footer text-white d-flex justify-content-start align-items-center bg-white">
                                    <input type="text" class="form-control form-control-lg border-0"
                                        id="chat-input-stock" onclick="checkMessageEligibility()"
                                        placeholder="Type message..">
                                    <a class="mx-1 oc-outline-btn border-0 d-none" href="#"><i
                                            class="fas fa-paperclip"></i></a>
                                    <a class="oc-btn" id="send-message" onclick="sendGroupMessageStock()"><i
                                            class="fas fa-paper-plane"></i></a>
                                </div>
                            </div> -->
        </div>
        </div>
        <!-- <div class="col-md-4 banner-wrapper-2">
                        <img src="<?= $target_dir6 . $buyerSupplierInquiryTitle->cover2 ?>" class="w-100" alt="">
                    </div> -->

        <!-- <div class="col-md-12 banner-wrapper-1" style="margin-top:50px;">
                        <div class="shadow-lg rounded chat-wrapper">
                            <form class="" id="" method="post" action="inc/search/search_add_to.php" enctype="multipart/form-data">
                                <div class="container">
                                    <div class="row">
                                           
                                           <h3 style="text-align:center;margin-top:20px;">Submit your purchase inquiry or stock/offers available, HERE</h3>
                                           
                                        <div class="col-md-2 checkboxes1" style="margin-bottom:20px;text-align:center;">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="search[buy]" id="buy" value="I Want To Buy" checked>
                                                <label class="form-check-label" for="buy">I Want To Buy</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 checkboxes2" style="margin-bottom:20px;text-align:center;">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="search[buy]" id="sell" value="I Want To Sell">
                                                <label class="form-check-label" for="sell">I Want To Sell</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 attachment" style="">
                                            
                                            <input type="file" id="search-photo-new" name="photo" style="display:none;"  onchange="updateFileName()">
                                            <i class="fa fa-paperclip" style="font-size:30px; cursor: pointer;" aria-hidden="true" onclick="document.getElementById('search-photo-new').click();"></i>
                                            <span id="file-name" style="margin-left: 10px; font-size: 16px; color: #555;"></span>
                                        </div>
                                        <br> -->

        <!-- <div class="col-md-3 mb-2">
                                            <input type="text" id="sort-on-time-chemical" class="form-control" name="search[chemical]" placeholder="Type Chemical Name ..." value="<?= $searchText ?>" required /> 
                                        </div>
                                        
                                        <div class="col-md-3 mb-2">
                                            <select class="w-100 form-select text-left combined-mobile" name="country_code"> -->
        <?php //foreach ($countryModel as $countryKey4 => $countryVal4): 
        //  $countryValue4 = (object) $countryVal4; 
        ?>
        <!-- <option value="< $countryValue4->phonecode ?>" < ($countryValue4->phonecode == $country_code) ? 'selected' : '' ?>> -->
        <!-- < $countryValue4->name ?> - +< $countryValue4->phonecode ?> -->
        <!-- </option> -->
        <?php //endforeach; 
        ?>
        </select>
        <!-- <input type="tel" class="form-control w-100" name="search[mobile]" placeholder="Mobile (Whatsapp)" value="" />
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group row align-items-center">
                                                <div class="user_input_web">
                                                    <textarea id="sort-on-time-message" class="form-control" name="search[message]" cols="30" rows="3" placeholder='Provide details about your <?= $searchText ?> buying requirement so supplier can contact you with their quotes.' required></textarea>
                                                    <div class="mobile_attachment">
                                                        <input type="file" id="search-photo-new" name="photo" style="display:none;"  onchange="updateFileName()">
                                                        <i class="fa fa-paperclip" style="font-size:30px; cursor: pointer;" aria-hidden="true" onclick="document.getElementById('search-photo-new').click();"></i>
                                                        <span id="file-name" style="margin-left: 10px; font-size: 16px; color: #555;"></span>
                                                    </div>
                                                    <input type="submit" class="oc-btn submit_btn" style="margin-left:20px;" value="Submit"/>
                                                </div>
                                            </div>
                                            
                                            <br> -->
        <?php //if(isset($_REQUEST['message']) == "success"){ 
        ?>
        <!-- <div class="alert alert-success" role="alert">
                                                    Your message submitted Successfully for review. We will contact You Short or
Reach our customer care on WhatsApp +47 94432969.
                                                </div> -->
        <?php //} 
        ?>
        <!--                                                 
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    

                </div>
            </div>
        </section> -->


        <!-- <section class="section story-section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">Join Your Local Chemical Community For DIRECT Interactions</h3>
                    </div>
                    <div class="col-md-12 mt-4 text-center">
                        <div class="story-section-wrapper">
                            
                                <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": 2500, "pauseAutoPlayOnHover": false, "adaptiveHeight": true }'>
                                    
                                        <div class="carousel-cell small-carousel-cell" >
                                            <div class="video-block">
                                                <a href="https://chat.whatsapp.com/FA2TwgtPRoe3vKcZDaCglK" target="_blank">
                                                    <img src="https://i.ibb.co/4JSFFC3/IMG-20241118-WA0025.jpg" alt="Oilfield Chemical Suppliers in Dubai">
                                                </a>
                                               
                                            </div>
                                        </div>
                                        <div class="carousel-cell small-carousel-cell" >
                                            <div class="video-block">
                                                <a href="https://chat.whatsapp.com/Gp0AYqdnxJI9oHVwtjI4FZ" target="_blank">
                                                    <img src="https://i.ibb.co/bFZz84d/IMG-20241118-WA0026.jpg" alt="Oilfield Chemical in Dubai">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="carousel-cell small-carousel-cell" >
                                            <div class="video-block">
                                                <a href="https://chat.whatsapp.com/IayXon6vlbz7p8yUHkCpK8" target="_blank">
                                                    <img src="https://i.ibb.co/3v3rbwr/IMG-20241118-WA0027.jpg" alt="Oilfield Chemical suppliers in UAE">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="carousel-cell small-carousel-cell" >
                                            <div class="video-block">
                                                <a href="https://chat.whatsapp.com/D9GW6uZcqa0JSucheuabnh" target="_blank">
                                                    <img src="https://i.ibb.co/dpfQ7Fc/IMG-20241118-WA0029.jpg" alt="Oilfield Chemical Suppliers in Saudi Arabia">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="carousel-cell small-carousel-cell" >
                                            <div class="video-block">
                                                <a href="https://chat.whatsapp.com/JJacYSh9UZILKmfawuIN8j" target="_blank">
                                                    <img src="https://i.ibb.co/zsP21F5/IMG-20241118-WA0030.jpg" alt="Oilfield Chemical Manufacturers & Suppliers in UAE">
                                                </a>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>  
        </section> -->
    </section>

    <section class="section story-section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center"><?= $storyTitle->title1 ?></h3>
                    <?php if (!empty($storyTitle->title3)) {
                        echo "<h5 class='text-center'>{$storyTitle->title3}</h5>";
                    } ?>
                </div>
                <div class="col-md-12 mt-4 text-center">
                    <div class="story-section-wrapper">
                        <?php if (count($storyModel) > 0) {

                            // Shuffle the array and take the first 15 items
                            $randomStories = $storyModel;
                            shuffle($randomStories);
                            $randomStories = array_slice($randomStories, 0, 15);

                        ?>
                            <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": 2500, "pauseAutoPlayOnHover": false, "adaptiveHeight": true }'>
                                <?php foreach ($randomStories as $storyKey => $storyVal):
                                    $storyValue = (object) $storyVal; ?>
                                    <div class="carousel-cell small-carousel-cell">
                                        <div class="video-block">
                                            <a href="<?= get_root() ?>chemical-view/<?= $storyValue->slug ?>" target="_blank">
                                                <img src="<?= get_root() ?>assets/img/chemical/<?= $storyValue->chemical_photo ?>" alt="Oil Field Chemicals Suppliers in Sharjah, UAE">
                                            </a>
                                            <div class="text-block">
                                                <h4 class="product-title"><?= $storyValue->product_name ?></h4>
                                                <p class="product-price">$<?= $storyValue->price; ?></p> <!-- Assuming price is a numeric value -->
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>


                        <?php } else { ?>
                            <p>No Story found</p>
                        <?php } ?>
                    </div>
                </div>

                <br><br>
                <div class="col-md-12" style="margin-top:60px;">
                    <h3 class="text-center">Our Clients</h3>
                </div>

                <div class="col-md-12 mt-4 text-center">
                    <div class="story-section-wrapper">
                        <div class="slider">
                            <div class="slide-track">
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0029.jpg" height="100" width="250" alt="water treatment chemical suppliers" />
                                </div>
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0030.jpg" height="100" width="250" alt="stimulation chemical suppliers in India" />
                                </div>
                                <!--<div class="slides">-->
                                <!--    <img src="assets/img/brands/IMG-20241025-WA0031.jpg" height="100" width="250" alt="" />-->
                                <!--</div>-->
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0032.jpg" height="100" width="250" alt="Chemical Supplier in India" />
                                </div>
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0033.jpg" height="100" width="250" alt="Industrial Chemicals Manufacturers & Suppliers" />
                                </div>
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0034.jpg" height="100" width="250" alt="Chemical Supplier in Dubai" />
                                </div>
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0029.jpg" height="100" width="250" alt="Best Chemical Supplier in Dubai" />
                                </div>
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0030.jpg" height="100" width="250" alt="Top Chemical Suppliers in UAE" />
                                </div>
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0032.jpg" height="100" width="250" alt="Chemicals Suppliers Dubai" />
                                </div>
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0033.jpg" height="100" width="250" alt="Industrial Chemical Supplier in UAE" />
                                </div>
                                <div class="slides">
                                    <img src="assets/img/brands/IMG-20241025-WA0034.jpg" height="100" width="250" alt="chemical distributor in Dubai" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="section chemical-section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> -->
    <!-- <h3 class="text-center">< $storyTitle->title2 ?></h3> -->
    <?php //if (!empty($storyTitle->title4)) {
    //echo "<h5 class='text-center'>{$storyTitle->title4}</h5>";
    //  } 
    ?>
    <!-- </div>
                    <div class="col-md-12 mt-4 text-center"> -->
    <?php
    // usort($latestSearchModel, function ($a, $b) {
    //     return $b['id'] <=> $a['id'];
    // });

    // $unique_chemicals = [];
    // $unique_arr = [];

    // $i = 0;

    // foreach ($latestSearchModel as $item) {
    //     if (!in_array($item['chemical'], $unique_chemicals)) {
    //         if ($i > 13) {
    //             continue;
    //         }
    //         $unique_chemicals[] = $item['chemical'];
    //         $unique_arr[] = $item;
    //         $i++;
    //     }
    // }

    // foreach ($unique_arr as $unique_arr_key => $unique_arr_value) {

    //     if (!empty($unique_arr_value['chemical'])) {
    ?>
    <!-- <a href="/search?searchText=< urlencode($unique_arr_value['chemical']) ?>&searchForm=" -->
    <!-- class="btn landing-chemical-btn overflow-hidden m-1"> -->
    <!-- $unique_arr_value['chemical'] ?> -->
    <!-- </a> -->
    <?php // }
    // }
    ?>
    <!-- </div>
                </div>
            </div>
        </section> -->

    </main>

    <?php include('./common/footer-landing-page.php') ?>
    <?php include('./common/social-link-landing-page.php') ?>
    <?php include('./common/modal.php') ?>

    <?php include('./common/script.php') ?>
    <!-- javascript -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>

    <script src="assets/js/pages/group-chat-rfq.js"></script>
    <script src="assets/js/pages/group-chat-stock.js"></script>
    <script src="assets/js/pages/inquiry-offer.js"></script>
    <script src="assets/js/pages/user-check.js"></script>
    <!-- <script src="<?= get_root() ?>assets/js/pages/index.js"></script> -->
    <script src="assets/js/pages/landing-page.js"></script>

    <script src="assets/js/pages/index.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        function autoResize(textarea) {
            textarea.style.height = 'auto'; // Reset height
            textarea.style.height = textarea.scrollHeight + 'px'; // Set new height
        }



        userTypeChangeAndChemical();
        $(document).on("click", ".searchchemical", function() {
            userTypeChangeAndChemical();
        });

        // $('#home-inq-chemical').select2({
        //     selectOnClose: true

        // });

        // Collect the chemical names from the select menu
        const chemicals = [
            <?php foreach ($supplierChemicalModel as $chemicalVal4): ?> "<?php echo addslashes($chemicalVal4['product_name']); ?>",
            <?php endforeach; ?>
        ];

        function showSuggestions(value) {
            const suggestionsContainer = document.getElementById('suggestions');
            suggestionsContainer.innerHTML = '';

            if (!value) return;

            const filteredChemicals = chemicals.filter(chemical =>
                chemical.toLowerCase().includes(value.toLowerCase())
            );

            filteredChemicals.forEach(chemical => {
                const item = document.createElement('div');
                item.textContent = chemical;
                item.classList.add('suggestion-item');
                item.onclick = () => handleSuggestionClick(chemical);
                suggestionsContainer.appendChild(item);
            });
        }

        function handleSuggestionClick(chemical) {
            document.getElementById('home-inq-chemical').value = chemical; // Set the input field value
            document.getElementById('suggestions').innerHTML = ''; // Clear suggestions
        }

        function updateFileName() {
            const fileInput = document.getElementById('search-photo-new');
            const fileNameDisplay = document.getElementById('file-name');

            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = 'No file chosen';
            }
        }

        function userTypeChangeAndChemical() {

            var chemical = $('#home-inq-chemical')
            var chemical_id = chemical.val()

            var who_to_contact_field = $('#home-inq-who_to_contact')
            var who_to_contact = who_to_contact_field.val()

            var destination_field = $("#home-inq-destination");
            var destination = destination_field.val();

            if (who_to_contact != '' && chemical_id != '' && destination != '') {
                loadBuyerSupplier({
                    who_to_contact: who_to_contact,
                    chemical_id: chemical_id,
                    destination: destination
                })
            }
        }

        $(document).on("click", ".read-more-btn", function() {

            const fullText = $(this).prev();
            const previewText = fullText.prev();

            // if (fullText.css("display") === "none") {
            //     fullText.css("display", "inline");
            //     previewText.css("display", "none");
            //     $(this).html("Read less");
            // } else {
            //     fullText.css("display", "none");
            //     previewText.css("display", "inline");
            //     $(this).html("Read more");
            // }
        });


        $(document).ready(function() {




            $("#getHomeInquiryForm2").on("submit", function(event) {
                event.preventDefault();
                var formValues = $(this).serialize();
                var form = $("#getHomeInquiryForm2");

                var url = form.attr("action");

                checkMessageEligibility();
                var error = false
                var loggedinUserId = $("#loggedinUserId");

                if (loggedinUserId.val() == "" || loggedinUserId.val() == 0) {
                    error = true;
                    return false;
                }



                var home_inq_details = $("#home-inq-details");
                var home_inq_details_label = $(".home-inq-details-label");

                var error = false;

                var ErrorMsg = "";



                if (home_inq_details.val() == '') {
                    ErrorMsg = "Details Field cannot be blank";
                    showAlert(ErrorMsg, "red");
                    addError(home_inq_details_label, home_inq_details, ErrorMsg);
                    error = true;
                    return false;
                } else {
                    error = false;
                    removeError(home_inq_details_label, home_inq_details);
                }

                if (error == false) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formValues,
                        beforeSend: function() {
                            showPageLoading()
                        },
                        success: function(data) {
                            hidePageLoading()
                            const myObj = JSON.parse(data);
                            if (myObj.success == true) {
                                var text = "Successfully Send Inquiry.";
                                showAlert(text);
                                $('#getQuoteModel').modal('hide');


                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully Send Inquiry.',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                                document.getElementById("getHomeInquiryForm2").reset();
                            } else {
                                text = "Insernal Server Error!";
                                text = myObj.errors.error !== '' ? myObj.errors.error : text
                                showAlert(text);
                            }
                        },

                        error: function(data) {
                            hidePageLoading()
                            const myObj = JSON.parse(data);
                            var text = "Insernal Server Error!";
                            text = myObj.errors.error !== '' ? myObj.errors.error : text
                            showAlert(text);
                        },
                    });
                }
            });




            function loadBuyerSupplier(formData) {

                $('#home-inq-buyer_supplier').html('')
                var url = "<?= get_root() ?>inc/home-inquiry/get-buyer-supplier.php";
                var error = false;

                var ErrorMsg = "";

                if (error == false) {
                    var formValues = formData;
                    // $.ajax({
                    //     type: "POST",
                    //     url: url,
                    //     data: formValues,
                    //     success: function (data) {
                    //         if (data != '') {
                    //             const myObj = JSON.parse(data);
                    //             $('#all-user-wrapper').html(myObj)
                    //         }
                    //     },
                    //     error: function (data) {
                    //         $('#all-user-wrapper').html('')
                    //     },
                    // });
                }
            }
        });
    </script>
    <script>
        setTimeout(() => {
            feedbackModal()
        }, 20000);
    </script>

    <script>
        Fancybox.bind('[data-fancybox]', {
            // Custom options
        });
    </script>

    <script>
        function handleKeyPress(event) {
            if (event.key === 'Enter') {
                if (event.shiftKey) {
                    // Allow line break with Shift+Enter
                    event.stopPropagation();
                    return true;
                } else {
                    // Prevent default Enter behavior and trigger send
                    event.preventDefault();
                    event.stopPropagation();
                    startProcess();
                    return false;
                }
            }
            return true;
        }

        // Add this function to handle textarea auto-resize
        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showLoginAlert() {
            Swal.fire({
                title: 'Login Required',
                text: 'You must register or log in to connect with the supplier.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }
    </script>
    <style>
        .write_msg {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
            padding-right: 50px;
            resize: none;
            overflow-y: auto;
            max-height: 120px;
            line-height: 1.5;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>

    <style>
        .modal-textarea {
            min-height: 100px;
            max-height: 300px;
            resize: none;
            overflow-y: auto;
            white-space: pre-wrap;
            word-wrap: break-word;
            line-height: 1.5;
        }
    </style>

    <script>
        // Add event listeners for both modals
        document.getElementById('buyDetails').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                if (e.shiftKey) {
                    // Allow default behavior for Shift+Enter (new line)
                    return true;
                } else {
                    // Prevent default and trigger next button for Enter
                    e.preventDefault();
                    document.getElementById('nextBuy').click();
                    return false;
                }
            }
        });

        document.getElementById('sellDetails').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                if (e.shiftKey) {
                    // Allow default behavior for Shift+Enter (new line)
                    return true;
                } else {
                    // Prevent default and trigger next button for Enter
                    e.preventDefault();
                    document.getElementById('nextSell').click();
                    return false;
                }
            }
        });

        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }
    </script>
    <script>
        function updateChatListPreserveScroll(newHTML) {
            const chatBody = document.querySelector('.chat-body-rfq');

            // Save current scroll position
            const scrollTopBefore = chatBody.scrollTop;

            // Save scroll height before update
            const scrollHeightBefore = chatBody.scrollHeight;

            // Update content (e.g. replace or append verified suppliers)
            chatBody.innerHTML = newHTML;

            // After DOM update, calculate the scroll difference
            const scrollHeightAfter = chatBody.scrollHeight;
            const scrollDiff = scrollHeightAfter - scrollHeightBefore;

            // Restore previous scroll position (adjusted if height changed)
            chatBody.scrollTop = scrollTopBefore + scrollDiff;
        }
    </script>
    <script>
function updateChatUserListWithoutScrollJump(newHTML) {
    const container = document.querySelector('.chat-body-rfq');
    const scrollTop = container.scrollTop;
    const scrollHeightBefore = container.scrollHeight;
    container.innerHTML = newHTML;
    const scrollHeightAfter = container.scrollHeight;
    container.scrollTop = scrollTop + (scrollHeightAfter - scrollHeightBefore);
}

function simulateChatFetch() {
  let html = '';
  for (let i = 0; i < 20; i++) {
    html += `<div class="chat_list">User ${i + 1} - ${i % 3 === 0 ? '✅ Verified Supplier' : 'Regular'}</div>`;
  }
  updateChatUserListWithoutScrollJump(html);
}
</script>
</body>

</html>