const btnDeveloper = document.querySelectorAll('.btn-work-developer');
const btnClose = document.querySelector('.btn-close');
const themeBlock = document.querySelector('.session-theme-block');
const overlay = document.querySelector('.overlay-block');

for (let i = 0; i < btnDeveloper.length; i++) {
    btnDeveloper[i].addEventListener("click", () => {
        overlay.classList.add("activate");
        themeBlock.classList.add("filter-blur");
    })
}

btnClose.addEventListener("click", () => {
    overlay.classList.remove("activate");
    themeBlock.classList.remove("filter-blur");
})

overlay.addEventListener("click", () => {
    overlay.classList.remove("activate");
    themeBlock.classList.remove("filter-blur");
})