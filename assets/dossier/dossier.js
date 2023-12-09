

 function confirmDelete(id_c) {
                Swal.fire({
                    title: 'Voulez-vous vraiment supprimer cette consultation?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer!',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "../controller/deleteconsultation.php",
                            data: { id_c: id_c },
                            dataType: 'json', 
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Suppression réussie!',
                                        text: 'Les données ont été supprimées avec succès.'
                                    });
                                    location.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erreur',
                                        text: response.message
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error("Erreur lors de l'envoi de la requête AJAX", error);
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            }
