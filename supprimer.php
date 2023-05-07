<?php
 
 require 'vendor/autoload.php';
 $client = new MongoDB\Client("mongodb://localhost:27017");
 $userCollection = $client->voitures->carpark;


    $car_id = $_GET['id'];
    
    $result = $userCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($car_id)]);
    $_SESSION['success'] = "Car successfully deleted";
    header("Location: index.php");
 
 ?>