  <?php
    include "Connexion.php";
    include "Header1.php";
            if(isset($_POST["valider"])){

                $recupNom = $_POST["name"];
                $recupPrenom = $_POST["pname"];
                $recupAdd = $_POST["adress"];
                $recupTel = $_POST["tel"];
                $recupObj = htmlspecialchars($_POST["object"], ENT_QUOTES, 'UTF-8');
                $recupMsg = htmlspecialchars($_POST["msg"], ENT_QUOTES, 'UTF-8');
    
                $insertCont = "insert into Contactez_nous(nom,prenom,adresse,telephone,objet,message) values('$recupNom','$recupPrenom','$recupAdd','$recupTel','$recupObj','$recupMsg')";
                $bdd->exec($insertCont);
                header("location: Accueil.php");

            }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez Regideso</title>
</head>
<body> 
    <section id="comment-form">
        <h1>Contactez-Nous</h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="name">
                    Votre Nom: 
                    <input type="text" name="name" id="name" require autofocus pattern="[A-Za-zÀ-ÿ\s]{2,20}">
                </label>
            </div>
            <div class="form-control">
                <label for="pname">
                    Votre Prenom: 
                    <input type="text" name="pname" id="pname" require pattern="[A-Za-zÀ-ÿ\s]{2,20}">
                </label>
            </div>
            <div class="form-control">
                <label for="adress">
                    Votre Adresse: 
                    <input type="text" name="adress" id="adress" require>
                </label>
            </div>
            <div class="form-control">
                <label for="tel">
                    Numero de Telephone:
                    <input type="tel" name="tel" id="tel" require pattern="\+[0-9]*">
                </label>
            </div>
            <div class="form-control">
                <label for="object">
                    Objet: 
                    <input type="text" name="object" id="object" require>
                </label>
            </div>
            <div class="form-control">
                <label for="msg">
                    Votre Message: 
                    <textarea name="msg" id="msg" cols="30" rows="5" require></textarea>
                </label>
            </div>
                <button type="submit" name="valider">Envoyer</button>
            </fieldset>
            
        </form>
    </section>
</body>
</html>