<!DOCTYPE html>
<html lang="fr">
    <?php include 'view\mendatory\head.php'; ?>
    <body>
        <div class="container">
            <h2 class="text-align-center">Bonjour Tonton, bienvenue dans ton espace de configuration, ici du peux configurer comme tu l'entends ton site</h2>
        </div>
        <div class="container">
            <h3>Catégories</h3>
            <div class="container p-2 mb-3 border">
                <label for="inputCateg" class="form-label">Créer une nouvelle catégorie</label>
                <input type="text" class="form-control" id="inputCateg" placeholder="Nom de la nouvelle catégorie ..." />
                <button id="catcreate" class="btn btn-primary mt-2">Créer</button>
            </div>
            <div class="container mb-3 p-2 border">
                <label for="listCateg" class="form-label">Modifier une catégorie</label>
                <select id="listCateg" class="form-select" aria-label="Default select example">
                    <option selected>Choisir une catégorie</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div class="mt-2">
                    <label for="nomcat">Nom catégorie</label>
                    <input type="text" id="nomcat" class="form-control" disabled="true" />
                </div>
                <div class="mt-2">
                    <button id="modifiycateg" class = "btn btn-primary">Modifier</button>
                </div>
            </div>
            <h3>Produits</h3>
            <div class="container p-2 border">
                <label class="form-label" for="nom_prod">Créer un nouveau produit</label>
                <input type="text" class="form-control" id="nom_prod" placeholder="Nom du nouveau produit"/>
                <label class="form-label mt-2" for="listProdCateg">Choisir sa catégorie</label>
                <select id="listProdCateg" class="form-select" aria-label="Default select example">
                            <option selected>Choisir une catégorie</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                </select>
                <label class="form-label" for="prix_prod">Prix</label>
                <input type="number" class="form-control" id="prix-prod" step="0.01" placeholder="0.00"/>
                <div class="card mt-3">
                    <div class="card-header"><strong>Envoi de photos</strong></div>
                    <div class="card-body">

                    <!-- Standar Form -->
                    <h4>Selectionner un fichier sur l'ordinateur</h4>
                    <div>
                        <div class="input-group">
                            <input class="form-control" type="file" id="js-upload-files" accept="image/*">
                            <button class="btn btn-sm btn-primary" id="js-upload-submit">Envoyer les fichiers</button>
                        </div>
                    </div>
                    <!-- Drop Zone -->
                    <h4>ou déposer le fichier ci-dessous</h4>
                    <div class="upload-drop-zone" id="drop-zone">
                        Délpacez la photo ici
                    </div>

                    <!-- Progress Bar -->
                    <!--<div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        </div>
                    </div>-->

                    <!-- Upload Finished -->
                    <div class="js-upload-finished">
                        <h3>Fichiers envoyés :</h3>
                        <div class="container" id="file_job">
                        </div>
                    </div>
                    </div>
                </div>
                <h3>Preview</h3>
                <div class="card col-2 m-2" id="preview_card" style="width: 15rem;">
                    <img src="" height="180" width="130" class="card-img-top">
                    <div class="card-body">
                    <h4 class="card-title" id="prd_nom">Nom Produit</h4>
                    <h5 id="prd_prix">19.99€</h5>
                    <p class="card-text" id="prd_desc">Petite description rapide </p>
                    <div class="btn btn-success" disable>Voir</div>
                    </div>
                </div>
                <button class="btn btn-primary mt-3">Créer Produit</button>
            </div>
        </div>

        <script>

            $(document).ready(function(){

                // UPLOAD CLASS DEFINITION
                // ======================
                
                var dropZone = $("#drop-zone");
                var uploadForm = $('#js-upload-form');
                var imgtextupload = $('#js-upload-files')
                var files = new Array();

                var startUpload = function(files) {
                    console.log(files)
                }

                function refreshFiles(){
                    console.log("Refresh files")
                    $("#file_job").text("");
                    for (let i = 0;i < files.length;i++){
                        console.log(files[i]);
                        $("#file_job").append('<div class="m-1 btn btn-secondary upload_img" value="'+i+'">Upload '+files[i].name+' Prêt</div>');
                    }

                    $(".upload_img").click(function(){
                    console.log("click s")
                    r = files.splice($(this).attr("value"))
                    $(this).remove()
                })
                }

                $("#js-upload-submit").click(function(){
                    if (document.getElementById("js-upload-files").files[0] == null){
                        return
                    }
                    for (let i = 0;i < files.length; i++){
                        if (document.getElementById("js-upload-files").files[0].name == files[i].name){
                            return
                        }
                    }
                    files.push(document.getElementById("js-upload-files").files[0]);
                    refreshFiles();
                })

                $(".upload_img").click(function(){
                    console.log("click s")
                    r = files.splice($(this).attr("value"))
                    $(this).remove()
                })

                /*uploadForm.addEventListener('submit', function(e) {
                    files.pushdocument($('js-upload-files').files);
                    e.preventDefault()

                    startUpload(uploadFiles)
                })*/

                dropZone.ondrop = function(e) {
                    e.preventDefault();
                    this.className = 'upload-drop-zone';
                    files.push(e.dataTransfer.files)
                    refreshFiles();
                    //startUpload(e.dataTransfer.files)
                }

                dropZone.ondragover = function() {
                    this.className = 'upload-drop-zone drop';
                    return false;
                }

                dropZone.ondragleave = function() {
                    this.className = 'upload-drop-zone';
                    return false;
                }

            });
            </script>
    </body>
</html>