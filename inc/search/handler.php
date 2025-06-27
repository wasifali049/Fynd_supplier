<?php
include('../../lib/bpconn.php');

if (isset($_POST['searchBtn'])) {
    $searchText = mysqli_real_escape_string($db, $_POST['searchText']);

    $sql1 = "SELECT `id` FROM `user` WHERE user_type='supplier' AND `name` LIKE '%{$searchText}%'";
    $sql2 = "SELECT `uid` FROM `supplier_chemical_list` WHERE `product_name` LIKE '%{$searchText}%'";

    $num1 = num_rows($db, $sql1);
    $num2 = num_rows($db, $sql2);

    if ($num1 > $num2) {
        $data = fetch_all($db, $sql1);
        $dataString = array_column($data, "id");
        $dataId = implode(',', $dataString);
        $dataId = !empty($dataId) ? $dataId : 0;
    } else {
        $data = fetch_all($db, $sql2);
        $dataString = array_column($data, "uid");
        $dataId = implode(',', $dataString);
        $dataId = !empty($dataId) ? $dataId : 0;
    }

    $url = "../../search?data={$dataId}&searchText={$searchText}";

    header("location: {$url}");
}
