<?php

function commonBodyHeader()
{
  $date = date('d, M Y');
  $root = get_root();
  $html = <<< EOD
    <!DOCTYPE html>
    <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en" style="padding:0;Margin:0">
    
    <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <meta name="x-apple-disable-message-reformatting">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="telephone=no" name="format-detection">
      <title>New email template 2023-11-28</title>
    
      <style type="text/css">
        #outlook a {
          padding: 0;
        }
    
        .ExternalClass {
          width: 100%;
        }
    
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%;
        }
    
        .es-button {
          mso-style-priority: 100 !important;
          text-decoration: none !important;
        }
    
        a[x-apple-data-detectors] {
          color: inherit !important;
          text-decoration: none !important;
          font-size: inherit !important;
          font-family: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
        }
    
        .es-desk-hidden {
          display: none;
          float: left;
          overflow: hidden;
          width: 0;
          max-height: 0;
          line-height: 0;
          mso-hide: all;
        }
    
        @media only screen and (max-width:600px) {
    
          p,
          ul li,
          ol li,
          a {
            line-height: 150% !important
          }
    
          h1,
          h2,
          h3,
          h1 a,
          h2 a,
          h3 a {
            line-height: 120% !important
          }
    
          h1 {
            font-size: 28px !important;
            text-align: center
          }
    
          h2 {
            font-size: 26px !important;
            text-align: center
          }
    
          h3 {
            font-size: 20px !important;
            text-align: center
          }
    
          .es-header-body h1 a,
          .es-content-body h1 a,
          .es-footer-body h1 a {
            font-size: 28px !important
          }
    
          .es-header-body h2 a,
          .es-content-body h2 a,
          .es-footer-body h2 a {
            font-size: 26px !important
          }
    
          .es-header-body h3 a,
          .es-content-body h3 a,
          .es-footer-body h3 a {
            font-size: 20px !important
          }
    
          .es-menu td a {
            font-size: 12px !important
          }
    
          .es-header-body p,
          .es-header-body ul li,
          .es-header-body ol li,
          .es-header-body a {
            font-size: 12px !important
          }
    
          .es-content-body p,
          .es-content-body ul li,
          .es-content-body ol li,
          .es-content-body a {
            font-size: 14px !important
          }
    
          .es-footer-body p,
          .es-footer-body ul li,
          .es-footer-body ol li,
          .es-footer-body a {
            font-size: 14px !important
          }
    
          .es-infoblock p,
          .es-infoblock ul li,
          .es-infoblock ol li,
          .es-infoblock a {
            font-size: 11px !important
          }
    
          *[class="gmail-fix"] {
            display: none !important
          }
    
          .es-m-txt-c,
          .es-m-txt-c h1,
          .es-m-txt-c h2,
          .es-m-txt-c h3 {
            text-align: center !important
          }
    
          .es-m-txt-r,
          .es-m-txt-r h1,
          .es-m-txt-r h2,
          .es-m-txt-r h3 {
            text-align: right !important
          }
    
          .es-m-txt-l,
          .es-m-txt-l h1,
          .es-m-txt-l h2,
          .es-m-txt-l h3 {
            text-align: left !important
          }
    
          .es-m-txt-r img,
          .es-m-txt-c img,
          .es-m-txt-l img {
            display: inline !important
          }
    
          .es-button-border {
            display: block !important
          }
    
          a.es-button,
          button.es-button {
            font-size: 14px !important;
            display: block !important;
            border-left-width: 0px !important;
            border-right-width: 0px !important
          }
    
          .es-btn-fw {
            border-width: 10px 0px !important;
            text-align: center !important
          }
    
          .es-adaptive table,
          .es-btn-fw,
          .es-btn-fw-brdr,
          .es-left,
          .es-right {
            width: 100% !important
          }
    
          .es-content table,
          .es-header table,
          .es-footer table,
          .es-content,
          .es-footer,
          .es-header {
            width: 100% !important;
            max-width: 600px !important
          }
    
          .es-adapt-td {
            display: block !important;
            width: 100% !important
          }
    
          .adapt-img {
            width: 100% !important;
            height: auto !important
          }
    
          .es-m-p0 {
            padding: 0px !important
          }
    
          .es-m-p0r {
            padding-right: 0px !important
          }
    
          .es-m-p0l {
            padding-left: 0px !important
          }
    
          .es-m-p0t {
            padding-top: 0px !important
          }
    
          .es-m-p0b {
            padding-bottom: 0 !important
          }
    
          .es-m-p20b {
            padding-bottom: 20px !important
          }
    
          .es-mobile-hidden,
          .es-hidden {
            display: none !important
          }
    
          tr.es-desk-hidden,
          td.es-desk-hidden,
          table.es-desk-hidden {
            width: auto !important;
            overflow: visible !important;
            float: none !important;
            max-height: inherit !important;
            line-height: inherit !important
          }
    
          tr.es-desk-hidden {
            display: table-row !important
          }
    
          table.es-desk-hidden {
            display: table !important
          }
    
          td.es-desk-menu-hidden {
            display: table-cell !important
          }
    
          table.es-table-not-adapt,
          .esd-block-html table {
            width: auto !important
          }
    
          table.es-social {
            display: inline-block !important
          }
    
          table.es-social td {
            display: inline-block !important
          }
    
          .es-desk-hidden {
            display: table-row !important;
            width: auto !important;
            overflow: visible !important;
            max-height: inherit !important
          }
        }
      </style>
    </head>
    
    <body style="width:100%;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
      <div dir="ltr" class="es-wrapper-color" lang="en" style="background-color:#0a66c2">
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#0a66c2">
          <tr style="border-collapse:collapse">
            <td valign="top" style="padding:0;Margin:0">
    
              
    EOD;
  return $html;
}

