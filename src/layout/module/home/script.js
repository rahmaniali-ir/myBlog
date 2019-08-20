
const overviewAnimHeight = 200;

document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', e => {
        let top = window.scrollY;
        let level = overviewAnimHeight / posts.length;
        let newPos = 0;

        posts.forEach((post, index) => {
            if(top > overviewAnimHeight) {
                newPos = -(top / 2) - ((top / 2) * index);
            }

            post.style.top = newPos + 'px';
        });
    });
});
