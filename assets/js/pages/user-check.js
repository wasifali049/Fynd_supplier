$(document).ready(function () {

  $('#email-otp-wrapper').hide();

  $("#userSignupForm").on("submit", function (event) {
    event.preventDefault();
    var formValues = $(this).serialize();
    var form = $("#userSignupForm");
    var url = form.attr("action");
    var mobile = $("#mobile-signup");
    var labelMobile = $(".mobile-signup-label");
    var email = $("#signup-email");
    var labelEmail = $(".signup-email-label");

    var email_otp = $("#signup-email-otp");
    var labelEmailOtp = $(".signup-email-otp-label");

    var name = $("#signup-name");
    var labelName = $(".signup-name-label");

    var error = false;
    var ErrorMsg = "";

    if (name.val() == "") {
      ErrorMsg = "Name field is required";
      addError(labelName, name, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      if (isValidName(name.val()) == false) {
        ErrorMsg = "Name is not valid";
        addError(labelName, name, ErrorMsg);
        showAlert(ErrorMsg, "red");
        error = true;
        return false;
      } else {
        error = false;
        removeError(labelName, name);
      }
    }

    if (mobile.val() == "") {
      ErrorMsg = "Mobile field is required";
      addError(labelMobile, mobile, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      if (isValidNumber(mobile.val()) == false) {
        ErrorMsg = "Number is not valid";
        addError(labelMobile, mobile, ErrorMsg);
        showAlert(ErrorMsg, "red");
        error = true;
        return false;
      } else {
        error = false;
        removeError(labelMobile, mobile);
      }
    }

    if (email.val() == "") {
      ErrorMsg = "Email field is required";
      addError(labelEmail, email, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      if (isValidEmail(email.val()) == false) {
        ErrorMsg = "Email is not valid";
        addError(labelEmail, email, ErrorMsg);
        showAlert(ErrorMsg, "red");
        error = true;
        return false;
      } else {
        error = false;
        removeError(labelEmail, email);
      }
    }

    if (email_otp.val() == "") {
      send_email_otp();
      error = true;
      return false;
    } else {
      var email_otp_val = email_otp.val();
      if(email_otp_val.length != 6){
        ErrorMsg = "Email OTP is not valid";
        addError(labelEmailOtp, email_otp, ErrorMsg);
        showAlert(ErrorMsg, "red");
        error = true;
        return false;
      }
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
            document.getElementById("userSignupForm").reset();
            showAlert(
              "Successfully Signup! Please wait for a while...",
              "green"
            );
            setTimeout(() => {

              if (myObj.membership == 'yes') {
                window.location = `${myObj.root}membership`
              } else {
                location.reload();
              }

              // location.reload();
            }, 2000);

            Swal.fire({
              icon: 'success',
              title: 'Successfully Signup!',
              text: '',
            }).then((result) => {
              if (result.isConfirmed) {

                if (myObj.membership == 'yes') {
                  window.location = `${myObj.root}membership`
                } else {
                  location.reload();
                }


              }
            })

          } else {
            showAlert(myObj.errors.error, "red");
          }
        },

        error: function (data) {
          hidePageLoading()
          const myObj = JSON.parse(data);
          showAlert(myObj.errors.error, "red");
        },
      });
    }
  });

  $("#userSigninForm").on("submit", function (event) {
    event.preventDefault();
    var formValues = $(this).serialize();
    var form = $("#userSigninForm");
    var url = form.attr("action");
    var mobile = $("#mobile-signin");
    var labelMobile = $(".mobile-signin-label");
    var error = false;
    var ErrorMsg = "";
    if (mobile.val() == "") {
      ErrorMsg = "Mobile field is required";
      addError(labelMobile, mobile, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      if (isValidNumber(mobile.val()) == false) {
        ErrorMsg = "Number is not valid";
        addError(labelMobile, mobile, ErrorMsg);
        showAlert(ErrorMsg, "red");
        error = true;
        return false;
      } else {
        error = false;
        removeError(labelMobile, mobile);
      }
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
            document.getElementById("userSigninForm").reset();
            showAlert(
              "Successfully Signin! Please wait for a while...",
              "green"
            );
            setTimeout(() => {
              location.reload();
            }, 2000);

            Swal.fire({
              icon: 'success',
              title: 'Successfully Signin!',
              text: '',
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })

          } else {
            showAlert(myObj.errors.error, "red");
          }
        },

        error: function (data) {
          hidePageLoading()
          const myObj = JSON.parse(data);
          showAlert(myObj.errors.error, "red");
        },
      });
    }
  });

  $("#suppierSignupForm").on("submit", function (event) {
    event.preventDefault();
    var formValues = $(this).serialize();
    var form = $("#suppierSignupForm");
    var url = form.attr("action");

    var supplierName = $("#supplier-name");
    var supplierNameLabel = $(".supplier-name-label");

    var supplierEmail = $("#supplier-email");
    var supplierEmailLabel = $(".supplier-email-label");

    var supplierMobile = $("#supplier-mobile");
    var supplierMobileLabel = $(".supplier-mobile-label");

    var supplierCompanyName = $("#supplier-company-name");
    var supplierCompanyNameLabel = $(".supplier-company-name-label");

    var supplierCountry = $("#supplier-country");
    var supplierCountryLabel = $(".supplier-country-label");

    var error = false;
    var ErrorMsg = "";

    if (supplierName.val() == "") {
      ErrorMsg = "Name field is required";
      addError(supplierNameLabel, supplierName, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      if (isValidName(supplierName.val()) == false) {
        ErrorMsg = "Name is not valid";
        addError(supplierNameLabel, supplierName, ErrorMsg);
        showAlert(ErrorMsg, "red");
        error = true;
        return false;
      } else {
        error = false;
        removeError(supplierNameLabel, supplierName);
      }
    }
    if (supplierEmail.val() == "") {
      ErrorMsg = "Email field is required";
      addError(supplierEmailLabel, supplierEmail, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      if (isValidEmail(supplierEmail.val()) == false) {
        ErrorMsg = "Email is not valid";
        addError(supplierEmailLabel, supplierEmail, ErrorMsg);
        showAlert(ErrorMsg, "red");
        error = true;
        return false;
      } else {
        error = false;
        removeError(supplierEmailLabel, supplierEmail);
      }
    }

    if (supplierMobile.val() == "") {
      ErrorMsg = "Mobile field is required";
      addError(supplierMobileLabel, supplierMobile, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      if (isValidNumber(supplierMobile.val()) == false) {
        ErrorMsg = "Number is not valid";
        addError(supplierMobileLabel, supplierMobile, ErrorMsg);
        showAlert(ErrorMsg, "red");
        error = true;
        return false;
      } else {
        error = false;
        removeError(supplierMobileLabel, supplierMobile);
      }
    }

    if (supplierCompanyName.val() == "") {
      ErrorMsg = "Company Name field is required";
      addError(supplierCompanyNameLabel, supplierCompanyName, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
      removeError(supplierCompanyNameLabel, supplierCompanyName);
    }

    if (supplierCountry.val() == "") {
      ErrorMsg = "Country field is required";
      addError(supplierCountryLabel, supplierCountry, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
      removeError(supplierCountryLabel, supplierCountry);
    }

    if (error == false) {
      $.ajax({
        type: "POST",
        url: url,
        data: formValues,
        beforeSend: function () {
          showPageLoading()
        },
        beforeSend: function () {
          showPageLoading()
        },
        success: function (data) {
          const myObj = JSON.parse(data);

          hidePageLoading()

          if (myObj.success == true) {
            document.getElementById("suppierSignupForm").reset();
            showAlert(
              "Successfully Signup! Please wait for a while...",
              "green"
            );
            setTimeout(() => {
              // location.reload();

              if (myObj.membership == 'yes') {
                window.location = `${myObj.root}membership`
              } else {
                location.reload();
              }

            }, 2000);

            Swal.fire({
              icon: 'success',
              title: 'Successfully Signup!',
              text: '',
            }).then((result) => {
              if (result.isConfirmed) {
                if (myObj.membership == 'yes') {
                  window.location = `${myObj.root}membership`
                } else {
                  location.reload();
                }
              }
            })

          } else {
            showAlert(myObj.errors.error, "red");
          }
        },

        error: function (data) {
          hidePageLoading()
          const myObj = JSON.parse(data);
          showAlert(myObj.errors.error, "red");
        },
      });
    }
  });
});


function send_email_otp(){

  var formValues = $('#userSignupForm').serialize();
  var url = $('#email_api').val();

  var mobile = $("#mobile-signup");
  var name = $("#signup-name");
  var email = $("#signup-email");
  

  $.ajax({
    type: "POST",
    url: url,
    data: formValues,
    beforeSend: function () {
      showPageLoading();
    },
    success: function (data) {
      hidePageLoading();
      const myObj = JSON.parse(data);
      if (myObj.success == true) {
        showAlert(
          "OTP Send Successfully! Please check your spam folder.",
          "green"
        );
        $('#email-otp-wrapper').show();
        document.getElementById('signup-email-otp').focus();
        mobile.attr('readonly', true);
        email.attr('readonly', true);
        name.attr('readonly', true);
      } else {
        showAlert(myObj.errors.error, "red");
      }
    },

    error: function (data) {
      hidePageLoading()
      const myObj = JSON.parse(data);
      showAlert(myObj.errors.error, "red");
    },
  });
}

function email_otp_verification(){
  var error = true;
  var signupEmailOtp = $("#signup-email-otp");
  var signupEmailOtpLabel = $(".signup-email-otp-label");
  if (signupEmailOtp.val() == "") {
    ErrorMsg = "OTP field is required";
    addError(signupEmailOtpLabel, signupEmailOtp, ErrorMsg);
    showAlert(ErrorMsg, "red");
    error = true;
    return false;
  } else {
    if (signupEmailOtp.val().length == 6) {
      ErrorMsg = "OTP is not valid";
      addError(signupEmailOtpLabel, signupEmailOtp, ErrorMsg);
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
      removeError(signupEmailOtpLabel, signupEmailOtp);
    }
  }
  return error;
}
