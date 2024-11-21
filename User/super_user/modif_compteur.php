<?php 
    include "Connexion.php";
    $modifCompt = $bdd->query("Select * from Compteur as cp join Client as cl on cp.client = cl.id_client where id_compt=".$_GET['mod']);
    $dataRecup = $modifCompt->fetch(); 
    include "Header1.php";
    if(isset($_POST["valider"])){

                $recupClient = $_POST["client"];
                $recupNum = $_POST["compt"];
                $recupType = $_POST["type"];
                $modifcompt = "update Compteur set client='$recupClient',num_compteur='$recupNum',type='$recupType' where id_compt=".$_GET['mod'];
                $bdd->exec($modifcompt); 
                header("location: affichage_compteur.php");

            }
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des compteurs</title>
    
</head>
<body>
    
    <section id="comment-form">
        <h1>Modifiez Compteur </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="client">
                    Client
                    <select name="client" id="client">
                        <?php  
                            $affichageClient = $bdd->query("Select * from Client");
                            while($dataClient = $affichageClient->fetch()){

                        ?>
                            <option value=" <?php echo $dataClient["id_client"]; ?> " <?php echo($dataClient["id_client"] == $_GET['mod']) ? "selected" : ''; ?>>
                                <?php echo $dataClient["nom"]." - ".$dataClient["telephone"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>
            
            <div class="form-control">
                <label for="compt">
                    Numero Compteur
                    <input type="number" value="<?php echo $dataRecup["num_compteur"]; ?>" name="compt" id="compt" require pattern="\[0-9]*">
                </label>
            </div>
            
            
            <div class="">
                <label for="type">
                    <input type="radio" name="type" value="Eau" <?php echo($dataRecup["type"] == 'Eau') ? 'checked' : ''; ?>> Eau
                    <input type="radio" name="type" value="Electricité" <?php echo($dataRecup["type"] == 'Electricité') ? 'checked' : ''; ?>> Electricité
                </label>
            </div>
            
            <button type="submit" name="valider">Envoyer</button>

        </form>
</section>
</body>
</html>