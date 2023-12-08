document.addEventListener("DOMContentLoaded", function() {
    const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")){
        modeText.innerHTML="Light Mode";
    }
    else{
        modeText.innerHTML="Dark Mode";
    }
});







const navLinks = document.querySelectorAll('.nav-link a');

// Sélectionnez la section de contenu
const contentSection = document.getElementById('content');

// Écoutez les clics sur les liens
navLinks.forEach((link) => {
link.addEventListener('click', (e) => {
    e.preventDefault();

    // Récupérez la valeur de l'attribut data-target
    const targetId = link.getAttribute('data-target');

    // Chargez le contenu de la page "rendez-vous.html"
    if (targetId === 'rendezvous-form') {
        fetch('rendez-vous.html').then((response) => response.text()).then((html) => {
                // Insérez le contenu dans la section
                contentSection.innerHTML = html;
            });
    } else {
        // Masquez tous les contenus de section
        const allContent = document.querySelectorAll('div > div');
        allContent.forEach((content) => {
            content.style.display = 'none';
        });
    }
});
});





});