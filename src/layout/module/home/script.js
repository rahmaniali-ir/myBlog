
const overviewAnimHeight = 200;

document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', e => {
        let top = window.scrollY;
        let newPos = 0;

        posts.forEach((post, index) => {
            if(top > overviewAnimHeight) {
                newPos =  -((index * 1.5) + top);
            }

            post.style.top = newPos + 'px';
        });
    });
});
