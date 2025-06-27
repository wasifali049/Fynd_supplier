<?php
require_once "../../lib/bpconn.php";

$limit = 500;

$type = isset($_GET['type']) ? mysqli_real_escape_string($db, $_GET['type']) : '';

if (!empty($type)) {
    $user_type = $type == 'rfq' ? 'buyer' : 'supplier';
    
    // Properly reference the `gc` alias for all fields and filter messages by approved status
    $sql = "SELECT gc.* 
            FROM `group_chat` gc 
            JOIN `user` u ON gc.uid = u.id 
            WHERE u.user_type = '{$user_type}' 
             AND gc.status = 'approved' 
            ORDER BY gc.id DESC 
            LIMIT {$limit}";
} else {
    // Make sure to reference the `gc` alias here as well for consistency
    $sql = "SELECT * 
            FROM `group_chat` gc 
         WHERE gc.status = 'approved' 
            ORDER BY gc.id DESC 
            LIMIT {$limit}";
}

// echo "SQL Query: " . $sql;  // Debugging: Output the query to check if it's formed properly

// Execute the query
$modal = fetch_all($db, $sql);




krsort($modal);

$html = "";

if (count($modal) > 0) {
    foreach ($modal as $key => $val) {
        $value = (object) $val;
        // Example of processing each message, you can customize this part
        $html .= getMessagehistory($db, $value);
    }
}

echo $html;  // Display the results
?>
