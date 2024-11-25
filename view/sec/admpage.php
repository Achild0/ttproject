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
                <label class="form-label">Ajouter photo</label>
                <form>
                    <fieldset class="upload_dropZone text-center mb-3 p-4">
                        <legend class="visually-hidden">Image uploader</legend>
                        <svg class="upload_svg" width="60" height="60" aria-hidden="true">
                            <use href="#icon-imageUpload"></use>
                        </svg>
                        <p class="small my-2">Drag &amp; Drop background image(s) inside dashed region<br><i>or</i></p>
                        <input id="upload_image_background" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" multiple accept="image/jpeg, image/png, image/svg+xml" />
                        <label class="btn btn-upload mb-3" for="upload_image_background">Choose file(s)</label>
                        <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>
                    </fieldset>
                <button class="btn btn-primary mt-3">Créer Produit</button>
            </div>
        </div>

    </body>
</html>