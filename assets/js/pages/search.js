$(document).ready(function () {

    $("#searchModalForm").on("submit", function (event) {
        event.preventDefault();
        var formValues1 = $('#searchModalForm').serializeArray();
        var form = $("#searchModalForm");

        var url = form.attr("action");

        var search_chemical = $("#search-chemical");
        var search_chemical_label = $(".search-chemical-label");

        var search_name = $("#search-name");
        var search_name_label = $(".search-name-label");

        var search_mobile = $("#search-mobile");
        var search_mobile_label = $(".search-mobile-label");

        var search_message = $("#search-message");
        var search_message_label = $(".search-message-label");

        var error = false;

        var ErrorMsg = "";

        if (search_name.val() == '') {
            ErrorMsg = "Name Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(search_name_label, search_name, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(search_name_label, search_name);
        }
        if (search_mobile.val() == '') {
            ErrorMsg = "Mobile Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(search_mobile_label, search_mobile, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(search_mobile_label, search_mobile);
        }


        if (search_chemical.val() == '') {
            ErrorMsg = "Chemical Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(search_chemical_label, search_chemical, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(search_chemical_label, search_chemical);
        }

        if (search_message.val() == '') {
            ErrorMsg = "Message Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(search_message_label, search_message, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(search_message_label, search_message);
        }


        var search_photo = $("#search-photo");
        var search_photo_label = $(".search-photo-label");

        var photofiles = search_photo[0].files;
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
                addError(search_photo_label, search_photo, ErrorMsg);
                error = true;
                return false;
            } else {
                if (allowedExtension.indexOf(photofile.type) == -1) {
                ErrorMsg = "file format only jpg and png are currently supported.";
                addError(search_photo_label, search_photo, ErrorMsg);
                error = true;
                return false;
                } else {
                error = false;
                removeError(search_photo_label, search_photo);
                }
            }

            if (photofile.size >= 500000) {
                ErrorMsg = "Size exceeds the maximum limit of 500 KB.";
                addError(search_photo_label, search_photo, ErrorMsg);
                error = true;
                return false;
            } else {
                error = false;
                removeError(search_photo_label, search_photo);
            }
        }

        if (error == false) {

            var photofile11 = photofiles.length != 0 ? photofile : "";

          

            var form_data_11 = new FormData();
      
            form_data_11.append("photo", photofile11);
      
            for (let index = 0; index < formValues1.length; index++) {
              const element = formValues1[index];
              form_data_11.append(element.name, element.value);
            }

            $('#searchModalForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission
            
                // Check if the user is logged in (replace with your actual login check logic)
                var isLoggedIn = <?php echo json_encode(isset($_SESSION['userLogin']) && $_SESSION['userLogin']); ?>;
                            
                if (!isLoggedIn) {
                    // If the user is not logged in, hide the search modal and show the login modal
                    $('#searchModel').modal('hide');  // Hide the search modal
                    setTimeout(function() {
                        // Now show the login modal after a slight delay to ensure proper hiding
                        var signinModal = new bootstrap.Modal(document.getElementById('signinModel'));
                        signinModal.show(); // Show the login modal
                    }, 200); // Delay for 200ms to ensure modal has hidden
                } else {
                    // If logged in, proceed with the form submission (AJAX call or regular form submission)
                    $.ajax({
                        type: "POST",
                        url: url,  // Replace with your actual URL
                        data: new FormData(this),  // Pass form data
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            showPageLoading(); // Show loading animation
                        },
                        success: function (data) {
                            hidePageLoading(); // Hide loading animation
                            const myObj = JSON.parse(data); // Parse the response
                            console.log(myObj);
            
                            if (myObj.success === true) {
                                var text = "Thank you for your Inquiry!";
                                showAlert(text); // Show success alert
                                $('#searchModel').modal('hide'); // Close the modal
                                document.getElementById("searchModalForm").reset(); // Reset the form
            
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thank you for your Inquiry!',
                                    text: '',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Optional: Reload the page or perform other actions after submission
                                        // location.reload();
                                    }
                                });
                            } else {
                                var text = "Internal Server Error!";
                                showAlert(text); // Show error alert
                            }
                        },
                        error: function (data) {
                            hidePageLoading(); // Hide loading animation
                            console.log(data); // Log the error
                            var text = "Internal Server Error!";
                            showAlert(text); // Show error alert
                        }
                    });
                }
            });
            
        }
    });





    $("#shortOnTimeForm").on("submit", function (event) {
        event.preventDefault();
        // var formValues = $(this).serialize();
        var formValues1 = $('#shortOnTimeForm').serializeArray();
        var form = $("#shortOnTimeForm");

        var url = form.attr("action");

        var sort_on_time_name = $("#sort-on-time-name");
        var sort_on_time_name_label = $(".sort-on-time-name-label");

        var sort_on_time_chemical = $("#sort-on-time-chemical");
        var sort_on_time_chemical_label = $(".sort-on-time-chemical-label");

        var sort_on_time_mobile = $("#sort-on-time-mobile");
        var sort_on_time_mobile_label = $(".sort-on-time-mobile-label");

        var sort_on_time_email = $("#sort-on-time-email");
        var sort_on_time_email_label = $(".sort-on-time-email-label");

        var sort_on_time_message = $("#sort-on-time-message");
        var sort_on_time_message_label = $(".sort-on-time-message-label");

        var error = false;

        var ErrorMsg = "";

        if (sort_on_time_name.val() == '') {
            ErrorMsg = "Name Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(sort_on_time_name_label, sort_on_time_name, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(sort_on_time_name_label, sort_on_time_name);
        }

        if (sort_on_time_chemical.val() == '') {
            ErrorMsg = "Chemical Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(sort_on_time_chemical_label, sort_on_time_chemical, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(sort_on_time_chemical_label, sort_on_time_chemical);
        }

        if (sort_on_time_mobile.val() == '') {
            ErrorMsg = "Mobile Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(sort_on_time_mobile_label, sort_on_time_mobile, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(sort_on_time_mobile_label, sort_on_time_mobile);
        }


        if (sort_on_time_message.val() == '') {
            ErrorMsg = "Message Field cannot be blank";
            showAlert(ErrorMsg, "red");
            addError(sort_on_time_message_label, sort_on_time_message, ErrorMsg);
            error = true;
            return false;
        } else {
            error = false;
            removeError(sort_on_time_message_label, sort_on_time_message);
        }

        var search_photo = $("#search-photo-new");
        var search_photo_label = $(".search-photo-new-label");

        var photofiles = search_photo[0].files;
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
                addError(search_photo_label, search_photo, ErrorMsg);
                error = true;
                return false;
            } else {
                if (allowedExtension.indexOf(photofile.type) == -1) {
                ErrorMsg = "file format only jpg and png are currently supported.";
                addError(search_photo_label, search_photo, ErrorMsg);
                error = true;
                return false;
                } else {
                error = false;
                removeError(search_photo_label, search_photo);
                }
            }

            if (photofile.size >= 500000) {
                ErrorMsg = "Size exceeds the maximum limit of 500 KB.";
                addError(search_photo_label, search_photo, ErrorMsg);
                error = true;
                return false;
            } else {
                error = false;
                removeError(search_photo_label, search_photo);
            }
        }

        if (error == false) {

            var photofile11 = photofiles.length != 0 ? photofile : "";

          

            var form_data_11 = new FormData();
      
            form_data_11.append("photo", photofile11);
      
            for (let index = 0; index < formValues1.length; index++) {
              const element = formValues1[index];
              form_data_11.append(element.name, element.value);
            }

            $.ajax({
                type: "POST",
                url: url,
                data: form_data_11,
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
                        // $('#feedbackModel').modal('hide');
                        document.getElementById("shortOnTimeForm").reset();

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

})