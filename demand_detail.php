<?php
// DB Connection
$db = new mysqli("localhost", "root", "", "fynd");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get ID from URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid request.");
}
$id = intval($_GET['id']);

// Fetch Record
$query = "SELECT * FROM purchase_inquiries WHERE id = $id";
$result = mysqli_query($db, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Record not found.");
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Demand Detail</title>
    <link id="favicon" rel="shortcut icon" href="assets/img/logo.png" type="image/png">
     
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Demand Details</h4>
        </div>
        <?php
// Sample DB result from your query
// $row = mysqli_fetch_assoc($result); // Assuming you already fetched it

$image = htmlspecialchars($row['company_file_path']); // image filename/path
$product_name = htmlspecialchars($row['product_name']);
$reference_no = htmlspecialchars($row['reference_no']);
$quantity = htmlspecialchars($row['quantity_needed']);
$status = htmlspecialchars($row['verified_status']);
$location = htmlspecialchars($row['preferred_location']);
$specs = htmlspecialchars($row['additional_specifications']);

$contact_name = htmlspecialchars($row['contact_name']);
$contact_email = htmlspecialchars($row['contact_info']);
$contact_phone = htmlspecialchars($row['phone']);
?>

<div class="container py-4">
    <!-- Section 1: Product Image and Info -->
    <div class="row mb-4">
        <!-- Product Image -->
        <div class="col-md-4">
            <img src="uploads/<?php echo $image; ?>" class="img-fluid rounded border" alt="Product Image">
        </div>

        <!-- Product Info -->
        <div class="col-md-8">
            <h4 class="mb-3">Product Information</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Chemical Name:</strong> <?php echo $product_name; ?></li>
                <li class="list-group-item"><strong>Reference No:</strong> <?php echo $reference_no; ?></li>
                <li class="list-group-item"><strong>Quantity Needed:</strong> <?php echo $quantity; ?> KG</li>
                <li class="list-group-item"><strong>Status:</strong>  <div class="bg-primary text-white px-2 py-1 rounded"> <?php echo $status; ?> </div></li>
                <li class="list-group-item"><strong>Preffered Location:</strong> <?php echo $location; ?></li>
            </ul>
        </div>
    </div>

    <!-- Section 2: Product Details -->
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="mb-3">Product Details</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Specifications:</strong> <?php echo $specs; ?></li>
            </ul>
        </div>
    </div>

    <!-- Section 3: Contact Details -->
    <div class="row">
        <div class="col-12">
            <h4 class="mb-3">Contact Details</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Contact Name:</strong> <?php echo $contact_name; ?></li>
                <li class="list-group-item"><strong>Email:</strong> <?php echo $contact_email; ?></li>
                <li class="list-group-item"><strong>Phone:</strong> <?php echo $contact_phone; ?></li>
            </ul>
        </div>
    </div>
    <!-- Section 4: Share This Page -->
<div class="row mt-4">
    <div class="col-12">
        <h4 class="mb-3">Share This Page</h4>
        <?php
        $current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $share_text = urlencode("Check out this chemical supply: $product_name (Ref#: $reference_no)");
        ?>
        <div class="d-flex gap-2 flex-wrap">
            <!-- Facebook -->
            <a class="btn btn-primary" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>" target="_blank">
                Share on Facebook
            </a>

            <!-- Twitter -->
            <a class="btn btn-info text-white" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($current_url); ?>&text=<?php echo $share_text; ?>" target="_blank">
                Share on Twitter
            </a>

            <!-- LinkedIn -->
            <a class="btn btn-secondary" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode($current_url); ?>" target="_blank">
                Share on LinkedIn
            </a>

            <!-- WhatsApp -->
            <a class="btn btn-success" href="https://wa.me/?text=<?php echo $share_text . '%0A' . urlencode($current_url); ?>" target="_blank">
                Share on WhatsApp
            </a>
        </div>
    </div>
</div>
</div>

        <!-- <div class="card-footer text-end">
            <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
        </div> -->
    </div>
</div>
</body>
</html>
