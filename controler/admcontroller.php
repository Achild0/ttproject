<?php
    include 'model/admdata.php';
    include 'model/data.php';
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
        switch($_POST['type']){

            case "login":
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
                break;
            
            case "product_creation":

                //var_dump($_POST);
                $p_name = htmlspecialchars($_POST["name"]);
                $p_categ = htmlspecialchars($_POST["categ"]);
                $p_prix = htmlspecialchars($_POST["prix"]);
                $p_desc = htmlspecialchars($_POST["desc"]);
                $photos = [];
                //var_dump($_FILES);
                try {
                    // Undefined | Multiple Files | $_FILES Corruption Attack
                    // If this request falls under any of them, treat it invalid.
                    if (!isset($_FILES['imgs']['error'])) {
                        throw new RuntimeException('Invalid parameters.');
                    }
                    $counter = 0;
                    foreach($_FILES['imgs']['name'] as $img){

                         // Check $_FILES['imgs']['error'] value.
                        switch ($_FILES['imgs']['error'][$counter]) {
                            case UPLOAD_ERR_OK:
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                throw new RuntimeException('No file sent.');
                            case UPLOAD_ERR_INI_SIZE:
                            case UPLOAD_ERR_FORM_SIZE:
                                throw new RuntimeException('Exceeded filesize limit.');
                            default:
                                throw new RuntimeException('Unknown errors.');
                        }

                                            // You should also check filesize here. 
                        if ($_FILES['imgs']['size'][$counter] > 1000000) {
                            throw new RuntimeException('Exceeded filesize limit.');
                        }

                        // DO NOT TRUST $_FILES['imgs']['mime'] VALUE !!
                        // Check MIME Type by yourself.
                        $finfo = new finfo(FILEINFO_MIME_TYPE);
                        if (false === $ext = array_search(
                            $finfo->file($_FILES['imgs']['tmp_name'][$counter]),
                            array(
                                'jpg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                                'jfif'=> 'image/jfif'
                            ),
                            true
                        )) {
                            throw new RuntimeException('Invalid file format.');
                        }
                        
                    // You should name it uniquely.
                    // DO NOT USE $_FILES['imgs']['name'] WITHOUT ANY VALIDATION !!
                    // On this example, obtain safe unique name from its binary data.
                        $name = sprintf('img/produits/%s.%s',sha1_file($_FILES['imgs']['tmp_name'][$counter]),$ext);
                        if (
                            !move_uploaded_file($_FILES['imgs']['tmp_name'][$counter],$name)                            
                        ) {
                            throw new RuntimeException('Failed to move uploaded file.');
                        }
                    
                        $photos[] = $name;
                        $counter+= 1;
                    }
                
                   
                } catch (RuntimeException $e) {
                
                    echo $e->getMessage();
                
                }

                addProduit($p_name,$p_prix,$p_desc,$p_categ,$photos);
                exit(0);
                break;

            default:
            break;
        }
        
    }

    if (isset($_SESSION['tries']) && $_SESSION['tries'] != 0 && $_SESSION['tries'] != null){
        $_SESSION['tries'] += 1;
    }else{
        $_SESSION['tries'] = 0;
    }

    if ($_SESSION['tries'] >= 3) {
        addBanIps($_SERVER["REMOTE_ADDR"]);
    }

    if (isset($_SESSION["isadm"]) && $_SESSION["isadm"]){
        $categs = getCategs();
        include 'view/sec/admpage.php';
    }else{
        include 'view/sec/admlogin.php';
    }
    

    /*
    try {
    
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['imgs']['error']) ||
        is_array($_FILES['imgs']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['imgs']['error'] value.
    switch ($_FILES['imgs']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    // You should also check filesize here. 
    if ($_FILES['imgs']['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['imgs']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['imgs']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ),
        true
    )) {
        throw new RuntimeException('Invalid file format.');
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['imgs']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if (!move_uploaded_file(
        $_FILES['imgs']['tmp_name'],
        sprintf('./uploads/%s.%s',
            sha1_file($_FILES['imgs']['tmp_name']),
            $ext
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    echo 'File is uploaded successfully.';

} catch (RuntimeException $e) {

    echo $e->getMessage();

}*/
?>