
let images = document.querySelectorAll('img');

images.forEach(image => {
    image.addEventListener('load', () => {
        image.classList.add('loaded');
    });

    if(image.complete) {
        image.classList.add('loaded');
    }
});

document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');

    window.addEventListener('scroll', e => {
        posts.forEach(post => {
            post.style.top = -(e.scrollTop / 2) + 'px';
        });
    });
});
