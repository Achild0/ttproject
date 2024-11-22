<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MK Boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/mycolors.css" rel="stylesheet">
  </head>
  <body> 
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <div class="container-fluid w-auto">
          <a class="navbar-brand" href="#">
              <img src="img/logo_rond_64.png" width="64" height="64" type="icon"/>
            MK Boutique</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.html">Accueil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Produits</a>
              <ul class="dropdown-menu active">
                <li><a class="dropdown-item" href="produit.html">Vêtements</a></li>
                <li><a class="dropdown-item" href="#">Chaussures</a></li>
                <li><a class="dropdown-item" href="#">Lorem Ipsum</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Lorem Ipsum</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Recherche">
            <button class="btn btn-outline-success" type="submit">Recherche</button>
          </form>
        </div>
      </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <section style="margin-top: 160px;">
      <div class="container">
        <h1 class="lacoste_green">Catégorie : Vêtements</h1>
        <div class="container bg-light">
            <div class="container bg-light p-3">
                <div class="row">
                  <div class="card col-2 m-2" style="width: 15rem;">
                    <img src="img/cbed92b0-dc53-4a8d-9b01-94eb9979bd28.jfif" height="180" width="130" class="card-img-top">
                    <div class="card-body">
                      <h4 class="card-title">Nom Produit</h4>
                      <h5>19.99€</h5>
                      <p class="card-text">Petite description rapide </p>
                      <a href="#" class="btn btn-success">Voir</a>
                    </div>
                  </div>
                  <div class="card col-2 m-2" style="width: 15rem;">
                    <img src="img/16fc9444-b70f-4984-8fcf-79b249519214.jfif" height="180" width="130" class="card-img-top">
                    <div class="card-body">
                      <h4 class="card-title">Nom Produit</h4>
                      <h5>19.99€</h5>
                      <p class="card-text">Petite description rapide </p>
                      <a href="#" class="btn btn-success">Voir</a>
                    </div>
                  </div>
                  <div class="card col-2 m-2" style="width: 15rem;">
                    <img src="img/c9762387-bb04-47cc-9c45-4c9e666e28a4.jfif" height="180" width="130" class="card-img-top">
                    <div class="card-body">
                      <h4 class="card-title">Nom Produit</h4>
                      <h5>19.99€</h5>
                      <p class="card-text">Petite description rapide </p>
                      <a href="#" class="btn btn-success">Voir</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </section>
    
  </body>
</html>