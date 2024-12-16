<?php
include __DIR__ . "/model/data.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['csrf_token']) {
            die("Requête invalide (CSRF détecté).");
        }
        break;

    case "GET":
        // Aucun traitement spécifique pour GET ici, cela reste un comportement par défaut
        break;

    default:
        http_response_code(405); // Méthode non autorisée
        die("Méthode non autorisée.");
}

$categs = getCategs();
$carticles = [];
$articles = [];

if (isset($categ) && !empty($categ)) {
    foreach ($categs as $cat) {
        if ($cat["name"] === $categ) {
            $carticles = getProduitsByCateg($cat["id"]);
            require __DIR__ ."/view/categpage.php";
            exit;
        }
    }
}

$articles = getRandProduits();
if (!is_array($articles)) {
    $articles = []; 
}
require __DIR__ . "/view/mainpage.php";