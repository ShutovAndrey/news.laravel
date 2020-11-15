"use strict";
const buttonItems = document.querySelectorAll('.switch');
for (let button of buttonItems) {
    console.log(button)
    button.addEventListener('click', (evt) => {
        evt.target.parentElement.parentNode.querySelector('.cant-see').classList.toggle('invisible');
        evt.target.parentElement.parentNode.querySelector('.can-see').classList.toggle('invisible');
    });
}
