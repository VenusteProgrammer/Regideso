<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <?php include "Connexion.php" ?>
    <?php include "Header1.php" ?>
</head>
<body> 
      
    <section id="comment-form">
        <h1>Inserez Client</h1>
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
                    <select name="adress" id="adress">
                        <?php  
                            $affichageAdress = $bdd->query("Select * from Adresse");
                            while($dataAdress = $affichageAdress->fetch()){

                        ?>
                            <option value=" <?php echo $dataAdress["id_adr"]; ?> ">
                                <?php echo $dataAdress["commune"]." - ".$dataAdress["quartier"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>

            <div class="form-control">
                <label for="tel">
                    Numero de Telephone:
                    <input type="tel" name="tel" id="tel" require pattern="\+[0-9]*">
                </label>
            </div>
            <div class="form-control">
                <label for="mail">
                    Mail 
                    <input type="email" name="mail" id="mail" require>
                </label>
            </div>
            <div class="form-control">
                <label for="username">
                    Username 
                    <input type="text" name="username" id="username" require pattern="^[a-zA-Z0-9_]{3,20}$">
                </label>
            </div>
            <div class="form-control">
                <label for="pswd">
                    Mot de Passe
                    <input type="password" name="pswd" id="pswd" require pattern="(?=.*[1-9]).{3,}">
                </label>
            </div>
                <button type="submit" name="valider">Envoyer</button>
            </fieldset>
            
        </form>
        <?php
            if(isset($_POST["valider"])){

                $recupNom = $_POST["name"] ? strtoupper(trim($_POST['name'])) : '';
                $recupPrenom = $_POST["pname"];
                $recupAdd = $_POST["adress"];
                $recupTel = $_POST["tel"];
                $recupMail = $_POST["mail"];
                $recupUser = $_POST["username"];
                $recupPswd = $_POST["pswd"];

                $trouveClient = $bdd->prepare("Select * from Client where telephone= :telephone");
                $trouveClient->bindParam(':telephone', $recupTel, PDO::PARAM_STR);
                $trouveClient->execute();
                if($trouveClient->rowCount() > 0){
                    echo "Personnes existe deja";
                }
                else{
                    $insertCont = "insert into Client(nom,prenom,adresse,telephone,email,username,password) values('$recupNom','$recupPrenom','$recupAdd','$recupTel','$recupMail','$recupUser','$recupPswd')";
                    $bdd->exec($insertCont); 
                    header("location: affichage_client.php");
                }
    

            }
        ?>
    </section>
</body>
</html>