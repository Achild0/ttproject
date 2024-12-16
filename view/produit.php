
<html lang="fr">
<?php include __DIR__.'/mendatory/head.php'; ?>
  <body>
    <?php include __DIR__.'/mendatory/navbar.php'; ?>
    <section style="margin-top: 160px;">
      <div class="container bg-light" >
        <div class="row">
            <div class="col-4">
                <div id="carouselExampleIndicators" class="carousel slide w-100" data-bs-ride="true">
                    <div class="carousel-indicators">
                      <?php
                        $counter = 0;
                        foreach($mainproduct["photos"] as $pic){
                          print('<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$counter.'"');
                          if ($counter == 0){
                            print(' class="active" aria-current="true" ');
                          }
                          print('aria-label="Slide '.($counter+1).'"></button>');
                          $counter += 1;
                        }
                      ?>
                    </div>
                    <div class="carousel-inner">
                      <?php 
                          $counter = 0;
                         foreach($mainproduct["photos"] as $pic){
                          print('<div class="carousel-item ');
                          if ($counter == 0){
                            print('active');
                          }
                          print(' "><img src="'.__DIR__."/../".$pic.'" class="d-block w-100"></div>');
                          $counter += 1;
                        }
                      ?>
                     <!-- <div class="carousel-item active">
                        <img src="img/722c7660-73f1-4e8f-b6a8-d7631d3d977f.jfif" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="img/75687782-87ee-43ca-9ec7-14e1b8a7f199.jfif" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="img/cbed92b0-dc53-4a8d-9b01-94eb9979bd28.jfif" class="d-block w-100">
                      </div>-->
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
                <h3><?php print($mainproduct[0]["nom"])?></h3>
                <p><?php print($mainproduct[0]["description"]) ?></p>
                <p class="fw-bold">
                  Prix : <?php print($mainproduct[0]["prix"]) ?>€
                </p>
                <button class="btn btn-success"  href="#" role="button">Contactez le 000-000-000 pour acheter !</a>
            </div>
        </div>
      </div>
    </section>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>