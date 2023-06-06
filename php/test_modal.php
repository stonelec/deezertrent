<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>LE test </title>
        <link href="../web/style.css" rel="stylesheet">

        <style>
            body {
                height: 100%;
                margin: 0;
                padding: 0;
                font-family: Arial, Helvetica, sans-serif;
            }
            h2 {
                font-size: 20px;
                color: #000000;
            }
            #example {
                visibility: hidden;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                text-align: center;
                z-index: 1000;
            }
            #new_modal div {
                width: 350px;
                height: 80px;
                margin: 100px auto;
                background-color: #f2f2f2;
                border-radius: 10px;
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                padding: 15px;
                text-align: center;
                font-weight: bold;
                font-size: 15px;
                border: 3px solid #cccccc;
                position: absolute;
                left: 50%;
                top: 100px;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                -webkit-transform: translate(-50%, -50%);
            }
        </style>
    </head>
    <body>
    <i class="bi bi-file-plus infos-reght-part button-track"  style="size: 50px" onclick="open_modal()"> EL BUTTON</i>
    <div id="new_modal">
                  <div id="modal_header">
                       <h2>Ajouter une nouvelle playlist :</h2>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                  <div id="modal_body">
                            <label for="new_name">Test:</label>
                           <input class="form-control" type="text" id="new_name"/>
                  </div>
                  <div id="modal_footer">
                           <a href="#" onclick="open_modal()">Annuler</a>
                           <button type="button" class="btn btn-primary">Ajouter</button>
                       </div>
    </div>
        <script>
            function open_modal() {
                mew = document.getElementById("new_modal");
                mew.style.visibility = mew.style.visibility == "visible" ? "hidden" : "visible";
            }
        </script>
    </div>
    </body>
</html>

