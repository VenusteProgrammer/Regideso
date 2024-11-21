<?php
    include "Connexion.php";
    include "Header1.php";
    if(isset($_GET["id"])){
        $selectedPub = $bdd->query("select * from Publication where id_pub=".$_GET['id']);
        
    }
    if(isset($_POST["valider"])){
        $recupPub = $_GET["id"];
        $recupCom = htmlspecialchars($_POST["comment"], ENT_QUOTES, 'UTF-8');

        $insertcomm = "insert into commentaire(commentaire, publication) values('$recupCom', '$recupPub')";
        $bdd->exec($insertcomm);
        header("location: Accueil.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires Regideso</title>
    
</head> 
<body>
    <section id="comment-form">
        <div class="container">
            <?php 
                while ( $dataRecup = $selectedPub->fetch()) {         
            ?>
                <h1><?php echo $dataRecup["objectif"]; ?></h1>
                <h3><?php echo $dataRecup["publicite"]; ?></h3>
                <sup>Publie <?php echo $dataRecup["date_pub"]; ?></sup>
            <?php } ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <label for="descr">
                    Commentaire
                    <textarea name="comment" id="comment" cols="30" rows="5" require></textarea>
                </label>
            </div>
            <button type="submit" name="valider">Envoyer</button>
            
        </form>
    </section>
      
    
</body>
</html>