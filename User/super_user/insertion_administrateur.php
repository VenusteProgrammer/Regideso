<?php
     include "Connexion.php";
     include "Header1.php";
    if(isset($_POST["valider"])){
        $recupUsername = $_POST["username"];
        $recupPswd = $_POST["pswd"];
    
        $insertAdmin = "insert into Administrateur(username,password) values('$recupUsername','$recupPswd')";

        $bdd->exec($insertAdmin); 
        header("location: affichage_administrateur.php");
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation Regideso</title>
</head>
<body>
      
    <section id="comment-form">
        <h1> Ajout d'un utilisateur </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="username">
                    Username
                    <input type="text" name="username" id="username" required pattern="^[a-zA-Z0-9_]{3,20}$">
                </label>
            </div>

            <div class="form-control">
                <label for="pswd">
                    Mot de passe
                    <input type="password" name="pswd" id="pswd" required>
                </label>  
            </div>
            <button type="submit" name="valider">Envoyer</button>
            
        </form>
    </section>
</body>
</html>