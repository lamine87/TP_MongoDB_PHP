<?php
 require 'vendor/autoload.php';
 $client = new MongoDB\Client("mongodb://localhost:27017");
 $articleCollection = $client->vitemarket->articles;


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $article = [
      'nom' => $_POST['nom'],
      'description' => $_POST['description'],
      'prix' => $_POST['prix'],
      'adresse' => $_POST['adresse'],
  ];
  $result = $articleCollection->insertOne($article);
  header('Location:index.php');
}else{
  $_SESSION['flash']['error'] = "Erreur de saisie";
  //header('Location:modifier.php');
  exit();
}
?> 