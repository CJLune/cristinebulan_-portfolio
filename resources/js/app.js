import 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // This code handles the mobile navigation, closing it after a link is clicked.
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const navToggler = document.querySelector('.navbar-toggler');
    const navCollapse = document.querySelector('.navbar-collapse');

    if (navCollapse) { // Ensure the collapse element exists on the page
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                // Check if the navbar is currently open in a mobile view
                if (navToggler && navToggler.offsetParent !== null && navCollapse.classList.contains('show')) {
                    const collapse = bootstrap.Collapse.getInstance(navCollapse) || new bootstrap.Collapse(navCollapse);
                    collapse.hide();
                }
            });
        });
    }
});

window.addEventListener('load', () => {
  const loader = document.querySelector('.loader-container');
  loader.classList.add('hide'); // Add a class to hide the loader
});
