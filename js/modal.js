$(document).on('click', '.bi-file-plus', function(event) {
    var modal = document.getElementById("addPlaylist");
    $('')
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
    e.preventDefault(); // Empêcher la soumission du formulaire
    titre = document.getElementById("titre-add").value;
    if (titre === "" || titre === null || titre === undefined || titre === " " || titre === "Historique" || titre === "Favoris" || titre==="Liste de lecture") {
        alert("titre invalide");
        return;
    }else{
        console.log("submit");
        let modal = document.getElementById("addPlaylist");
        modal.classList.remove("show");
        modal.style.display = "none";
        let titre = document.getElementById("titre-add").value;
        console.log(titre);
        // Exécuter la requête AJAX pour mettre à jour le profil

        ajaxRequest('POST', '../php/request.php/add_playlist', ()=>{
            ajaxRequest('GET', '../php/request.php/playlist/', displayListePlaylist);
            ajaxRequest('GET', '../php/request.php/playlist/', playlistMenu);
            }, 'nom_playlist=' + titre);
    }
});
