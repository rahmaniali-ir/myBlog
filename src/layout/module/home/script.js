
const overviewAnimHeight = 200;

document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', e => {
        let top = window.scrollY;

        posts.forEach((post, index) => {
            post.style.top = -((index * ((top / 2) / (posts.length * 2))) + (top / 2)) + 'px';
        });
    });
});
