
let images = document.querySelectorAll('img');

images.forEach(image => {
    image.addEventListener('load', () => {
        image.classList.add('loaded');
    });

    if(image.complete) {
        image.classList.add('loaded');
    }
});
console.log('test');
document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', e => {
        console.log(e.scrollTop);
        posts.forEach(post => {
            console.log(e.scrollTop);
            post.style.top = -(e.scrollTop / 2) + 'px';
        });
    });
});
