$(document).ready(function () {
  $("#supplierEditForm").on("submit", function (event) {
    event.preventDefault();

    var formValues1 = $(this).serializeArray();

    //var formValues = $(this).serialize();
    var form = $("#supplierEditForm");
    var url = form.attr("action");

    var name = $("#name");
    var name_label = $(".name_label");
    var mobile = $("#mobile");
    var mobile_label = $(".mobile_label");
    var email = $("#email");
    var email_label = $(".email_label");
    var company_name = $("#company_name");
    var company_name_label = $(".company_name_label");
    var country = $("#country");
    var country_label = $(".country_label");
    var chemical = $("#chemical");
    var chemical_label = $(".chemical_label");
    var website = $("#website");
    var website_label = $(".website_label");
    var about = $("#about");
    var about_label = $(".about_label");

    var error = false;
    /*
    var ErrorMsg = "";
    if (name.val() == 0) {
      ErrorMsg = "Name Field cannot be blank";
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
    }
    if (account_mobile.val() == 0) {
      ErrorMsg = "Mobile Field cannot be blank";
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
    }
    if (account_email.val() == 0) {
      ErrorMsg = "Email Field cannot be blank";
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
    }

    */

    var photo = $("#photo");
    var photo_label = $(".photo_label");

    var photofiles = photo[0].files;
    let allowedExtension = [
      "image/jpeg",
      "image/jpg",
      "image/png",
      "application/pdf",
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
            var text = "Profile Updated successfully!";
            showAlert(text);
            setTimeout(() => {
              location.reload();
            }, 2000);


            Swal.fire({
              icon: 'success',
              title: 'Profile Updated successfully!',
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

  $("#buyerEditForm").on("submit", function (event) {
    event.preventDefault();
    var formValues = $(this).serializeArray();
    //var formValues = $(this).serializeArray();
    var form = $("#buyerEditForm");
    var url = form.attr("action");

    var name = $("#name");
    var name_label = $(".name_label");
    var mobile = $("#mobile");
    var mobile_label = $(".mobile_label");
    var email = $("#email");
    var email_label = $(".email_label");
    var company_name = $("#company_name");
    var company_name_label = $(".company_name_label");
    var country = $("#country");
    var country_label = $(".country_label");
    var chemical = $("#chemical");
    var chemical_label = $(".chemical_label");
    var website = $("#website");
    var website_label = $(".website_label");
    var about = $("#about");
    var about_label = $(".about_label");

    var error = false;
    var ErrorMsg = "";

    /*

    if (account_name.val() == 0) {
      ErrorMsg = "Name Field cannot be blank";
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
    }
    if (account_mobile.val() == 0) {
      ErrorMsg = "Mobile Field cannot be blank";
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
    }
    if (account_email.val() == 0) {
      ErrorMsg = "Email Field cannot be blank";
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
    }
    */

    var photo = $("#photo");
    var photo_label = $(".photo_label");

    var photofiles = photo[0].files;
    let allowedExtension = [
      "image/jpeg",
      "image/jpg",
      "image/png",
      "application/pdf",
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

      var form_data = new FormData();

      form_data.append("photo", photofile1);

      for (let index = 0; index < formValues.length; index++) {
        const element = formValues[index];
        form_data.append(element.name, element.value);
      }

      $.ajax({
        type: "POST",
        url: url,
        data: form_data,
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
            var text = "Profile Updated successfully!";
            showAlert(text);
            setTimeout(() => {
              location.reload();
            }, 2000);

            Swal.fire({
              icon: 'success',
              title: 'Profile Updated successfully!',
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
});
