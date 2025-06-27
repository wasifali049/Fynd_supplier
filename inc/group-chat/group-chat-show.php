<?php
require_once "../../lib/bpconn.php";

// $limit = 20;

// $type = isset($_GET['type']) ? mysqli_real_escape_string($db, $_GET['type']) : '';
// if (!empty($type)) {
//     $user_type = $type == 'rfq' ? 'buyer' : 'supplier';
//     $sql = "SELECT gc.* FROM group_chat gc JOIN user u ON gc.uid = u.id WHERE u.user_type = '{$user_type}' ORDER by id DESC LIMIT {$limit}";
// } else {
//     $sql = "SELECT * FROM `group_chat` ORDER by id DESC LIMIT $limit";
// }

// $modal = fetch_all($db, $sql);

// krsort($modal);
$type = isset($_GET['type']) ? mysqli_real_escape_string($db, $_GET['type']) : '';
$item_number = isset($_GET['item_number']) ? mysqli_real_escape_string($db, $_GET['item_number']) : ''; // Assuming you have item_number as a parameter

if (!empty($type)) {
    $user_type = $type == 'rfq' ? 'buyer' : 'supplier';

    if (!empty($item_number)) {
        $sql = "
        SELECT gc.*, u.id AS user_id, p.payment_status, 
               CASE WHEN p.payment_status IS NOT NULL THEN 1 ELSE 0 END as is_verified
        FROM (
            SELECT * 
            FROM group_chat gc1
            WHERE gc1.id IN (
                SELECT MAX(gc2.id)
                FROM group_chat gc2
                WHERE gc2.uid = '{$item_number}'
                GROUP BY gc2.uid
            )
        ) gc
        JOIN user u ON gc.uid = u.id
        LEFT JOIN (
            SELECT * FROM payments
            WHERE id IN (
                SELECT MAX(id)
                FROM payments
                WHERE item_number = '{$item_number}'
                GROUP BY item_number
            )
        ) p ON gc.uid = p.item_number
        WHERE u.user_type = '{$user_type}'
        ORDER BY is_verified DESC, gc.id DESC
        ";
    } else {
        $sql = "
        SELECT gc.*, u.id AS user_id, p.payment_status,
               CASE WHEN p.payment_status IS NOT NULL THEN 1 ELSE 0 END AS is_verified
        FROM (
            SELECT * 
            FROM group_chat gc1
            WHERE gc1.id IN (
                SELECT MAX(gc2.id)
                FROM group_chat gc2
                GROUP BY gc2.uid
            )
        ) gc
        JOIN user u ON gc.uid = u.id
        LEFT JOIN (
            SELECT * FROM payments
            WHERE id IN (
                SELECT MAX(id)
                FROM payments
                GROUP BY item_number
            )
        ) p ON gc.uid = p.item_number
        WHERE u.user_type = '{$user_type}'
        ORDER BY is_verified DESC, gc.id DESC
        ";
    }

} else {
    if (!empty($item_number)) {
        $sql = "
        SELECT gc.*, u.id AS user_id, p.payment_status,
               CASE WHEN p.payment_status IS NOT NULL THEN 1 ELSE 0 END as is_verified
        FROM (
            SELECT * 
            FROM group_chat gc1
            WHERE gc1.id IN (
                SELECT MAX(gc2.id)
                FROM group_chat gc2
                WHERE gc2.uid = '{$item_number}'
                GROUP BY gc2.uid
            )
        ) gc
        JOIN user u ON gc.uid = u.id
        LEFT JOIN (
            SELECT * FROM payments
            WHERE id IN (
                SELECT MAX(id)
                FROM payments
                WHERE item_number = '{$item_number}'
                GROUP BY item_number
            )
        ) p ON gc.uid = p.item_number
        ORDER BY is_verified DESC, gc.id DESC
        ";
    } else {
        $sql = "
        SELECT gc.*, u.id AS user_id, p.payment_status,
               CASE WHEN p.payment_status IS NOT NULL THEN 1 ELSE 0 END AS is_verified
        FROM (
            SELECT * 
            FROM group_chat gc1
            WHERE gc1.id IN (
                SELECT MAX(gc2.id)
                FROM group_chat gc2
                GROUP BY gc2.uid
            )
        ) gc
        JOIN user u ON gc.uid = u.id
        LEFT JOIN (
            SELECT * FROM payments
            WHERE id IN (
                SELECT MAX(id)
                FROM payments
                GROUP BY item_number
            )
        ) p ON gc.uid = p.item_number
        ORDER BY is_verified DESC, gc.id DESC
        ";
    }
}


$modal = fetch_all($db, $sql);
// Remove krsort as we want to maintain SQL ordering
// krsort($modal);

$html = "";

if (count($modal) > 0) {
    foreach ($modal as $key => $val) {
        $value = (object) $val;
        // $html .= "ok";
        $html .= getMessageContent($db, $value);
    }
}

echo $html;
