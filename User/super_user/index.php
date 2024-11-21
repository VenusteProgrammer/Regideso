<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/styles.css">
    <?php include "Connexion.php" ?>
</head>
<?php 
        $bdd = new PDO('mysql:host=localhost;dbname=Regideso_DB;charset=utf8', 'root', '');
    ?>
<body> 
    <header id="main-navigation">
        <h1><a href="#">
            <img src="images/logo1.png" alt="logo Regideso" width="70rem" class="logo">
        </a></h1>
    </header>
    <br><br><br><br>
    <section id="comment-form">
        <h1>Connectez Vous</h1>
            <form action="" method="POST">
                <div class="form-control">
                    <label for="name">
                        Nom Utilisateur: 
                        <input type="text"  name="username" id="username" require autofocus pattern="[A-Za-zÀ-ÿ\s]{2,20}">
                        
                    </label>
                </div>
                <div class="form-control">
                    <label for="pname">
                        Mot de passe: 
                        <input type="password" name="password" id="password" require >
                    </label>
                </div>
                <button type="submit" name="valider">Login</button>
            </form>
        <?php
        if(isset($_POST["valider"])){
        $recupuser = $_POST["username"];
        $recuppassword = $_POST["password"];
        $trouveusers = $bdd->prepare("Select * from Administrateur where username= :user and password= :pass");
                    $trouveusers->bindParam(':user', $recupuser, PDO::PARAM_STR);
                    $trouveusers->bindParam(':pass', $recuppassword, PDO::PARAM_STR);
                    $trouveusers->execute();
                    if($trouveusers->rowCount() > 0){
                        header("location:afichage_reclamation.php");
                    }
                    else{
                        echo "Parametre incorrect";
                    }
        }
        ?>
    </section>
    <footer class="footer">
        <p>REGIDESO </p>
    </footer>

</body>
</html>
