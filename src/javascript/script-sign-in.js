const btnPassword = document.querySelector('.btn-password-visibility');
const inputPassword = document.getElementById('password');
const visible = document.querySelector('.visibility');
const visibleOff = document.querySelector('.visibility_off');

btnPassword.addEventListener('click', () => {
    if(inputPassword.type === 'password')
    {
        inputPassword.type = "text";
        visibleOff.style.display = "none";
        visible.style.display = "block";
    } else {
        inputPassword.type = "password";
        visibleOff.style.display = "block";
        visible.style.display = "none";
    }
})

const checkbox = document.querySelector('.btn-checkbox-connected');
const checkboxCircle = document.querySelector('.circle-btn-checkbox-connected');

checkbox.addEventListener('click', () => {
    checkbox.classList.toggle('activate');
})

const cardAlert = document.querySelector('.alert-error-sign-in');
const closeBtn = document.querySelector('.btn-close-alert');
cardAlert.classList.add("turn-on");

closeBtn.addEventListener('click', () => {
    cardAlert.classList.remove("turn-on");
})
