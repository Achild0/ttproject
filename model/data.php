<?php
    $_SERVER["pdo"] = new PDO('mysql:host=localhost;dbname=mkboutick', 'root');

    // Data IP
    function addBanIp($ip) {
        $stmt = $_SERVER["pdo"]->prepare("INSERT INTO banned_ips (ip_address) VALUES (:ip)");
        $stmt->execute(['ip' => $ip]);
    }

    function getBanIps(){
        $stmt = $_SERVER["pdo"]->prepare("SELECT * from banips");
        $stmt->execute();
        $res = $stmt->fetch_all();
        return $res;
    }

        // Data Categ
    function addCateg($name){
        $stmt = $_SERVER["pdo"]->prepare("INSERT INTO categories (nom) VALUES (:nom)");
        $stmt->execute(['nom' => $nom]);
    }

    function delCateg($id){
        $stmt = $_SERVER["pdo"]->prepare("DELETE FROM categories WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    function modifyCateg($id,$nom){
        $stmt = $_SERVER["pdo"]->prepare("UPDATE categories SET  nom = :nom WHERE id = :id");
        $stmt->execute(['nom' => $nom,'id' => $id]);
    }

    function getCategs(){
        $stmt = $_SERVER["pdo"]->prepare("SELECT * FROM categories");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }

    // Data produits

    function getRandProduits(){
        $stmt = $_SERVER["pdo"]->prepare("SELECT * FROM produits LIMIT 10");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }

    function addProduit($nom,$idcateg){
        $stmt = $_SERVER["pdo"]->prepare("INSERT INTO produits (nom,categorie,valide) VALUES (:nom,:idcateg,'OUI')");
        $stmt->execute(['nom' => $nom,'idcateg' => $idcateg]);
        
    }

    function invalidateProduit($id){
        $stmt = $_SERVER["pdo"]->prepare("UPDATE produits SET valide = 'NON' WHERE id = $id");
        $stmt->execute(['id' => $id]);
    }

    function validateProduit($id){
        $stmt = $_SERVER["pdo"]->prepare("UPDATE produits SET valide = 'OUI' WHERE id = $id");
        $stmt->execute(['id' => $id]);
    }

    function deleteProduit($id){
        $stmt = $_SERVER["pdo"]->prepare("DELETE FROM produits WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    function modifyProduit($id,$nom,$idcateg){
        $stmt = $_SERVER["pdo"]->prepare("UPDATE produits SET nom = :nom,categorie = :idcateg WHERE id = $id");
        $stmt->execute(['id' => $id,'nom' => $nom,'idcateg' => $idcateg]);
    }

    function getProduit($id){
        $stmt = $_SERVER["pdo"]->prepare("SELECT * FROM produits WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $res = $stmt->fetchAll();
        return $res;
    }

    function getProduitsByCateg($idcateg){
        $stmt = $_SERVER["pdo"]->prepare("SELECT * FROM produits WHERE categorie = :idcateg");
        $stmt->execute(['categorie' => $idcateg]);
        $res = $stmt->fetchAll();
        return $res;
    }
?>