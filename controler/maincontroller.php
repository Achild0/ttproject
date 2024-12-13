<?php 

    include "model\data.php";

    switch ($_SERVER["REQUEST_METHOD"]){

        case "POST":
            if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['csrf_token']) {
                die("Requête invalide (CSRF détecté).");
            };
        break;

        case "GET":
        break;

        default:

        break;
    }

    $categs = getCategs();
    $carticles = [];
    $articles = [];
    if (isset($categ) && $categ != null && $categ != ''){
        foreach($categs as $cat){
           $key = array_search($categ,$cat);
           if($key){
            $carticles = getProduitsByCateg($cat["id"]);
            require "view\categpage.php";
           }
        }
    }
    else{
        $articles = getRandProduits();
        require "view\mainpage.php";
    }

?>