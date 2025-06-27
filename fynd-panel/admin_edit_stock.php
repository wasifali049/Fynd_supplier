<?php
$conn = new mysqli("localhost", "root", "", "fynd");

if (!isset($_GET['id'])) {
    echo "No stock ID provided.";
    exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM stock_listings WHERE id = $id");
if ($result->num_rows == 0) {
    echo "Stock not found.";
    exit;
}
$row = $result->fetch_assoc();

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $min_order = $_POST['min_order'];
    $specs = $_POST['specs'];
    $contact = $_POST['contact'];
    $email_phone = $_POST['email_phone'];
    $company = $_POST['company'];

    // Keep existing paths
    $doc = $row['document_path'];
    if (!empty($_FILES['document']['name'])) {
        $doc = $_FILES['document']['name'];
        move_uploaded_file($_FILES['document']['tmp_name'], "uploads/" . $doc);
    }

    $image = $row['product_image_path'];
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
    }

    $sql = "UPDATE stock_listings SET 
        product_name = '$product_name',
        quantity_available = '$quantity',
        location_of_stock = '$location',
        price_per_unit = '$price',
        min_order_quantity = '$min_order',
        product_specifications = '$specs',
        contact_name = '$contact',
        contact_info = '$email_phone',
        company_name = '$company',
        document_path = '$doc',
        product_image_path = '$image'
        WHERE id = $id";

    if ($conn->query($sql)) {
        echo "<script>location.href='admin_stock_listings.php?msg=updated';</script>";
        exit;
    } else {
        echo "Failed to update: " . $conn->error;
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<form id="editStockForm" method="POST" action="admin_edit_stock.php?id=<?= $id ?>" enctype="multipart/form-data">


    <div class="modal-header">
        <h5 class="modal-title">Edit Stock Listing</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
    <div class="modal-body">
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control" value="<?= $row['product_name'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Quantity Available</label>
            <input type="number" name="quantity" class="form-control" value="<?= $row['quantity_available'] ?>">
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="<?= $row['location_of_stock'] ?>">
        </div>
        <div class="mb-3">
            <label>Price Per Unit</label>
            <input type="text" name="price" class="form-control" value="<?= $row['price_per_unit'] ?>">
        </div>
        <div class="mb-3">
            <label>Min Order Quantity</label>
            <input type="text" name="min_order" class="form-control" value="<?= $row['min_order_quantity'] ?>">
        </div>
        <div class="mb-3">
            <label>Specifications</label>
            <textarea name="specs" class="form-control"><?= $row['product_specifications'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Contact Name</label>
            <input type="text" name="contact" class="form-control" value="<?= $row['contact_name'] ?>">
        </div>
        <div class="mb-3">
            <label>Email / Phone</label>
            <input type="text" name="email_phone" class="form-control" value="<?= $row['contact_info'] ?>">
        </div>
        <div class="mb-3">
            <label>Company Name</label>
            <input type="text" name="company" class="form-control" value="<?= $row['company_name'] ?>">
        </div>
        <div class="mb-3">
            <label>Document</label>
            <input type="file" name="document" class="form-control">
            <small class="text-muted">Current: <?= $row['document_path'] ?></small>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <small class="text-muted">Current: <?= $row['product_image_path'] ?></small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Update Stock</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    </div>
</form>
