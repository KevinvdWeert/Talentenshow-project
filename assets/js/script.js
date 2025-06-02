// Lazy loading for sections
document.addEventListener("DOMContentLoaded", function() {
    let lazySections = [].slice.call(document.querySelectorAll("section.lazy"));

    if ("IntersectionObserver" in window) {
        let sectionObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    sectionObserver.unobserve(entry.target);
                }
            });
        });

        lazySections.forEach(function(section) {
            sectionObserver.observe(section);
        });
    } else {
        // Fallback: show all sections immediately
        lazySections.forEach(function(section) {
            section.classList.add("visible");
        });
    }
});

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