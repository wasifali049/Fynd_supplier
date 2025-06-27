<?php
$countryModel = get_country_list($db);
$chemicalModel = get_chemical_list($db);

if (is_login()) {
    $login_user_id = get_user_id();
    $loginUserModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$login_user_id}'");

    $mobile = getOriginalMobile($loginUserModel->mobile, $loginUserModel->country_code);
    $country_code = $loginUserModel->country_code;
    $email = $loginUserModel->email;
    $name = $loginUserModel->name;
} else {
    $mobile = '';
    $country_code = '';
    $email = '';
    $name = '';
}
?>

<!-- Signup Modal -->
<div class="modal fade" id="signupModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="fw-bold mb-0 fs-2" id="signupModalLabel">Sign up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="userSignupForm" method="post" action="<?= get_root() ?>inc/user/user-signup.php">
                    <div class="col-md-12 mb-3">
                        <label for="signFor" class="form-label">Register as a *</label>
                        <div id="signFor">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user[user_type]" id="userType1" value="buyer" checked>
                                <label class="form-check-label" for="userType1">Buyer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user[user_type]" id="userType2" value="supplier">
                                <label class="form-check-label" for="userType2">Supplier</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user[user_type]" id="userType3" value="trader">
                                <label class="form-check-label" for="userType2">Trader</label>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="userMembership00" class="form-label">Membership *</label>
                        <div id="userMembership00">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user[membership]" id="userMembership1" value="on" checked>
                                <label class="form-check-label" for="userMembership1">Free</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user[membership]" id="userMembership2" value="yes">
                                <label class="form-check-label" for="userMembership2">Paid</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="signup-name" class="form-label signup-name-label">Full Name*</label>
                        <input type="text" id="signup-name" class="form-control" name="user[name]" placeholder="Name" />
                        <div class="showErr"></div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="mobile" class="form-label mobile-signup-label">Mobile (Whatsapp)*</label>
                        <div class="">
                            <select class="w-100 form-select combined-mobile" name="user[country_code]">
                                <?php
                                foreach ($countryModel as $countryKey1 => $countryVal1) {
                                    $countryValue1 = (object) $countryVal1;
                                ?>
                                    <option value="<?= $countryValue1->phonecode ?>"><?= $countryValue1->name ?> - +<?= $countryValue1->phonecode ?></option>
                                <?php } ?>
                            </select>
                            <input type="tel" id="mobile-signup" class="form-control w-100" name="user[mobile]" placeholder="Mobile (Whatsapp)" />
                        </div>
                        <div class="showErr"></div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="signup-email" class="form-label signup-email-label">Email ID*</label>
                        <input type="email" id="signup-email" class="form-control" name="user[email]" placeholder="Email ID" />
                        <div class="showErr"></div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="chemicals" class="form-label">Chemicals We Buy/Supply*</label>
                        <input type="text" id="chemicals" class="form-control" name="user[chemicals]" placeholder="Chemicals We Buy/Supply" value="All" />
                        <div class="showErr"></div>
                    </div>
                    <div class="col-md-12 mb-3" id="email-otp-wrapper">
                        <label for="signup-email-otp" class="form-label signup-email-otp-label">Enter The OTP Sent To Your Mail ID*</label>
                        <input type="number" id="signup-email-otp" class="form-control" name="user[email_otp]" placeholder="Email OTP" />
                        <div class="showErr"></div>
                    </div>
                    <input type="hidden" name="user[submit_type]" value="signup">
                    <input type="hidden" id="email_api" value="<?=get_root()?>inc/user/user-email-otp.php">
                    <button class="w-100 mb-2 btn btn-primary" type="submit">Sign up</button>
                    <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
                    <hr class="my-4">
                    <a href="#" class="btn btn-success d-block" data-bs-target="#signinModel" data-bs-toggle="modal">Login</a>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Signin Modal -->
