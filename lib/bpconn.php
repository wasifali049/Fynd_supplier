<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


date_default_timezone_set('Asia/Kolkata');

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);sendGroupChatWP
error_reporting(E_ALL);
*/

require_once('bpdb-details.php');


setCookieLogin();

//Login Session
function setLogin($db, $id)
{
  $_SESSION['userLogin'] = $id;
  setCookieAuthentication($id);
}
// set cookie for storing user data
function setCookieAuthentication($userId)
{
  // Set the expiration time to 30 days from now
  $expiryTime = time() + (30 * 24 * 60 * 60);

  // Generate a unique token for the user
  $token = bin2hex(random_bytes(32));

  // Set the cookie with the user ID and token
  setcookie('user_id', $userId, $expiryTime, '/');
}

//login the user through cookie
function setCookieLogin()
{
  if (!is_login()) {
    if (isset($_COOKIE['user_id'])) {
      setLogin($db = '', $_COOKIE['user_id']);
    }
  }
}

// database connection
function dbCon()
{
  $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
  }

  return $conn;
}

$db = dbCon();

function check_auth()
{
  if (!isset($_SESSION['userLogin'])) {
    header('location: ' . get_root());
  }
}
// check the user the login or not
function check_buyer_auth($db)
{
  if (!isset($_SESSION['userLogin'])) {
    header('location: ' . get_root());
  }

  $userId = get_user_id();

  // $model = fetch_object($db, "SELECT * FROM `payments` WHERE `item_number` = '$userId'");
  $model = fetch_object($db, "SELECT * FROM `user` WHERE `id` = '$userId' AND is_verified='1'");
  if (empty($model)) {
    header('location: ' . get_root());
  }
}
// check if it exists then redirect on its area
function redirect_buyer($db)
{
  if (isset($_SESSION['userLogin'])) {

    $userId = get_user_id();

    $model = fetch_object($db, "SELECT * FROM `payments` WHERE `item_number` = '$userId'");

    if (!empty($model)) {
      header('location: ' . get_root() . 'buyer');
    }
  }
}


function is_premium_member($db)
{

  $userId = get_user_id();

  // $model = fetch_object($db, "SELECT * FROM `payments` WHERE `item_number` = '$userId'");
  $model = fetch_object($db, "SELECT * FROM `user` WHERE `id` = '$userId' AND is_verified='1'");

  return !empty($model) ? true : false;
}


function user_premium_member($db, $id)
{
  $userId = $id;
  $model = fetch_object($db, "SELECT * FROM `payments` WHERE `item_number` = '$userId'");
  return !empty($model) ? true : false;
}


function get_premium_badge($db, $id)
{
  $root = get_root();
  $html = <<<EOT
  <div class="mx-auto text-center">
    <img src="{$root}assets/img/verified.png" class="verified">
  </div>
  EOT;

  $model = fetch_object($db, "SELECT * FROM `user` WHERE `is_verified`=1 AND `id` = '$id'");

  return $model ? $html : false;
}

function check_admin_auth()
{
  if (!isset($_SESSION['adminUser'])) {
    header('location: ' . get_root() . 'fynd-panel/login.php');
  }
}

function is_login()
{
  return (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])) ? true : false;
}

function get_user_id()
{
  return (!empty($_SESSION['userLogin'])) ? $_SESSION['userLogin'] : 0;
}

function getCreatedAt()
{
  return date('Y-m-d H:i:s', time());
}


function is_auth()
{
  if (isset($_SESSION['userLogin'])) {
    header('location: index');
  }
}

function formatDate($date)
{
  return date("d/m/Y", strtotime($date));
}

function todayDate()
{
  return date("d/m/Y");
}


function validName($name)
{
  return preg_match("/^[A-Za-z\s]*$/", $name) ? true : false;
}

function validEmail($email)
{
  return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
}

function validNumber($number)
{
  // Check if the mobile number is only digits
  if (!preg_match('/^[0-9]+$/', $number)) {
    return false;
  }

  // Check if the mobile number is between 8 and 12 digits long
  if (strlen($number) < 8 || strlen($number) > 12) {
    return false;
  }

  return true;
}

function getAttendanceId($id)
{
  $threshold = 7;
  $sum = sprintf('%0' . $threshold . 's', ($id + 1));
  return $sum;
}

function getUsername($id)
{
  $threshold = 3;
  $sum = sprintf('%0' . $threshold . 's', ($id + 1));
  return 'ATQITS' . $sum;
}

