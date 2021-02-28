const btnClose = document.querySelector('.close-side-bar');
const app = document.querySelector('.application-main');

btnClose.addEventListener('click', () => {
    app.classList.toggle('activate');
})

console.log('testando conexão');

const btnAlter = document.querySelector('.alter-user-settings')
const overlayAlter = document.querySelector('.overlay-alter')
const btnCancel = document.querySelector('.btn-cancel')

btnAlter.addEventListener('click', () => {
    overlayAlter.classList.add('overlay-activate')
    console.log('fooii');
})

btnCancel.addEventListener('click', () => {
    overlayAlter.classList.remove('overlay-activate');
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

const inputFile = document.getElementById('avatar-file');
const avatar = document.querySelector('.avatar')
const btnSubmit = document.getElementById('submit-avatar');

inputFile.addEventListener("change", function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(){
            const result = reader.result;
            avatar.src = result;
            setTimeout(() => {
                btnSubmit.click();
            }, 1500)
        }
        reader.readAsDataURL(file);
    }
});
