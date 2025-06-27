<?php
include '../lib/bpconn.php';  // Make sure database connection is established
include '../lib/config-details.php';
include '../lib/fynd-post/index.php';

if (isset($_POST['chat_id']) && isset($_POST['status'])) {
    $chat_id = $_POST['chat_id'];
    $status = $_POST['status'];

    // Validate status (must be 'approved' or 'rejected')
    if (!in_array($status, ['approved', 'rejected'])) {
        echo 'Invalid status';
        exit;
    }

    // Check current status before updating
    $query = "SELECT status FROM group_chat WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $chat_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['status'] == $status) {
            echo 'status_already_set';
            exit;
        }

        // Update status
        $query = "UPDATE group_chat SET status = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('si', $status, $chat_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo 'success';

            if ($status == 'approved') {
                // Fetch user email and name via JOIN
                $query = "
                    SELECT u.name, u.email
                    FROM group_chat gc
                    JOIN user u ON gc.uid = u.id
                    WHERE gc.id = ?
                ";
                $stmt = $db->prepare($query);
                $stmt->bind_param('i', $chat_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    $userName = $user['name'];
                    $userEmail = $user['email'];

                    $subject = "A new offer";
                    $websiteLink = get_root() . "index.php#chat-message-" . $chat_id;
                    $websiteText = "Click here to view your message";

                    $body = "Dear $userName,<br><br>Your message has been approved by the admin.<br><br>";
                    $body .= "You can view your message here: <a href='$websiteLink' target='_blank'>$websiteText</a><br><br>";
                    $body .= "Best regards,<br>Your Team";

                    $emailSent = sendSMTPMail($userEmail, $userName, $body, $subject);

                    if (!$emailSent) {
                        echo 'Email not sent';
                    }
                } else {
                    echo 'User not found';
                }
            }
        } else {
            echo 'error';
        }
    } else {
        echo 'error'; // chat_id doesn't exist
    }

    $stmt->close();
} else {
    echo 'Missing chat_id or status';
}

$db->close();
?>