function imageUpload($target_dir, $FILES)
{

  //$target_dir = "uploads/";

  //$target_dir = "D:/wamp64/www/sabir/salon-software/project/web/employee_doc/";

  $uploadOk = 1;

  $error = '';

  $data = [];
  $data['filename'] = '';
  $data['success'] = 'false';
  $data['error'] = '';

  if (empty($FILES)) {

    $data['filename'] = '';
    $data['success'] = 'false';
    $data['error'] = 'NO FILE FOUND';

    return $data;
  }

  $target_file = $target_dir . basename($FILES["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $filename = rand(123456789, 987654321) . '.' . $imageFileType;


  $target = $target_dir . basename($filename);


  // Check if image file is a actual image or fake image
  $check = getimagesize($FILES["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    $error = "File is not an image.";
    $uploadOk = 0;
    $data['error'] = $error;
    $data['success']  = 'false';
  }

  // Check file size
  if ($FILES["size"] > 500000) {
    $error = "Sorry, your file is too large.";
    $uploadOk = 0;
    $data['error'] = $error;
    $data['success']  = 'false';
  }

  // Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $error = "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
    $data['error'] = $error;
    $data['success']  = 'false';
  }

  if ($uploadOk == 0) {
    $error = "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($FILES["tmp_name"], $target)) {
      $error = $filename;
      $data['error'] = '';
      $data['filename'] = $filename;
      $data['success']  = 'true';
    } else {
      $error = "Sorry, there was an error uploading your file.";
      $data['error'] = $error;
      $data['success']  = 'false';
    }
  }
  return $data;
}

function genNumArr($number)
{
  $arr = [];
  for ($i = 0; $i <= $number; $i++) {
    $arr[$i] = ($i <= 9) ? '0' . $i : $i;
  }
  return $arr;
}


function getEndTime($timestamp, $duration)
{
  $timestamp = $timestamp . ':00';
  $startTime = date("Y-m-d H:i:s", strtotime($timestamp));
  $addMinute = "+" . getMinute($duration) . " minutes";
  return date('Y-m-d H:i:s', strtotime($addMinute, strtotime($startTime)));
}

function getMinute($duration)
{
  $timesplit = explode(':', $duration);
  return (($timesplit[0] * 60) + ($timesplit[1]));
}

function getOnlyTime($timestamp, $format = 'H')
{
  return ($format == 'h') ? date($format . ":i:s A", strtotime($timestamp)) : date($format . ":i:s", strtotime($timestamp));
}

function getOnlyTimeWithoutSecond($timestamp, $format = 'H')
{
  return ($format == 'h') ? date($format . ":i A", strtotime($timestamp)) : date($format . ":i:s", strtotime($timestamp));
}

function getUrl()
{
  $url = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : get_root() . 'dashboard';

  if (strpos($url, 'login')) {
    $url = get_root() . 'dashboard';
  }

  return $url;
}


function fetch_all($db, $sql)
{
  $query = mysqli_query($db, $sql);
  // var_dump($sql);exit;
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function fetch_object($db, $sql)
{
  $query = mysqli_query($db, $sql);
  return mysqli_fetch_object($query);
}

function fetch_num($db, $sql)
{
  $query = mysqli_query($db, $sql);
  return mysqli_num_rows($query);
}

function fetch_assoc($db, $sql)
{
  $query = mysqli_query($db, $sql);
  return mysqli_fetch_assoc($query);
}

function num_rows($db, $sql)
{
  return mysqli_num_rows(mysqli_query($db, $sql));
}


function debug($v)
{
  echo "<pre>";
  print_r($v);
  echo "<pre>";
}


function cartTotalCount($db)
{

  $total = 0;
  $user_id = get_user_id();
  if (is_login() == true && $db != '') {

    $sql = "SELECT quantity FROM cart WHERE user_id='" . $user_id . "'";
    $query = mysqli_query($db, $sql);
    $model = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $arr = array_column($model, "quantity");
    $total = array_sum($arr);
  }

  return $total;
}



function get_root()
{

  if (
    isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
  ) {
    $protocol = 'https://';
  } else {
    $protocol = 'http://';
  }



  if (preg_match('/www/', $_SERVER['HTTP_HOST'])) {
    $www = "www.";
  } else {
    $www = "";
  }

  $halfDomain = $protocol . $www;

  $root =  (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false) ? $halfDomain . "localhost/fynd-supplier" : $halfDomain . "localhost/fynd-supplier/";
  if (substr($root, -1) !== '/') {
    $root .= '/'; // Add / at the end if it doesn't exist
  }
  return $root;
}



function get_main_url()
{
  if (
    isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
  ) {
    $protocol = 'https://';
  } else {
    $protocol = 'http://';
  }


  $domain = $_SERVER['SERVER_NAME'];
  $url = $_SERVER['REQUEST_URI'];

  if (!empty($url)) {
    $script = explode('/', $url);
    $dir = '';
    if (count($script) > 0) {
      foreach ($script as $key => $value) {
        if (empty($value)) {
          continue;
        }

        if (strpos($value, ".php")) {
          continue;
        }

        if ($key > 2) {
          continue;
        }

        $dir .= "/{$value}";
      }
    }
  } else {
    $dir = '';
  }

  return "{$protocol}{$domain}{$dir}";
}


function getDateServerFormat($date, $separator = '/', $formatter = '-')
{
  $d = explode($separator, $date);

  $dd = $d[2] . $formatter . $d[1] . $formatter . $d[0];

  return $dd;
}

function getCFormatDate($date)
{
  $datetime = new DateTime($date);
  return $datetime->format('c');
}

function dateMMFormar($date)
{
  $dateArr = explode('/', $date);
  return "{$dateArr[1]}/{$dateArr[0]}/{$dateArr[2]}";
}


function fireAlert($message, $color = 'green')
{
  echo "<script>";
  echo 'document.addEventListener("DOMContentLoaded", () => {';
  echo "showAlert('" . $message . "', '" . $color . "')";
  echo "})";
  echo "</script>";
}

function time_12($time)
{
  return !empty($time) ? date("g:i a", strtotime($time)) : $time;
}

function time_24($time)
{
  return !empty($time) ? date("H:i:s", strtotime($time)) : $time;
}


function get_country_list($db)
{
  $countrySql = "SELECT * FROM `country` ORDER BY name ASC";
  $model = fetch_all($db, $countrySql);
  return $model;
}

function get_chemical_list($db)
{
  $chemicalSql = "SELECT * FROM `chemical` ORDER BY chemical_name ASC";
  $model = fetch_all($db, $chemicalSql);
  return $model;
}

function get_supplier_chemical_list($db)
{
  $chemicalSql = "SELECT product_name, MIN(id) AS id, MIN(uid) AS uid, MIN(chemical_id) AS chemical_id, MIN(chemical_photo) AS chemical_photo, MIN(min_order_quantity) AS min_order_quantity, MIN(price) AS price, MIN(density) AS density, MIN(product_specification) AS product_specification, MIN(product_info) AS product_info, MIN(manufacturer_details) AS manufacturer_details, MIN(meta_title) AS meta_title, MIN(meta_description) AS meta_description, MIN(meta_keyword) AS meta_keyword, MIN(slug) AS slug, MIN(status) AS status, MIN(created_at) AS created_at, MIN(created_by) AS created_by, MIN(updated_at) AS updated_at, MIN(updated_by) AS updated_by FROM supplier_chemical_list GROUP BY product_name ORDER BY product_name ASC";
  $model = fetch_all($db, $chemicalSql);
  return $model;
}

function get_split_string($str, $split)
{
  $string = strtoupper(str_replace(' ', '', $str));

  $strLen = strlen($string);

  if ($strLen >= $split) {
    $result = mb_substr($string, 0, $split);
  } else {
    $leftZero = ($split - $strLen);

    $zeros = '';
    for ($i = 0; $i < $leftZero; $i++) {
      $zeros .= "0";
    }

    $result1 = mb_substr($string, 0, $strLen);
    $result = $result1 . $zeros;
  }

  return $result;
}

function js_redirect($url)
{
  return "<script> window.location = '{$url}'</script>";
}

function displayDates($date1, $date2, $format = 'd-m-Y')
{
  $dates = [];

  $current = strtotime($date1);
  $date2 = strtotime($date2);
  $stepVal = '+1 day';
  while ($current <= $date2) {
    $dates[] = date($format, $current);
    $current = strtotime($stepVal, $current);
  }

  return $dates;
}


function getPrevNextYearArr($currentYear)
{
  $years = [];

  for ($i = -5; $i <= 5; $i++) {
    $years[] = $currentYear + $i;
  }

  return $years;
}

function hoursFromTime($start_time, $end_time)
{
  $hours = 0;

  if (!empty($start_time) && !empty($end_time)) {

    $start_timestamp = strtotime($start_time);
    $end_timestamp = strtotime($end_time);

    $difference = $end_timestamp - $start_timestamp;

    $hours = $difference / 3600;
    $hours = round($hours);
  }

  return $hours;
}

function query_maker(array $sql, string $type = 'AND')
{
  $cond = 1;
  if (count($sql)) {
    $query = '';
    foreach ($sql as $key => $value) {
      $query .= ($value != 0) ? "`{$key}`='{$value}' {$type}" : '';
    }

    $cond = !empty($query) ? rtrim($query, $type) : $cond;
  }

  return $cond;
}


function getMessageContent($db, $value)
{
  // Format time
  $time = date("d/m/Y h:i A", strtotime($value->created_at));
  $time = DateTime::createFromFormat('d/m/Y h:i A', $time);
  $time = $time->format('d M');

  // Determine alignment
  $alignment = ($value->uid == get_user_id()) ? 'justify-content-end' : 'justify-content-start';
  $bgcolor = 'fff';
  $colorClass = 'dark';

  // Get user data
  $userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$value->uid}'");

  // Check payment status
  $query = "SELECT payment_status FROM payments WHERE item_number = '{$value->uid}' LIMIT 1";
  $paymentStatusResult = fetch_object($db, $query);
  $isPaidMember = ($paymentStatusResult && $paymentStatusResult->payment_status == 'Completed');

  // Mask email (but still show)
  $email = $userModel->email;
  $email = $email !== null ? '**' . substr($email, 2) : '';

  // Mobile
  if (is_login()) {
    $finalMobile = "+" . $userModel->mobile;
  } else {
    $length = strlen($userModel->mobile);
    $hiddenLength = (int) ($length / 2);
    $prefix = str_repeat('x', $length - $hiddenLength) . substr($userModel->mobile, -$hiddenLength);
    $finalMobile = "+" . $prefix;
  }

  // Profile Image
  $profileImg = get_root() . "assets/img/profile/{$userModel->profile_photo}";

  $leftImage = '';
  $rightImage = '';

  if ($value->uid == get_user_id()) {
    $rightImage = "<img src='{$profileImg}' alt='avatar' style='margin-left:5px; width: 45px; height: 45px;border-radius:50%'>";
  } else {
    $leftImage = "<img src='{$profileImg}' alt='avatar' style='margin-right:5px; width: 45px; height: 45px;border-radius:50%'>";
  }

  $onclick3 = pop_contact($userModel, 'group chat');
  $root = get_root();

  // Show username, type, email, and profile even if anonymous
  if ($userModel->user_type == 'supplier') {
    $userNameWithType = <<<EOT
            <p style="font-weight:500" class="cursor-pointer m-0 text-primary"><a class="text-decoration-none" href="{$root}supplier-profile/{$userModel->slug}">{$userModel->name} ({$userModel->user_type})</a></p>
        EOT;
  } else {
    $userNameWithType = <<<EOT
            <p style="font-weight:500" class="cursor-pointer m-0 text-primary">{$userModel->name} ({$userModel->user_type})</p>
        EOT;
  }

  $profileLink = "<a href='{$root}user-profile/{$userModel->slug}' class='text-decoration-none text-primary'>View Profile</a>";

  // Prepare message text
  $textMessage = get_html_to_text($value->message);
  $textMessage = str_replace('<br>', '', $textMessage);
  $textMessage = urlencode($textMessage);

  $onclick4 = pop_contact($userModel, 'share chat', "{$textMessage}");
  $shareChat = "<a class='text-decoration-none cursor-pointer oc-btn' target='_self' {$onclick4}><i class='bi bi-share-fill'></i> Forward To Whatsapp</a>";

  // Replace blue tick with 'Verified Supplier' label
  $verifiedLabelHtml = ($isPaidMember) ? "<span style='background-color: #007bff; color: white; padding: 2px 8px; border-radius: 12px; font-size: 12px; margin-left: 5px;'>Verified Supplier</span>" : "";

  // Build the final HTML
  $html = "<div class='chat_list'>
                <div class='chat_people'>
                    <div class='chat_img'><img src='{$profileImg}' alt='avatar'></div>
                    <div class='chat_ib'>
                        <div style='display: flex; align-items: center; white-space: nowrap;'>
                            <h5 style='margin: 0; display: inline-flex; align-items: center;'>{$userNameWithType}{$verifiedLabelHtml}</h5>
                        </div>
                        <div style='text-align: right; margin: 5px 0;'>
                            <span class='chat_date text-muted'>{$time}</span>
                        </div>
                        <div>
                            <p style='margin: 5px 0;'>Email : {$email}</p>
                            <p style='margin: 5px 0;'>Phone : {$finalMobile}</p>
                            <p style='margin: 5px 0;'>{$profileLink}</p>
                        </div>
                    </div>
                </div>
            </div>";

  return $html;
}





function getMessagehistory($db, $value)
{
  $time = date("d/m/Y h:i A", strtotime($value->created_at));
  $time = DateTime::createFromFormat('d/m/Y h:i A', $time);
  $time = $time->format('d M');

  $alignment = ($value->uid == get_user_id()) ? 'justify-content-end' : 'justify-content-start';
  $bgcolor = 'fff';
  $colorClass = 'dark';

  $userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$value->uid}'");
  $root = get_root();

  // Load name & type
  if ($value->post_type == 0) {
    $userNameWithType = '<p style="font-weight:500" class="cursor-pointer m-0 text-primary">Anonymous</p>';
  } else {
    if ($userModel->user_type == 'supplier') {
      $userNameWithType = <<<EOT
        <p style="font-weight:500" class="cursor-pointer m-0 text-primary">
          <a class="text-decoration-none" href="{$root}supplier-profile/{$userModel->slug}">
            {$userModel->name} ({$userModel->user_type})
          </a>
        </p>
      EOT;
    } else {
      $userNameWithType = <<<EOT
        <p style="font-weight:500" class="cursor-pointer m-0 text-primary">
          {$userModel->name} ({$userModel->user_type})
        </p>
      EOT;
    }
  }

  // Email mask
  $email = $userModel->email;
  $email = $email !== null ? '**' . substr($email, 2) : '';

  // Mobile logic
  if (is_login()) {
    $finalMobile = "+" . $userModel->mobile;
  } else {
    $length = strlen($userModel->mobile);
    $hiddenLength = (int) ($length / 2);
    $prefix = str_repeat('x', $length - $hiddenLength) . substr($userModel->mobile, -$hiddenLength);
    $finalMobile = "+" . $prefix;
  }

  // Profile image logic
  if ($value->post_type == 0) {
    $profileImg = $root . "assets/img/profile/profile.png"; // Default image
  } else {
    $profileImg = $root . "assets/img/profile/{$userModel->profile_photo}";
  }

  $leftImage = "<img src='{$profileImg}' alt='avatar 1' style='margin-right:5px; width: 45px; height: 45px; border-radius:50%'>";
  $rightImage = '';

  // Message preview logic
  $previewLimit = 50;
  $previewText = substr($value->message, 0, $previewLimit);
  $textMessage = get_html_to_text($value->message);
  $textMessage = str_replace('<br>', '', $textMessage);

  // Logged-in user info
  $loggedInName = 'Anonymous User';
  $loggedInEmail = '';
  $loggedInMobile = '';

  if (isset($_SESSION['userLogin'])) {
    $loginId = $_SESSION['userLogin'];
    $loggedInUser = fetch_object($db, "SELECT * FROM `user` WHERE id = '{$loginId}'");

    if ($loggedInUser) {
      $loggedInName = $loggedInUser->name ?? 'Anonymous User';
      $loggedInEmail = $loggedInUser->email ?? '';
      $loggedInMobile = $loggedInUser->mobile ?? '';
    }
  }

  // ✅ Send WhatsApp message to: +47 944 32 969
  $whatsappNumber = '4794432969'; // WhatsApp accepts international format without "+"
  $whatsappText = <<<EOT
NAME: {$loggedInName}
EMAIL: {$loggedInEmail}
PHONE: {$loggedInMobile}
Respected Team,
This buyer {$loggedInName} wants to connect with the supplier {$userModel->name} who posted the following message on the fyndSupplier website:
Message: {$textMessage}
EOT;
  $whatsappLink = "https://wa.me/{$whatsappNumber}?text=" . urlencode($whatsappText);

  // Button logic with login check
  if (is_login()) {
    $readMoreBtn = <<<EOT
      <a href="{$whatsappLink}" target="_blank" class="read-more-btn">Read more</a>
    EOT;
  } else {
    $readMoreBtn = <<<EOT
      <a href="javascript:void(0);" onclick="showLoginAlert()" class="read-more-btn">Read more</a>
    EOT;
  }

  // Final HTML output
  $html = <<<EOT
    <div class="d-flex flex-row {$alignment} msg-main-wrapper">
      {$leftImage}
      <div class="p-2 mb-2 rounded-3 message-sup-buy">
        {$userNameWithType}
        <p class="my-2 text-{$colorClass}">
          {$previewText}...
          <span class="full-text" style="display: none;">{$value->message}</span>
          {$readMoreBtn}
        </p>
        <hr>
        <div class="d-flex justify-content-between align-items-center" style="flex-wrap:wrap;gap:10px">
          <p style="font-size:10px" class="text-{$colorClass} text-end m-0">{$time}</p>
        </div>
      </div>
      {$rightImage}
    </div>
  EOT;

  return $html;
}







