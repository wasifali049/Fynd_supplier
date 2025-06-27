$(document).ready(function () {
  $("#blogCommentForm").on("submit", function (event) {
    event.preventDefault();
    var formValues = $(this).serialize();
    var form = $("#blogCommentForm");

    var url = form.attr("action");

    var comment = $("#comment");
    var comment_label = $(".comment_label");

    var error = false;

    var ErrorMsg = "";
    if (comment.val() == 0) {
      ErrorMsg = "Comment Field cannot be blank";
      showAlert(ErrorMsg, "red");
      error = true;
      return false;
    } else {
      error = false;
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
          console.log(myObj);
          if (myObj.success == true) {
            var text = "Comments Added successfully!";
            showAlert(text);


            Swal.fire({
              icon: 'success',
              title: 'Comments Added successfully!',
              text: '',
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })


            // setTimeout(() => {
            //   location.reload();
            // }, 1000);
          } else {
            var text = "Internal Server Error!";
            showAlert(text);
          }
        },
        error: function (data) {
          hidePageLoading()
          console.log(data);
          var text = "Internal Server Error!";
          showAlert(text);
        },
      });
    }
  });
});
