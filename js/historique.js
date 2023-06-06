///////////////////   HISTORIQUE REQUEST   ///////////////////////////
const divhistorique = document.getElementById('historique');
divhistorique.addEventListener('click', function() {
    $('#content').empty();
    ajaxRequest('GET', '../php/request.php/historique/', displayHistory);
});

///////////////////   DISPLAY HISTORIQUE   ///////////////////////////

function displayHistory(historiques)
{
    $('#title-page').empty();
    $('#title-page').append('<input type="text" class="bar" id="bar" name="bar" placeholder="&#61442; Recherche">')
    $('#content').empty();
    $('#content').append('<h2 style="margin: 15px 0">Historique</h2>');

    console.log(historiques)
    for (let historique of historiques)

        $('#content').append('' +
            '<div class="card">' +
            '<div class="card-body">'
            + historique.titre_track+
            '</div>' +
            '</div>');
}