<div class="modal fade" id="signinModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="fw-bold mb-0 fs-2" id="signinModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="userSigninForm" method="post" action="<?= get_root() ?>inc/user/user-check.php">
                    <div class="col-md-12 mb-3">
                        <label for="mobile" class="form-label mobile-signin-label">Mobile (Whatsapp)*</label>
                        <div class="">
                            <select class="w-100 form-select combined-mobile" name="user[country_code]">
                                <?php
                                foreach ($countryModel as $countryKey2 => $countryVal2) {
                                    $countryValue2 = (object) $countryVal2;
                                ?>
                                    <option value="<?= $countryValue2->phonecode ?>"> <?= $countryValue2->name ?> - +<?= $countryValue2->phonecode ?></option>
                                <?php } ?>
                            </select>
                            <input type="tel" id="mobile-signin" class="form-control w-100" name="user[mobile]" placeholder="Mobile (Whatsapp)" />
                        </div>
                        <div class="showErr"></div>
                    </div>
                    <input type="hidden" name="user[submit_type]" value="login">
                    <button class="w-100 mb-2 btn btn-primary" type="submit">Sign in</button>
                    <hr class="my-4">
                    <p>You don't have an account</p>
                    <a href="#" class="btn btn-primary d-block" data-bs-target="#signupModel" data-bs-toggle="modal">Sign up</a>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Supplier Modal -->
<div class="modal fade" id="supplierModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="fw-bold mb-0 fs-2" id="supplierModalLabel">Sign up for Supplier</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" id="suppierSignupForm" method="post" action="<?= get_root() ?>inc/user/supplier-check.php">

                    <div class="col-md-12 mb-3">
                        <label for="userMembership1" class="form-label">Membership *</label>
                        <div id="userMembership1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user[membership]" id="userMembership11" value="no" checked>
                                <label class="form-check-label" for="userMembership11">Free</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user[membership]" id="userMembership22" value="yes">
                                <label class="form-check-label" for="userMembership22">Paid</label>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="supplier-name" class="form-label supplier-name-label">Full Name*</label>
                        <input type="text" id="supplier-name" class="form-control" name="user[name]" placeholder="Name" />
                        <div class="showErr"></div>
                    </div>



                    <div class="col-md-12 mb-3">
                        <label for="supplier-email" class="form-label supplier-email-label">Email*</label>
                        <input type="email" id="supplier-email" class="form-control" name="user[email]" placeholder="Email" />
                        <div class="showErr"></div>
                    </div>



                    <div class="col-md-12 mb-3">
                        <label for="mobile" class="form-label supplier-mobile-label">Mobile (Whatsapp)*</label>
                        <div class="w-100">
                            <select class="w-100 form-select combined-mobile" id="supplier-country-code" name="user[country_code]">
                                <?php
                                foreach ($countryModel as $countryKey2 => $countryVal2) {
                                    $countryValue2 = (object) $countryVal2;
                                ?>
                                    <option value="<?= $countryValue2->phonecode ?>"><?= $countryValue2->name ?> - +<?= $countryValue2->phonecode ?></option>
                                <?php } ?>
                            </select>
                            <input type="tel" id="supplier-mobile" class="w-100 form-control" name="user[mobile]" placeholder="Mobile (Whatsapp)" />
                        </div>
                        <div class="showErr"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="supplier-name" class="form-label supplier-company-name-label">Company Name*</label>
                        <input type="text" id="supplier-company-name" class="form-control" name="user[company_name]" placeholder="Company Name" />
                        <div class="showErr"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="supplier-country" class="form-label supplier-country-label">Country*</label>
                        <select class="form-select" id="supplier-country" name="user[country]">
                            <?php
                            foreach ($countryModel as $countryKey22 => $countryVal22) {
                                $countryValue22 = (object) $countryVal22;
                            ?>
                                <option value="<?= $countryValue22->nicename ?>"><?= $countryValue22->nicename ?></option>
                            <?php } ?>
                        </select>
                        <div class="showErr"></div>
                    </div>

                    <input type="hidden" name="user[user_type]" value="supplier">

                    <button class="w-100 mb-2 btn btn-primary d-block" type="submit">Sign up</button>
                    <hr class="my-4">
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Get Quote Modal -->
<div class="modal fade" id="getQuoteModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="getQuoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="fw-bold mb-0 fs-2" id="getQuoteModalLabel">Get a Quote</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" id="getQuoteForm" method="post" action="<?= get_root() ?>inc/inquiry-offer/inquiry-offer-add.php">
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="mobile" class="form-label inq-mobile-label">Send Your Purchase Inquiry Directly To Suppliers Whatsapp*</label>

                            <div class="w-100">
                                <select class="form-select px-1 text-left combined-mobile" name="country_code">
                                    <?php
                                    foreach ($countryModel as $countryKey4 => $countryVal4) {
                                        $countryValue4 = (object) $countryVal4;
                                    ?>
                                        <option value="<?= $countryValue4->phonecode ?>" <?= ($countryValue4->phonecode == $country_code) ? 'selected' : '' ?>><?= $countryValue4->name ?> - +<?= $countryValue4->phonecode ?></option>
                                    <?php } ?>
                                </select>
                                <input type="tel" id="inq-mobile" class="form-control w-100" name="inquiry[mobile]" placeholder="Mobile (Whatsapp)" value="<?= $mobile ?>" />
                            </div>
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <!-- <label for="inq-chemical" class="form-label inq-chemical-label">Type Chemical Name Or Select From List*</label> -->
                            <label for="inq-chemical" class="form-label inq-chemical-label">Chemical Name*</label>
                            <?php /*<select class="form-select chemical-select-fields-1" id="inq-chemical" name="chemical" required>
                                <?php
                                foreach ($chemicalModel as $chemicalKey2 => $chemicalVal2) {
                                    $chemicalValue2 = (object) $chemicalVal2;
                                ?>
                                    <option value="<?= $chemicalValue2->chemical_name ?>"><?= $chemicalValue2->chemical_name ?></option>
                                <?php } ?>
                            </select>*/ ?>

                            <input type="text" class="form-control " id="inq-chemical" name="chemical" placeholder="Type Chemical Name..." required>
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label inq-email-label">Email*</label>
                            <input type="email" id="inq-email" class="form-control" name="inquiry[email]" placeholder="Email" value="<?= $email ?>" />
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="text" class="form-label inq-target-offer-price-label">Target Price (In $ / MT)</label>
                            <input type="text" id="inq-target-offer-price" class="form-control" name="inquiry[target_offer_price]" placeholder="Target Price (In $ / MT)" />
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="details" class="form-label inq-details-label">Details*</label>
                            <textarea id="inq-details" class="form-control" name="inquiry[details]" placeholder="Details" cols="30" rows="5"></textarea>
                            <div class="showErr"></div>
                        </div>

                        <input type="hidden" value="inquiry" name="inquiry[type]">
                        <div class="col-md-12 mb-3 text-center">
                            <input type="submit" class="btn btn-primary d-block w-100">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Send Exchange Offer Modal -->
