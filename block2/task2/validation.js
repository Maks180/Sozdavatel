let form = document.querySelector('.js-form'),
    formInputs = document.querySelectorAll('.js-input'),
    inputEmail = document.querySelector('.js-input-email'),
    inputPhone = document.querySelector('.js-input-phone');
  

function validateEmail(email) {
    let regexp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regexp.test(String(email).toLowerCase());
}    

function validatePhone(phone) {
    let regexp = /^[0-9\s]*$/;
    return regexp.test(String(phone));
}


form.onsubmit = function () {
   let emptyInputs = Array.from(formInputs).filter(input => input.value === ''),
        emailValue = inputEmail.value,
        phoneValue = inputPhone.value;
     
    formInputs.forEach( function (input){
        if (input.value === '') {
            input.classList.add('error'); 
        } 
        else {
            input.classList.remove('error');
        }
    });

    if (emptyInputs.length !== 0) {
        console.log('input not filled');
        return false;
    }
    
    if (!validateEmail(emailValue)) {
        console.log('email not valid');
        inputEmail.classList.add('error');
        return false;
    } 
    else {
        inputEmail.classList.remove('error');
    }
    console.log(phoneValue);

    if (!validatePhone(phoneValue)) {
        console.log('phone not valid');
        inputPhone.classList.add('error');
        return false;
    } 
    else {
        inputPhone.classList.remove('error');
    }
}