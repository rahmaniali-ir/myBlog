
document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', e => {
        console.log(window.screenTop);
        posts.forEach(post => {
            post.style.top = -(window.screenTop / 2) + 'px';
        });
    });
});
