<?php
include('../../lib/bpconn.php');
include_once(__DIR__ . '/../../lib/sms-config.php');
include_once(__DIR__ . '/../../lib/fynd-post/index.php');
include_once(__DIR__ . '/../../lib/fynd-post/mail_body.php');

// Ensure the form has been submitted
if (isset($_POST['message_send'])) {
    $send_type = $_POST['send_type'] ?? '';
    $type = $_POST['type']; // 'buy' or 'sell'

    $data = $_POST['message'];
    $rfq = htmlspecialchars($data['rfq']);
    $chemical = htmlspecialchars($data['chemical']);
    $country = htmlspecialchars($data['country2']);
    $quantity = htmlspecialchars($data['min_order_quantity']);
    $destination = htmlspecialchars($data['destination']);
    $target_price = htmlspecialchars($data['targetprice']);
    $details = nl2br(htmlspecialchars($data['details']));

    // Modern email layout
    $subject = "New Inquiry: $chemical";
    $redirect_url = $data['redirect_url'] ?? 'http://localhost/Fynd-supplier/Fynd-supplier/index.php';
    $content = "
    <div style=\"font-family: Arial, sans-serif; padding: 20px;\">
        <h2 style=\"color: #0a84ae;\">New Chemical Inquiry</h2>
        <table cellpadding=\"10\" cellspacing=\"0\" border=\"0\" style=\"width:100%; background:#f9f9f9; border:1px solid #ccc; border-radius: 6px;\">
            <tr><td><strong>Company:</strong></td><td>$rfq</td></tr>
            <tr><td><strong>Chemical:</strong></td><td>$chemical</td></tr>
            <tr><td><strong>Country:</strong></td><td>$country</td></tr>
            <tr><td><strong>Quantity:</strong></td><td>$quantity</td></tr>
            <tr><td><strong>Destination:</strong></td><td>$destination</td></tr>
            <tr><td><strong>Target Price:</strong></td><td>$target_price</td></tr>
            <tr><td valign=\"top\"><strong>Message:</strong></td><td>$details</td></tr>
        </table>
        <p style=\"margin-top: 20px; font-size: 12px; color: #777;\">This is an automated email from the Fynd platform.</p>
        <p style=\"margin-top: 20px;\">
            <a href=\"$redirect_url\" style=\"background-color: #0a84ae; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;\">Click here to view on Fynd Platform</a>
        </p>
    </div>";

    $users = [];
    $ids = $_POST['user_ids'] ?? [];
    $sent_to = []; // ✅ To collect emails sent for admin report

    // Ensure only selected users are processed
    if (!empty($ids)) {
        $idList = implode(',', array_map('intval', $ids));

        switch ($send_type) {
            case 'buyer':
                $users = fetch_all($db, "SELECT name, email FROM user WHERE id IN ($idList) AND user_type = 'buyer'");
                break;
            case 'supplier':
                $users = fetch_all($db, "SELECT name, email FROM user WHERE id IN ($idList) AND user_type = 'supplier'");
                break;
            case 'send_specific':
            case 'all': // 'all' still respects selected checkboxes only
            default:
                $users = fetch_all($db, "SELECT name, email FROM user WHERE id IN ($idList)");
                break;
        }
    }

    foreach ($users as $user) {
        $to = trim($user['email']);
        $name = $user['name'];

        if (!empty($to) && filter_var($to, FILTER_VALIDATE_EMAIL)) {
            sendSMTPMail($to, $name, $content, $subject);
            $sent_to[] = "$name <$to>"; // ✅ Add to list
        } else {
            error_log("Skipped sending email to user with invalid or empty email: $name");
        }
    }

     // ✅ Send confirmation to admin
     if (!empty($sent_to)) {
        $admin_email = "wasif.ali.00049@gmail.com"; // 🔁 Replace with your actual admin email
        $admin_subject = "Confirmation: Inquiry Sent to Selected Users";

        $admin_content = "
        <div style=\"font-family: Arial, sans-serif; padding: 20px;\">
            <h2 style=\"color: #0a84ae;\">Confirmation of Inquiry Email Sent</h2>
            <p>The following users have received the chemical inquiry email titled <strong>$subject</strong>:</p>
            <ul style=\"background:#f9f9f9; padding:15px; border-radius:6px;\">";
        foreach ($sent_to as $sent_entry) {
            $admin_content .= "<li>$sent_entry</li>";
        }
        $admin_content .= "</ul>
            <p><strong>Chemical:</strong> $chemical</p>
            <p><strong>From Company:</strong> $rfq</p>
            <p><strong>Target Price:</strong> $target_price</p>
            <p><strong>Message Details:</strong> $details</p>
        </div>";

        sendSMTPMail($admin_email, 'Admin', $admin_content, $admin_subject);
    }
}

 header("Location: http://localhost/Fynd-supplier/fynd-panel/group-chat-all.php");

// $host = $_SERVER['HTTP_HOST'];
// $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
// header("Location: http://$host$uri/group-chat-all.php");
exit;

