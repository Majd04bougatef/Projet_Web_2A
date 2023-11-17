


document.addEventListener("DOMContentLoaded", function() {
   

const navLinks = document.querySelectorAll('.nav-link a');

const contentSection = document.getElementById('content');

navLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
        e.preventDefault();

        const targetId = link.getAttribute('formulaire_rendez-vous');

        if (targetId === 'formulaire_rendez-vous') {
            fetch('formulaire_rendez-vous.html').then((response) => response.text()).then((html) => {
                    contentSection.innerHTML = html;
                });
        } else {
            const allContent = document.querySelectorAll('div > div');
            allContent.forEach((content) => {
                content.style.display = 'none';
            });
        }
    });
});





});





