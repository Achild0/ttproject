<?php 

    include "model\data.php";

    $categs = getCategs();
    $articles = getRandProduits();
    require "view\mainpage.php";

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
?>