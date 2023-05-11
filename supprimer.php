<?php
 
 require 'vendor/autoload.php';
 $client = new MongoDB\Client("mongodb://localhost:27017");
 $articleCollection = $client->vitemarket->articles;

    $article_id = $_GET['id'];
    
    $result = $articleCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($article_id)]);
    $_SESSION['success'] = "Article supprimer avec succès";
    header("Location: index.php");
 
 ?>