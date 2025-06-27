<?php

function loginOTP($db, $user_id, $id)
{
    $username = SMSUSERNAME;
    $Password = SMSPASSWORD;
    $sender = SMSSENDERID;
    $link = SMSURL;

    $userModel = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$user_id}'");

    $userOtpModel = fetch_object($db, "SELECT * FROM `login_otp` WHERE `id`='{$id}'");

    $name = $userModel->name;
    $number = $userModel->mobile;
    $date = "xyz";
    $salon_name = "xyz";
    $inr = $userOtpModel->otp;

    $priority = 'ndnd';
    $stype = 'normal';
    $invlink = "xyz";
    $feedlink = "xyz";

    $channel = "Trans";
    $DCS = 0;
    $flashsms = 0;
    $route = 1;
    $Peid = "1201162462661800644";
    $DLTTemplateId = "1207167168989297763";

    $message = urlencode("Thank you for your Services of {$inr} ON {$date} Invoice link {$invlink} For Feedback {$feedlink} From {$salon_name}. Thanks BOOKPX");

    $var = "?user={$username}&password={$Password}&senderid={$sender}&channel={$channel}&DCS={$DCS}&flashsms={$flashsms}&number={$number}&text={$message}&route={$route}&Peid={$Peid}&DLTTemplateId={$DLTTemplateId}";

    $url = $link . $var;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

/*
sender id
PICSAL
BOOKPX
PIXSAL
*/
