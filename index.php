<?php
  //error_reporting(E_ALL ^ E_NOTICE); 
  session_start();

  if (session_status() !== PHP_SESSION_ACTIVE) {
    die("Erreur : la session n'a pas pu être démarrée.");
}
  if (empty($_SESSION['csrf_token'])) {
    try {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    } catch (Exception $e) {
        die("Erreur lors de la génération du jeton CSRF.");
    }
}

  // Directory
  $viewdir = "/view/";
  $controllerDir = "/controler/";

  $routes = [
    "main" => __DIR__.$controllerDir."maincontroller.php",
    "adm" => __DIR__.$controllerDir."admcontroller.php",
    "login" => __DIR__.$controllerDir.'admcontroller.php',
    "product" => __DIR__.$controllerDir."productcontroller.php",
    "categ" => __DIR__.$controllerDir."maincontroller.php"
  ];

  $request = $_SERVER['REQUEST_URI'];
  //$basepath = str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
  //$request = str_replace($basepath, "", $request);
  //print("<p>The path is : ".$request."</p>");

  //Path manipulation
  $requestparts = explode('/', str_replace("?", "", $request));
  //print_r($requestparts);

  if (empty($requestparts) || !is_array($requestparts)) {
    die("Erreur : la requête est mal formée.");
  }

  $route = isset($requestparts[1]) ? $requestparts[1] : '';

  switch ($route) {
    
    case 'product':
      if (!isset($requestparts[2])){
        //exit(1);
        require $routes["main"];
        exit(0);
      }
      $product = intval($requestparts[2]);
      require $routes[$route];
      break;
    
    case 'login':
      require $routes[$route];
      break;

    case "adm":
      require $routes[$route];
      break;
    
    case "categ":
      if (isset($requestparts[2])){
        $categ = htmlspecialchars($requestparts[2]);
        require $routes[$route];
      }
      break;

    default:
      require $routes["main"];
      break;
  }
?>