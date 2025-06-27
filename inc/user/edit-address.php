<?php
include('../../lib/bpconn.php');







$v = $_REQUEST;



$k = '';



$val = '';



$errors = [];



$data = [];



if (empty($_REQUEST['name'])) {

    $errors['error'] = 'Name is required.';

}



if (empty($_REQUEST['mobile'])) {

    $errors['error'] = 'Mobile is required.';

}



if (empty($_REQUEST['pincode'])) {

    $errors['error'] = 'Pincode is required.';

}



if (empty($_REQUEST['locality'])) {

    $errors['error'] = 'Locality is required.';

}



if (empty($_REQUEST['address'])) {

    $errors['error'] = 'Address is required.';

}



if (empty($_REQUEST['city'])) {

    $errors['error'] = 'City is required.';

}



if (empty($_REQUEST['state'])) {

    $errors['error'] = 'State is required.';

}



if (empty($_REQUEST['address_type'])) {

    $errors['error'] = 'Address Type is required.';

}



function updateAddress($db, $v, $k)

{

    $user_id = get_user_id();

    $oldSql = "SELECT * FROM user_address WHERE user_id='".$user_id."'";

    $oldQuery = mysqli_query($db, $oldSql);

    $oldNum = mysqli_num_rows($oldQuery);



    $sql = ($oldNum) ? updateSql($v) : addSql($v);

    $query = mysqli_query($db, $sql);

    return $query ? true : false;

}



function addSql($v)

{

    $k = '';

    $vv = '';

    $user_id = get_user_id();

    foreach ($v as $key => $value) {

        if ($key != 'service_submit' && $key != 'edit_id') {

            $k .=  "{$key},";

            $vv .=  "'{$value}',";

        }

    }

    $k = rtrim($k, ',');

    $vv = rtrim($vv, ',');

    $mysqltime = date('Y-m-d H:i:s', time());

    $k = $k . ",user_id,created_at";

    $vv = $vv . ",'".$user_id."', '". $mysqltime . "'";



    $sql = "INSERT INTO `user_address` ({$k}) VALUE ({$vv})";

    return $sql;

}



function updateSql($v)

{

    $k = '';

    foreach ($v as $key => $value) {

        if ($key != 'service_submit' && $key != 'edit_id') {

            $k .=  "{$key}='{$value}',";

        }

    }

    $k = rtrim($k, ',');

    $user_id = get_user_id();

    $sql = "UPDATE `user_address` SET {$k} WHERE user_id={$user_id}";

    return $sql;

}



if (!empty($errors)) {



    $data['errors'] = $errors;

} else {



    $m = updateAddress($db, $v, $k);

    

    $data['success'] = true;

    $data['status'] = true;

    $data['data'] = $m;

    $data['errors'] = false;

}





echo json_encode($data);

