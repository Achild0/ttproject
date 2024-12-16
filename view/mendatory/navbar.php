<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <div class="container-fluid w-auto">
          <a class="navbar-brand" href="/">
              <img src="/img/logo_rond_64.png" width="64" height="64" type="icon"/>
            MK Boutique</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Accueil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Categories</a>
              <ul class="dropdown-menu">
                <?php
                  foreach($categs as $cat){
                    print('<li><a class="dropdown-item" value="'.$cat["id"].'" href="/categ/'.$cat["nom"].'">'. $cat["nom"].'</a></li>');
                  }
                ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
    </div>
</nav>