function getPageSlug($string)
{
  $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
  return $slug;
}

function textWithoutHtml($text, $limit)
{
  $data = strip_tags($text);
  if (strlen($data) > $limit) {
    $output = substr($data, 0, $limit);
    $string = $output . "...";
  } else {
    $string = $data;
  }

  $strlen = strlen($string);
  if ($limit > $strlen) {
    $loop = $limit - $strlen;
    $stringNew = '';
    for ($i = 1; $i <= $loop; $i++) {
      $stringNew .= "&nbsp;";
      //echo $stringNew .= "&nbsp;";
    }

    $string = $string . $stringNew;
  }
  return $string;
}

function get_html_to_text($string)
{
  $string = strip_tags($string);
  $string = htmlspecialchars($string);
  $string = str_replace(' ', '', $string);
  return $string;
}

function getOriginalMobile($mobile, $country_code)
{
  $length = strlen($country_code);
  $number = substr($mobile, $length);
  return $number;
}


function get_client_ip()
{
  /*
  $ipaddress = '';
  if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP');
  else if (getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
  else if (getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED');
  else if (getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
  else if (getenv('HTTP_FORWARDED'))
    $ipaddress = getenv('HTTP_FORWARDED');
  else if (getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
  else
    $ipaddress = 'UNKNOWN';
  //return $ipaddress;
*/


  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';
  return $ipaddress;
}


