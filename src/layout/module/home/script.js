
const overviewAnimHeight = 200;

document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', e => {
        let top = window.scrollY;

        if(top > overviewAnimHeight) {
            posts.forEach((post, index) => {
                post.style.top = (-(top / 2) - ((top / 2) * index)) + 'px';
            });
        }
    });
});
