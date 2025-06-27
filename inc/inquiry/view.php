<?php
include('../../lib/bpconn.php'); // ✅ Make sure the path is correct

$id = $_GET['id'] ?? 0;

if (!$id || !is_numeric($id)) {
    echo "Invalid inquiry link.";
    exit;
}

$query = mysqli_query($db, "SELECT i.*, 
    buyer.name AS buyer_name, buyer.mobile AS buyer_mobile, buyer.country AS buyer_country,
    supplier.name AS supplier_name, supplier.country AS supplier_country
    FROM inquiry i
    JOIN user buyer ON i.buyer_id = buyer.id
    JOIN user supplier ON i.supplier_id = supplier.id
    WHERE i.id = '$id'");

if (mysqli_num_rows($query) == 0) {
    echo "Inquiry not found.";
    exit;
}

$inquiry = mysqli_fetch_object($query);
?>

<html>
<head>
    <title>Inquiry Details</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h2>📩 New Inquiry</h2>
    <p>🧪 <strong>Chemical:</strong> <?= htmlspecialchars($inquiry->product_name) ?></p>
    <p>🧑‍💼 <strong>Seller:</strong> <?= htmlspecialchars($inquiry->supplier_name) ?> (<?= htmlspecialchars($inquiry->supplier_country) ?>)</p>
    <p>🏭 <strong>Manufacturer:</strong> <?= htmlspecialchars($inquiry->manufacturer_details) ?></p>
    <br>
    <p>🧍‍♂️ <strong>Buyer:</strong> <?= htmlspecialchars($inquiry->buyer_name) ?></p>
    <p>📞 <strong>Phone:</strong> <?= htmlspecialchars($inquiry->buyer_mobile) ?></p>
    <p>📍 <strong>Destination:</strong> <?= htmlspecialchars($inquiry->buyer_country) ?></p>
    <p>📝 <strong>Requirement:</strong> <?= nl2br(htmlspecialchars($inquiry->product_specification)) ?></p>
</body>
</html>
