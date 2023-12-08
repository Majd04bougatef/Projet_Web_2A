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

    if (targetId === 'evenement') {
        fetch('../controller/events.php').then((response) => response.text()).then((html) => {
            // Insérez le contenu dans la section
            contentSection.innerHTML = html;
        });
    } else {
        fetch('../controller/events.php').then((response) => response.text()).then((html) => {
            // Insérez le contenu dans la section
            contentSection.innerHTML = html;
        });
    }

    // Masquer ou afficher les contenus de section
    const allContent = document.querySelectorAll('div > div');
    allContent.forEach((content) => {
        // Condition pour masquer ou afficher en fonction de targetId
        content.style.display = targetId === 'evenement' ? 'block' : 'none';
    });


});
});





}); 