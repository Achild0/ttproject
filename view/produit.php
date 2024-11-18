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
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Produits</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Vêtements</a></li>
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
    <section style="margin-top: 160px;">
      <div class="container bg-light" >
        <div class="row">
            <div class="col-4">
                <div id="carouselExampleIndicators" class="carousel slide w-100" data-bs-ride="true">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="img/722c7660-73f1-4e8f-b6a8-d7631d3d977f.jfif" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="img/75687782-87ee-43ca-9ec7-14e1b8a7f199.jfif" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="img/cbed92b0-dc53-4a8d-9b01-94eb9979bd28.jfif" class="d-block w-100">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-5">
                <h3>Nom Produit</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent viverra neque sit amet neque lobortis, eu euismod tellus bibendum. Aliquam porta condimentum velit. Duis nec metus ut enim porttitor ultrices a et mauris. Duis consectetur, massa vel vulputate pellentesque, augue nibh suscipit arcu, non egestas tellus tortor et tellus. Vestibulum malesuada tristique lorem, ac vestibulum enim condimentum ut. Sed gravida sem eget varius malesuada. Curabitur quam dui, porta vitae volutpat sed, molestie sit amet nibh. Cras vitae ullamcorper felis, at pulvinar tortor. Pellentesque et congue nunc, placerat tincidunt quam.
Nulla neque turpis, consectetur porta ligula vitae, gravida tincidunt libero. Quisque neque tellus, bibendum quis turpis sollicitudin, malesuada dictum risus. Donec eu sodales est. Aenean molestie velit quis est tempus, sit amet pharetra nisl rutrum. Sed leo nisi, auctor in enim et, consequat aliquet lorem. Praesent vel volutpat libero, nec fringilla sapien. Donec a massa in libero vulputate tincidunt.
                </p>
                <p class="fw-bold">
                  Prix : 19.99€
                </p>  
                <button class="btn btn-success"  href="#" role="button">Acheter</a>
            </div>
        </div>
      </div>
    </section>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>