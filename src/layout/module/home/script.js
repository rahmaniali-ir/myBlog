
document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', e => {
        console.log(window.scrollY);
        posts.forEach(post => {
            post.style.top = -(window.scrollY / 2) + 'px';
        });
    });
});
