function wpMessageTabs(evt, elemName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("message-tabs-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("message-tabs-links");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" oc-btn", " oc-outline-btn");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementsByClassName(elemName)[0].style.display = "flex";

    var nestedElement = document.querySelector('.' + elemName).querySelector('.chat-body');

    setTimeout(() => {
        nestedElement.scrollTo(0, nestedElement.scrollHeight);
    }, 1000);



    // if (evt.currentTarget.classList.contains("oc-outline-btn")) {
    //     evt.currentTarget.classList.remove("oc-outline-btn");
    // }
    // evt.currentTarget.classList.add("oc-btn");
}

document.addEventListener('DOMContentLoaded', function () {
    // document.getElementsByClassName("active-rfq-btn")[0].click();
    wpMessageTabs(event, 'active-rfq');
})


function userTypeChangeAndChemical() {
    
    var chemical = $('#home-inq-chemical')
    var chemical_id = chemical.val()

    var who_to_contact_field = $('#home-inq-who_to_contact')
    var who_to_contact = who_to_contact_field.val()

    var destination_field = $("#home-inq-destination");
    var destination = destination_field.val();

    if (who_to_contact != '' && chemical_id != '' && destination != '') {
        loadBuyerSupplier({ who_to_contact: who_to_contact, chemical_id: chemical_id, destination: destination })
    }
}


$(document).ready(function(){
    function userTypeChangeAndChemical() {
    
    var chemical = $('#home-inq-chemical')
    var chemical_id = chemical.val()

    var who_to_contact_field = $('#home-inq-who_to_contact')
    var who_to_contact = who_to_contact_field.val()

    var destination_field = $("#home-inq-destination");
    var destination = destination_field.val();

    if (who_to_contact != '' && chemical_id != '' && destination != '') {
        loadBuyerSupplier({ who_to_contact: who_to_contact, chemical_id: chemical_id, destination: destination })
    }
}
$('#home-inq-who_to_contact').on('change', function(){
    if($('#home-inq-who_to_contact').val() == 'Buyer'){
        if($('#loggedinUserPremuim').val() == '1'){
            $('#chemical-select-wrapper').hide();
            userTypeChangeAndChemical();
        }else{
            showAlert("To view buyers, please purchase a membership");
            $('#home-inq-who_to_contact').val('Supplier');
            membershipModal();
        }
    }else{
        $('#chemical-select-wrapper').show();
    }
})
})


function loadBuyerSupplier(formData) {

    $('#home-inq-buyer_supplier').html('')
    var url = window.location.origin +  "/inc/home-inquiry/get-buyer-supplier.php";
    // alert(url);
    var error = false;

    var ErrorMsg = "";

    if (error == false) {
        var formValues = formData;
        $.ajax({
            type: "POST",
            url: url,
            data: formValues,
            success: function (data) {
                if(data != ''){
                    const myObj = JSON.parse(data);
                    $('#all-user-wrapper').html(myObj)
                }
            },
            error: function (data) {
                $('#all-user-wrapper').html('')
            },
        });
    }
}

$(document).ready(function () {
    userTypeChangeAndChemical();

    

    $("#getHomeInquiryForm").on("submit", function (event) {
        event.preventDefault();
        var formValues = $(this).serialize();
        var form = $("#getHomeInquiryForm");

        var url = form.attr("action");

        checkMessageEligibility();
        var error = false
        var loggedinUserId = $("#loggedinUserId");

        if (loggedinUserId.val() == "" || loggedinUserId.val() == 0) {
          error = true;
          return false;
        }

        var home_inq_mobile = $("#home-inq-mobile");
        var home_inq_mobile_label = $(".home-inq-mobile-label");

        var home_inq_type = $("#home-inq-who_to_contact");
        var home_inq_type_label = $(".home-inq-who_to_contact-label");

        var home_inq_destination = $("#home-inq-destination");
        var home_inq_destination_label = $(".home-inq-destination-label");

        var home_inq_chemical = $("#home-inq-chemical");
        var home_inq_chemical_label = $(".home-inq-chemical-label");

        // var home_inq_quantity = $("#home-inq-quantity");
        // var home_inq_quantity_label = $(".home-inq-quantity-label");

        var home_inq_buyer_supplier = $("#home-inq-buyer_supplier");
        var home_inq_buyer_supplier_label = $(".home-inq-buyer_supplier-label");

        var home_inq_details = $("#home-inq-details");
        var home_inq_details_label = $(".home-inq-details-label");

        var error = false;

        var ErrorMsg = "";

        // if (home_inq_mobile.val() == '') {
        //     ErrorMsg = "Mobile Field cannot be blank";
        //     showAlert(ErrorMsg, "red");
        //     addError(home_inq_mobile_label, home_inq_mobile, ErrorMsg);
        //     error = true;
        //     return false;
        // } else {
        //     if ( isValidNumber(home_inq_mobile.val()) == false){
        //         ErrorMsg = "Mobile Number not valid";
        //         showAlert(ErrorMsg, "red");
        //         addError(home_inq_mobile_label, home_inq_mobile, ErrorMsg);
        //         error = true;
        //         return false;
        //     } else {
        //         error = false;
        //         removeError(home_inq_mobile_label, home_inq_mobile);
        //     }
        // }

        if (home_inq_type.val() == '') {
            ErrorMsg = "User Type Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(home_inq_type_label, home_inq_type, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(home_inq_type_label, home_inq_type);
        }

        if (home_inq_destination.val() == '') {
            ErrorMsg = "Destination Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(home_inq_destination_label, home_inq_destination, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(home_inq_destination_label, home_inq_destination);
        }

        if (home_inq_chemical.val() == '') {
            ErrorMsg = "Chemical Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(home_inq_chemical_label, home_inq_chemical, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(home_inq_chemical_label, home_inq_chemical);
        }

        // if (home_inq_quantity.val() == '') {
        //     ErrorMsg = "Quantity Field cannot be blank";
        //     showAlert(ErrorMsg, "red");
        //     addError(home_inq_quantity_label, home_inq_quantity, ErrorMsg);
        //     error = true;
        //     return false;
        // } else {
        //     error = false;
        //     removeError(home_inq_quantity_label, home_inq_quantity);
        // }

        if (home_inq_buyer_supplier.val() == '') {
            ErrorMsg = "User Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(home_inq_buyer_supplier_label, home_inq_buyer_supplier, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(home_inq_buyer_supplier_label, home_inq_buyer_supplier);
        }

        if (home_inq_details.val() == '') {
            ErrorMsg = "Details Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(home_inq_details_label, home_inq_details, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(home_inq_details_label, home_inq_details);
        }

        if (error == false) {
            $.ajax({
                type: "POST",
                url: url,
                data: formValues,
                beforeSend: function () {
                    showPageLoading()
                },
                success: function (data) {
                    hidePageLoading()
                    const myObj = JSON.parse(data);
                    if (myObj.success == true) {
                        var text = "Successfully Send Inquiry.";
                        showAlert(text);
                        $('#getQuoteModel').modal('hide');


                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Send Inquiry.',
                            text: '',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                        document.getElementById("getHomeInquiryForm").reset();
                    } else {
                        text = "Insernal Server Error!";
                        text = myObj.errors.error !== '' ? myObj.errors.error : text
                        showAlert(text);
                    }
                },

                error: function (data) {
                    hidePageLoading()
                    const myObj = JSON.parse(data);
                    var text = "Insernal Server Error!";
                    text = myObj.errors.error !== '' ? myObj.errors.error : text
                    showAlert(text);
                },
            });
        }
    });

    if(document.querySelector(".home-inquiry-chemical-fields")){
        $(".home-inquiry-chemical-fields").select2({
        });
    }
})

function filterList() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('userFilter');
    filter = input.value.toUpperCase();
    ul = document.getElementById("filterable-wrapper");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName("filter-anchor")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function checkAll() {
    var checkboxes = document.querySelectorAll('.filterCheckBox');
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = true;
    });
}

function uncheckAll() {
    var checkboxes = document.querySelectorAll('.filterCheckBox');
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = false;
    });
}