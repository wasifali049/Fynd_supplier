<?php


include '../../lib/bpconn.php';
include '../../lib/config-details.php';

extract($_REQUEST);

$html = '';

if (!empty($chemical_id) && !empty($who_to_contact) && !empty($destination)) {


    $model2 = fetch_all($db, "SELECT `uid` FROM `supplier_chemical_list` WHERE `product_name` LIKE '%{$chemical_id}%'");

    $ids = array_column($model2, 'uid');
    $idss = implode(',', $ids);
    $idss = !empty($idss) ? $idss : 0;

    $who_to_contact = strtolower($who_to_contact);

    $is_buyer_select = false;
    if ($who_to_contact === 'buyer' && is_premium_member($db)) {
        $is_buyer_select = true;
    }

    $is_buyer_select_cond = !$is_buyer_select ? "id IN ({$idss}) AND" : "";

    if ('all' != $destination) {
        $cond = "{$is_buyer_select_cond} status=1 AND user_type='{$who_to_contact}' AND country='{$destination}'";
    } else {
        $cond = "{$is_buyer_select_cond} status=1 AND user_type='{$who_to_contact}'";
    }


    $sql = "SELECT * FROM `user` WHERE {$cond}";
    $model = fetch_all($db, $sql);

    $total_records = count(value: $model);

    if ($total_records > 0) {

        $html .= "
        <style>
        #thead_chemical{
            background-color: #5F45EA !important;
            color:white !important;
        }
           .scrollbar {
            max-height: 400px;
            overflow-y: scroll;
            padding: 14px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .chat-wrapper {
            border: 1px solid lightgrey;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            width:99.6%;
            margin-left:2px;
        }

        /* Scrollbar Styles */
        #style-1::-webkit-scrollbar-track {
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        #style-1::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        #style-1::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #555;
            box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        }
        </style>
         <div class='row chat-wrapper' style='
                                        border: 1px solid #f3f3f3;
                                        padding-top: 10px;
                                        padding-bottom: 10px;
                                        background: #CF9FFF;
                                        color:white;
                                        border-radius: 8px;
                                        /* box-shadow: rgba(0, 0, 0, 0.1) 0px 12px 12px; */
                                        margin-bottom:10px;
                                        margin-left:0px;
                                        width:100%;'>
                                    <div class='col-3' style='text-align:center;'>Company Name</div>
                                    
                                    <div class='col-3' style='text-align:center;'>Phone</div>

                                    <div class='col-3'style='text-align:center;' >
                                        <span class='email_text' style='flex: 0.6; text-align: left;'>Email</span>
                                       
                                    </div> 
                                     <div class='col-3'style='text-align:center;' >
                                       
                                        <span class='contact_text'>Contact</span>
                                    </div> 
                                </div><div class='scrollbar' id='style-1'>
                                    <div class='force-overflow'><div class='d-flex gap-1' style='width:40%'>
                    
                 </div></div>";
        //     $html .= "
        //     <style>
        //     .filter-anchor{
        //         font-size: 14px;
        //     }
        //     #wrapperBox{
        //         border: 1px solid #ced4da;
        //         padding:20px;
        //         margin:20px 0px;
        //         background-color: #ced4da;
        //     }
        //     </style>

        //     <ul class='list-group' id='wrapperBox'>
        //     <div style='display:flex;justify-content:space-between;width:100%'>
        //         <div style='width:60%'>
        // <input onkeyup='filterList()' placeholder='Search Name/Number' type='text' id='userFilter' class='form-control'>
        //         </div>
        //         <div class='d-flex gap-1' style='width:40%'>
        //             <div class='my-2 mx-4'>
        //                 <input class='form-check-input' type='radio' name='checkUncheck' id='checkUncheck1' onclick='checkAll()'>
        //                 <label for='checkUncheck1'>Check</label>
        //             </div>

        //             <div class='my-2 mx-4'>
        //                 <input class='form-check-input' type='radio' name='checkUncheck' id='checkUncheck2' onclick='uncheckAll()'>
        //                 <label for='checkUncheck2'>Uncheck</label>
        //             </div>
        //         </div>
        //     </div>
        //     <div class='chemical-name-wrapper mt-2' style='display:flex;justify-content:space-between;align-items:center;'>
        //         <div style='width:70%'><b>{$chemical_id}</b> - Price Result</div>
        //         <div class='mb-0' style='margin-bottom:0px; width:30%'>PRICE - $/MT</div>
        //     </div>
        //     </ul>
        //     <b>Results:</b>
        //     <ul class='list-group' id='filterable-wrapper'>

        // ";



        foreach ($model as $key => $value) {
            $chemical_price = '-';
            $chemical_price_model = fetch_object($db, "SELECT `price` FROM `supplier_chemical_list` WHERE `product_name` LIKE '%{$chemical_id}%' AND uid='{$value['id']}'");

            if (!empty($chemical_price_model)) {
                $chemical_price = $chemical_price_model->price;
            }

            if(empty($value['email'])){
                $email = 'N/A';
            }else{
               
                $email = $value['email'];
                $email = '**' . substr($email, 2); 
                // $email = substr($email, 0, -2) . '****'; 
            }

            $mobile = $value['mobile'];
            $hiddenMobile = substr($mobile, 0, -4) . '****'; 
            
            // echo $hiddenMobile;

            // if ($chemical_price != '-') {

                $html .= <<<EOT
             <div class='row chat-wrapper'>
                <div class='col-3' style='text-align:center;'>
          
                {$value['company_name']}</div>
                <div class='col-3' style='text-align:center;'>{$hiddenMobile}</div>
                <div class="col-3" style='text-align:center;'>
                    <span style="flex: 0.6; text-align: left;">{$email}</span>
                    
                </div>
                  <div class="col-3" style='text-align:center;' >
                    <a class="whatsapp bt_bb_link" style='border-radius: 50%;font-size:20px;color:#fff;' target="_blank" href="http://wa.me/{$value['mobile']}"><img src="assets/img/whatsapp.png" class='mx-auto d-block' alt="" style="height:25px;"></a>
                </div>
                
            </div>
            EOT;

            


                                


        // <table class='table table-bordered'>
        // <thead id='thead_chemical' bgcolor='red'>
        //     <tr>
        //         <th>Company Name</th>
        //         <th>Phone</th>
        //         <th>Email</th>
        //         <th>Contact</th>
        //     </tr>
        // </thead>
        // <tbody>
            //     $html .= <<<EOT
            //     <tr>
            //         <td>
            //             {$value['name']}<br>
            //             <small style='font-size:11px;'>{$value['company_name']}</small>
            //         </td>
            //         <td>
            //             {$value['mobile']}
            //         </td>
            //         <td>{$email}</td>
            //         <td>
            //             <a class="whatsapp bt_bb_link" style='border-radius: 50%;height: 30px;width: 30px;display:flex;justify-content:center;align-items:center;font-size:20px;color:#fff;' target="_blank" href="http://wa.me/{$value['mobile']}"><img src="assets/img/whatsapp.png" alt="" style="height:25px;"></a>
            //         </td>
            //     </tr>
            // EOT;
            // }

            

            //     $html .= <<<EOT
            // <li class='list-group-item filterable'>
            //     <div class=''>
            //         <div class='form-check-label' for='user{$key}'>
            //             <div style='display:flex;justify-content:space-between;width:100%'>
            //                 <div style="width:10%">
            // <input class='form-check-input filterCheckBox home-inq-buyer_supplier' name='homeInquiry[user_id][]' type='checkbox' id='user{$key}' checked value='{$value['id']}'>
            // </div>
            //                 <div style='width:60%' class='filter-anchor'>
            //                     <b>{$value['name']}</b> - <a target='_blank' href=http://wa.me/{$value['mobile']}>{$value['mobile']}</a><br>
            //                     <small>{$value['company_name']}</small>
            //                 </div>
            //                 <div style='width:20%'>
            //                 <p><b>{$chemical_price}</b></p>
            //                 </div>
            //                 <div style='width:10%'><a class="whatsapp bt_bb_link" style='border-radius: 50%;height: 50px;width: 50px;background-color: #00a884 !important;display:flex;justify-content:center;align-items:center;font-size:20px;color:#fff;' target="_blank" href="http://wa.me/{$value['mobile']}"><i class="bi bi-whatsapp" aria-hidden="true"></i></a></div>
            //             </div>
            //         </div>
            //     </div>
            // </li>
            // EOT;
        }
       
        
        // $html .= "</ul>";
        $html .= "</tbody></table></div></div>";

        $data = json_encode($html);

        echo $data;
    }
}

