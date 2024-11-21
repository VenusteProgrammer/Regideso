<?php
 include "Connexion.php";
 include "Header1.php";
if(isset($_POST["valider"])){

    $recupCompt = $_POST["compt"];
    $recupMontant = $_POST["montant"];
                
    $trouvefact = $bdd->prepare("Select * from Facture where compteur= :fact");
      $trouvefact->bindParam(':fact', $recupCompt, PDO::PARAM_STR);
    $trouvefact->execute();
    if($trouvefact->rowCount() > 0){
        echo "Facture existe deja";
    }
    else{
        $insertfact = "insert into Facture(compteur,montant) values('$recupCompt','$recupMontant')";
        $bdd->exec($insertfact); 
        header("location: affichage_facture.php");
    }
}
        ?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation des Factures</title>
    
</head>
<body>
      
    <section id="comment-form">
        <h1>Inserez Facture </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="compt">
                    Compteur
                    <select name="compt" id="compt">
                        <?php  
                            $affichageCompt = $bdd->query("Select * from Compteur");
                            while($dataCompt = $affichageCompt->fetch()){

                        ?>
                            <option value="<?php echo $dataCompt["id_compt"]; ?>">
                                <?php echo $dataCompt["num_compteur"]." - ".$dataCompt["type"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>
              
            <div class="form-control">
                <label for="montant">
                    Montant
                    <input type="number" name="montant" id="montant" require pattern="\[0-9]*">
                </label>
            </div>
              
            <button type="submit" name="valider">Envoyer</button>

        </form>
        
</section>
</body>
</html>