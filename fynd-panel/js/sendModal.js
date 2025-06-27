$(document).ready(function () {

    $(".image-delete-btn").on("click", function (e) {

        var elem = e.target;

        var url = '';

        if ($(elem).hasClass("image-delete-btn")) {

            url = $(elem).attr("data-url");

        }



        if ($(elem).hasClass("fa-trash")) {

            url = $(elem).parent().attr("data-url");

        }



        $(".image-delete-btn-action").attr("href", url);

    });













});


function sendModal(message_id, message_text) {
    $('#sendModal').modal('show')
    $('#message_id').val(message_id)

    $('#rfq').val('Request On Quote');
    $('#mobile').val('Request On Quote');
    $('#chemical_name').val('');
    $('#quantity').val('Request On Quote');
    $('#destination').val('Request On Quote');
    $('#target_price').val('Request On Quote');
    $('#inquiry_details').val(message_text);
}


function userTypeChange() {
    var send_type = $('#send_type');
    var countryFilter = $('#country_filter').val();
    var chemicalFilter = $('#chemical_filter').val();
    
    send_type_val = send_type.val();
    $('#all-user-wrapper').html('');

    // Handle chemical wrapper visibility
    if (send_type_val == "buyer" || send_type_val == "supplier") {
        $('#chemical-wrapper').hide();
    }

    if (send_type_val == "send specific") {
        $('#chemical-wrapper').show();
        changeChemical();
    }

    var url = "./get-user-data.php";
    var error = false;
    var ErrorMsg = "";

    if (error == false && send_type_val !== 'send specific') {
        var formValues = { 
            send_type: send_type_val,
            country: countryFilter,
            chemical: chemicalFilter
        };
        
        console.log('Sending data:', formValues); // Debug log
        
        $.ajax({
            type: "POST",
            url: url,
            data: formValues,
            success: function(data) {
                const myObj = JSON.parse(data);
                $('#all-user-wrapper').html(myObj);
            },
            error: function(data) {
                $('#all-user-wrapper').html('');
                console.error('Error fetching user data:', data);
            },
        });
    } else {
        $('#all-user-wrapper').html('');
    }
}

// Add function to reset filters
function resetFilters() {
    $('#country_filter').val('');
    $('#chemical_name').val('');
    userTypeChange();
}

// Update send_type change handler to reset other filters
$('#send_type').on('change', function() {
    resetFilters();
});

function changeChemical() {

    $('#all-user-wrapper').html('')

    var chemical = $('#chemical')
    chemical_val = chemical.val()

    var send_type = $('#send_type')
    send_type_val = send_type.val()

    var url = "./get-user-data.php";
    var error = false;

    var ErrorMsg = "";

    if (error == false) {
        var formValues = { send_type: send_type_val, chemical: chemical_val };
        $.ajax({
            type: "POST",
            url: url,
            data: formValues,
            success: function (data) {
                const myObj = JSON.parse(data);
                $('#all-user-wrapper').html(myObj)
            },
            error: function (data) {
                $('#all-user-wrapper').html('')
            },
        });
    }
}

function filterList() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('userFilter');
    filter = input.value.toUpperCase();
    ul = document.getElementById("filterable-wrapper");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("label")[0];
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