function commonBodyFooter()
{
  $html = <<< EOD
        <table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
            <tr style="border-collapse:collapse">
                <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-image:url('https://fckukrg.stripocdn.email/content/guids/CABINET_00dfa176415659d982c4600782942a58/images/63821564496145694.jpg');background-position:left top;background-repeat:no-repeat;background-color:#333333" background="https://fckukrg.stripocdn.email/content/guids/CABINET_00dfa176415659d982c4600782942a58/images/63821564496145694.jpg" bgcolor="#333333"><!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:368px" valign="top">
                <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                    <tr style="border-collapse:collapse">
                    <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:368px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                        <tr style="border-collapse:collapse">
                            <td align="left" class="es-m-txt-c" style="padding:0;Margin:0">
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#FFFFFF;font-size:14px"><strong></strong></p>
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#FFFFFF;font-size:14px"><strong></strong></p>
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#FFFFFF;font-size:14px"><strong></strong></p>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;background-position:left top">
                    <tr style="border-collapse:collapse">
                    <td align="left" style="padding:0;Margin:0;width:172px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                        <tr style="border-collapse:collapse">
                            <td align="center" class="es-m-txt-c" style="padding:0;Margin:0;padding-bottom:10px;padding-top:15px;font-size:0">
                            <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                <td align="center" valign="top" style="padding:0;Margin:0;padding-right:10px">
                                    
                                </td>
                                <td align="center" valign="top" style="padding:0;Margin:0;padding-right:10px">
                                    
                                </td>
                                <td align="center" valign="top" style="padding:0;Margin:0;padding-right:10px">
                                    
                                </td>
                                <td align="center" valign="top" style="padding:0;Margin:0">
                                    
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
    </div>
    </body>

    </html>
    EOD;
  return $html;
}


function mailBody($arr)
{
  $tData = '';
  foreach ($arr as $key => $value) {
    $key = str_replace('_', ' ', $key);
    $tData .= '<tr><th>' . strtoupper($key) . '</th><td>' . $value . '</td></tr>';
  }

  $message = "
    <html>
    <head>
    <title>Feedback Form Results</title>
    <style>
    table{
        border-collapse: collapse
    }
    table th,td{
        padding:10px
    }
    th{
        background-color:#dfdfdf;
    }
    </style>
    </head>
    <body>
    <h3>Your payment has been completed successfully</h3>
    <br>
    <table border='1'>
    
    {$tData}
    </table>
    </body>
    </html>
    ";

  return $message;
}

