$(document).ready(function () {
  getGroupChatStock();
});

function sendGroupMessageStock() {
  checkMessageEligibility();
  var url = "./inc/group-chat/group-chat-add.php";
  var error = false;

  var chatInputStock = $("#chat-input-stock");
  var chatInputStockLabel = $("#chat-input-stock");
  var loggedinUserId = $("#loggedinUserId");

  var ErrorMsg = "";

  if (chatInputStock.val() == "") {
    ErrorMsg = "Chat field is required";
    addError(chatInputStockLabel, chatInputStock, ErrorMsg);
    error = true;
    return false;
  } else {
    error = false;
    removeError(chatInputStockLabel, chatInputStock);
  }

  if (loggedinUserId.val() == "" || loggedinUserId.val() == 0) {
    error = true;
    return false;
  }

  if (error == false) {
    var formValuesStock = { message: chatInputStock.val(),type:'supplier' };
    $.ajax({
      type: "POST",
      url: url,
      data: formValuesStock,
      success: function (data) {
        const myObj = JSON.parse(data);

        if (myObj.success == true) {
          chatInputStock.val("");
          $(".chat-body-stock").append(myObj.data);
          setChatScrollerStock();
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


function getGroupChatStock() {
  $.ajax({
    type: "GET",
    url: "./inc/group-chat/group-chat-show.php",
    data: {'type':'stock'},
    success: function (result) {
      setDataStock(result);
      setChatScrollerStock();
    },
  });
}

function setDataStock(result) {
  $(".chat-body-stock").html(result);
}

function setChatScrollerStock() {
  /*$(".chat-body").animate(
    {
      scrollTop: $("html, body").get(0).scrollHeight,
    },
    3000
  );*/

  setTimeout(() => {
    var nestedElement = document.getElementsByClassName("chat-body-stock")[0]
    
    nestedElement.scrollTo(0, nestedElement.scrollHeight);
  }, 3000);



  //console.log($(".chat-body").scrollHeight)
}


var chatGroupInput = document.getElementById("chat-input-stock")

// Execute a function when the user presses a key on the keyboard
chatGroupInput.addEventListener("keypress", function (event) {
  // If the user presses the "Enter" key on the keyboard
  if (event.key === "Enter") {
    sendGroupMessageStock()
  }
});




