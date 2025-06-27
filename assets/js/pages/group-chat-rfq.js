$(document).ready(function () {
  getGroupChatRFQ();
  getGroupChathistory();
});

// function sendGroupMessageRFQ() {
//   checkMessageEligibility();
//   var url = "./inc/group-chat/group-chat-add.php";
//   var error = false;

//   var chatInput = $("#chat-input-rfq");
//   var chatInputLabel = $("#chat-input-rfq");
//   var loggedinUserId = $("#loggedinUserId");

//   var ErrorMsg = "";

//   // Check if the chat input is empty
//   if (chatInput.val() == "") {
//     ErrorMsg = "Chat field is required";
//     addError(chatInputLabel, chatInput, ErrorMsg);
//     error = true;
//     return false;
//   } else {
//     error = false;
//     removeError(chatInputLabel, chatInput);
//   }

//   // Check if the user is logged in (id should not be empty or 0)
//   if (loggedinUserId.val() == "" || loggedinUserId.val() == 0) {
//     error = true;
//     return false;
//   }

//   if (error == false) {
//     // Show the modal asking the user to choose their identity
//     $('#identityModal').modal('show');  // Assuming you're using a modal library like Bootstrap
//     console.log("Modal shown");

//     // Disable the send button while waiting for the user to choose identity
//     document.getElementById("send-message").disabled = true;

  
//     $(document).ready(function() {
//       // Attach click event to the identityButton
//       $("#identityButton").on("click", function() {
//           sendMessage('identity'); // Send with identity
//       });
  
//       $("#anonymousButton").on("click", function() {
//           sendMessage('anonymous'); // Send anonymously
//       });
//   });
  
//     // Function to send the message with the selected identity
//     function sendMessage(identityChoice) {
//       console.log("Sending message with identity choice: " + identityChoice);

//       var formValues = {
//         message: chatInput.val(),
//         type: 'buyer',
//         identity: identityChoice === 'identity' ? 1 : 0 // Set user ID or 0 for anonymous
//       };
//          console.log(formValues);

//       $.ajax({
//         type: "POST",
//         url: url,
//         data: formValues,
//         success: function (data) {
//           const myObj = JSON.parse(data);
//           console.log("AJAX response:", myObj);

//           if (myObj.success == true) {
//             chatInput.val("");
//             $(".chat-body-rfq").append(myObj.data);
//             setChatScrollerRFQ();
//           } else {
//             var errorMsg = myObj.errors?.error || "Something went wrong";
//             $(".server-error").css("display", "block");
//             $("#error-message").html(errorMsg);
//             showAlert(errorMsg, "red");
//           }
//         },
//         error: function (data) {
//           const myObj = JSON.parse(data);
//           $(".server-error").show();
//           $("#error-message").html(myObj.errors?.error || "Something went wrong");
//           showAlert("Something went wrong", "red");
//         },
//       });

//       // Hide modal after sending the message
//       $('#identityModal').modal('hide');
//       // Enable the send button again
//       document.getElementById("send-message").disabled = false;
//     }
//   }
// }

// Step 1: Start the process when the user clicks "send message"
// Function to start the process
function startProcess() {
  // Get the value from the chat input field
  var message = $("#chat-input-rfq").val();

  // Check if message is empty
  if (message.trim() === "") {
      alert("Please type a message.");
      return;
  }

  // Show the Buy/Sell Choice Modal
  $('#buySellModal').modal('show');
}

// Step 2: Handle Buy/Sell choice
$(document).ready(function () {
  // When the "Buy" button is clicked
  $("#buyButton").on("click", function () {
      const message = $("#chat-input-rfq").val();
      $("#buyDetails").val(message);  // Set the message as the buy details
      $("#chat-input-rfq").val('');

      // Hide the Buy/Sell modal and show the Buy Input modal
      $('#buySellModal').modal('hide');
      $('#buyInputModal').modal('show');
  });

  // When the "Sell" button is clicked
  $("#sellButton").on("click", function () {
      const message = $("#chat-input-rfq").val();
      $("#sellDetails").val(message);  // Set the message as the sell details
      $("#chat-input-rfq").val('');

      // Hide the Buy/Sell modal and show the Sell Input modal
      $('#buySellModal').modal('hide');
      $('#sellInputModal').modal('show');
  });

  // Step 3: Buy Input Page Next Button
  $("#nextBuy").on("click", function () {
      const buyDetails = $("#buyDetails").val();
      if (buyDetails === "") {
          alert("Please enter details for the product you want to buy.");
          return;
      }
      $('#buyInputModal').modal('hide');
      showIdentityModal("buy");
  });

  // Step 4: Sell Input Page Next Button
  $("#nextSell").on("click", function () {
      const sellDetails = $("#sellDetails").val();
      if (sellDetails === "") {
          alert("Please enter details for the product you want to sell.");
          return;
      }
      $('#sellInputModal').modal('hide');
      showIdentityModal("sell");
  });
});

