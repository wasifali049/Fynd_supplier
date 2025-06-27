<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);


$conn = new mysqli("localhost", "root", "", "fynd");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // 1. Update status
    $update = $conn->query("UPDATE stock_listings SET verified_status='Verified' WHERE id = $id");

    if ($update) {
        // 2. Fetch email and product details
        $result = $conn->query("SELECT contact_info, product_name FROM stock_listings WHERE id = $id");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['contact_info'];
            $chemical = $row['product_name'];

            // 3. Send email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'wasif.ali.00049@gmail.com';         // ✅ Your Gmail
                $mail->Password   = 'ppkmznztmsnurzoy';            // ✅ App password
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $mail->setFrom('wasif.ali.00049@gmail.com', 'Admin Team');
                $mail->addAddress($email);

                $mail->Subject = 'Your Supply Post Approved';
                $mail->Body    = "Hello,\n\nYour post for '$chemical' has been approved and is now visible.\n\nThanks,\nAdmin Team";

                $mail->send();
            } catch (Exception $e) {
                error_log("Mailer Error: {$mail->ErrorInfo}");
            }
        }

        // // 4. Redirect
        // header("Location: admin_stock_listings.php?msg=approved");
        // exit;
        echo "<script>alert('Post approved and email sent successfully.'); window.location.href='admin_stock_listings.php';</script>";
exit;

    } else {
        echo "Failed to update record: " . $conn->error;
    }
} else {
    echo "No ID provided.";
}
?>
