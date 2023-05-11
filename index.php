<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>VITEMARKET</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="p-2 navbar-brand" href="#">
        <img class="logo-vitmarket" src="" alt="">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home </a>
          </li>
          <li class="nav-item active">
            <div class="">
              <a class="btn btn-primary" href='addarticle.php'>Faire une annonce</a>
            </div>
          </li>
     

      </div>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      </ul>



      <div class="search-body">
        <div class="search-box">
          <input type="text" name="" class="search-txt" placeholder="Tapez pour rechercher" />
          <a class="search-btn" href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
        </div>
      </div>



      </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Voiture</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Immobilier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Multimedia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Emploi</a>
          </li>
        </ul>

      </div>
    </nav>

  </header>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
    
        <?php
        require 'vendor/autoload.php';

        $client = new MongoDB\Client("mongodb://localhost:27017");
        $articleCollection = $client->vitemarket->articles;


        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          $articles = $articleCollection->find();
          $filter = [];
          $options = ['sort' => ['_id' => -1]];

          if ($articles) {
            foreach ($articles as $article) {
              echo '<hr>';
              echo $article['nom'] . '<br/>';
              echo $article['description'] . '<br/>';
              echo $article['prix'] . '<br/>';
              echo $article['adresse'] . '<br/><br/>';
              echo '<button class="btn btn-outline-primary" onclick="location.href=\'modifier.php?id='.$article['_id'].'\'">Modifier</button>';
              echo '<button class="btn btn-outline-danger" onclick="location.href=\'supprimer.php?id='.$article['_id'].'\'">supprimer</button>';
              echo '<hr>';
            }
          } else {
            echo "<p>Aucune Annonce publiée</p>";
            exit();
          }
        }


        ?>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>