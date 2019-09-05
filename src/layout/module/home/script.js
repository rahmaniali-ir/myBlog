
let vh = window.innerHeight / 100;

document.addEventListener('DOMContentLoaded', () => {
    let goDown = document.querySelector('.go-down');
    
    window.addEventListener('scroll', () => {
        goDown.style.opacity = 1 - (window.scrollY / (50 * vh));
    });
});
