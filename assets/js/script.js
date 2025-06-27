$(document).ready(function () {

  if(document.querySelector(".chemical-select-fields-1")){
    $(".chemical-select-fields-1").select2({
      tags: true,
      dropdownParent: $("#getQuoteModel .modal-content")
    })
  }

  if(document.querySelector(".chemical-select-fields-2")){
    $(".chemical-select-fields-2").select2({
      tags: true,
      dropdownParent: $("#exchangeOfferModel")
    });
  }

  if(document.querySelector(".chemical-select-fields")){
    $(".chemical-select-fields").select2({
      tags: true,
      // tokenSeparators: [",", " "],
    });
  }

});


$('.select2').each(function () {
  $(this).select2({ dropdownParent: $(this).parent() });
})



const signupModel = document.getElementById("signupModel");
const mobilesignup = document.getElementById("mobile-signup");

const signinModel = document.getElementById("signinModel");
const mobilesignin = document.getElementById("mobile-signin");

signupModel.addEventListener("shown.bs.modal", () => {
  mobilesignup.focus();
});

signinModel.addEventListener("shown.bs.modal", () => {
  mobilesignin.focus();
});




function checkMessageEligibility() {
  const loginId = document.getElementById("loggedinUserId").value;
  if (loginId == 0 || loginId == "") {
    //const signinModel = document.getElementById("signinModel");
    $("#signinModel").modal("toggle");
    return false;
  }
}



function feedbackModal() {
  //const signinModel = document.getElementById("signinModel");
  if(!checkCookie('feedbackModal')) {
    $("#feedbackModel").modal("toggle");
    setCookie('feedbackModal', 1, 365);
  }


  return false;
}



function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


function checkCookie(cname) {
  let username = getCookie(cname);
  return (username != "") ? true:false
}



function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}



function membershipModal() {
  //const signinModel = document.getElementById("signinModel");
  $("#membershipModel").modal("toggle");
  return false;
}

function membershipOpen(url){
  window.location = `${url}buyer`
}

function searchModal() {
  //const signinModel = document.getElementById("signinModel");
  $("#searchModel").modal("toggle");
  return false;
}



const exampleSearchModal = document.getElementById('searchModel')
if (exampleSearchModal) {
  exampleSearchModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget

    if(button){
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modalTitle = exampleSearchModal.querySelector('.searchModelLabel')
    const modalBodyInput = exampleSearchModal.querySelector('.page_request')

    page_request = 'home page';

    if(recipient == 'buyer'){
      modal_title = 'Get a Quote';
      page_request = 'home page';
    }

    if(recipient == 'offer'){
      modal_title = 'Send Offer';
      page_request = 'home page';
    }

    modalTitle.textContent = modal_title;
    modalBodyInput.value = page_request
  }
  })
}

function loginRequired() {
  const loginId = document.getElementById("loggedinUserId").value;
  if (loginId == 0 || loginId == "") {
    //const signinModel = document.getElementById("signinModel");
    $("#inquiryModel").modal("toggle");
    $("#signinModel").modal("toggle");
    return false;
  }
}


function contactWP(number, type, message, action = "./inc/inquiry/contact-inquiry-add.php") {

  var url = `https://api.whatsapp.com/send?phone=${number}&text=${message}`

  $.ajax({
    type: "POST",
    url: action,
    data: { 'number': number, 'type': type },
    beforeSend: function () {
      showPageLoading()
    },
    success: function (result) {
      hidePageLoading()
      const myObj = JSON.parse(result);
      if (myObj.status === true) {
        window.open(url);
      }
    },
  });
}

function inquiry(id, url) {

  var nUrl = `${url}inc/inquiry/get-inquiry.php`
  var error = false
  var loggedinUserId = $("#loggedinUserId");

  checkMessageEligibility();


  if (loggedinUserId.val() == "" || loggedinUserId.val() == 0) {
    error = true;
    return false;
  }

  if (error == false) {
    $.ajax({
      type: "POST",
      url: nUrl,
      data: { 'id': id },
      beforeSend: function () {
        showPageLoading()
      },
      success: function (result) {

        hidePageLoading()
        const myObj = JSON.parse(result);

        if (myObj.status === 'success') {

          const data = myObj.data

          const imageUrl = `${url}assets/img/chemical/${data.chemical_photo}`;
          $('#chemicalImage').attr('src', imageUrl)
          $('#chemicalTitle').text(data.product_name)
          $('#product_name').val(data.product_name)
          $('#supplier_name').val(data.supplier_name)
          $('#supplier_country').val(data.supplier_country)
          $('#product_name').val(data.product_name)
          $('#buyer_name').val(data.buyer_name)
          $('#buyer_phone_number').val(data.buyer_mobile)
          $('#min-order-quantity').val(1)
          $('#manufacturer_details').val(data.manufacturer_details)
          $('#supplier_id').val(data.uid)
          $('#main_chemical_id').val(data.chemical_id)
          $('#chemical_id').val(data.id)

          $('#inquiryModel').modal('show');
        }
      },
    });
  }
}



$(document).ready(function () {
  //feedbackModal();


  //document.addEventListener("mouseleave", feedbackModal())

});

// document.addEventListener("DOMContentLoaded", function() {
//   window.onbeforeunload = function(event) {
//     event.preventDefault();
//     try {
//       if (event.type === "beforeunload" && !event.target.href.startsWith(location.origin)) {
//         var message = "Are you sure you want to leave this page?";
//         //event.returnValue = message;
//         feedbackModal();
//         event.preventDefault();
        
//       }
//     } catch(error) {
//       // Handle the undefined property error
//       console.log(error);
//     }
//   };
// });

function updateStatus(chatId, status) {
  alert("Chat ID: " + chatId);   // Check if chatId is passed correctly
  alert("Status: " + status);    // Check if status is passed correctly
  // AJAX request to update the status
  $.ajax({
      url: 'update-status.php', // PHP script to handle status update
      type: 'POST',
      data: {
          chat_id: chatId,  // The ID of the chat message
          status: status    // The new status (approve or reject)
      },
      success: function(response) {
          if (response === 'success') {
              alert('Status updated successfully');
              location.reload();  // Reload the page to reflect the new status
          } else if (response === 'status_already_set') {
              alert('Status is already set to this value');
          } else {
              alert('Failed to update status');
          }
      },
      error: function() {
          alert('An error occurred while updating the status');
      }
  });
}
