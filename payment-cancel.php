<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

?>

<!doctype html>
<html lang="en">

<head>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <?php include('./common/head.php') ?>
  <title>Payment Failed - Fyndsupplier</title>

  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="./assets/css/intlTelInput.css">

  <link rel="icon" href="<?= get_root() ?>assets/img/logo.png" />
  <link id="favicon" rel="shortcut icon" href="<?= get_root() ?>assets/img/logo.png" type="image/png">
  <link rel="apple-touch-icon" sizes="194x194" href="<?= get_root() ?>assets/img/logo.png" type="image/png">

</head>

<body>
  <?php include('./common/header.php') ?>

  <main style="min-height:70vh">
    <section class="section letest-enquiry">

      <div class="container mt-3">

        <div class="row">
          <div class="col-12">
            <div class="alert alert-danger">
              <strong>Sorry!</strong> Your Payment has been cancelled
            </div>
          </div>
        </div>

        <div class="col-12 text-center mt-3">
          <a class="btn btn-primary btn-lg" href="<?= get_root() ?>">Go Home</a>
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

  <!-- <script src="./assets/js/pages/group-chat.js"></script> -->
  <script src="./assets/js/pages/inquiry-offer.js"></script>
  <script src="./assets/js/pages/user-check.js"></script>
  <script src="./assets/js/pages/index.js"></script>

</body>

</html>