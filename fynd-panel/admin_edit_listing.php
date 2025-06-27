<?php
$conn = new mysqli("localhost", "root", "", "fynd");

if (!isset($_GET['id'])) {
    echo "No inquiry ID provided.";
    exit;
}

$id = intval($_GET['id']);

// Fetch the current inquiry data
$result = $conn->query("SELECT * FROM purchase_inquiries WHERE id = $id");
if ($result->num_rows == 0) {
    echo "Inquiry not found.";
    exit;
}
$row = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $specs = $_POST['specs'];
    $contact = $_POST['contact'];
    $email_phone = $_POST['email_phone'];

    $file = $row['company_file_path']; // Keep existing file
    if (!empty($_FILES['company_file']['name'])) {
        $file = $_FILES['company_file']['name'];
        $tmp = $_FILES['company_file']['tmp_name'];
        move_uploaded_file($tmp, "uploads/" . $file);
    }

    $sql = "UPDATE purchase_inquiries SET 
        product_name = '$product_name',
        quantity_needed = '$quantity',
        preferred_location = '$location',
        required_by_date = '$date',
        additional_specifications = '$specs',
        contact_name = '$contact',
        contact_info = '$email_phone',
        company_file_path = '$file'
        WHERE id = $id";

if ($conn->query($sql)) {
    $updated = $conn->query("SELECT * FROM purchase_inquiries WHERE id = $id")->fetch_assoc();
    $updated['created_at'] = date("d M", strtotime($updated['created_at']));
    header('Content-Type: application/json');
    echo json_encode($updated);
    exit;
}
 else {
        echo "Failed to update: " . $conn->error;
    }
}
?>

<!-- Bootstrap CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<form id="editInquiryForm" method="POST" enctype="multipart/form-data" action="admin_edit_listing.php?id=<?= $id ?>">

        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Purchase Inquiry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" value="<?= $row['product_name'] ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Quantity Needed (kg)</label>
            <input type="number" class="form-control" name="quantity" value="<?= $row['quantity_needed'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Preferred Location</label>
            <input type="text" class="form-control" name="location" value="<?= $row['preferred_location'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Required By Date</label>
            <input type="date" class="form-control" name="date" value="<?= $row['required_by_date'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Additional Specifications</label>
            <textarea class="form-control" name="specs"><?= $row['additional_specifications'] ?></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Contact Name</label>
            <input type="text" class="form-control" name="contact" value="<?= $row['contact_name'] ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email / Phone</label>
            <input type="text" class="form-control" name="email_phone" value="<?= $row['contact_info'] ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Replace Company File (optional)</label>
            <input type="file" class="form-control" name="company_file">
            <small class="text-muted">Current file: <?= $row['company_file_path'] ?></small>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update Inquiry</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    