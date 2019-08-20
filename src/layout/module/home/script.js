
let vh = window.innerHeight / 100;

const overviewAnimHeight = 40 * vh;

document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.greeting .post');
    let goDown = document.querySelector('.go-down');
    
    window.addEventListener('scroll', () => {
        let top = window.scrollY;
        let level = Math.min(1, overviewAnimHeight / top);

        posts.forEach((post, index) => {
            post.style.top = -(Math.max((posts.length - index - 1), .5) * (level * (top / 4))) + 'px';
        });

        goDown.style.opacity = 1 - (top / (50 * vh));
    });
});
