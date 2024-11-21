<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation des publications</title>
    <?php include "Connexion.php" ?>
    <?php include "Header1.php" ?>
</head>
<body>
      
    <section id="comment-form">
        <h1> Publier un message </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="Objectif">
                    Objectif
                    <input type="text" name="Objectif" id="name" require autofocus>
                </label>
            </div>
              
            <div class="form-control">
                <label for="msg">
                    Publication
                    <textarea name="msg" id="pswd" cols="30" rows="10"></textarea>
                </label>
            </div>
            <button type="submit" name="valider">Envoyer</button>

        </form>
        <?php
            if(isset($_POST["valider"])){

                $recupObjectif = $_POST["Objectif"];
                $recupmsg = $_POST["msg"];
    
                $insertPub = "insert into Publication (objectif,publicite) values('$recupObjectif','$recupmsg')";

                $bdd->exec($insertPub); 
                header("location: affichage_publication.php");

            }
        ?>
</section>
</body>
</html>