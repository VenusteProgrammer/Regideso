<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation Regideso</title>
    <?php 
        include "Connexion.php";
        $modifRecl = $bdd->query("Select * from Reclamation as recl join (Facture as f join (Compteur as cp join Client as cl on cp.client = cl.id_client) on f.compteur = cp.id_compt) on recl.num_fact = f.id_fact where id_recl=".$_GET['mod']);
        $dataRecup = $modifRecl->fetch();
        $hey = "selected";   

    ?>
    <?php include "Header1.php" ?>
</head> 
<body>
    <section id="comment-form">
        <h1> Reclamer </h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <label for="facture">
                    Facture
                    <select name="facture" id="facture">
                        <?php  
                            $affichageFact = $bdd->query("Select * from Reclamation");
                            while($dataFact = $affichageFact->fetch()){

                        ?>
                            <option value=" <?php echo $dataFact["num_fact"]; ?> " <?php echo($dataFact["id_recl"] == $_GET['mod']) ? "selected" : ''; ?>>
                                <?php echo $dataFact["num_fact"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>

            <div class="form-control">
                <label for="descr">
                    Description
                    <textarea name="descr" id="descr" cols="30" rows="5" require><?php echo $dataRecup["description"]; ?></textarea>
                </label>
            </div>

            </div>

            <div class="form-control">
                <label for="image">
                    Image
                    <input type="file" value="<?php echo $dataRecup["image_path"]; ?>" name="image" id="image" required>
                </label>
            </div>

            <button type="submit" name="valider">Envoyer</button>
            <?php
                if(isset($_POST["valider"])){
                    // conditions!!!!!!!!
                    $recupFact = $_POST["facture"];
                    $recupDescr = $_POST["descr"];
                    // recuperation de l'image
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                    $image = $_FILES["image"]["name"];
                    $image_type = $_FILES["image"]["type"];
                    $destination = "uploads/".$image;
                    if(in_array($image_type, $allowed_types)) {
                        $deplacer = move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
                    }
                    else{
                        echo "Type de fichier inacceptable utiliser (jpeg ou png ou gif";
                    }
                    if ($deplacer) {
                        $modifRecl = "update Reclamation set num_fact='$recupFact',description='$recupDescr',image_path='$image' where id_recl=".$_GET['mod'];
                        $bdd->exec($modifRecl); 
                        header("location: afichage_reclamation.php");
                        
                    }
                }
            ?>
        </form>
    </section>
      
    
</body>
</html>