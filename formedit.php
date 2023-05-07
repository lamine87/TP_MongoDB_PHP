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
</body>


</html>