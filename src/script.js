
let images = document.querySelectorAll('img');

images.forEach(image => {
    image.addEventListener('load', () => {
        image.classList.add('loaded');
    });

    if(image.complete) {
        image.classList.add('loaded');
    }
});

// document.addEventListener('DOMContentLoaded', () => {
    
// });
