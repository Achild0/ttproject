<?php
    $_SERVER["pdo"] = new PDO('mysql:host=zmtqpcnzmtqpcn.mysql.db;dbname=zmtqpcnzmtqpcn', 'zmtqpcnzmtqpcn', 'ALWY76wmDMmTBXW7dyfw', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);

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
    function addCateg($nom){
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
        $stmt = $_SERVER["pdo"]->prepare("SELECT produits.id, produits.nom,produits.description, produits.categorie , produits.prix FROM produits WHERE valide = 'OUI' LIMIT 10");
        $stmt->execute();
        $res = $stmt->fetchAll();
        $stmt = $_SERVER["pdo"]->prepare("SELECT name FROM photos WHERE produit = :prod");
        $maxres = [];
        foreach($res as $prod){
            $stmt->execute(["prod" => $prod["id"]]);
            $ph = $stmt->fetchAll();    
            foreach($ph as $phot){
            $prod["photos"][] = $phot["name"];
            }
            $maxres[] = $prod;
        }
        return $maxres;
    }

    function addProduit($nom,$prix,$desc,$idcateg,$photos){
        $stmt = $_SERVER["pdo"]->prepare("INSERT INTO produits (nom,prix,description,categorie,valide) VALUES (:nom,:prix,:desc,:idcateg,'OUI')");
        $stmt->execute(['nom' => $nom,'prix' => $prix, 'desc'=> $desc, 'idcateg' => $idcateg]);
        $lastid = $_SERVER["pdo"]->lastInsertId();
        print("LAstID = ".$lastid);
        $stmt = $_SERVER["pdo"]->prepare("INSERT INTO photos (name,produit) VALUES (:nom,:idprod)");
        foreach($photos as $pic){
            $stmt->execute(['nom'=>$pic,'idprod'=> $lastid]);
        }
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
        $stmt = $_SERVER["pdo"]->prepare("SELECT name FROM photos WHERE produit = :prod");
        $stmt->execute(["prod" => $id]);
        $ph = $stmt->fetchAll();    
        foreach($ph as $phot){
            $res["photos"][] = $phot["name"];
        }
        return $res;
    }

    function getProduitsByCateg($idcateg){
        $stmt = $_SERVER["pdo"]->prepare("SELECT * FROM produits WHERE categorie = :idcateg AND valide = 'OUI'");
        $stmt->execute(['idcateg' => $idcateg]);
        $res = $stmt->fetchAll();
        $stmt = $_SERVER["pdo"]->prepare("SELECT name FROM photos WHERE produit = :prod");
        $catmaxres = [];
        foreach($res as $product){
            $stmt->execute(["prod" => $product["id"]]);
            $ph = $stmt->fetchAll();    
            foreach($ph as $phot){
            $product["photos"][] = $phot["name"];
            }
            $catmaxres[] = $product;
        }
        return $catmaxres;
    }
?>