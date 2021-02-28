const cardAlert = document.querySelector('.alert-error-sign-up');
const closeBtn = document.querySelector('.btn-close-alert');
cardAlert.classList.add("activate");

closeBtn.addEventListener('click', () => {
    cardAlert.classList.remove("activate");
})

function mask() 
{
    var cpf = document.getElementById('cpf')

    if(cpf.value.length == 3 || cpf.value.length == 7)
    {
        cpf.value += ".";
    }

    if(cpf.value.length == 11)
    {
        cpf.value += "-";
    }
}
