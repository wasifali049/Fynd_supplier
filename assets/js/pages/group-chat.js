$(document).ready(function () {
  getGroupChat();
});

function sendGroupMessage() {
  checkMessageEligibility();
  var url = "./inc/group-chat/group-chat-add.php";
  var error = false;

  var chatInput = $("#chat-input");
  var chatInputLabel = $("#chat-input");
  var loggedinUserId = $("#loggedinUserId");

  var ErrorMsg = "";

  if (chatInput.val() == "") {
    ErrorMsg = "Chat field is required";
    addError(chatInputLabel, chatInput, ErrorMsg);
    error = true;
    return false;
  } else {
    error = false;
    removeError(chatInputLabel, chatInput);
  }

  if (loggedinUserId.val() == "" || loggedinUserId.val() == 0) {
    error = true;
    return false;
  }

  if (error == false) {
    var formValues = { message: chatInput.val() };
    $.ajax({
      type: "POST",
      url: url,
      data: formValues,
      success: function (data) {
        const myObj = JSON.parse(data);

        if (myObj.success == true) {
          chatInput.val("");
          $(".chat-body").append(myObj.data);
          setChatScroller();
        } else {
          errorMsg = myObj.errors?.error;
          $(".server-error").css("display", "block");
          $("#error-message").html(errorMsg);
          showAlert(errorMsg, "red");
        }
      },
      error: function (data) {
        const myObj = JSON.parse(data);
        $(".server-error").show();
        $("#error-message").html(myObj.errors?.error);
        showAlert("Something went wrong", "red");
      },
    });
  }
}


function getGroupChat() {
  $.ajax({
    type: "POST",
    url: "./inc/group-chat/group-chat-show.php",
    success: function (result) {
      setData(result);
      setChatScroller();
    },
  });
}

function setData(result) {
  $(".chat-body").html(result);
}

function setChatScroller() {
  $(".chat-body").animate(
    {
      scrollTop: $("html, body").get(0).scrollHeight,
    },
    3000
  );
}


var chatGroupInput = document.getElementById("chat-input")

// Execute a function when the user presses a key on the keyboard
chatGroupInput.addEventListener("keypress", function (event) {
  // If the user presses the "Enter" key on the keyboard
  if (event.key === "Enter") {
    sendGroupMessage()
  }
});




