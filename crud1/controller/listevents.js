function confirmDeletion() {
    return confirm("Voulez-vous vraiment supprimer cet evenement ?");
}

var deleteLinks = document.querySelectorAll('.delete-link');

deleteLinks.forEach(function (link) {
    link.addEventListener('click', function (event) {
        if (!confirmDeletion()) {
            event.preventDefault();
        }
    });
});
function searchEvents() {
    var searchTerm = document.getElementById('searchInput').value.toLowerCase();
    var eventCards = document.querySelectorAll('.event-card');

    eventCards.forEach(function (card) {
        var title = card.querySelector('.event-title').textContent.toLowerCase();
        if (title.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