function get_client_ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE)
{
  $output = NULL;
  if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
    $ip = $_SERVER["REMOTE_ADDR"];
    if ($deep_detect) {
      if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
  }
  $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), '', strtolower(trim($purpose)));
  $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
  $continents = array(
    "AF" => "Africa",
    "AN" => "Antarctica",
    "AS" => "Asia",
    "EU" => "Europe",
    "OC" => "Australia (Oceania)",
    "NA" => "North America",
    "SA" => "South America"
  );
  if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
    $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
      switch ($purpose) {
        case "location":
          $output = array(
            "city"           => @$ipdat->geoplugin_city,
            "state"          => @$ipdat->geoplugin_regionName,
            "country"        => @$ipdat->geoplugin_countryName,
            "country_code"   => @$ipdat->geoplugin_countryCode,
            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
            "continent_code" => @$ipdat->geoplugin_continentCode
          );
          break;
        case "address":
          $address = array($ipdat->geoplugin_countryName);
          if (@strlen($ipdat->geoplugin_regionName) >= 1)
            $address[] = $ipdat->geoplugin_regionName;
          if (@strlen($ipdat->geoplugin_city) >= 1)
            $address[] = $ipdat->geoplugin_city;
          $output = implode(", ", array_reverse($address));
          break;
        case "city":
          $output = @$ipdat->geoplugin_city;
          break;
        case "state":
          $output = @$ipdat->geoplugin_regionName;
          break;
        case "region":
          $output = @$ipdat->geoplugin_regionName;
          break;
        case "country":
          $output = @$ipdat->geoplugin_countryName;
          break;
        case "countrycode":
          $output = @$ipdat->geoplugin_countryCode;
          break;
      }
    }
  }
  return $output;
}


