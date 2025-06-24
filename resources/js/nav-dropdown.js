document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('hamburger').addEventListener('click', function (){
        let mobileNav = document.getElementById('mobile-nav');

        if(mobileNav.style.display === 'flex'){
            mobileNav.style.display = 'none';
        }else{
            mobileNav.style.display = 'flex';
        }
    })
});
