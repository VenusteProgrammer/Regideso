<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation des adresses</title>
    <?php include "Connexion.php" ?>
    <?php include "Header1.php" ?>
</head>
<body>
      
    <section id="comment-form">
        <h1>Inserez Adresse </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="pays">
                    Pays
                    <input type="text" name="pays" id="pays" require autofocus>
                </label>
            </div>
              
            <div class="form-control">
                <label for="province">
                    Province
                    <input type="text" name="province" id="province" require>
                </label>
            </div>
              
            <div class="form-control">
                <label for="commune">
                    Commune
                    <input type="text" name="commune" id="commune" require>
                </label>
            </div>
              
            <div class="form-control">
                <label for="quartier">
                    Quartier
                    <input type="text" name="quartier" id="quartier" require>
                </label>
            </div>
              
            <button type="submit" name="valider">Envoyer</button>

        </form>
        <?php
            if(isset($_POST["valider"])){

                $recupPays = $_POST["pays"];
                $recupProv = $_POST["province"];
                $recupComm = $_POST["commune"];
                $recupQuartier = $_POST["quartier"];
    
                $insertPub = "insert into Adresse (pays,province,commune,quartier) values('$recupPays','$recupProv','$recupComm','$recupQuartier')";

                $bdd->exec($insertPub); 
                header("location: affichage_adresse.php");

            }
        ?>
</section>
</body>
</html>