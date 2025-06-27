<?php
require_once "../../lib/bpconn.php";

extract($_REQUEST);

if (!empty($search)) {
    $mainSql = "SELECT id, chemical_name as text FROM chemical WHERE chemical_name LIKE '%{$search}%' LIMIT 10";
} else {
    $mainSql = "SELECT id, chemical_name as text FROM chemical LIMIT 10";
}

$model = fetch_all($db, $mainSql);

//$newData = json_encode($modal);

$data['result'] = $model;

echo json_encode($data);
