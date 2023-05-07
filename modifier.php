<?php
 require 'vendor/autoload.php';
 $client = new MongoDB\Client("mongodb://localhost:27017");
 $userCollection = $client->voitures->carpark;

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $car_id = $_POST['car_id'];
  $car = [
      'code' => $_POST['code'],
      'modele' => $_POST['modele'],
      'carburant' => $_POST['carburant'],
  ];

    
    $car = $userCollection->updateOne(['_id'=> new MongoDB\BSON\ObjectID($car_id)],['$set'=>$car]);
    $_SESSION['success'] = "Modifier  avec succes";
    header("Location: index.php");
    

    if (isset($_GET['id'])){
        $car = $collection->findOne(['_id'=>new MongoDB\BSON\ObjectID($_GET['id'])]);
    }
    }
    $car_id = $_GET['id'];
    $car = $userCollection->findOne(['_id'=>new MongoDB\BSON\ObjectID($car_id)]);
    
 ?>

<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="modifier.php" method="post">
                <input type="hidden" name="car_id" value="<?php echo $car['_id']; ?>" />
                    <fieldset>
                        <legend>Insertion dans la base de donnees</legend>
                        
                        <table>
                            <tr>
                                <td>Code Voiture</td>
                                <td><input type="text" name="code" required></td>
                            </tr>

                            <tr>
                                <td>Modèle</td>
                                <td><input type="text" name="modele" required></td>
                            </tr>

                            <tr>
                                <label for="pet-select">Carburant :</label>

                                <select name="carburant" id="pet-select">
                                    <option value="">--Please Choisir Carburant--</option>
                                    <option value="essence">Essence</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="gpl">G.P.L</option>
                                    <option value="electrique">Electrique</option>
                                </select>

                            </tr>

                            <tr>
                                <td><input type="submit" value="Insertion"></td>
                                <td><input type="reset" value="Reinitialiser"></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>