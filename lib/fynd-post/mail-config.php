<?php
include("index.php");
include("mail_body.php");

/*
function paymentSuccess($email, $name, $body, $subject)
{

  $mail = new PHPMailer(true);

  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->SMTPDebug = 0;                   // Enable verbose debug
  $mail->isSMTP();
  $mail->Host       = 'fyndsupplier.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'notify@fyndsupplier.com';
  $mail->Password   = '=dQQfW#7E__s';

  //$mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
  //$mail->Port       = 587;   

  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port       = 465;

  //Recipients
  $mail->setFrom('notify@fyndsupplier.com', 'fyndsupplier');
  $mail->addAddress($email, $name);

  //Content
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body    = $body;

  return ($mail->send()) ? true : false;
}


function newUser($email, $name, $subject)
{

  $mail = new PHPMailer(true);

  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->SMTPDebug = 0;                   // Enable verbose debug
  $mail->isSMTP();
  $mail->Host       = 'fyndsupplier.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'notify@fyndsupplier.com';
  $mail->Password   = '=dQQfW#7E__s';

  //$mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
  //$mail->Port       = 587;   

  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port       = 465;

  //Recipients
  $mail->setFrom('notify@fyndsupplier.com', 'fyndsupplier');
  $mail->addAddress($email, $name);

  //Content
  $mail->isHTML(true);
  $mail->Subject = $subject;

  $branchLogo = get_root() . "/web/salon-logo/" . $imageArr['filename'];
  $mail->AddEmbeddedImage($branchLogo, $imageArr['cid'], $imageArr['cid']);
  $mail->Body = html_entity_decode($body);



  return ($mail->send()) ? true : false;
}
*/

function newUserMail($db, $id)
{
  //return true;
  $model = fetch_object($db, "SELECT * FROM user WHERE id='{$id}'");

  if (!empty($model->email)) {

    $body = newUserBody();
    $subject  = "Successful Signup [Fyndsupplier]";

    sendSMTPMail($model->email, $model->name, $body, $subject);
  }

  return true;
}




function buyerInquiryMail($db, $id)
{
  //return true;
  $model = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE id='{$id}'");
  $userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$model->uid}'");

  if (!empty($model->email)) {

    $body = buyerInquiryBody($model->chemical);
    $subject = "Buyer Inquiry Success - [Fyndsupplier]";
    sendSMTPMail($model->email, $userModel->name, $body, $subject);
  }

  return true;
}

function supplierInquiryMail($db, $id)
{
  //return true;
  $model = fetch_object($db, "SELECT * FROM `inquiry_offer` WHERE id='{$id}'");
  $userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$model->uid}'");

  if (!empty($model->email)) {

    $body = supplierInquiryBody($model->chemical);
    $subject = "Supplier Inquiry Success - [Fyndsupplier]";
    sendSMTPMail($model->email, $userModel->name, $body, $subject);
  }

  return true;
}

function searchInquiryMail($db, $id)
{
  //return true;
  $model = fetch_object($db, "SELECT * FROM short_on_time WHERE id='{$id}'");

  if (!empty($model->email)) {

    $body = searchInquiryBody($model->chemical);
    $subject = "Short On Inquiry - [Fyndsupplier]";

    sendSMTPMail($model->email, $model->name, $body, $subject);
  }

  return true;
}

function freeToPaidMemberMail($db)
{
  //return true;
  $sql = "SELECT user.* FROM user LEFT JOIN payments ON user.id = payments.item_number WHERE payments.item_number IS NULL AND user.email IS NOT NULL";
  $model = fetch_all($db, $sql);
  foreach ($model as $key => $val) {
    $value = (object) $val;
    if (!empty($value->email)) {
      $body = freeToPaidMemberBody();
      $subject = "Premium Membership Invitation - [Fyndsupplier]";
      sendSMTPMail($value->email, $value->name, $body, $subject);
    }
  }

  return true;
}

function supplierRegisterProductMail($db)
{
  $sql = "SELECT user.* FROM user LEFT JOIN supplier_chemical_list ON user.id = supplier_chemical_list.uid WHERE supplier_chemical_list.uid IS NULL AND user.email IS NOT NULL AND user.user_type='supplier'";
  $model = fetch_all($db, $sql);
  foreach ($model as $key => $val) {
    $value = (object) $val;
    if (!empty($value->email)) {
      $body = supplierRegisterProductBody();
      $subject = "Register Your Product - [Fyndsupplier]";
      sendSMTPMail($value->email, $value->name, $body, $subject);
    }
  }

  return true;
}

function signupOTPMail($db, $id)
{
  $sql = "SELECT * FROM user_otp WHERE id='{$id}'";
  $model = fetch_object($db, $sql);

    if (!empty($model->email)) {
      $body = signupOTPBody($model->otp);
      $subject = "Verify Your Email ID - [Fyndsupplier]";
      sendSMTPMail($model->email, $model->name, $body, $subject);
    }

  return true;
}