function mailHeader($from)
{
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <' . $from . '>' . "\r\n";
  //$headers .= 'Cc: '. $from . "\r\n";

  return $headers;
}

function word_filter($string)
{
  $filterArr = [
    'sexy', 'sex', 'tiktok', 'pornstar',
    'ass', 'porn', 'xxx', 'flash',
    'movies', 'movie', 'fuck', 'fuck you',
    'shit', 'piss off', 'dick head', 'asshole',
    'bastard', 'bitch', 'damn', 'dumb',
    'nerd', 'bimbo', 'piss', 'jerk',
    'stupid', 'wimp', 'lame', 'idiot',
    'fool', 'retard', 'loser', 'rubbish',
    'shag', 'wanker', 'twat', 'bollocks',
    'bugger', 'choad', 'crikey', 'bloody',
    'hell', 'bloody oath', 'get stuffed',
    'bugger', 'cheesy', 'creepy', 'clown',
    'weird', 'cock', 'titties', 'boner',
    'muff', 'pussy', 'cunt', 'cockfoam',
    'nigger', 'motherfuck'
  ];

  $word = implode('|', $filterArr);
  $regex = '/[-+]?(' .  $word . ')/';

  preg_match($regex, $string, $matches);
  return ($matches) ? $matches[0] : true;
}

function name_filter($name)
{
  return (preg_match('/^[A-Za-z\s]+$/', $name)) ? true : false;
}

function number_filter($number)
{
  return (preg_match("/^[1-9]{1}[0-9]{9}$/", $number)) ? true : false;
}

function email_filter($email)
{
  return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
}


function newUserBody()
{
  $root = get_root();

  $html = commonBodyHeader();
  $html .= <<< EOD
        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">

            <tr style="border-collapse:collapse">
                <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#ffffff" bgcolor="#ffffff">
                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                    <tr style="border-collapse:collapse">
                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-txt-c" style="padding:0;Margin:0;padding-bottom:10px">
                            <h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#040404">
                                Welcome To Fyndsupplier Network, A Chemical Buyers/Suppliers Network.
                            </h2>

                            <br>
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-bottom:10px">
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                                Here Is How Fynd Supplier Can Help You:
                            </p>
                            <br>

                            <ul style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">

                                <li><b>Connect Chemical Buyers With Suppliers Directly</b></li>
                                <li><b>Instant And Direct Contact Between Buyers And Suppliers</b></li>
                                <li><b>Sale Surplus Chemicals</b></li>
                                <li><b>Support For Suppliers Visit Verification</b></li>
                                <li><b>Avail Free Sample</b></li>
                                <li><b>Shipping And Freight Support</b></li>
                                <li><b>Independent Lab Testing Support</b></li>

                            </ul>

                            <br>


                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                                How Can I Help You?
                            </p>

                            <br>
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                                If You Require Any Support In Your Chemical Purchase And Sale, Please Reply Or Whatsapp <a target='_blank' href='http://wa.me/+47 94432969'><b>+47 94432969</b></a>.
                            </p>

                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="center" style="Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px">
                            <span class="es-button-border" style="border-style:solid;border-color:#38C2F1;background:#38c2f1;border-width:0px;display:inline-block;border-radius:25px;width:auto">
                                <a href="{$root}" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:18px;display:inline-block;background:#0a66c2;border-radius:25px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-weight:bold;font-style:normal;line-height:22px;width:auto;text-align:center;padding:10px 30px;mso-padding-alt:0;mso-border-alt:10px solid #0a66c2">Visit Fyndsupplier</a>
                            </span>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
    EOD;
  $html .= commonBodyFooter();
  return $html;
}

