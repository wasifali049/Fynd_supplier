<?php

die();
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include('./lib/bpconn.php');
include('./lib/config-details.php');


$sql = "
    SELECT LOWER(product_name) AS product_name_lower, COUNT(*) as count
    FROM `supplier_chemical_list`
    GROUP BY product_name_lower
    HAVING COUNT(*) > 1";

$model = fetch_all($db, $sql);




echo "<pre>";
print_r($model);

foreach($model as $key => $val){
    $value = (object) $val;
    
//    print_r($value->product_name);
    
    /*$slug = $value->product_name;
    
    $sql = "UPDATE `supplier_chemical_list` SET meta_keyword='{$slug}'  WHERE id='{$value->id}'";
    $que = mysqli_query($db, $sql);
    
    if($que){
        debug($que);
    }*/
    
}
echo "</pre>";



?>