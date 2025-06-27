<?php


include '../lib/bpconn.php';
include '../lib/config-details.php';
check_admin_auth();

extract($_REQUEST);

// Debug: Log received values
error_log("Received POST data: " . print_r($_POST, true));
error_log("Send Type: " . (isset($send_type) ? $send_type : 'not set'));
error_log("Country: " . (isset($country) ? $country : 'not set'));
error_log("Chemical: " . (isset($chemical) ? $chemical : 'not set'));

$html = '';
$cond = ["u.status = 1"];  // Use an array for cleaner appending

if ($send_type == 'buyer') {
    $cond[] = "u.user_type = 'buyer'";
} elseif ($send_type == 'supplier') {
    $cond[] = "u.user_type = 'supplier'";
} elseif ($send_type == 'send specific') {
    // Get user IDs who have the specified chemical directly by ID
    $chemicalId = (int) $chemical; // assuming chemical is an ID here
    $userRows = fetch_all($db, "SELECT DISTINCT uid FROM supplier_chemical_list WHERE chemical_id = $chemicalId");
    
    if (!empty($userRows)) {
        $userIds = array_column($userRows, 'uid');
        $userIdsStr = implode(',', $userIds);
        $cond[] = "u.id IN ($userIdsStr)";
    } else {
        $cond[] = "0"; // No matches
    }
}

// Add chemical filter (if send_type is not 'send specific')
if (!empty($chemical) && $send_type !== 'send specific') {
    $escapedChemical = mysqli_real_escape_string($db, $chemical);
    $chemicalRows = fetch_all($db, "SELECT id FROM chemical WHERE chemical_name LIKE '%$escapedChemical%'");

    if (!empty($chemicalRows)) {
        $chemicalIds = array_column($chemicalRows, 'id');
        $chemicalIdsStr = implode(',', $chemicalIds);

        $userChemRows = fetch_all($db, "SELECT DISTINCT uid FROM supplier_chemical_list WHERE chemical_id IN ($chemicalIdsStr)");
     
        if (!empty($userChemRows)) {
            $userIds = array_column($userChemRows, 'uid');
            $userIdsStr = implode(',', $userIds);
            $cond[] = "u.id IN ($userIdsStr)";
        } else {
            $cond[] = "0";
        }
    } else {
        $cond[] = "0";
    }
}

// Country filter
if (!empty($country)) {
    $cond[] = "u.country = '" . mysqli_real_escape_string($db, $country) . "'";
}

// Combine conditions
$whereClause = implode(" AND ", $cond);

// Final SQL
$sql = "SELECT DISTINCT u.* FROM user u WHERE $whereClause ORDER BY u.name ASC";

error_log("Final SQL Query: " . $sql);
$model = fetch_all($db, $sql);
$total_records = count($model);
error_log("Total records found: " . $total_records);

$html .= "
<form method='POST' action='../inc/group-chat/group-chat-send-email.php'>
        <ul class='list-group' id='wrapperBox'>
        <li class='list-group-item active'>Total Record: <b>{$total_records}</b></li>
        <li class='list-group-item active'>
        
        <input onkeyup='filterList()' placeholder='Search Name/Email' type='text' id='userFilter' class='form-control'>

        <div class='my-2 mx-4'>
        <input class='form-check-input' type='radio' name='checkUncheck' id='checkUncheck1' onclick='checkAll()'>
        <label for='checkUncheck1'>Check</label>
        </div>

        <div class='my-2 mx-4'>
        <input class='form-check-input' type='radio' name='checkUncheck' id='checkUncheck2' onclick='uncheckAll()'>
        <label for='checkUncheck2'>Uncheck</label>
        </div>
        </li>
        </ul>
        </form>
        <ul class='list-group' id='filterable-wrapper'>
    ";

foreach ($model as $key => $value) {
    $html .= "
        <li class='list-group-item filterable'>
            <div class='form-check'>
                <input class='form-check-input filterCheckBox' name='user_ids[]' type='checkbox' id='user" . $key . "' checked value='" . $value['id'] . "'>
                <label class='form-check-label' for='user" . $key . "'>" . $value['name'] . ' - ' . $value['email'] . "</label>
            </div>
        </li>
        ";
}

$html .= "</ul>";


$data = json_encode($html);

echo $data;
