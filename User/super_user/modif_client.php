<?php
        include "Connexion.php";
         include "Header1.php";
        $modClient = $bdd->query("Select * from Client as cl join Adresse as ad on cl.adresse  = ad.id_adr where id_client=".$_GET['mod']);
        $dataRecup = $modClient->fetch(); 
            if(isset($_POST["valider"])){

                $recupNom = $_POST["name"] ? strtoupper(trim($_POST['name'])) : '';
                $recupPrenom = $_POST["pname"];
                $recupAdd = $_POST["adress"];
                $recupTel = $_POST["tel"];
                $recupMail = $_POST["mail"];
                $recupUser = $_POST["username"];
                $recupPswd = $_POST["pswd"];

                $modifCont = "update Client set nom='$recupNom',prenom='$recupPrenom',adresse='$recupAdd',telephone='$recupTel',email='$recupMail',username='$recupUser',password='$recupPswd' where id_client=".$_GET['mod'];
                $bdd->exec($modifCont); 
                header("location: affichage_client.php");
                
    

            }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
   
</head>
<body> 
      
    <section id="comment-form">
        <h1>Modifiez Client</h1>
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
                    <select name="adress" id="adress">
                        <?php  
                            $affichageAdress = $bdd->query("Select * from Adresse");
                            while($dataAdress = $affichageAdress->fetch()){

                        ?>
                            <option value=" <?php echo $dataAdress["id_adr"]; ?> " <?php echo($dataAdress["id_adr"] == $_GET['mod']) ? "selected" : ''; ?>>
                                <?php echo $dataAdress["commune"]." - ".$dataAdress["quartier"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>

            <div class="form-control">
                <label for="tel">
                    Numero de Telephone:
                    <input type="tel" value="<?php echo $dataRecup["telephone"]; ?>" name="tel" id="tel" require pattern="\+[0-9]*">
                </label>
            </div>
            <div class="form-control">
                <label for="mail">
                    Mail 
                    <input type="email" value="<?php echo $dataRecup["email"]; ?>" name="mail" id="mail" require>
                </label>
            </div>
            <div class="form-control">
                <label for="username">
                    Username 
                    <input type="text" value="<?php echo $dataRecup["username"]; ?>" name="username" id="username" require pattern="^[a-zA-Z0-9_]{3,20}$">
                </label>
            </div>
            <div class="form-control">
                <label for="pswd">
                    Mot de Passe
                    <input type="password" value="<?php echo $dataRecup["password"]; ?>" name="pswd" id="pswd" require pattern="(?=.*[1-9]).{3,}">
                </label>
            </div>
                <button type="submit" name="valider">Envoyer</button>
            </fieldset>
            
        </form>
    </section>
</body>
</html>