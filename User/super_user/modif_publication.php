<?php 
    include "Connexion.php" ;
    $affichagePub = $bdd->query("Select * from Publication where id_pub=".$_GET['mod']);
    $dataRecup = $affichagePub->fetch(); 
    include "Header1.php";
    if(isset($_POST["valider"])){
        $recupObjectif = $_POST["Objectif"];
        $recupmsg = $_POST["msg"];
    
        $modifPub = "update Publication set objectif='$recupObjectif',publicite='$recupmsg' where id_pub=".$_GET['mod'];

        $bdd->exec($modifPub); 
        header("location: affichage_publication.php");

        } 
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des publications</title>
    
</head>
<body>
    <section id="comment-form">
        <h1> Modifier un message </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="Objectif">
                    Objectif
                    <input type="text" value="<?php echo $dataRecup["objectif"]; ?>" name="Objectif" id="name" require autofocus>
                </label>
            </div>
            <div class="form-control">
                <label for="msg">
                    Publication
                    <textarea name="msg" id="pswd" cols="30" rows="10"><?php echo $dataRecup["publicite"]; ?></textarea>
                </label>
            </div>
            <button type="submit" name="valider">Modifier</button>

        </form>
</section>
</body>
</html>