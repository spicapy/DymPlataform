const image1 = document.getElementById('card-block-1');
const image2 = document.getElementById('card-block-2');
const image3 = document.getElementById('card-block-3');

window.addEventListener("scroll", () => {
    if(window.pageYOffset > 600) {
        image1.classList.add("activate");
    }

    if(window.pageYOffset > 630) {
        image2.classList.add("activate");
    }

    if(window.pageYOffset > 660) {
        image3.classList.add("activate");
    }
})