function paymentSuccessBody($model)
{

  $root = get_root();

  $html = commonBodyHeader();
  $html .= <<< EOD
        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">

            <tr style="border-collapse:collapse">
                <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#ffffff" bgcolor="#ffffff">
                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                    <tr style="border-collapse:collapse">
                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-txt-c" style="padding:0;Margin:0;padding-bottom:10px">
                            <h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#040404">
                              Your payment has been completed successfully
                            </h2>

                            <br>
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-bottom:10px">
                            
                            <br>

                            <table style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">

                                <tr><th>Transaction Id</th><td>$model->txn_id</td></tr>
                                <tr><th>Product Name</th><td>$model->item_name</td></tr>
                                <tr><th>Amount</th><td>$model->amount</td></tr>
                                <tr><th>Payment Status</th><td>$model->payment_status</td></tr>
                                
                            </table>

                            <br>

                            <br>
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                                If You Require Any Support In Your Chemical Purchase And Sale, Please Reply Or Whatsapp <a target='_blank' href='http://wa.me/+47 94432969'><b>+47 94432969</b></a>.
                            </p>

                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="center" style="Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px">
                            <span class="es-button-border" style="border-style:solid;border-color:#38C2F1;background:#38c2f1;border-width:0px;display:inline-block;border-radius:25px;width:auto">
                                <a href="{$root}" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:18px;display:inline-block;background:#0a66c2;border-radius:25px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-weight:bold;font-style:normal;line-height:22px;width:auto;text-align:center;padding:10px 30px;mso-padding-alt:0;mso-border-alt:10px solid #0a66c2">Visit Fyndsupplier</a>
                            </span>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
    EOD;
  $html .= commonBodyFooter();
  return $html;
}



function supplierRegisterProductBody()
{

  $root = get_root();

  $html = commonBodyHeader();
  $html .= <<< EOD
        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">

            <tr style="border-collapse:collapse">
                <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#ffffff" bgcolor="#ffffff">
                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                    <tr style="border-collapse:collapse">
                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-txt-c" style="padding:0;Margin:0;padding-bottom:10px">
                            <h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#040404">
                                
                            </h2>

                            <br>
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-bottom:10px">
                              <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                              Hi Dear,
                              </p>
                              <br>

                              <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                              Thanks for registering with fyndsupplier network, a chemical buyers/suppliers network. 
                              </p>
                              <br>

                              <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                              This is a reminder to request to register your products on your fyndsupplier’s profile. 
                              </p>
                              <br>

                              <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                              Once your products are registered, we will be able to market and find suitable buyers. 
                              </p>
                              <br>

                              <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                              Also, buyers can search your products ONLY if your products are registered in database
                              </p>
                              <br>

                              <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                              Can I help you anyway to make your chemical sale easy and cost effective? 
                              </p>
                              <br>                              
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="center" style="Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px">
                            <span class="es-button-border" style="border-style:solid;border-color:#38C2F1;background:#38c2f1;border-width:0px;display:inline-block;border-radius:25px;width:auto">
                                <a href="{$root}" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:18px;display:inline-block;background:#0a66c2;border-radius:25px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-weight:bold;font-style:normal;line-height:22px;width:auto;text-align:center;padding:10px 30px;mso-padding-alt:0;mso-border-alt:10px solid #0a66c2">Visit Fyndsupplier</a>
                            </span>
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="left" style="Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px">
                              <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                                Regards,
                              </p>
                              <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                                <b>Rameshwar M Paswan</b><br>
                                <a href='{$root}'><b>Fyndsupplier.com</b></a> , Chemical Buyers and Suppliers Network<br>
                                M: <a href='tel:+47 94432969'><b>+47 94432969</b></a>, Email: <a href='mailto:info@fyndsupplier.com'><b>info@fyndsupplier.com</b></a><br>
                                Address: 214 Union Street, Aberdeen, Scotland, AB10 1TL, United Kingdom
                              </p>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
      </table>
    EOD;
  $html .= commonBodyFooter();
  return $html;
}