function get_product_image($db, $text)
{
  $model = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE `chemical_photo`='{$text}'");

  if (!empty($model)) {
    $photo = $model->chemical_photo;
  } else {
    $photo = 'product.png';
  }

  return $photo;
}

function pop_contact($model, $type = 'supplier', $message = '')
{
  $html = '';
  $rootUrl = get_root() . 'inc/inquiry/contact-inquiry-add.php';
  if (is_login()) {
    $html = <<<EOT
            onclick="contactWP('{$model->mobile}', '{$type}', '{$message}', '{$rootUrl}')"
            EOT;
  } else {
    $html = <<<EOT
            onclick="checkMessageEligibility()"
            EOT;
  }

  return $html;
}



function pop_buyers($db)
{
  $html = '';
  $rootUrl = get_root() . 'inc/inquiry/contact-inquiry-add.php';
  if (is_login()) {

    $onclick = is_premium_member($db) ? "membershipOpen('" . get_root() . "')" : 'membershipModal()';

    $html = <<<EOT
            onclick="{$onclick}"
            EOT;
  } else {
    $html = <<<EOT
            onclick="checkMessageEligibility()"
            EOT;
  }

  return $html;
}


function pop_inquiry($model)
{

  //$html = '';
  //$url = get_root();
  //return $html;

  $html = '';
  $url = get_root();
  //if (is_login()) {
  $html = <<<EOT
            onclick="inquiry('{$model->id}', '{$url}')"
            EOT;
  /*} else {
    $html = <<<EOT
            onclick='checkMessageEligibility()'
            EOT;
  }*/

  return $html;
}


function getPastDate($days)
{
  $pastDate = date('Y-m-d', strtotime("-$days days"));
  return $pastDate;
}

function dateFormat($date, $format = 'd/m/y h:i a')
{
  $timestamp = strtotime($date);
  $formattedDate = date($format, $timestamp);
  return $formattedDate;
}

function getTimeZone()
{
  $timezone = date_default_timezone_get();
  return $timezone;
}


function sendWhatsappMessage($number, $model, $userModel, $chemicalModel)
{

  $username = SMSUSERNAME;
  $password = SMSPASSWORD;
  $sender = SMSSENDERID;
  $link = SMSURL;

  $priority = 'wa';
  $stype = 'normal';
  $message = urlencode("purchase-1");


  $rfq = urlencode(rand(123, 456));
  $chemical_name = urlencode($model->product_name);
  $buyer_name = urlencode($userModel->name);
  $mobile = urlencode($userModel->mobile);

  $inquiry_url = get_root() . "view/{$chemicalModel->slug}";
  $params = "{$rfq},{$chemical_name},{$buyer_name},{$mobile},{$inquiry_url}";

  $var = "?user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}&Params={$params}";

  $url = $link . $var;
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  curl_close($curl);
  return $response;
}


function sendWhatsappInquiry($db, $id)
{
  $model = fetch_object($db, "SELECT * FROM `contact_inquiry` WHERE id='{$id}'");

  //sendWhatsappMessage($model->to_number);
  //sendWhatsappMessage($model->from_number);

  return true;
}

function sendInquiryWhatsapp($db, $id)
{
  $model = fetch_object($db, "SELECT * FROM `inquiry` WHERE id='{$id}'");
  $chemicalModel = fetch_object($db, "SELECT * FROM `supplier_chemical_list` WHERE id='{$model->chemical_id}'");

  $supplierModel = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$model->supplier_id}'");
  $buyerModel = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$model->buyer_id}'");

  if (!empty($supplierModel)) {
    //sendWhatsappMessage($supplierModel->mobile, $model);
  }

  if (!empty($buyerModel)) {
    sendWhatsappMessage($buyerModel->mobile, $model, $buyerModel, $chemicalModel);
  }

  return true;
}


function getLink($url, $params = array(), $use_existing_arguments = false)
{
  if ($use_existing_arguments) $params = $params + $_GET;
  if (!$params) return $url;
  $link = $url;
  if (strpos($link, '?') === false) $link .= '?'; //If there is no '?' add one at the end
  elseif (!preg_match('/(\?|\&(amp;)?)$/', $link)) $link .= '&amp;'; //If there is no '&' at the END, add one.

  $params_arr = array();
  foreach ($params as $key => $value) {
    if (gettype($value) == 'array') { //Handle array data properly
      foreach ($value as $val) {
        $params_arr[] = $key . '[]=' . urlencode($val);
      }
    } else {
      $params_arr[] = $key . '=' . urlencode($value);
    }
  }
  $link .= implode('&amp;', $params_arr);

  return $link;
}