// Show Identity Modal for buy or sell
function showIdentityModal(type) {
  $('#identityModal').modal('show');

  // Handle identity choice for sending the message
  $(document).ready(function () {
      $("#identityButton").on("click", function () {
          sendMessage(type, 'identity');
      });

      $("#anonymousButton").on("click", function () {
          sendMessage(type, 'anonymous');
      });

      $("#emailOnlyButton").on("click", function () {
          sendMessage(type, 'email');
          
      });
  });
}

// function sendMessages(type, identityChoice) {
//   const messageDetails = type === 'buy' ? $("#buyDetails").val() : $("#sellDetails").val();
//   if (identityChoice === 'email') {
//     // Send to all suppliers
//     $.ajax({
//         type: "POST",
//         url: "./inc/group-chat/group-chat-send-email.php",
//         data: {
//             type: type,
//             message: messageDetails
//         },
//         success: function (response) {
//             alert("Emails sent to all suppliers.");
//             $('#identityModal').modal('hide');
//         },
//         error: function () {
//             alert("Failed to send emails.");
//         }
//     });
//     return; // Exit function early since we don't need to show message in chat
// } 
// }
// Step 6: Send the message based on identity choice
// function sendMessage(type, identityChoice) {
//   const messageDetails = type === 'buy' ? $("#buyDetails").val() : $("#sellDetails").val();
//   if (identityChoice === 'email') {
//     // Send to all suppliers
//     $.ajax({
//         type: "POST",
//         url: "./inc/group-chat/group-chat-send-email.php",
//         data: {
//             type: i,
//             message: messageDetails
//         },
//         success: function (response) {
//             alert("Emails sent to all suppliers.");
//             $('#identityModal').modal('hide');
//         },
//         error: function () {
//             alert("Failed to send emails.");
//         }
//     });
//     return; // Exit function early since we don't need to show message in chat
// } 

  

//   if (identityChoice === 'identity' || identityChoice === 'anonymous') {
//     var formValues = {
//       message: messageDetails,
//       type: type,  // 'buy' or 'sell'
//       identity: identityChoice === 'identity' ? 1 : 0,  // 1 for identity, 0 for anonymous
//       action: identityChoice,  // Can be 'identity', 'anonymous', or 'email'
//       buyDetails: $("#buyDetails").val(),  // Value from the buy input field
//       sellDetails: $("#sellDetails").val()  // Value from the sell input field
//   };
//     $.ajax({
//         type: "POST",
//         url: "./inc/group-chat/group-chat-add.php",
//         data: formValues,
//         success: function (data) {
//             const myObj = JSON.parse(data);
//             console.log("AJAX response:", myObj);

//             if (myObj.success) {
//                 const newMessage = `
//                     <div class="chat-message ${identityChoice === 'identity' ? 'show-identity' : 'anonymous'}">
//                         <div class="message">
//                             <p><strong>${type === 'buy' ? 'Want to Buy' : 'Want to Sell'}</strong></p>
//                             <p>${messageDetails}</p>
//                         </div>
//                     </div>
//                 `;

//                 // $(".chat-body-rfq").append(newMessage);
//                 // setChatScrollerRFQ();

//                 alert("Message sent successfully!");
//             } else {
//                 alert("Something went wrong. Please try again.");
//             }
//         },
//         error: function () {
//             alert("Error! Please try again.");
//         }
//     });
// } else if (identityChoice === 'email') {
//     // Optionally: Show a loader or message that email is being sent
//     console.log("Sending email to all suppliers...");
// }

