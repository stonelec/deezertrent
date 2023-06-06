$(document).on('click', '.bi-file-plus', function(event) {
    var modal = document.getElementById("addPlaylist");
    modal.classList.add("show");
    modal.style.display = "block";
    console.log("open");
    event.stopPropagation();
});

$(document).on('click', '.btn-close', () =>  {
    console.log("close");
    let modal = document.getElementById("addPlaylist");
    modal.classList.remove("show");
    modal.style.display = "none";
});
$(document).on('submit', '#add_playlist', function(e) {
    console.log("submit");
    e.preventDefault(); // Empêcher la soumission du formulaire

    let modal = document.getElementById("addPlaylist");
    modal.classList.remove("show");
    modal.style.display = "none";
    let titre = document.getElementById("titre-add").value;
    console.log(titre);
    // Exécuter la requête AJAX pour mettre à jour le profil

        ajaxRequest('POST', '../php/request.php/add_playlist', ()=>{}, 'nom_playlist=' + titre);

});