function sendSupplierWP($db, $id)
{
  $model = fetch_object($db, "SELECT * FROM inquiry_offer WHERE id='" . $id . "'");
  $inquiryUser = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$model->uid}'");

  $chemical = $model->chemical;

  $model2 = fetch_all($db, "SELECT `uid` FROM `supplier_chemical_list` WHERE `product_name`='" . $chemical . "'");

  $ids = array_column($model2, 'uid');
  $idss = implode(',', $ids);
  $idss = !empty($idss) ? $idss : 0;

  $mainModel = fetch_all($db, "SELECT * FROM `user` WHERE `id` IN ({$idss})");

  if (count($mainModel) > 0) {
    foreach ($mainModel as $key => $value) {
      $val = (object)$value;
      $mmb = $val->mobile; //getOriginalMobile($val->mobile, $val->country_code);
      $number = $mmb;

      $username = SMSUSERNAME;
      $password = SMSPASSWORD;
      $sender = SMSSENDERID;
      $link = SMSURL;


      $priority = 'wa';
      $stype = 'normal';
      $message = urlencode("inquiry_03");


      $rfq = urlencode($model->rfq);
      $mobile = urlencode($model->mobile);
      $email = $model->email;
      $chemical_name = urlencode($model->chemical);
      $inquiry_url = get_root() . "view/{$rfq}";
      $min_order_quantity = $model->min_order_quantity;
      $target_offer_price = $model->target_offer_price;
      $details = urlencode($model->details);
      $destination = 'Fyndsupplier';
      $params = "{$rfq},{$chemical_name},{$min_order_quantity},{$destination},{$target_offer_price},{$details},{$mobile}";

      $var = "?user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}&Params={$params}";

      $url = $link . $var;
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      curl_close($curl);
    }
    return $response;
  }

  return true;
}

function sendBuyerWP($db, $id)
{
  $model = fetch_object($db, "SELECT * FROM inquiry_offer WHERE id='" . $id . "'");
  $supplierUser = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$model->uid}'");

  $chemical = $model->chemical;

  $model2 = fetch_all($db, "SELECT `uid` FROM `inquiry_offer` WHERE `chemical`='" . $chemical . "' AND type='inquiry'");

  $ids = array_column($model2, 'uid');
  $idss = implode(',', $ids);
  $idss = !empty($idss) ? $idss : 0;

  $mainModel = fetch_all($db, "SELECT * FROM `user` WHERE `id` IN ({$idss})");

  if (count($mainModel) > 0) {
    foreach ($mainModel as $key => $value) {
      $val = (object)$value;
      $mmb = $val->mobile; //getOriginalMobile($val->mobile, $val->country_code);
      $number = $mmb;


      $username = SMSUSERNAME;
      $password = SMSPASSWORD;
      $sender = SMSSENDERID;
      $link = SMSURL;


      $priority = 'wa';
      $stype = 'normal';
      $message = urlencode("offer_03");

      $rfq = urlencode($model->rfq);
      $chemical_name = urlencode($model->chemical);
      $buyer_name = urlencode($supplierUser->name);
      $mobile = urlencode($model->mobile);
      $details = urlencode($model->details);
      $inquiry_url = get_root() . "view/{$rfq}";
      $min_order_quantity = $model->min_order_quantity;
      $target_offer_price = $model->target_offer_price;
      $params = "{$rfq},{$chemical_name},{$min_order_quantity},{$buyer_name},{$target_offer_price},{$details},{$mobile}";

      $var = "?user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}&Params={$params}";
      $url = $link . $var;
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      curl_close($curl);
    }
    return $response;
  }
  return true;
}



function sendUserWP($db, $number, $detail)
{
  $username = SMSUSERNAME;
  $password = SMSPASSWORD;
  $sender = SMSSENDERID;
  $link = SMSURL;

  $priority = 'wa';
  $stype = 'normal';
  $message = urlencode("message1");
  $detail = urlencode($detail);

  $params = "{$detail}";

  $var = "?user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}&Params={$params}";
  $url = $link . $var;
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  curl_close($curl);
  return $response;
}



function sendGroupChatWP($db, $idArray, $type, $msgId, $messageModel1)
{

  $messageModel = (object) $messageModel1;
  $model = fetch_object($db, "SELECT * FROM `group_chat` WHERE id='" . $msgId . "'");

  $idss = implode(',', $idArray);
  $idss = !empty($idss) ? $idss : 0;

  $mainModel = fetch_all($db, "SELECT * FROM `user` WHERE `id` IN ({$idss})");

  $mobiles = '';

  if (count($mainModel) > 0) {
    foreach ($mainModel as $key => $value) {
      $val = (object)$value;
      //$mmb = $val->mobile;
      $number = getOriginalMobile($val->mobile, $val->country_code);

      $userModel = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$model->uid}'");

      $username = "WESMARTYBWA";
      $password = "123456";
      $sender = "BUZWAP";
      $link = SMSURL;


      $priority = 'wa';
      $stype = 'normal';
      $message = urlencode("chat_send1");

      $rfq = urlencode($messageModel->rfq);
      $chemical_name = urlencode($messageModel->chemical);
      $country_name2 = urlencode($messageModel->country2);
      $details = urlencode($messageModel->details);
      $mobile = urlencode($messageModel->mobile);
      $name = urlencode($userModel->name);

      /*
        $min_order_quantity = urlencode($messageModel->min_order_quantity);
        $target_offer_prices = urlencode($messageModel->targetprice);
        $destination = urldecode($messageModel->destination);
        $params = "{$rfq},{$chemical_name},{$min_order_quantity},{$destination},{$target_offer_prices},{$details},{$mobile}";
        */

      $params = "{$details},{$chemical_name},{$mobile},{$rfq},{$country_name2}";

      $var = "?user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}&Params={$params}";
      $url = $link . $var;
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      curl_close($curl);
    }
  }

  return true;
}