//   // Hide the modal and reset fields
//   $('#identityModal').modal('hide');
//   if (type === 'buy') {
//       $("#buyDetails").val("");
//   } else {
//       $("#sellDetails").val("");
//   }
// }


function sendMessage(type, identityChoice) {
  const messageDetails = type === 'buy' ? $("#buyDetails").val() : $("#sellDetails").val();

  if (identityChoice === 'identity' || identityChoice === 'anonymous' || identityChoice ==='email' ) {
    var formValues = {
      message: messageDetails,
      type: type,
      identity: identityChoice === 'identity' ? 1 : 0,
      action: identityChoice,
      buyDetails: $("#buyDetails").val(),
      sellDetails: $("#sellDetails").val()
    };

    $.ajax({
      type: "POST",
      url: "./inc/group-chat/group-chat-add.php",
      data: formValues,
      success: function (data) {
        const myObj = JSON.parse(data);
        console.log("AJAX response:", myObj);

        if (myObj.success) {
          const newMessage = `
            <div class="chat-message ${identityChoice === 'identity' ? 'show-identity' : 'anonymous'}">
              <div class="message">
                <p><strong>${type === 'buy' ? 'Want to Buy' : 'Want to Sell'}</strong></p>
                <p>${messageDetails}</p>
              </div>
            </div>
          `;

          // $(".chat-body-rfq").append(newMessage);
          // setChatScrollerRFQ();

          Swal.fire({
            icon: 'success',
            title: 'Message Sent',
            text: 'Your message has been sent successfully!'
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong. Please try again.'
          });
        }
      },
      error: function () {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'An error occurred. Please try again later.'
        });
      }
    });
  }

  // Hide the modal and reset fields
  $('#identityModal').modal('hide');
  if (type === 'buy') {
    $("#buyDetails").val("");
  } else {
    $("#sellDetails").val("");
  }
}


// Function to scroll the chat window to the bottom
function setChatScrollerRFQ() {
  const chatBody = $(".chat-body-rfq");
  chatBody.scrollTop(chatBody[0].scrollHeight);
}

// Close buttons handling
$('.close').on('click', function() {
  $(this).closest('.modal').modal('hide');
});







function getGroupChathistory() {
  $.ajax({
    type: "GET",
    url: "./inc/group-chat/group-chat-history.php",
    data: {'type':''},
    success: function (result) {
      setDatahistory(result);
      setChatScrollerhistory();
    },
  });
}


function setDatahistory(result) {
  $(".chat-body-history").html(result);
}

function setChatScrollerhistory() {
  /*$(".chat-body").animate(
    {
      scrollTop: $("html, body").get(0).scrollHeight,
    },
    3000
  );*/

  setTimeout(() => {
    var nestedElement = document.getElementsByClassName("chat-body-history")[0]
    
    nestedElement.scrollTo(0, nestedElement.scrollHeight);
  }, 3000);



  //console.log($(".chat-body").scrollHeight)
}



function getGroupChatRFQ() {
  $.ajax({
    type: "GET",
    url: "./inc/group-chat/group-chat-show.php",
    data: {'type':''},
    success: function (result) {
      setDataRFQ(result);
      setChatScrollerRFQ();
    },
  });
}

function setDataRFQ(result) {
  $(".chat-body-rfq").html(result);
}

// function setChatScrollerRFQ() {
//   /*$(".chat-body").animate(
//     {
//       scrollTop: $("html, body").get(0).scrollHeight,
//     },
//     3000
//   );*/

//   setTimeout(() => {
//     var nestedElement = document.getElementsByClassName("chat-body-rfq")[0]
    
//     nestedElement.scrollTo(0, nestedElement.scrollHeight);
//   }, 3000);



//   //console.log($(".chat-body").scrollHeight)
// }
function setChatScrollerRFQ() {
  const nestedElement = document.querySelector(".chat-body-rfq");
  if (nestedElement) {
    // FORCE it to stay at the top
    nestedElement.scrollTop = 0;
  }
}


var chatGroupInput = document.getElementById("chat-input-rfq");

// Execute a function when the user presses a key on the keyboard
chatGroupInput.addEventListener("keypress", function (event) {
  // If the user presses the "Enter" key on the keyboard
  if (event.key === "Enter") {
    event.preventDefault(); // Prevent form submission or default behavior
    startProcess();         // Use your updated flow
  }
});





