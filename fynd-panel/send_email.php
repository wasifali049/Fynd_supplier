<?php
include '../lib/bpconn.php';
include '../lib/config-details.php';
check_admin_auth();

// Fetch selected user IDs
$user_ids = $_POST['user_ids'] ?? [];
var_dump($user_ids);exit;
if (!empty($user_ids)) {
    // Convert array to comma-separated string safely
    $ids = implode(',', array_map('intval', $user_ids));

    // Fetch user details
    $users = fetch_all($db, "SELECT `email`, `name` FROM `user` WHERE id IN ($ids) AND status=1");
    
    foreach ($users as $user) {
        $to = $user['email'];
        $subject = "Your Subject Here";
        $message = "Hello " . $user['name'] . ",\nThis is your email content.";
        $headers = "From: admin@example.com";

        // Send email
        sendSMTPMail($email,$name,$body,$subject);
    }

    echo "Emails sent successfully!";
} else {
    echo "No users selected.";
}
?>
