<?php 

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include __DIR__."/model/data.php";

    switch ($_SERVER["REQUEST_METHOD"]){

        case "POST":
            if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['csrf_token']) {
                die("Requête invalide (CSRF détecté).");
            };
            if (isset($_POST['type']) && $_POST['type'] == "product_get") {
                return  json_encode(getProduit($id));
                exit;
            }
        break;

        case "GET":
        break;

        default:

        break;
    }
    $categs = getCategs();
    
    $mainproduct = getProduit($product);
    
    require __DIR__."/view/produit.php";
?>