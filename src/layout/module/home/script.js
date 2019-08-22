
let vh = window.innerHeight / 100;

const overviewAnimHeight = 40 * vh;

document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.greeting .post');
    let goDown = document.querySelector('.go-down');
    
    window.addEventListener('scroll', () => {
        let top = window.scrollY;

        posts.forEach((post, index) => {
            post.style.top = -(top / (2 * vh) * (posts.length - (index + 1))) + 'px';
        });

        goDown.style.opacity = 1 - (top / (50 * vh));
    });
});
