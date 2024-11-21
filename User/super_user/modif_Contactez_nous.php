<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Contactez Regideso</title>
    <?php 
        include "Connexion.php";
        $modifContact = $bdd->query("Select * from Contactez_nous where id_cont=".$_GET['mod']);
        $dataRecup = $modifContact->fetch();   

     ?>
    <?php include "Header1.php" ?>
</head>
<body> 
    <section id="comment-form">
        <h1>Modification du Contactez-Nous</h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="name">
                    Votre Nom: 
                    <input type="text" value="<?php echo $dataRecup["nom"]; ?>" name="name" id="name" require autofocus pattern="[A-Za-zÀ-ÿ\s]{2,20}">
                </label>
            </div>
            <div class="form-control">
                <label for="pname">
                    Votre Prenom: 
                    <input type="text" value="<?php echo $dataRecup["prenom"]; ?>" name="pname" id="pname" require pattern="[A-Za-zÀ-ÿ\s]{2,20}">
                </label>
            </div>
            <div class="form-control">
                <label for="adress">
                    Votre Adresse: 
                    <input type="text" value="<?php echo $dataRecup["adresse"]; ?>" name="adress" id="adress" require>
                </label>
            </div>
            <div class="form-control">
                <label for="tel">
                    Numero de Telephone:
                    <input type="tel" value="<?php echo $dataRecup["telephone"]; ?>" name="tel" id="tel" require pattern="\+[0-9]*">
                </label>
            </div>
            <div class="form-control">
                <label for="object">
                    Objet: 
                    <input type="text" value="<?php echo $dataRecup["objet"]; ?>" name="object" id="object" require>
                </label>
            </div>
            <div class="form-control">
                <label for="msg">
                    Votre Message: 
                    <textarea name="msg" id="msg" cols="30" rows="5" require><?php echo $dataRecup["message"]; ?></textarea>
                </label>
            </div>
                <button type="submit" name="valider">Modifier</button>
            </fieldset>
            
        </form>
        <?php
            if(isset($_POST["valider"])){

                $recupNom = $_POST["name"];
                $recupPrenom = $_POST["pname"];
                $recupAdd = $_POST["adress"];
                $recupTel = $_POST["tel"];
                $recupObj = $_POST["object"];
                $recupMsg = $_POST["msg"];
    
                $modifCont = "update Contactez_nous set nom='$recupNom',prenom='$recupPrenom',adresse='$recupAdd',telephone='$recupTel',objet='$recupObj',message='$recupMsg' where id_cont=".$_GET['mod'];

                $bdd->exec($modifCont); 
                header("location: affichage_contactez.php");

            }
        ?>
    </section>
</body>
</html>