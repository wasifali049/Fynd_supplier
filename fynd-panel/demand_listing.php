<?php
$conn = new mysqli("localhost", "root", "", "fynd");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // 1. Update status to Approved
    $update = $conn->query("UPDATE purchase_inquiries SET verified_status='Verified' WHERE id=$id");

    // 2. If update is successful, send email notification
    if ($update) {
        $result = $conn->query("SELECT contact_info, product_name FROM purchase_inquiries WHERE id=$id");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['contact_info'];
            $chemical = $row['product_name'];

            $subject = "Your Supply/Demand Post Approved";
            $message = "Hello,\n\nYour post for '$chemical' has been approved and is now visible.\n\nThanks,\nAdmin Team";
            $headers = "From: wa0200810@gmail.com";

            // 3. Send email
            mail($email, $subject, $message, $headers);
        }

        // 4. Redirect to admin page
        header("Location: admin_stock_listings.php?msg=approved");
        exit;
    } else {
        echo "Failed to update record.";
    }
} else {
    echo "No ID provided.";
}
?>
