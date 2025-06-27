<?php
$conn = new mysqli("localhost", "root", "", "fynd");

$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$location = $_POST['location'];
$date = $_POST['date'];
$specs = $_POST['specs'];
$contact = $_POST['contact'];
$email_phone = $_POST['email_phone'];

// File upload
$file = $_FILES['company_file']['name'];
$tmp = $_FILES['company_file']['tmp_name'];
move_uploaded_file($tmp, "uploads/" . $file);
// 1. Get the last ID from the purchase_inquiries table
$result = $conn->query("SELECT MAX(id) AS max_id FROM purchase_inquiries");
$row = $result->fetch_assoc();
$next_id = $row['max_id'] + 1;

// 2. Generate 5-digit reference number
$reference_no = str_pad($next_id, 5, '0', STR_PAD_LEFT);

// 3. Insert into database
$sql = "INSERT INTO purchase_inquiries (
  product_name, quantity_needed, preferred_location, required_by_date,
  additional_specifications, contact_name, contact_info, company_file_path,
  reference_no, verified_status
) VALUES (
  '$product_name', '$quantity', '$location', '$date',
  '$specs', '$contact', '$email_phone', '$file',
  '$reference_no', 'Non-Verified'
)";

$conn->query($sql);
echo "Inquiry submitted successfully!";
?>
