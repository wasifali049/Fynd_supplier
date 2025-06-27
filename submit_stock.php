<?php
$conn = new mysqli("localhost", "root", "", "fynd");

$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$location = $_POST['location'];
$price = $_POST['price'];
$min_order = $_POST['min_order'];
$specs = $_POST['specs'];
$contact = $_POST['contact'];
$email_phone = $_POST['email_phone'];
$company = $_POST['company'];

// File uploads (document and image)
$doc = $_FILES['document']['name'];
$doc_tmp = $_FILES['document']['tmp_name'];
move_uploaded_file($doc_tmp, "uploads/" . $doc);

$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($image_tmp, "uploads/" . $image);

// 1. Get the last ID from the stock_listings table
$result = $conn->query("SELECT MAX(id) AS max_id FROM stock_listings");
$row = $result->fetch_assoc();
$next_id = $row['max_id'] + 1;

// 2. Generate 5-digit reference number
$reference_no = str_pad($next_id, 5, '0', STR_PAD_LEFT);


$sql = "INSERT INTO stock_listings (
    product_name, quantity_available, location_of_stock, price_per_unit, 
    min_order_quantity, product_specifications, contact_name, contact_info, 
    company_name, document_path, product_image_path, reference_no, verified_status
  ) 
  VALUES (
    '$product_name', '$quantity', '$location', '$price', '$min_order', 
    '$specs', '$contact', '$email_phone', '$company', '$doc', '$image', 
    '$reference_no', 'Non-Verified'
  )";
  
$conn->query($sql);
echo "Stock listed successfully!";
?>