function freeToPaidMemberBody()
{
  $root = get_root();

  $html = commonBodyHeader();
  $html .= <<< EOD
        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">

            <tr style="border-collapse:collapse">
                <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#ffffff" bgcolor="#ffffff">
                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                    <tr style="border-collapse:collapse">
                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-txt-c" style="padding:0;Margin:0;padding-bottom:10px">
                            <h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#040404">
                                
                            </h2>

                            <br>
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-bottom:10px">
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            Thanks for registering with fyndsupplier network, a chemical buyers/suppliers network. 
                            </p>
                            <br>

                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We would like to offer you an opportunity to become our paid to avail below benefits. 
                            </p>
                            <br>

                            <ul style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">

                                <li><b>20-30 monthly quality purchase leads</b></li>
                                <li><b>Priority of your products and business profiles  in buyer’s search </b></li>
                                <li><b>Verification tag on your profile to enhance buyers trust in your business </b></li>
                                <li><b>Market your products to expand your market reach and bring new buyers</b></li>

                            </ul>

                            <br>


                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            Member cost: ONLY $ 9 Per Month with 100% refund policy at any time. <br>
                            For paid membership <a href='{$root}membership'><b>click here</b></a>
                            
                            </p>

                            <br>
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We offer 24X7 support so if you need help, please reply or WhatsApp <a target='_blank' href='http://wa.me/+47 94432969'><b>+47 94432969</b></a>. 
                            </p>

                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="center" style="Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px">
                            <span class="es-button-border" style="border-style:solid;border-color:#38C2F1;background:#38c2f1;border-width:0px;display:inline-block;border-radius:25px;width:auto">
                                <a href="{$root}" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:18px;display:inline-block;background:#0a66c2;border-radius:25px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-weight:bold;font-style:normal;line-height:22px;width:auto;text-align:center;padding:10px 30px;mso-padding-alt:0;mso-border-alt:10px solid #0a66c2">Visit Fyndsupplier</a>
                            </span>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
    EOD;
  $html .= commonBodyFooter();
  return $html;
}




function searchInquiryBody($chemical)
{
  $root = get_root();

  $html = commonBodyHeader();
  $html .= <<< EOD
        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">

            <tr style="border-collapse:collapse">
                <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#ffffff" bgcolor="#ffffff">
                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                    <tr style="border-collapse:collapse">
                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-txt-c" style="padding:0;Margin:0;padding-bottom:10px">
                            <h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#040404">
                                
                            </h2>

                            <br>
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-bottom:10px">
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            Thanks for using fyndsupplier network. 
                            </p>
                            <br>

                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We came to know that you require assistance with <b>{$chemical}</b>
                            </p>
                            <br>

                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            Do you want to purchase or sale <b>{$chemical}</b> ? 
                            </p>

                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We can help you in either way, so please provide detail as reply to this email. 
                            </p>

                            <br>
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We offer 24X7 support so if you need help, please reply or WhatsApp <a target='_blank' href='http://wa.me/+47 94432969'><b>+47 94432969</b></a>.
                            </p>

                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="center" style="Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px">
                            <span class="es-button-border" style="border-style:solid;border-color:#38C2F1;background:#38c2f1;border-width:0px;display:inline-block;border-radius:25px;width:auto">
                                <a href="{$root}" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:18px;display:inline-block;background:#0a66c2;border-radius:25px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-weight:bold;font-style:normal;line-height:22px;width:auto;text-align:center;padding:10px 30px;mso-padding-alt:0;mso-border-alt:10px solid #0a66c2">Visit Fyndsupplier</a>
                            </span>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
    EOD;
  $html .= commonBodyFooter();
  return $html;
}


