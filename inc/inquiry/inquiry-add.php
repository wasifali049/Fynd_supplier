<?php
include('../../lib/bpconn.php');
include_once(__DIR__ . '/../../lib/sms-config.php');
include_once(__DIR__ . '/../../lib/fynd-post/index.php');
include_once(__DIR__ . '/../../lib/fynd-post/mail_body.php');

$model = $_REQUEST['inquiry'];
$errors = [];
$data = [];

function sanitize($db, $value) {
    return mysqli_real_escape_string($db, trim($value));
}

function addInquiry($db, $model)
{
    $created_at = date('Y-m-d H:i:s');

    $supplier_id = sanitize($db, $model['uid']);
    $buyer_id = get_user_id();
    $main_chemical_id = sanitize($db, $model['main_chemical_id']);
    $chemical_id = sanitize( $db, $model['chemical_id']);
    $product_name = sanitize($db, $model['product_name']);
    $min_order_quantity = sanitize($db, $model['min_order_quantity']);
    $manufacturer_details = sanitize($db, $model['manufacturer_details']);
    $product_specification = sanitize($db, $model['product_specification']);
    $comment = sanitize($db, $model['comment']);
    $price = sanitize($db, $model['price']);
    $density = sanitize($db, $model['density']);
    $product_info = sanitize($db, $model['details']);

    $sql = "INSERT INTO `inquiry` (
        `manufacturer_details`, `product_specification`, `comment`, `supplier_id`, 
        `buyer_id`, `main_chemical_id`, `chemical_id`, `product_name`, 
        `min_order_quantity`, `price`, `density`, `product_info`, `created_at`
    ) VALUES (
        '$manufacturer_details', '$product_specification', '$comment', '$supplier_id', 
        '$buyer_id', '$main_chemical_id', '$chemical_id', '$product_name', 
        '$min_order_quantity', '$price', '$density', '$product_info', '$created_at'
    )";

    $query = mysqli_query($db, $sql);
    $lastId = mysqli_insert_id($db);

    $buyer = fetch_object($db, "SELECT * FROM `user` WHERE id='$buyer_id'");
    $supplier = fetch_object($db, "SELECT * FROM `user` WHERE id='$supplier_id'");

    $buyersubject = "Your Inquiry Has Been Received";

    // Email to Buyer
    $bodyBuyer = "
    <html>
    <body style='font-family: Arial, sans-serif;'>
        <p>Hello <strong>{$buyer->name}</strong>,</p>
        <p>Your inquiry has been received and we have notified <strong>{$supplier->name}</strong> to reach out to you.</p>
        <p>If you would like to contact the agent directly, please use the link below.</p>
        <p style='margin-top: 20px;'>
            <a href='https://wa.me/{$supplier->mobile}' 
               style='display:inline-block;padding:10px 20px;background:#007BFF;color:#fff;text-decoration:none;border-radius:5px;'>
               Contact Agent
            </a>
        </p>
        <p>Have a good day!</p>
        <p style='color:#888;font-size:12px;'>".date('h:i A')."</p>
    </body>
    </html>";

    sendSMTPMail($buyer->email, $buyer->name, $bodyBuyer, $buyersubject);

    // Email to Supplier
    $suppliersubject = "A New Inquiry Has Been Received";
    $bodySupplier = "
    <html>
    <body style='font-family: Arial, sans-serif;'>
        <p>Hello <strong>{$supplier->name}</strong>,</p>
        <p>You have received a new inquiry from <strong>{$buyer->name}</strong>.</p>
        <p>Please log in to your account to review the inquiry details and respond accordingly.</p>
        <p style='margin-top: 20px;'>
            <a href='" . get_root() . "inquiry-panel' 
               style='display:inline-block;padding:10px 20px;background:#28a745;color:#fff;text-decoration:none;border-radius:5px;'>
               View Inquiry
            </a>
        </p>
        <p>Have a good day!</p>
        <p style='color:#888;font-size:12px;'>".date('h:i A')."</p>
    </body>
    </html>";

    sendSMTPMail($supplier->email, $supplier->name, $bodySupplier, $suppliersubject);

    // Email to Admin
    $Adminsubject = "A New Inquiry Has Been Received";
    $bodyAdmin = "
    <html>
    <body>
        <p>📩 <strong>New Inquiry Received:</strong></p>
        <p>🧪 <strong>Chemical:</strong> {$product_name}</p>
        <p>🧑‍💼 <strong>Seller:</strong> {$supplier->name} ({$supplier->country})</p>
        <p>🏭 <strong>Manufacturer:</strong> {$manufacturer_details}</p>
        <br>
        <p>🧍‍♂️ <strong>Buyer:</strong> {$buyer->name}</p>
        <p>📞 <strong>Phone:</strong> {$buyer->mobile}</p>
        <p>📍 <strong>Destination:</strong> {$buyer->country}</p>
        <p>📝 <strong>Requirement:</strong> {$product_specification}</p>
        <br>
        <p>🔗 <strong>View Inquiry:</strong> <a href='" . get_root() . "inc/inquiry/view.php?id={$lastId}'>View</a></p>
        <hr> 
    </body>
    </html>";
       $adminemail="info@fyndsupplier.com";
       $adminname="Fynd Supplier";
     sendSMTPMail($adminemail, $adminname, $bodyAdmin, $Adminsubject);

    return $query ? true : false;
}

if (!empty($errors)) {
    $data['errors'] = $errors;
} else {
    $m = addInquiry($db, $model);
    $data['success'] = true;
    $data['status'] = true;
    $data['data'] = $m;
    $data['errors'] = false;
}

echo json_encode($data);