function sendHomePremiumBuyerSupplierWP($db, $id)
{
  $model = fetch_object($db, "SELECT * FROM `home_buyer_supplier_inquiry` WHERE id='{$id}'");


  $allUser = fetch_all($db, "SELECT * FROM `user` WHERE `id` IN ({$model->uid})");
  $originalUser = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$model->login_uid}'");


  if (count($allUser) > 0) {
    foreach ($allUser as $key => $value) {
      $val = (object) $value;
      $mmb = getOriginalMobile($val->mobile, $val->country_code);
      $number = $mmb;

      $username = SMSUSERNAME;
      $password = SMSPASSWORD;
      $sender = SMSSENDERID;
      $link = SMSURL;


      $priority = 'wa';
      $stype = 'normal';
      $message = urlencode("mesg_home01");

      $name = urlencode($originalUser->name);
      $mobile = urlencode($originalUser->mobile);
      $details = urlencode($model->details);
      $params = "{$name},{$mobile},{$details}";

      $var = "?user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}&Params={$params}";
      $url = $link . $var;
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      curl_close($curl);
    }
    return $response;
  }
  return true;
}


function showSEOTag($db, $pageName, $url)
{
  $model = fetch_object($db, "SELECT * FROM `seo` WHERE `page`='{$pageName}'");
  $model = empty($model) ? fetch_object($db, "SELECT * FROM `seo` WHERE `page`='default'") : $model;
  $headScriptModel = fetch_object($db, "SELECT * FROM `head_script` WHERE 1");
  $root = get_root();

  $html = <<<HTML
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title id="pageTitle">{$model->title}</title>
    <meta name="description" content="{$model->description}" />
    <meta name="keywords" content="{$model->keyword}" />
    <meta property="og:title" content="{$model->title}" />
    <meta property="og:image" content="{$root}assets/img/logo.png" />
    <meta property="og:site_name" content="fyndsupplier.com" />
    <meta property="og:description" content="{$model->description}" />
    <meta property="og:keywords" content="{$model->keyword}" />
    <meta name="og:url" content="{$url}">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0a66c2">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="{$url}" />
    <link rel="alternate" hreflang="x-default" href="{$url}" />
    <link rel="alternate" hreflang="en" href="{$url}" />
    <link rel="icon" href="{$root}assets/img/logo.png" />
    <link id="favicon" rel="shortcut icon" href="{$root}assets/img/logo.png" type="image/png">
    <link rel="apple-touch-icon" sizes="194x194" href="{$root}assets/img/logo.png" type="image/png">

    <script type="application/ld+json" nonce="EIeYPYWm">
        {
          "context":"http://schema.org",
          "type":"WebSite",
          "name":"Oilfiled Chemical",
          "url":"{$url}"
        }
    </script>

     <!-- Head Script Start -->
    {$headScriptModel->content}
     <!-- Head Script End -->
  HTML;
  echo $html;
}

function showBlogSEOTag($db, $model, $url)
{
  $headScriptModel = fetch_object($db, "SELECT * FROM `head_script` WHERE 1");
  $root = get_root();
  $html = <<<HTML
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title id="pageTitle">{$model->title}</title>
    <meta name="description" content="{$model->meta_description}" />
    <meta name="keywords" content="{$model->meta_keyword}" />
    <meta property="og:title" content="{$model->title}" />
    <meta property="og:image" content="{$root}assets/img/logo.png" />
    <meta property="og:site_name" content="fyndsupplier.com" />
    <meta property="og:description" content="{$model->meta_description}" />
    <meta property="og:keywords" content="{$model->meta_keyword}" />
    <meta name="og:url" content="{$url}">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0a66c2">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="{$url}" />
    <link rel="alternate" hreflang="x-default" href="{$url}" />
    <link rel="alternate" hreflang="en" href="{$url}" />
    <link rel="icon" href="{$root}assets/img/logo.png" />
    <link id="favicon" rel="shortcut icon" href="{$root}assets/img/logo.png" type="image/png">
    <link rel="apple-touch-icon" sizes="194x194" href="{$root}assets/img/logo.png" type="image/png">

    <script type="application/ld+json" nonce="EIeYPYWm">
        {
          "context":"http://schema.org",
          "type":"WebSite",
          "name":"Oilfiled Chemical",
          "url":"{$url}"
        }
    </script>

     <!-- Head Script Start -->
    {$headScriptModel->content}
     <!-- Head Script End -->
  HTML;
  echo $html;
}

function showSupplierSEOTag($db, $model, $url)
{
  $supplierSEOModel = fetch_object($db, "SELECT * FROM `supplier_seo` WHERE 1");
  $model = empty($model) ? fetch_object($db, "SELECT * FROM `seo` WHERE `page`='default'") : $model;
  $title = !empty($model->meta_title) ? $model->meta_title : $supplierSEOModel->meta_title;
  $description = !empty($model->meta_description) ? $model->meta_description : $supplierSEOModel->meta_description;
  $keyword = !empty($model->meta_keyword) ? $model->meta_keyword : $supplierSEOModel->meta_keyword;
  $headScriptModel = fetch_object($db, "SELECT * FROM `head_script` WHERE 1");
  $root = get_root();

  $html = <<<HTML
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title id="pageTitle">{$title}</title>
    <meta name="description" content="{$description}" />
    <meta name="keywords" content="{$keyword}" />
    <meta property="og:title" content="{$title}" />
    <meta property="og:image" content="{$root}assets/img/logo.png" />
    <meta property="og:site_name" content="fyndsupplier.com" />
    <meta property="og:description" content="{$description}" />
    <meta property="og:keywords" content="{$keyword}" />
    <meta name="og:url" content="{$url}">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0a66c2">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="{$url}" />
    <link rel="alternate" hreflang="x-default" href="{$url}" />
    <link rel="alternate" hreflang="en" href="{$url}" />
    <link rel="icon" href="{$root}assets/img/logo.png" />
    <link id="favicon" rel="shortcut icon" href="{$root}assets/img/logo.png" type="image/png">
    <link rel="apple-touch-icon" sizes="194x194" href="{$root}assets/img/logo.png" type="image/png">

    <script type="application/ld+json" nonce="EIeYPYWm">
        {
          "context":"http://schema.org",
          "type":"WebSite",
          "name":"Oilfiled Chemical",
          "url":"{$url}"
        }
    </script>

     <!-- Head Script Start -->
    {$headScriptModel->content}
     <!-- Head Script End -->
  HTML;
  echo $html;
}



