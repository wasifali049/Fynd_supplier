<?php
function appointmentWASMS($db, $appointment_id)
{

    $username = WASMSUSERNAME;
    $password = WASMSPASSWORD;
    $sender = WASMSSENDERID;
    $link = WASMSURL;

    $appointmentModel = fetch_object($db, "SELECT * FROM appointment WHERE id='{$appointment_id}'");
    $clientModel = fetch_object($db, "SELECT * FROM client WHERE id='{$appointmentModel->client_id}'");

    $name = $clientModel->client_name;
    $number = $clientModel->contact;
    $date = $appointmentModel->appointment_date;
    $time = $appointmentModel->appointment_time;
    $salon_name = SALONNAME;

    $priority = 'wa';
    $stype = 'normal';

    $message = urlencode("Thank You {$name}. Your Appointment is booked for {$date} {$time}. From {$salon_name}.");

    $var = "user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}";

    $url = $link . $var;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function walletWASMS($db, $id, $available)
{
    $username = WASMSUSERNAME;
    $password = WASMSPASSWORD;
    $sender = WASMSSENDERID;
    $link = WASMSURL;

    $walletModel = fetch_object($db, "SELECT * FROM client_wallet WHERE id='{$id}'");
    $clientModel = fetch_object($db, "SELECT * FROM client WHERE id='{$walletModel->client_id}'");

    $name = $clientModel->client_name;
    $number = $clientModel->contact;
    $salon_name = SALONNAME;
    $inr = $walletModel->amount;

    $priority = 'wa';
    $stype = 'normal';

    $message = urlencode("Dear {$name} , Your wallet is credited with INR {$inr}. Available Wallet Balance INR {$available} From {$salon_name}.");

    $var = "user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}";

    $url = $link . $var;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function invoiceWASMS($db, $billing_id)
{
    $username = WASMSUSERNAME;
    $password = WASMSPASSWORD;
    $sender = WASMSSENDERID;
    $link = WASMSURL;

    $billingModel = fetch_object($db, "SELECT * FROM client_billing WHERE id='{$billing_id}'");
    $clientModel = fetch_object($db, "SELECT * FROM client WHERE id='{$billingModel->client_id}'");


    $invoiceLinkModel = fetch_object($db, "SELECT * FROM `link_shortener` WHERE billing_id='{$billing_id}' AND link_type='invoice'");
    $feedbackLinkModel = fetch_object($db, "SELECT * FROM `link_shortener` WHERE billing_id='{$billing_id}' AND link_type='feedback'");

    $invData = !empty($invoiceLinkModel) ? $invoiceLinkModel->shortener_key : '';
    $feedData = !empty($feedbackLinkModel) ? $feedbackLinkModel->shortener_key : '';

    //$name = $clientModel->client_name;
    $number = $clientModel->contact;
    $date = $billingModel->billing_date;
    //$time = $clientModel->billing_time;
    $salon_name = SALONNAME;
    $inr = $billingModel->total;

    $invlink = "http://pxsf.in/{$invData}";
    $feedlink = "http://pxsf.in/{$feedData}";

    $priority = 'wa';
    $stype = 'normal';

    $message = urlencode("Thank you for your Services of {$inr} ON {$date} Invoice link {$invlink} For Feedback {$feedlink} From {$salon_name}.");

    $var = "user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}";

    $url = $link . $var;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}



function test(){
    
    $number = "9125149648";

    $username = 'WESMARTYBWA';
    $password = '123456';
    $sender = 'BUSWAP';
    $link = 'https://bhashsms.com/api/sendmsg.php';

    $priority = 'wa';
    $stype = 'normal';
    $message = urlencode("fynd_012test1");
    //$params = "test1,test123,test123,test123,test123,test123";

    $params = "test1,test2,text3,text4,text5,text6";
    //$htype = 'document';
    //$fname = urlencode("PDF File");
    //$url = 'https://trai.gov.in/sites/default/files/PR_No.38of2020.pdf';

    $var = "?user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}&params={$params}";//&htype={$htype}&fname={$fname}&url={$url}";
    
    	$d = "https://bhashsms.com/api/sendmsg.php?user={$username}&pass={$password}&sender={$sender}&phone={$number}&text={$message}&priority={$priority}&stype={$stype}&params={$params}&htype=&fname=&url=";
    	
    	
    //$url = $link . $var;
    $url = $d;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}



//var_dump(test());