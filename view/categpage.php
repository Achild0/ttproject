<html lang="fr">
  <?php include __DIR__.'/mendatory/head.php'; ?>
  <body>
    <?php include __DIR__.'/mendatory/navbar.php'; ?>
    <section style="margin-top: 160px;">
      <div class="text-center container" >
        <h1 class="lacoste_green">Bienvenue à MK Boutique</h1>
        <p>N'hésitez pas à utiliser la barre de navigation pour découvrir nos produits !</p>
      </div>
      <h1 class="container lacoste_green" >Dans la catégorie : <?php print($categ) ?></h1>
      <div class="container bg-light p-3" id='exclus'>
        <div class="row">
          <?php
              foreach($carticles as $art){
                print(
                '<div class="card col-2 m-2" style="width: 15rem;">
                  <img src="/'.$art["photos"][0].'" height="180" width="130" class="card-img-top mt-1">
                  <div class="card-body">
                    <h4 class="card-title">'.$art["nom"].'</h4>
                    <h5>'.$art["prix"].'€</h5>
                    <p class="card-text text-truncate">'.$art["description"].'</p>
                    <a href="/product/'.$art["id"].'"class="btn btn-success product_view">Voir</a>
                  </div>
                </div>');
              }
          ?>
        </div>
      </div>
    </section>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>