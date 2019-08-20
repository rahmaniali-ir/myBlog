
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