<div class="modal fade" id="exchangeOfferModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exchangeOfferModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="fw-bold mb-0 fs-2" id="exchangeOfferModalLabel">Send Offer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" method="post" id="exchangeOfferForm" action="<?= get_root() ?>inc/inquiry-offer/inquiry-offer-add.php">
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="mobile" class="form-label offer-mobile-label">Send Your Offers Directly To Buyers Whatsapp</label>
                            <div class="w-100">
                                <select class="form-select px-1 text-left combined-mobile" name="country_code">
                                    <?php
                                    foreach ($countryModel as $countryKey5 => $countryVal5) {
                                        $countryValue5 = (object) $countryVal5;
                                    ?>
                                        <option value="<?= $countryValue5->phonecode ?>" <?= ($countryValue5->phonecode == $country_code) ? 'selected' : '' ?>><?= $countryValue5->name ?> - +<?= $countryValue5->phonecode ?></option>
                                    <?php } ?>
                                </select>
                                <input type="tel" id="offer-mobile" class="form-control" name="inquiry[mobile]" value="<?= $mobile ?>" placeholder="Mobile (Whatsapp)" />
                                <div class="showErr"></div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">


                            <!-- <label for="offer-chemical" class="form-label offer-chemical-label">Type Chemical Name Or Select From List*</label> -->
                            <label for="offer-chemical" class="form-label offer-chemical-label">Chemical Name*</label>
                            <?php /*<select class="form-select chemical-select-fields-2" id="offer-chemical" name="chemical" required>
                                <?php
                                foreach ($chemicalModel as $chemicalKey1 => $chemicalVal1) {
                                    $chemicalValue1 = (object) $chemicalVal1;
                                ?>
                                    <option value="<?= $chemicalValue1->chemical_name ?>"><?= $chemicalValue1->chemical_name ?></option>
                                <?php } ?>
                            </select>*/
                            ?>
                            <input type="text" class="form-control" id="offer-chemical" placeholder="Type Chemical Name..." name="chemical" required>
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label offer-email-label">Email</label>
                            <input type="email" id="offer-email" class="form-control" name="inquiry[email]" placeholder="Email" value="<?= $email ?>" />
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="text" class="form-label offer-target-offer-price-label">Offer Price (In $ / MT)</label>
                            <input type="text" id="offer-target-offer-price" class="form-control" name="inquiry[target_offer_price]" placeholder="Offer Price (In $ / MT)" />
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="photo" class="photo_label">Upload File (Extension: jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx | Size: 500kb | 1500x1000 px)</label>
                                <input type="file" class="form-control photo" id="photo" name="photo" placeholder="profile">
                                <div class="showErr"></div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="details" class="form-label offer-details-label">Details</label>
                            <textarea id="offer-details" class="form-control" name="inquiry[details]" placeholder="Details" cols="30" rows="5"></textarea>
                            <div class="showErr"></div>
                        </div>

                        <input type="hidden" value="offer" name="inquiry[type]">
                        <div class="col-md-12 mb-3 text-center">
                            <input type="submit" class="btn btn-primary d-block w-100">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Inquiry Modal -->
