
document.addEventListener('DOMContentLoaded', () => {
    let posts = document.querySelectorAll('.overview .post');
    
    window.addEventListener('scroll', e => {
        console.log(e);
        // posts.forEach(post => {
        //     post.style.top = -(e.scrollTop / 2) + 'px';
        // });
    });
});