function showInquiryOfferSEOTag($db, $model, $url)
{
  $headScriptModel = fetch_object($db, "SELECT * FROM `head_script` WHERE 1");

  $root = get_root();

  $html = <<<HTML
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title id="pageTitle">{$model->meta_title}</title>
    <meta name="description" content="{$model->meta_description}" />
    <meta name="keywords" content="{$model->meta_keyword}" />
    <meta property="og:title" content="{$model->meta_title}" />
    <meta property="og:image" content="{$root}assets/img/offer/{$model->image}" />
    <meta property="og:site_name" content="fyndsupplier.com" />
    <meta property="og:description" content="{$model->meta_description}" />
    <meta property="og:keywords" content="{$model->meta_keyword}" />
    <meta name="og:url" content="{$url}">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0a66c2">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="{$url}" />
    <link rel="alternate" hreflang="x-default" href="{$url}" />
    <link rel="alternate" hreflang="en" href="{$url}" />
    <link rel="icon" href="{$root}assets/img/logo.png" />
    <link id="favicon" rel="shortcut icon" href="{$root}assets/img/logo.png" type="image/png">
    <link rel="apple-touch-icon" sizes="194x194" href="{$root}assets/img/logo.png" type="image/png">

    <script type="application/ld+json" nonce="EIeYPYWm">
        {
          "context":"http://schema.org",
          "type":"WebSite",
          "name":"Oilfiled Chemical",
          "url":"{$url}"
        }
    </script>

     <!-- Head Script Start -->
    {$headScriptModel->content}
     <!-- Head Script End -->
  HTML;
  echo $html;
}



function showSupplierChemicalSEOTag($db, $model, $url)
{
  $headScriptModel = fetch_object($db, "SELECT * FROM `head_script` WHERE 1");

  $root = get_root();

  $html = <<<HTML
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title id="pageTitle">{$model->meta_title}</title>
    <meta name="description" content="{$model->meta_description}" />
    <meta name="keywords" content="{$model->meta_keyword}" />
    <meta property="og:title" content="{$model->meta_title}" />
    <meta property="og:image" content="{$root}assets/img/offer/{$model->chemical_photo}" />
    <meta property="og:site_name" content="fyndsupplier.com" />
    <meta property="og:description" content="{$model->meta_description}" />
    <meta property="og:keywords" content="{$model->meta_keyword}" />
    <meta name="og:url" content="{$url}">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0a66c2">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="{$url}" />
    <link rel="alternate" hreflang="x-default" href="{$url}" />
    <link rel="alternate" hreflang="en" href="{$url}" />
    <link rel="icon" href="{$root}assets/img/logo.png" />
    <link id="favicon" rel="shortcut icon" href="{$root}assets/img/logo.png" type="image/png">
    <link rel="apple-touch-icon" sizes="194x194" href="{$root}assets/img/logo.png" type="image/png">

    <script type="application/ld+json" nonce="EIeYPYWm">
        {
          "context":"http://schema.org",
          "type":"WebSite",
          "name":"Oilfiled Chemical",
          "url":"{$url}"
        }
    </script>

     <!-- Head Script Start -->
    {$headScriptModel->content}
     <!-- Head Script End -->
  HTML;
  echo $html;
}


function generateRandomKey($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $key = '';
  $characterCount = strlen($characters);

  for ($i = 0; $i < $length; $i++) {
    $randomIndex = rand(0, $characterCount - 1);
    $key .= $characters[$randomIndex];
  }

  return $key;
}

function slug($db, $slug, $table)
{
  $slug = getPageSlug($slug);
  $num = num_rows($db, "SELECT * FROM $table WHERE slug='$slug'");
  if ($num > 0) {
    $slug = $slug . "-" . rand(123456, 654321);
    slug($db, $slug, $table);
  }

  return $slug;
}


function convertNumberWordsToDigitsInSlug($slug)
{
  $numberWords = array(
    "zero",
    "one",
    "two",
    "three",
    "four",
    "five",
    "six",
    "seven",
    "eight",
    "nine",
    "ten",
    "eleven",
    "twelve",
    "thirteen",
    "fourteen",
    "fifteen",
    "sixteen",
    "seventeen",
    "eighteen",
    "nineteen",
    "twenty",
    "thirty",
    "forty",
    "fifty",
    "sixty",
    "seventy",
    "eighty",
    "ninety",
    "hundred",
    "thousand",
    "million",
    "billion",
    "trillion"
  );

  $numberDigits = array(
    0,
    1,
    2,
    3,
    4,
    5,
    6,
    7,
    8,
    9,
    10,
    11,
    12,
    13,
    14,
    15,
    16,
    17,
    18,
    19,
    20,
    30,
    40,
    50,
    60,
    70,
    80,
    90,
    100,
    1000,
    1000000,
    1000000000,
    1000000000000
  );

  // Replace number words with their corresponding digits
  $newSlug = str_ireplace($numberWords, $numberDigits, $slug);

  // Remove any remaining non-alphanumeric characters and hyphens
  $newSlug = preg_replace('/[^a-z0-9\-]/i', '', $newSlug);

  return $newSlug;
}




function get_number_from_slug($slug)
{
  // Define the regex pattern to extract numbers
  $slug = convertNumberWordsToDigitsInSlug($slug);

  $pattern = '/(\d+)/';

  $number = 0;

  preg_match('/\d+/', $slug, $matches);

  if (isset($matches[0])) {
    // Extract the first match
    $numberString = $matches[0];

    // Convert the extracted string to a number
    $number = (int) $numberString;  // Convert to integer

    // If you need to preserve decimals, use (float) instead:
    // $number = (float) $numberString;

  }
  return $number;
}

function get_country_from_slug($db, $slug)
{
  $sql = "SELECT nicename FROM country WHERE '{$slug}' REGEXP CONCAT('', name, '$')";
  $model = fetch_object($db, $sql);
  return $model ? $model->nicename : '';
}