<div class="modal fade" id="inquiryModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exchangeOfferModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h1 class="fw-bold mb-0 fs-2" id="exchangeOfferModalLabel">Inquiry</h1> -->
                <h4 class="title pb-1 m-0 text-left" id="chemicalTitle"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" method="post" id="inquiryForm" action="<?= get_root() ?>inc/inquiry/inquiry-add.php">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="rounded border p-2 mb-2">
                                <img src="<?= get_root() ?>assets/img/chemical/product.png" id="chemicalImage" class="w-100 rounded" alt="Chemical Photo">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="supplier_name" class="form-label supplier_name_label">Seller Name</label>
                                <input type="text" id="supplier_name" class="form-control" readonly required />
                                <div class="showErr"></div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="supplier_country" class="form-label supplier_country_label">Seller Country</label>
                                <input type="text" id="supplier_country" class="form-control" readonly required />
                                <div class="showErr"></div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="manufacturer_details" class="form-label details-label">Manufacturer Details</label>
                                <textarea id="manufacturer_details" class="form-control" name="inquiry[manufacturer_details]" placeholder="Details" cols="5" rows="2" required></textarea>
                                <div class="showErr"></div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="buyer_name" class="form-label buyer_name_label">Buyer Name</label>
                                    <input type="text" id="buyer_name" class="form-control" readonly required />
                                    <div class="showErr"></div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="buyer_phone_number" class="form-label buyer_phone_number_label">Buyer Phone Number</label>
                                    <input type="text" id="buyer_phone_number" class="form-control" readonly required />
                                    <div class="showErr"></div>
                                </div>

                                <div class="col-md-12 mb-3 d-none">
                                    <label for="product_specification" class="form-label product_specification_label">Packaging</label>
                                    <input type="text" id="product_specification" class="form-control" name="inquiry[product_specification]" />
                                    <div class="showErr"></div>
                                </div>

                                <div class="col-md-12 d-flex justify-content-between mb-3 gap-2 d-none">

                                    <div class="">
                                        <label for="min-order-quantity" class="form-label min-order-quantity-label">Min Order Quantity</label>
                                        <input type="number" id="min-order-quantity" class="form-control" name="inquiry[min_order_quantity]" />
                                        <div class="showErr"></div>
                                    </div>

                                    <div class="">
                                        <label for="text" class="form-label price-label">Target Price (In $ / MT)</label>
                                        <input type="text" id="price" class="form-control" name="inquiry[price]" placeholder="Price (In $ / MT)" />
                                        <div class="showErr"></div>
                                    </div>
                                </div>



                                <div class="col-md-12 mb-3">
                                    <label for="min-order-quantity" class="form-label min-order-quantity-label">Destination</label>
                                    <input type="text" id="density" class="form-control" name="inquiry[density]" required />
                                    <div class="showErr"></div>
                                </div>




                                <div class="col-md-12 mb-3">
                                    <label for="details" class="form-label details-label">Type Your Requirement</label>
                                    <textarea id="details" rows="9" cols="50" class="form-control" name="inquiry[details]" placeholder="Type Your Requirement" cols="5" rows="2" required></textarea>
                                    <div class="showErr"></div>
                                </div>

                                <input type="hidden" value="" id="supplier_id" name="inquiry[uid]">
                                <input type="hidden" value="" id="chemical_id" name="inquiry[chemical_id]">
                                <input type="hidden" value="" id="main_chemical_id" name="inquiry[main_chemical_id]">
                                <input type="hidden" value="" id="product_name" name="inquiry[product_name]">

                            </div>
                        </div>


                        <div class="col-md-12 mb-3 d-none">
                            <label for="comment" class="form-label details-label">Comment</label>
                            <textarea id="comment" class="form-control" name="inquiry[comment]" placeholder="Comment" cols="5" rows="2"></textarea>
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12 mb-3 text-center">
                                <?php if (is_login()) { ?>
                                    <input type="submit" value="Inquire Now" class="btn btn-primary">
                                <?php } else { ?>
                                    <button type="button" value="Inquire Now" class="btn btn-primary d-block w-100" onclick="loginRequired()">Inquiry</button>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







<div class="modal fade" id="feedbackModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="fw-bold mb-0 fs-2" id="feedbackModalLabel">How Can I Help You?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" id="feedbackForm" method="post" action="<?= get_root() ?>inc/feedback/feedback-add.php">
                    <div class="row">

                        <div class="col-md-12 mb-3 d-none">
                            <label for="feed-name" class="form-label feed-name-label">Name *</label>
                            <input type="text" id="feed-name" class="form-control" name="feedback[name]" placeholder="Enter Your Name" name="<?= $name ?>" />
                            <div class="showErr"></div>
                        </div>


                        <div class="col-md-12 mb-3 ">
                            <label for="mobile" class="form-label feed-mobile-label">Mobile Number *</label>

                            <div class="">
                                <select class="form-select w-100 text-left combined-mobile" name="country_code">
                                    <?php
                                    foreach ($countryModel as $countryKey4 => $countryVal4) {
                                        $countryValue4 = (object) $countryVal4;
                                    ?>
                                        <option value="<?= $countryValue4->phonecode ?>" <?= ($countryValue4->phonecode == $country_code) ? 'selected' : '' ?>><?= $countryValue4->name ?> - +<?= $countryValue4->phonecode ?></option>
                                    <?php } ?>
                                </select>
                                <input type="tel" id="feed-mobile" class="form-control w-100" name="feedback[mobile]" placeholder="Mobile (Whatsapp)" value="<?= $mobile ?>" />
                            </div>
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-12 mb-3 d-none">
                            <label for="feed-email" class="form-label feed-email-label">Email *</label>
                            <input type="email" id="feed-email" class="form-control" name="feedback[email]" placeholder="Enter Your Email" value="<?= $email ?>" />
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="feed-message" class="form-label feed-message-label">Message *</label>
                            <textarea id="feed-message" class="form-control" name="feedback[message]" placeholder="What Are You Looking For?" cols="30" rows="3"></textarea>
                            <div class="showErr"></div>
                        </div>

                        <div class="col-md-12 mb-3 text-center">
                            <input type="submit" class="btn btn-primary d-block w-100">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal for confirmation -->
<div class="modal fade" id="confirmationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Your Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to submit the form with the entered data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmSubmit">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Main Form Modal -->
    <div class="modal fade" id="searchModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="searchModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="fw-bold mb-0 fs-2 searchModelLabel" id="searchModelLabel">Tell Us What You Need</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="searchModalForm" method="post" action="<?= get_root() ?>inc/search/search-add.php">
                        <div class="row">
                            <!-- Radio Buttons for Buy/Sell -->
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="search[buy]" id="buy" value="I Want To Buy" checked>
                                            <label class="form-check-label" for="buy">I Want To Buy</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="search[buy]" id="sell" value="I Want To Sell">
                                            <label class="form-check-label" for="sell">I Want To Sell</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Chemical Input -->
                            <div class="col-md-12 mb-3">
                                <label for="search-chemical" class="form-label search-chemical-label">Chemical *</label>
                                <input type="text" id="search-chemical" class="form-control" name="search[chemical]" placeholder="Type Chemical Name ..." value="<?= $searchText ?>" />
                                <div class="showErr"></div>
                            </div>

                            <div class="row">
                                <!-- Name Input -->
                                <div class="col-md-6 mb-3">
                                    <label for="search-name" class="form-label search-name-label">Name *</label>
                                    <input type="text" id="search-name" class="form-control" name="search[name]" placeholder="Enter Your Name" value="<?= $name ?>" />
                                    <div class="showErr"></div>
                                </div>

                                <!-- Email Input -->
                                <div class="col-md-6 mb-3">
                                    <label for="search-email" class="form-label search-email-label">Email</label>
                                    <input type="email" id="search-email" class="form-control" name="search[email]" placeholder="Email" value="<?= $email ?>" />
                                    <div class="showErr"></div>
                                </div>
                            </div>

                            <!-- Mobile Number Input -->
                            <div class="col-md-12 mb-3">
                                <label for="mobile" class="form-label search-mobile-label">Mobile Number *</label>
                                <div class="">
                                    <select class="w-100 form-select text-left combined-mobile" name="country_code">
                                        <?php
                                        foreach ($countryModel as $countryKey4 => $countryVal4) {
                                            $countryValue4 = (object) $countryVal4;
                                        ?>
                                            <option value="<?= $countryValue4->phonecode ?>" <?= ($countryValue4->phonecode == $country_code) ? 'selected' : '' ?>><?= $countryValue4->name ?> - +<?= $countryValue4->phonecode ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="tel" id="search-mobile" class="form-control w-100" name="search[mobile]" placeholder="Mobile (Whatsapp)" value="<?= $mobile ?>" />
                                </div>
                                <div class="showErr"></div>
                            </div>

                            <!-- Message Input -->
                            <div class="col-md-12 mb-3">
                                <label for="search-message" class="form-label search-message-label">Message *</label>
                                <textarea id="search-message" class="form-control" name="search[message]" placeholder="What Are You Looking For?" cols="30" rows="3"></textarea>
                                <div class="showErr"></div>
                            </div>

                            <!-- File Upload -->
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="search-photo" class="search-photo-label">Upload File (Extension: jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx | Size: 500kb | 1500x1000 px)</label>
                                    <input type="file" class="form-control search-photo" id="search-photo" name="photo" placeholder="Attachment">
                                    <div class="showErr"></div>
                                </div>
                            </div>

                            <!-- Hidden Inputs -->
                            <input type="hidden" name="search[page]" id="page_request" class="page_request" value="search page">
                            <input type="hidden" name="in_site" value="in site">

                            <!-- Submit Button -->
                            <div class="col-md-12 mb-3 text-center">
                                <input type="submit" class="btn btn-primary d-block w-100" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <<div class="modal fade" id="signinModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="fw-bold mb-0 fs-2" id="signinModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="userSigninForm" method="post" action="<?= get_root() ?>inc/user/user-check.php">
                        <div class="col-md-12 mb-3">
                            <label for="mobile" class="form-label mobile-signin-label">Mobile (Whatsapp)*</label>
                            <div class="">
                                <select class="w-100 form-select combined-mobile" name="user[country_code]">
                                    <?php
                                    foreach ($countryModel as $countryKey2 => $countryVal2) {
                                        $countryValue2 = (object) $countryVal2;
                                    ?>
                                        <option value="<?= $countryValue2->phonecode ?>"> <?= $countryValue2->name ?> - +<?= $countryValue2->phonecode ?></option>
                                    <?php } ?>
                                </select>
                                <input type="tel" id="mobile-signin" class="form-control w-100" name="user[mobile]" placeholder="Mobile (Whatsapp)" />
                            </div>
                            <div class="showErr"></div>
                        </div>
                        <input type="hidden" name="user[submit_type]" value="login">
                        <button class="w-100 mb-2 btn btn-primary" type="submit">Sign in</button>
                        <hr class="my-4">
                        <p>You don't have an account</p>
                        <a href="#" class="btn btn-primary d-block" data-bs-target="#signupModel" data-bs-toggle="modal">Sign up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <script>
document.getElementById('searchModalForm').addEventListener('submit', function(event) {
    // Ensure the session value is correctly passed from PHP
    var isLoggedIn = <?php echo json_encode(isset($_SESSION['userLogin']) && $_SESSION['userLogin']); ?>;
    if (!isLoggedIn) {
        event.preventDefault(); // Only prevent when not logged in

        var searchModalElement = document.getElementById('searchModel');
        var searchModal = bootstrap.Modal.getInstance(searchModalElement) || new bootstrap.Modal(searchModalElement);

        searchModalElement.addEventListener('hidden.bs.modal', function showSigninModalOnce() {
            var signinModal = new bootstrap.Modal(document.getElementById('signinModel'));
            signinModal.show();
            searchModalElement.removeEventListener('hidden.bs.modal', showSigninModalOnce);
        });

        searchModal.hide();
    }
   
    // Else: let the form submit naturally (no preventDefault)
});

</script>


<div class="modal fade" id="searchModels" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="searchModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="fw-bold mb-0 fs-2 searchModelLabel" id="searchModelLabel">Send Message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="" id="getHomeInquiryForm2" method="post" action="<?= get_root() ?>/inc/home-inquiry/home-buyer-supplier-inquiry-2.php">
                <div class="w-100">
                    <label for="home-inq-details"
                        class="form-label home-inq-details-label w-100 text-start">Type Your
                        Message</label>
                    <textarea id="home-inq-details" class="form-control"
                        name="homeInquiry[details]" placeholder="Details" cols="15"
                        rows="3"></textarea>
                    <div class="showErr"></div>
                </div>
                <br>
                   <input type="submit" value="Send" class="btn oc-btn px-5" style="float:right;">
            </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="membershipModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="membershipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="fw-bold mb-0 fs-2" id="membershipModalLabel">Premium Membership?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Premium</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$99<small class="text-body-secondary fw-light"></small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>View Unlimited Buyers</li>
                            <!-- <li>15 GB of storage</li>
                            <li>Phone and email support</li>
                            <li>Help center access</li> -->
                        </ul>
                        <a href="./membership" type="button" class="w-100 btn btn-lg btn-primary">Become Paid Member</a>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary" href="./membership">Subscribe Now</a>
            </div> -->
        </div>
    </div>
</div>

<!-- List Your Stock for Sale -->

<div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="stockModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title" id="stockModalLabel">List Your Stock for Sale</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <!-- ✅ Start Form -->
        <form action="submit_stock.php" method="POST" enctype="multipart/form-data">
          <div class="mb-2">
            <label>Product Name</label>
            <input type="text" class="form-control" name="product_name" required>
          </div>
          <div class="mb-2">
            <label>Quantity Available (kg)</label>
            <input type="number" class="form-control" name="quantity">
          </div>
          <div class="mb-2">
            <label>Location of Stock</label>
            <input type="text" class="form-control" name="location">
          </div>
          <div class="mb-2">
            <label>Price per Unit (USD)</label>
            <input type="number" class="form-control" name="price">
          </div>
          <div class="mb-2">
            <label>Minimum Order Quantity</label>
            <input type="number" class="form-control" name="min_order">
          </div>
          <div class="mb-2">
            <label>Product Specifications (optional)</label>
            <textarea class="form-control" name="specs"></textarea>
          </div>
          <div class="mb-2">
            <label>Contact Name</label>
            <input type="text" class="form-control" name="contact" required>
          </div>
          <div class="mb-2">
            <label>Contact Email</label>
            <input type="text" class="form-control" name="email_phone" required>
          </div>
          <div class="mb-2">
  <label>Phone</label>
  <input type="text" class="form-control" name="phone" required>
</div>
          <div class="mb-2">
            <label>Company Name (optional)</label>
            <input type="text" class="form-control" name="company">
          </div>
          <div class="mb-2">
            <label>Upload Product Document (optional)</label>
            <input type="file" class="form-control" name="document">
          </div>
          <div class="mb-2">
            <label>Product Image (optional)</label>
            <input type="file" class="form-control" name="image">
          </div>

          <!-- ✅ Move Submit Button Here -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">List Stock for Sale</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>

        </form>
        <!-- ✅ End Form -->
      </div>
    </div>
  </div>
</div>


<!-- Purchase Inquiry Modal -->
<div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <div class="modal-header">
        <h5 class="modal-title" id="purchaseModalLabel">Post a Purchase Inquiry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <!-- ✅ Begin Form -->
        <form action="submit_inquiry.php" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col-md-6">
              <label>Product Name</label>
              <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Quantity Needed (kg)</label>
              <input type="number" name="quantity" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label>Preferred Delivery Location</label>
            <input type="text" name="location" class="form-control">
          </div>

          <div class="mb-3">
            <label>Required By Date</label>
            <input type="date" name="date" class="form-control">
          </div>

          <div class="mb-3">
            <label>Additional Specifications</label>
            <textarea name="specs" class="form-control"></textarea>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label>Contact Name</label>
              <input type="text" name="contact" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label>Contact Email</label>
              <input type="text" name="email_phone" class="form-control" required>
            </div>
            <div class="mb-2">
  <label>Phone</label>
  <input type="text" class="form-control" name="phone" required>
</div>

          </div>

          <div class="mb-3">
            <label>Company File (optional)</label>
            <input type="file" name="company_file" class="form-control">
          </div>

          <!-- ✅ Submit button inside the form -->
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit Inquiry</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
        <!-- ✅ End Form -->
      </div>
    </div>
  </div>
</div>
