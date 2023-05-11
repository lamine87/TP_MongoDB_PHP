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




<?php
        require 'vendor/autoload.php';
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $articleCollection = $client->vitemarket->articles;

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $article_id = $_POST['article_id'];
  $article = [
      'nom' => $_POST['nom'],
      'description' => $_POST['description'],
      'prix' => $_POST['prix'],
      'adresse' => $_POST['adresse'],
  ];

    
    $article = $articleCollection->updateOne(['_id'=> new MongoDB\BSON\ObjectID($article_id)],['$set'=>$article]);
    $_SESSION['success'] = "Modifier  avec succes";
    header("Location: index.php");
    

    if (isset($_GET['id'])){
        $article = $articleCollection->findOne(['_id'=>new MongoDB\BSON\ObjectID($_GET['id'])]);
    }
    }
    $article_id = $_GET['id'];
    $article = $articleCollection->findOne(['_id'=>new MongoDB\BSON\ObjectID($article_id)]);
    
 ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="modifier.php" method="POST" enctype="multipart/form-data" class="">
                <input type="hidden" name="article_id" value="<?php echo $article['_id']; ?>" />
                    <div class="text-center">
                        <h2 class="">Modifier un article</h2>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $article['nom'] ?>" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description"><?php echo $article['description']?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix" value="<?php echo $article['prix'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prix">Adresse</label>
                            <input type="adresse" class="form-control" id="adresse" name="adresse" value="<?php echo $article['adresse'] ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Envoyer</button>

            </div>

        </div>
    </div>

    </body>
</html>