function buyerInquiryBody($chemical)
{
  $root = get_root();

  $html = commonBodyHeader();
  $html .= <<< EOD
        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">

            <tr style="border-collapse:collapse">
                <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#ffffff" bgcolor="#ffffff">
                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                    <tr style="border-collapse:collapse">
                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-txt-c" style="padding:0;Margin:0;padding-bottom:10px">
                            <h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#040404">
                                
                            </h2>

                            <br>
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-bottom:10px">
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            Thanks for registering your chemical purchase for <b>{$chemical}</b> 
                            </p>
                            <br>

                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We will start working on it and find a suitable supplier for your needs. 
                            </p>
                            <br>

                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            Is there anything else which we can help ?
                            </p>

                            <br>
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We offer 24X7 support so if you need help, please reply or WhatsApp <a target='_blank' href='http://wa.me/+47 94432969'><b>+47 94432969</b></a>.  
                            </p>

                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="center" style="Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px">
                            <span class="es-button-border" style="border-style:solid;border-color:#38C2F1;background:#38c2f1;border-width:0px;display:inline-block;border-radius:25px;width:auto">
                                <a href="{$root}" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:18px;display:inline-block;background:#0a66c2;border-radius:25px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-weight:bold;font-style:normal;line-height:22px;width:auto;text-align:center;padding:10px 30px;mso-padding-alt:0;mso-border-alt:10px solid #0a66c2">Visit Fyndsupplier</a>
                            </span>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
    EOD;
  $html .= commonBodyFooter();
  return $html;
}


function supplierInquiryBody($chemical)
{
  $root = get_root();

  $html = commonBodyHeader();
  $html .= <<< EOD
        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">

            <tr style="border-collapse:collapse">
                <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#ffffff" bgcolor="#ffffff">
                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                    <tr style="border-collapse:collapse">
                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-txt-c" style="padding:0;Margin:0;padding-bottom:10px">
                            <h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#040404">
                                
                            </h2>

                            <br>
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-bottom:10px">
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            Thanks for registering your stock or surplus for <b>{$chemical}</b> 
                            </p>
                            <br>

                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We will start working on it and find buyers for your stocks. 
                            </p>
                            <br>

                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            Is there anything else which we can help ?
                            </p>

                            <br>
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We offer 24X7 support so if you need help, please reply or WhatsApp <a target='_blank' href='http://wa.me/+47 94432969'><b>+47 94432969</b></a>.  
                            </p>

                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="center" style="Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px">
                            <span class="es-button-border" style="border-style:solid;border-color:#38C2F1;background:#38c2f1;border-width:0px;display:inline-block;border-radius:25px;width:auto">
                                <a href="{$root}" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:18px;display:inline-block;background:#0a66c2;border-radius:25px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-weight:bold;font-style:normal;line-height:22px;width:auto;text-align:center;padding:10px 30px;mso-padding-alt:0;mso-border-alt:10px solid #0a66c2">Visit Fyndsupplier</a>
                            </span>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
    EOD;
  $html .= commonBodyFooter();
  return $html;
}


function signupOTPBody($otp)
{
  $root = get_root();

  $html = commonBodyHeader();
  $html .= <<< EOD
        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">

            <tr style="border-collapse:collapse">
                <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#ffffff" bgcolor="#ffffff">
                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                    <tr style="border-collapse:collapse">
                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-txt-c" style="padding:0;Margin:0;padding-bottom:10px">
                            <h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#040404">
                                
                            </h2>

                            <br>
                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-bottom:10px">
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            Thanks for registering us your OTP is <b>{$otp}</b> 
                            </p>

                            <br>
                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#040404;font-size:14px">
                            We offer 24X7 support so if you need help, please reply or WhatsApp <a target='_blank' href='http://wa.me/+47 94432969'><b>+47 94432969</b></a>.  
                            </p>

                            </td>
                        </tr>
                        <tr style="border-collapse:collapse">
                            <td align="center" style="Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px">
                            <span class="es-button-border" style="border-style:solid;border-color:#38C2F1;background:#38c2f1;border-width:0px;display:inline-block;border-radius:25px;width:auto">
                                <a href="{$root}" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:18px;display:inline-block;background:#0a66c2;border-radius:25px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-weight:bold;font-style:normal;line-height:22px;width:auto;text-align:center;padding:10px 30px;mso-padding-alt:0;mso-border-alt:10px solid #0a66c2">Visit Fyndsupplier</a>
                            </span>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
    EOD;
  $html .= commonBodyFooter();
  return $html;
}
