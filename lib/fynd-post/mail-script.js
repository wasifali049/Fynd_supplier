let name = id("name"),
  email = id("email"),
  mobile = id("mobile"),
  message = id("message"),
  form = id("second_form"),

  errorMsg = classes("error");

form.addEventListener('input', debounce(function (e) {
  switch (e.target.id) {
    case 'name':
      checkName();
      break;
    case 'email':
      checkEmail();
      break;
    case 'mobile':
      checkMobile();
      break;
    case 'message':
      checkMessage();
      break;
  }
}));

form.addEventListener("submit", (e) => {

  e.preventDefault();


  let isNameValid = checkName(),
    isEmailValid = checkEmail(),
    isMobileValid = checkMobile(),
    isMessageValid = checkMessage();

  let isFormValid = isNameValid &&
    isEmailValid &&
    isMobileValid &&
    isMessageValid;


  if (isFormValid) {

    var status = document.getElementsByClassName("contact__msg1")[0];

    var data = new FormData(form);

    status.innerHTML = "Please wait while we are processing your request..."
    status.style.display = "block"
    status.classList.remove("alert-danger")
    status.classList.add("alert-success")

    fetch(form.getAttribute('action'), {
      method: form.getAttribute('method'),
      body: data,
      headers: {
        'Accept': 'application/json'
      }
    }).then(response => {
      if (response.ok) {

        response.json().then(data => {
          if (data.status === false) {
            status.innerHTML = data.message;
            status.style.display = "block";
            status.classList.remove("alert-success");
            status.classList.add("alert-danger");

          } else {
            // status.innerHTML = "Your Form Submitted successfully!";
            // status.style.display = "block";
            // status.classList.remove("alert-danger1");
            // status.classList.add("alert-success1");
            form.reset()

            Swal.fire({
              icon: 'success',
              title: 'Thank You!',
              text: 'Mail sent successfully.',
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })

          }
        })


      } else {
        response.json().then(data => {
          if (Object.hasOwn(data, 'errors')) {
            status.innerHTML = data["errors"].map(error => error["message"]).join(", ")

          } else {
            status.innerHTML = "Oops! There was a problem submitting your form"

            Swal.fire({
              icon: 'error',
              title: 'Oops! There was a problem submitting your form',
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })

          }
        })
      }
    }).catch(error => {
      status.innerHTML = "Oops! There was a problem submitting your form"
      Swal.fire({
        icon: 'error',
        title: 'Oops! There was a problem submitting your form',
      }).then((result) => {
        if (result.isConfirmed) {
          location.reload();
        }
      })

    });

  }

});