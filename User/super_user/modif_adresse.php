<?php
        include "Connexion.php";
        $modifAdd = $bdd->query("Select * from Adresse where id_adr=".$_GET['mod']);
        $dataRecup = $modifAdd->fetch(); 
        include "Header1.php";
    if(isset($_POST["valider"])){

        $recupPays = $_POST["pays"];
        $recupProv = $_POST["province"];
        $recupComm = $_POST["commune"];
        $recupQuartier = $_POST["quartier"];
    
        $modifPub = "update Adresse set pays='$recupPays',province='$recupProv',commune='$recupComm',quartier='$recupQuartier' where id_adr=".$_GET['mod'];

        $bdd->exec($modifPub); 
        header("location: affichage_adresse.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des adresses</title>
    
</head>
<body>
      
    <section id="comment-form">
        <h1>Modifiez Adresse </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="pays">
                    Pays
                    <input type="text" value="<?php echo $dataRecup["pays"]; ?>" name="pays" id="pays" require autofocus>
                </label>
            </div>
              
            <div class="form-control">
                <label for="province">
                    Province
                    <input type="text" value="<?php echo $dataRecup["province"]; ?>" name="province" id="province" require>
                </label>
            </div>
              
            <div class="form-control">
                <label for="commune">
                    Commune
                    <input type="text" value="<?php echo $dataRecup["commune"]; ?>" name="commune" id="commune" require>
                </label>
            </div>
              
            <div class="form-control">
                <label for="quartier">
                    Quartier
                    <input type="text" value="<?php echo $dataRecup["quartier"]; ?>" name="quartier" id="quartier" require>
                </label>
            </div>
              
            <button type="submit" name="valider">Modifier</button>

        </form>
        
</section>
</body>
</html>