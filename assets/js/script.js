// Animate navbar: slide down on page load and highlight on scroll

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;

    // Initial slide-down animation
    navbar.style.transform = 'translateY(-100%)';
    navbar.style.transition = 'transform 0.6s ease';

    setTimeout(() => {
        navbar.style.transform = 'translateY(0)';
    }, 100);

    // Highlight navbar on scroll
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });
});