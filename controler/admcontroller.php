<?php
    include 'model/admdata.php';
    // placeholder en attendant que le model soit formulé
    function getBannedIps(){
        return array();
    }

    $banips = getBannedIps();

    if (in_array($_SERVER["REMOTE_ADDR"], $banips)){
        header("location:  https://example.com");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        print("POST OK");
        if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['csrf_token']) {
            die("Requête invalide (CSRF détecté).");
        }
        print("Token OK");
        if (!isset($_POST["password"])){
            exit(0);
        }
        $password = htmlspecialchars($_POST["password"]);
    
        // Mot de passe attendu (remplacer par une vérification en base de données avec mdp haché)
        $correctPassword = "test";
    
        if ($password === $correctPassword) {
            $_SESSION["isadm"] = true;
            header("Location: /adm");
            exit;
        } else {
            echo "Mot de passe incorrect.";
        }
    }

    if ($_SESSION['tries'] != 0 && $_SESSION['tries'] != null){
        $_SESSION['tries'] += 1;
    }else{
        $_SESSION['tries'] = 0;
    }

    if ($_SESSION['tries'] >= 3) {
        addBanIps($_SERVER["REMOTE_ADDR"]);
    }

    include 'view/sec/admlogin.php'
?>