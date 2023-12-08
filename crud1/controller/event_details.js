
function confirmDeletion() {
    return confirm("Voulez-vous vraiment supprimer ce commentaire ?");
}


document.addEventListener('DOMContentLoaded', function () {
    var deleteLinks = document.querySelectorAll('.delete-link');

    deleteLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            if (!confirmDeletion()) {
                event.preventDefault();
            }
        });
    });

    
});


