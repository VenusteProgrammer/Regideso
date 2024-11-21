<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Administrateur</title>
    <?php 
        include "Connexion.php";
        $modifAdmin = $bdd->query("Select * from Administrateur where id_admin=".$_GET['mod']);
        $dataRecup = $modifAdmin->fetch();   

    ?>
    <?php include "Header1.php" ?>
</head>
<body>
      
    <section id="comment-form">
        <h1> Modification d'un utilisateur </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="username">
                    Username
                    <input type="text" value="<?php echo $dataRecup["username"]; ?>" name="name" id="username" required pattern="^[a-zA-Z0-9_]{3,20}$">
                </label>
            </div>

            <div class="form-control">
                <label for="pswd">
                    Mot de passe
                    <input type="password" value="<?php echo $dataRecup["password"]; ?>" name="pswd" id="pswd" required>
                </label>  
            </div>
            <button type="submit" name="valider">Modifier</button>
            
        </form>
 
        <?php
            if(isset($_POST["valider"])){
                $recupUsername = $_POST["name"];
                $recupPswd = $_POST["pswd"];
    
                $modifAdmin = "update Administrateur set username='$recupUsername',password='$recupPswd' where id_admin=".$_GET['mod'];

                $bdd->exec($modifAdmin); 
                header("location: affichage_administrateur.php");

            }
        ?>
    </section>
</body>
</html>