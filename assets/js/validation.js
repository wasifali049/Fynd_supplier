function isValidNumber(number) {
  // Check if the mobile number is only digits
  if (!/^[0-9]+$/.test(number)) {
    return false;
  }

  // Check if the mobile number is between 8 and 12 digits long
  if (number.length < 8 || number.length > 12) {
    return false;
  }

  // The mobile number is valid
  return true;
}

function isValidName(name) {
  if (/^[A-Za-z\s]+$/.test(name)) {
    return true;
  } else {
    return false;
  }
}

function isValidEmail(email) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    return true;
  } else {
    return false;
  }
}

function addError(label, tag, error = "") {
  label.css("color", "red");
  tag.css("border-color", "red");
  tag.focus();

  if (tag.next(".showErr").length) {
    tag.next(".showErr").html(error);
  } else {
    tag.parent().parent().find(".showErr").html(error);
  }
}

function removeError(label, tag) {
  label.css("color", "#6e707e");
  tag.css("border-color", "#d1d3e2");
  if (tag.next(".showErr").length) {
    tag.next(".showErr").html("");
  } else {
    tag.parent().parent().find(".showErr").html("");
  }
}
