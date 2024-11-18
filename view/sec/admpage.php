<?php
   if (empty($_SESSION["isadm"]) or $_SESSION["isadm"] != true){
    exit(0);
   }
?> 

<!DOCTYPE html>
<html lang="fr">
    <?php include 'view\mendatory\head.php'; ?>
    <body>
        <div class="container">
            <h2 class="text-align-center">Bonjour Tonton, bienvenue dans ton espace de configuration, ici du peux configurer comme tu l'entends ton site</h2>
        </div>
        <div class="container">
            <h3>Catégories</h3>
            <form class="row g-3">
                <div class="col-auto">
                    <label for="inputCateg" class="">Créer une catégorie : </label>
                    <input type="text" class="form-input" id="inputCateg" />
                </div>
            </form>
            <form class="row g-3">
                <div class="col-auto">
                    <label for="listCateg" class="">Modifier une catégorie : </label>
                    <select id="listCateg" class="form-select" aria-label="Default select example">
                        <option selected>Choisir une catégorie</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <input type="text" class="form-control"></input>
                </div>
            </form>
        </div>
    </body>
</html>