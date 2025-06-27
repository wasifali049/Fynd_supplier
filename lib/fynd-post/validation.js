function isValidNumber(number) {
    var mob = /^[1-9]{1}[0-9]{9}$/;
    if (mob.test(number) == false) {
        return false;
    } else {

        return true;
    }
}

function isValidName(name) {
    if (/^[A-Za-z\s]+$/.test(name)) {
        return true
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

function addError(tag) {
    //tag.css("border-color", "red !important");
    tag.css({
        'cssText': 'border-color: red !important'
    });

    //tag.style.setProperty('border-color', 'red', 'important');
    tag.focus();
}

function removeError(tag) {
    //tag.css("border-color", "#c6b378 !important");
    tag.css({
        'cssText': 'border-color: #c6b378 !important'
    });

}



















let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);


const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};




const isRequired = value => value === '' ? false : true;

const isBetween = (length, min, max) => length < min || length > max ? false : true;

const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};


const showError = (input, errorMessage) => {
    const formField = input.parentElement;
    const error = formField.querySelector('.errorM');
    error.textContent = errorMessage;
    input.style.borderBottom = "1px solid red";
};


const showSuccess = (input) => {
    const formField = input.parentElement;
    const error = formField.querySelector('.errorM');
    error.textContent = '';
    input.style.borderBottom = "1px solid green";
}


const checkName = () => {
    let valid = false;
    const name1 = name.value.trim();
    if (!isRequired(name1)) {
        showError(name, 'Name cannot be blank.');
    } else if (!isValidName(name1)) {
        showError(name, 'Name is not valid.')
    } else {
        showSuccess(name);
        valid = true;
    }
    return valid;
}

const checkEmail = () => {
    let valid = false;
    const email1 = email.value.trim();
    if (!isRequired(email1)) {
        showError(email, 'Email cannot be blank.');
    } else if (!isEmailValid(email1)) {
        showError(email, 'Email is not valid.')
    } else {
        showSuccess(email);
        valid = true;
    }
    return valid;
}

const checkMobile = () => {
    let valid = false;
    const mobile1 = mobile.value.trim();
    if (!isRequired(mobile1)) {
        showError(mobile, 'Mobile cannot be blank.');
    } else if (!isValidNumber(mobile1)) {
        showError(mobile, 'Mobile Number is not valid.')
    } else {
        showSuccess(mobile);
        valid = true;
    }
    return valid;
}

const checkCaptcha = () => {
    let valid = false;
    const captcha1 = captcha.value.trim();
    if (!isRequired(captcha1)) {
        showError(captcha, 'Captcha cannot be blank.');
    } else {
        showSuccess(captcha);
        valid = true;
    }
    return valid;
}

const checkMessage = () => {
    let valid = false;
    const message1 = message.value.trim();
    if (!isRequired(message1)) {
        showError(message, 'Message cannot be blank.');
    } else {
        showSuccess(message);
        valid = true;
    }
    return valid;
}


const checkApplyFor = () => {
    let valid = false;
    const apply_for1 = apply_for.value.trim();
    if (!isRequired(apply_for1)) {
        showError(apply_for, 'Apply For cannot be blank.');
    } else {
        showSuccess(apply_for);
        valid = true;
    }
    return valid;
}

const checkFile = () => {
    let valid = false;
    const file1 = file.value.trim();
    if (!isRequired(file1)) {
        //showError(file, 'Message cannot be blank.');
        alert('Attachment File cannot be blank')
    } else {
        //showSuccess(file);
        valid = true;
    }
    return valid;
}