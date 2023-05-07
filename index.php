<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

<div class="container">
    <div class="row">
    <a class="btn btn-primary" href='addcar.php'>Ajouter voiture</a>
    
      <div class="col-lg-12">
          <h1>Liste de voiture</h1>
          
          
      <?php
      require 'vendor/autoload.php';

      $client = new MongoDB\Client("mongodb://localhost:27017");
      $userCollection = $client->voitures->carpark;


      if ($_SERVER['REQUEST_METHOD'] === 'GET'){
         $cars = $userCollection->find();
         $filter = [];
         $options = ['sort' => ['_id' => -1]];

         if ($cars){
            foreach($cars as $car){
                  echo 'Modele: '.$car['modele'].'<br/>';
                  echo 'Code Voiture: '.$car['code'].'<br/>';
                  echo 'Carburant: '.$car['carburant'].'<br/>';
                  echo '<button onclick="location.href=\'modifier.php?id='.$car['_id'].'\'">Modifier</button>';
                  echo '<button onclick="location.href=\'supprimer.php?id='.$car['_id'].'\'">supprimer</button>';
                  echo '<hr>';

            }
         }else{
            echo "<p>Aucune Voiiture trouvée</p>";
            exit();
         }
      }

      ?>
      </div>
    </div>
  </div>
  
</body>


</html>










