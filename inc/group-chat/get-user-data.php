<?php
include_once('../../lib/bpconn.php');
include_once('../../lib/config-details.php');

$send_type = $_POST['send_type'];
$country = isset($_POST['country']) ? $_POST['country'] : '';
$company = isset($_POST['company']) ? $_POST['company'] : '';

// Debug logging
error_log("Received parameters - Send Type: " . $send_type . ", Country: " . $country . ", Company: " . $company);

$where_conditions = array();

if ($send_type == 'buyer') {
    $where_conditions[] = "user_type = 'buyer'";
} elseif ($send_type == 'supplier') {
    $where_conditions[] = "user_type = 'supplier'";
}

if (!empty($country)) {
    $where_conditions[] = "country = '" . mysqli_real_escape_string($db, $country) . "'";
}

if (!empty($company)) {
    $where_conditions[] = "company_name = '" . mysqli_real_escape_string($db, $company) . "'";
}

$where_clause = !empty($where_conditions) ? "WHERE " . implode(" AND ", $where_conditions) : "";

$sql = "SELECT * FROM user {$where_clause} ORDER BY name ASC";
error_log("Generated SQL: " . $sql); // Debug logging

$result = fetch_all($db, $sql);

if (count($result) > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead><tr><th>Select</th><th>Name</th><th>Company</th><th>Country</th><th>Email</th></tr></thead>';
    echo '<tbody>';
    
    foreach ($result as $user) {
        echo '<tr>';
        echo '<td><input type="checkbox" name="selected_users[]" value="' . $user['id'] . '"></td>';
        echo '<td>' . htmlspecialchars($user['name']) . '</td>';
        echo '<td>' . htmlspecialchars($user['company_name']) . '</td>';
        echo '<td>' . htmlspecialchars($user['country']) . '</td>';
        echo '<td>' . htmlspecialchars($user['email']) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
    echo '</div>';
} else {
    echo '<div class="alert alert-info">No users found matching the selected criteria.</div>';
}
?> 