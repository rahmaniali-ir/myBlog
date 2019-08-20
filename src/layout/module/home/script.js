
const overviewAnimHeight = 300;

document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', () => {
        let top = window.scrollY;
        let level = Math.min(1, overviewAnimHeight / top);

        posts.forEach((post, index) => {
            post.style.top = -(Math.max((posts.length - index - 1), .5) * (level * (top / 4))) + 'px';
        });
    });
});
