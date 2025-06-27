<?php

include_once('./lib/bpconn.php');
include_once('./lib/sms-config.php');

include_once('./lib/fynd-post/index.php');
include_once('./lib/fynd-post/mail_body.php');


function paymentSuccessMail($db, $id)
{
  //return true;
  $model = fetch_object($db, "SELECT * FROM payments WHERE id='{$id}'");
  $userModel = fetch_object($db, "SELECT * FROM user WHERE id='{$model->item_number}'");

  if (!empty($userModel->email)) {


    $body = paymentSuccessBody($model);
    $subject = "Payment Success - [Fyndsupplier]";

    sendSMTPMail($userModel->email, $userModel->name, $body, $subject);
  }

  return true;
}

if (!empty($_GET)) {
  $PayerID = $_REQUEST['PayerID'];
  $status = $_REQUEST['st'];
  $txn = $_REQUEST['tx'];
  $currency = $_REQUEST['cc'];
  $amount = $_REQUEST['amt'];
  $payer_email = $_REQUEST['payer_email'];
  $payer_id = $_REQUEST['payer_id'];
  $payer_status = $_REQUEST['payer_status'];
  $first_name = $_REQUEST['first_name'];
  $last_name = $_REQUEST['last_name'];
  $txn_id = $_REQUEST['txn_id'];
  $mc_currency = $_REQUEST['mc_currency'];
  $mc_fee = $_REQUEST['mc_fee'];
  $mc_gross = $_REQUEST['mc_gross'];
  $protection_eligibility = $_REQUEST['protection_eligibility'];
  $payment_fee = $_REQUEST['payment_fee'];
  $payment_gross = $_REQUEST['payment_gross'];
  $payment_status = $_REQUEST['payment_status'];
  $payment_type = $_REQUEST['payment_type'];
  $handling_amount = $_REQUEST['handling_amount'];
  $shipping = $_REQUEST['shipping'];
  $item_name = $_REQUEST['item_name'];
  $item_number = $_REQUEST['item_number'];
  $quantity = $_REQUEST['quantity'];
  $txn_type = $_REQUEST['txn_type'];
  $payment_date = $_REQUEST['payment_date'];
  $receiver_id = $_REQUEST['receiver_id'];
  $notify_version = $_REQUEST['notify_version'];
  $verify_sign = $_REQUEST['verify_sign'];

  $created_at = date('y-m-d h:i:s');

  $sqlKey = "`PayerID`, `status`, `txn`, `currency`, `amount`, `payer_email`, `payer_id`, `payer_status`, `first_name`, `last_name`, `txn_id`, `mc_currency`, `mc_fee`, `mc_gross`, `protection_eligibility`, `payment_fee`, `payment_gross`, `payment_status`, `payment_type`, `handling_amount`, `shipping`, `item_name`, `item_number`, `quantity`, `txn_type`, `payment_date`, `receiver_id`, `notify_version`, `verify_sign`, `created_at`";
  $sqlValue = "'{$PayerID}', '{$status}', '{$txn}', '{$currency}', '{$amount}', '{$payer_email}', '{$payer_id}', '{$payer_status}', '{$first_name}', '{$last_name}', '{$txn_id}', '{$mc_currency}', '{$mc_fee}', '{$mc_gross}', '{$protection_eligibility}', '{$payment_fee}', '{$payment_gross}', '{$payment_status}', '{$payment_type}', '{$handling_amount}', '{$shipping}', '{$item_name}', '{$item_number}', '{$quantity}', '{$txn_type}', '{$payment_date}', '{$receiver_id}', '{$notify_version}', '{$verify_sign}', '{$created_at}'";

  $checkSql = "SELECT * FROM payments WHERE txn_id='{$txn_id}'";

  if (num_rows($db, $checkSql) == 0) {
    $sql = "INSERT INTO payments ({$sqlKey}) VALUES ({$sqlValue})";
    mysqli_query($db, "UPDATE `user` SET is_verified=1 WHERE id='{$item_number}'");
    $result = mysqli_query($db, $sql);
    $lastId = mysqli_insert_id($db);

    paymentSuccessMail($db, $lastId);
  }
}


?>

<!doctype html>
<html lang="en">

<head>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <?php include('./common/head.php') ?>

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
          <div class="col-">
            <div class="alert alert-success">
              <strong>Success!</strong> Payment has been successful
            </div>

            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>Transaction Id</td>
                  <td><?= $txn_id ?></td>
                </tr>
                <tr>
                  <td>Product Name</td>
                  <td><?= $item_name ?></td>
                </tr>
                <tr>
                  <td>Amount</td>
                  <td><?= $amount ?></td>
                </tr>
                <tr>
                  <td>Payment Status</td>
                  <td><?= $payment_status ?></td>
                </tr>

                <tr>
                  <td colspan="2" class="text-center">
                    <a class=" btn btn-primary" href='<?= get_root() ?>'>Go Home</a>
                  </td>
                </tr>

              </tbody>
            </table>
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