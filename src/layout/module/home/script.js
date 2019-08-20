
const overviewAnimHeight = 200;

document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', e => {
        let top = window.scrollY;

        posts.forEach((post, index) => {
            post.style.top = -((index * 1.5) + top);
        });
    });
});
