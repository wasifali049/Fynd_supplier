$(document).ready(function () {
  $("#getQuoteForm").on("submit", function (event) {
    event.preventDefault();
    var formValues = $(this).serialize();
    var form = $("#getQuoteForm");

    var url = form.attr("action");

    var inq_mobile = $("#inq-mobile");
    var inq_mobile_label = $(".inq-mobile-label");

    var inq_chemical = $("#inq-chemical");
    var inq_chemical_label = $(".inq-chemical-label");

    var inq_email = $("#inq-email");
    var inq_email_label = $(".inq-email-label");

    var inq_target_offer_price = $("#inq-target-offer-price");
    var inq_target_offer_price_label = $(".inq-target-offer-price-label");

    var inq_details = $("#inq-details");
    var inq_details_label = $(".inq-details-label");

    var error = false;

    var ErrorMsg = "";

    if (inq_mobile.val() == '') {
      ErrorMsg = "Mobile Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(inq_mobile_label, inq_mobile, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(inq_mobile_label, inq_mobile);
    }

    if (inq_chemical.val() == '') {
      ErrorMsg = "Chemical Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(inq_chemical_label, inq_chemical, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(inq_chemical_label, inq_chemical);
    }

    if (inq_email.val() == '') {
      ErrorMsg = "Email Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(inq_email_label, inq_email, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(inq_email_label, inq_email);
    }

    // if (inq_target_offer_price.val() == '') {
    //   ErrorMsg = "Target Price Field cannot be blank";
    //   showAlert(ErrorMsg, "red");
    //   addError(inq_target_offer_price_label, inq_target_offer_price, ErrorMsg);
    //   error = true;
    //   return false;
    // } else {
    //   error = false;
    //   removeError(inq_target_offer_price_label, inq_target_offer_price);
    // }

    if (inq_details.val() == '') {
      ErrorMsg = "Details Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(inq_details_label, inq_details, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(inq_details_label, inq_details);
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
            var text = "Inquiry Added successfully!";
            showAlert(text);
            $('#getQuoteModel').modal('hide');


            Swal.fire({
              icon: 'success',
              title: 'Inquiry Added successfully!',
              text: '',
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })
            document.getElementById("getQuoteForm").reset();
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




  $("#exchangeOfferForm").on("submit", function (event) {
    event.preventDefault();
    var formValues1 = $('#exchangeOfferForm').serializeArray();
    var form = $("#exchangeOfferForm");

    var url = form.attr("action");

    var offer_mobile = $("#offer-mobile");
    var offer_mobile_label = $(".offer-mobile-label");

    var offer_chemical = $("#offer-chemical");
    var offer_chemical_label = $(".offer-chemical-label");

    var offer_email = $("#offer-email");
    var offer_email_label = $(".offer-email-label");

    var offer_target_offer_price = $("#offer-target-offer-price");
    var offer_target_offer_price_label = $(".offer-target-offer-price-label");

    var offer_details = $("#offer-details");
    var offer_details_label = $(".offer-details-label");




    var error = false;

    var ErrorMsg = "";

    if (offer_mobile.val() == '') {
      ErrorMsg = "Mobile Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(offer_mobile_label, offer_mobile, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(offer_mobile_label, offer_mobile);
    }

    if (offer_chemical.val() == '') {
      ErrorMsg = "Chemical Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(offer_chemical_label, offer_chemical, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(offer_chemical_label, offer_chemical);
    }

    if (offer_email.val() == '') {
      ErrorMsg = "Email Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(offer_email_label, offer_email, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(offer_email_label, offer_email);
    }

    if (offer_target_offer_price.val() == '') {
      ErrorMsg = "Target Price Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(offer_target_offer_price_label, offer_target_offer_price, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(offer_target_offer_price_label, offer_target_offer_price);
    }

    if (offer_details.val() == '') {
      ErrorMsg = "Details Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(offer_details_label, offer_details, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(offer_details_label, offer_details);
    }

    var photo = $("#photo");
    var photo_label = $(".photo_label");

    var photofiles = photo[0].files;
    let allowedExtension = [
      "image/jpeg",
      "image/jpg",
      "image/png",
      "image/gif",
      "application/pdf",
      "application/msword",
      "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
      "application/vnd.ms-excel",
      "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    ];

    if (photofiles.length != 0) {
      var photofile = photofiles[0];

      //Check the file type.
      if (!photofile.type.match("image.*")) {
        ErrorMsg = "file format not supported.";
        addError(photo_label, photo, ErrorMsg);
        error = true;
        return false;
      } else {
        if (allowedExtension.indexOf(photofile.type) == -1) {
          ErrorMsg = "file format only jpg and png are currently supported.";
          addError(photo_label, photo, ErrorMsg);
          error = true;
          return false;
        } else {
          error = false;
          removeError(photo_label, photo);
        }
      }

      if (photofile.size >= 500000) {
        ErrorMsg = "Size exceeds the maximum limit of 500 KB.";
        addError(photo_label, photo, ErrorMsg);
        error = true;
        return false;
      } else {
        error = false;
        removeError(photo_label, photo);
      }
    }


    if (error == false) {

      var photofile1 = photofiles.length != 0 ? photofile : "";

      var form_data_1 = new FormData();

      form_data_1.append("photo", photofile1);

      for (let index = 0; index < formValues1.length; index++) {
        const element = formValues1[index];
        form_data_1.append(element.name, element.value);
      }

      $.ajax({
        type: "POST",
        url: url,
        data: form_data_1,
        contentType: false,
        processData: false,
        beforeSend: function () {
          showPageLoading()
        },
        success: function (data) {
          hidePageLoading()
          const myObj = JSON.parse(data);
          console.log(myObj);
          if (myObj.success == true) {
            var text = "Offer Added successfully!";
            showAlert(text);
            $('#exchangeOfferModel').modal('hide');

            Swal.fire({
              icon: 'success',
              title: 'Offer Added successfully!',
              text: '',
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })

            document.getElementById("exchangeOfferForm").reset();
          } else {
            var text = "Insernal Server Error!";
            showAlert(text);
          }
        },

        error: function (data) {
          hidePageLoading()
          console.log(data);
          var text = "Insernal Server Error!";
          showAlert(text);
        },
      });
    }
  });




  $("#inquiryForm").on("submit", function (event) {
    event.preventDefault();
    var formValues = $(this).serialize();
    var form = $("#inquiryForm");

    var url = form.attr("action");

    var offer_mobile = $("#offer-mobile");
    var offer_mobile_label = $(".offer-mobile-label");

    var offer_chemical = $("#offer-chemical");
    var offer_chemical_label = $(".offer-chemical-label");

    var offer_email = $("#offer-email");
    var offer_email_label = $(".offer-email-label");

    var offer_target_offer_price = $("#offer-target-offer-price");
    var offer_target_offer_price_label = $(".offer-target-offer-price-label");

    var offer_details = $("#offer-details");
    var offer_details_label = $(".offer-details-label");

    var error = false;

    var ErrorMsg = "";

    // if (offer_mobile.val() == '') {
    //   ErrorMsg = "Mobile Field cannot be blank";
    //   showAlert(ErrorMsg, "red");
    //   addError(offer_mobile_label, offer_mobile, ErrorMsg);
    //   error = true;
    //   return false;
    // } else {
    //   error = false;
    //   removeError(offer_mobile_label, offer_mobile);
    // }

    // if (offer_chemical.val() == '') {
    //   ErrorMsg = "Chemical Field cannot be blank";
    //   showAlert(ErrorMsg, "red");
    //   addError(offer_chemical_label, offer_chemical, ErrorMsg);
    //   error = true;
    //   return false;
    // } else {
    //   error = false;
    //   removeError(offer_chemical_label, offer_chemical);
    // }

    // if (offer_email.val() == '') {
    //   ErrorMsg = "Email Field cannot be blank";
    //   showAlert(ErrorMsg, "red");
    //   addError(offer_email_label, offer_email, ErrorMsg);
    //   error = true;
    //   return false;
    // } else {
    //   error = false;
    //   removeError(offer_email_label, offer_email);
    // }

    // if (offer_target_offer_price.val() == '') {
    //   ErrorMsg = "Target Price Field cannot be blank";
    //   showAlert(ErrorMsg, "red");
    //   addError(offer_target_offer_price_label, offer_target_offer_price, ErrorMsg);
    //   error = true;
    //   return false;
    // } else {
    //   error = false;
    //   removeError(offer_target_offer_price_label, offer_target_offer_price);
    // }

    // if (offer_details.val() == '') {
    //   ErrorMsg = "Details Field cannot be blank";
    //   showAlert(ErrorMsg, "red");
    //   addError(offer_details_label, offer_details, ErrorMsg);
    //   error = true;
    //   return false;
    // } else {
    //   error = false;
    //   removeError(offer_details_label, offer_details);
    // }

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
          console.log(myObj);
          if (myObj.success == true) {
            var text = "Thank you for your Inquiry!";
            showAlert(text);
            $('#inquiryModel').modal('hide');
            document.getElementById("inquiryForm").reset();

            Swal.fire({
              icon: 'success',
              title: 'Thank you for your Inquiry!',
              text: '',
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })

          } else {
            var text = "Insernal Server Error!";
            showAlert(text);
          }
        },

        error: function (data) {
          hidePageLoading()
          console.log(data);
          var text = "Insernal Server Error!";
          showAlert(text);
        },
      });
    }
  });






  $("#feedbackForm").on("submit", function (event) {
    event.preventDefault();
    var formValues = $(this).serialize();
    var form = $("#feedbackForm");

    var url = form.attr("action");

    // var feed_name = $("#feed-name");
    // var feed_name_label = $(".feed-name-label");

    var feed_mobile = $("#feed-mobile");
    var feed_mobile_label = $(".feed-mobile-label");

    // var feed_email = $("#feed-email");
    // var feed_email_label = $(".feed-email-label");

    var feed_message = $("#feed-message");
    var feed_message_label = $(".feed-message-label");

    var error = false;

    var ErrorMsg = "";

    // if (feed_name.val() == '') {
    //   ErrorMsg = "Name Field cannot be blank";
    //   showAlert(ErrorMsg, "red");
    //   addError(feed_name_label, feed_name, ErrorMsg);
    //   error = true;
    //   return false;
    // } else {
    //   error = false;
    //   removeError(feed_name_label, feed_name);
    // }
    if (feed_mobile.val() == '') {
      ErrorMsg = "Mobile Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(feed_mobile_label, feed_mobile, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(feed_mobile_label, feed_mobile);
    }

    // if (feed_email.val() == '') {
    //   ErrorMsg = "Email Field cannot be blank";
    //   showAlert(ErrorMsg, "red");
    //   addError(feed_email_label, feed_email, ErrorMsg);
    //   error = true;
    //   return false;
    // } else {
    //   error = false;
    //   removeError(feed_email_label, feed_email);
    // }


    if (feed_message.val() == '') {
      ErrorMsg = "Message Field cannot be blank";
      showAlert(ErrorMsg, "red");
      addError(feed_message_label, feed_message, ErrorMsg);
      error = true;
      return false;
    } else {
      error = false;
      removeError(feed_message_label, feed_message);
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
            var text = "Thank you for your Feedback!";
            showAlert(text);
            $('#feedbackModel').modal('hide');


            Swal.fire({
              icon: 'success',
              title: 'Thank you for your Feedback!',
              text: '',
            }).then((result) => {
              if (result.isConfirmed) {
                // location.reload();
              }
            })
            document.getElementById("feedbackModel").reset();
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

        error: function (data) {
          hidePageLoading()
          console.log(data);
          var text = "Insernal Server Error!";
          showAlert(text);
        },
      });
    }
  });

});
