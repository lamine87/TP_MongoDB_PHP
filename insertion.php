<?php
 require 'vendor/autoload.php';
 $client = new MongoDB\Client("mongodb://localhost:27017");
 $userCollection = $client->voitures->carpark;


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $car = [
      'code' => $_POST['code'],
      'modele' => $_POST['modele'],
      'carburant' => $_POST['carburant'],
  ];
  $result = $userCollection->insertOne($car);
  header('Location:index.php');
}else{
  $_SESSION['flash']['error'] = "Erreur de saisie";
  //header('Location:modifier.php');
  exit();
}
?> 