<?php
  error_reporting(E_ALL ^ E_NOTICE);  
  session_start();
  if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Chaîne sécurisée et aléatoire
  }

  // Directory
  $viewdir = "/view/";
  $controllerDir = "/controler/";

  $routes = [
    "main" => __DIR__.$viewdir."mainpage.php",
    "adm" => __DIR__.$viewdir."admpage.php",
    "login" => __DIR__.$controllerDir.'admcontroller.php',
    "product" => __DIR__.$controllerDir."maincontroller.php"
  ];

  $request = $_SERVER['REQUEST_URI'];
  //$basepath = str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
  //$request = str_replace($basepath, "", $request);
  print("<p>The path is : ".$request."</p>");

  //Path manipulation
  $requestparts = explode('/', str_replace("?", "", $request));
  //print_r($requestparts);

  $route = isset($requestparts[1]) ? $requestparts[1] : '';

  switch ($route) {
    
    case 'product':
      require $routes[$route];
      break;
    
    case 'login':
      require $routes[$route];
      break;

    case "adm":
      if ($_SESSION["isadm"]){
        $routes[$route];
      }else {
        header("Location: /login");
      }
      break;

    default:
      require $routes["main"];
      break;

  }
?>