<?php 
    include "Connexion.php";
    $modifFact = $bdd->query("Select * from Facture as f join (Compteur as cp join Client as cl on cp.client = cl.id_client) on f.compteur = cp.id_compt where id_fact=".$_GET['mod']);
    $dataRecup = $modifFact->fetch();   
    include "Header1.php";
    if(isset($_POST["valider"])){
                $recupCompt = $_POST["compt"];
                $recupMontant = $_POST["montant"];
                $recupEtat = $_POST["etat"];
                
                $modiffact = "update Facture set compteur='$recupCompt',montant='$recupMontant',etat='$recupEtat' where id_fact=".$_GET['mod'];
                $bdd->exec($modiffact); 
                header("location: affichage_facture.php");
            }
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des Factures</title>
    
</head>
<body>
    <section id="comment-form">
        <h1>Modifiez Facture </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="compt">
                    Compteur
                    <select name="compt" id="compt">
                        <?php  
                            $affichageCompt = $bdd->query("Select * from Compteur");
                            while($dataCompt = $affichageCompt->fetch()){

                        ?>
                            <option value=" <?php echo $dataCompt["id_compt"]; ?> " <?php echo($dataCompt["id_compt"] == $_GET['mod']) ? "selected" : ''; ?>>
                                <?php echo $dataCompt["num_compteur"]." - ".$dataCompt["type"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <div class="">
                <label for="etat">
                    <input type="radio" name="etat" value="Payé" <?php echo($dataRecup["etat_fact"] == 1) ? 'checked' : ''; ?>> Payé
                    <input type="radio" name="etat" value="Non Payé" <?php echo($dataRecup["etat_fact"] == 0) ? 'checked' : ''; ?>> Non Payé
                </label>
            </div>
            
            <div class="form-control">
                <label for="montant">
                    Montant
                    <input type="number" value="<?php echo $dataRecup["montant"]; ?>" name="montant" id="montant" require pattern="\[0-9]*">
                </label>
            </div>
            
            <button type="submit" name="valider">Envoyer</button>

        </form>
</section>
</body>
</html>