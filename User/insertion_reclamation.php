<?php
include "Connexion.php";
include "Header1.php";
                 if(isset($_POST["valider"])){
                    $recupFact = $_POST["facture"];
                   // $recupDescr = $_POST["descr"];
                    $recupDescr = htmlspecialchars($_POST["descr"], ENT_QUOTES, 'UTF-8');
                    // recuperation de l'image
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                    $image = $_FILES["image"]["name"];
                    $image_type = $_FILES["image"]["type"];
                    $destination = "super_user/uploads/".$image;
                    if(in_array($image_type, $allowed_types)) {
                        $trouvefact = $bdd->prepare("Select * from Facture where id_fact= :fact");
                        $trouvefact->bindParam(':fact', $recupFact, PDO::PARAM_STR);
                        $trouvefact->execute();

                        if($trouvefact->rowCount() > 0){
                        $deplacer = move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
                        }
                        else{
                            echo '<div class="notification">' . 'Numero de Facture incorrect' . '</div>';
                        }
                    }
                    else{
                        echo '<div class="notification">' . 'Type de fichier inacceptable utiliser (jpeg ou png ou gif)' . '</div>';
                    }
                    if ($deplacer) {
                        $trouverecla = $bdd->prepare("Select * from Reclamation where num_fact= :recla");
                        $trouverecla->bindParam(':recla', $recupFact, PDO::PARAM_STR);
                        $trouverecla->execute();
                        if($trouverecla->rowCount() > 0){
                            echo '<div class="notification">' . 'Vous avez deja reclamme pour ce facture' . '</div>';
                        }
                        else{
                            $insertRecl = "insert into Reclamation(num_fact,description,image_path) values('$recupFact','$recupDescr','$image')";
                            $bdd->exec($insertRecl); 
                            header("Location: Accueil.php");
                        }
                    }
                }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation Regideso</title>
     <style>
        .notification {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            margin: 10px 0;
            border-radius: 5px;
}
     </style>
</head> 
<body>
    
    <section id="comment-form">
        <h1> Reclamer </h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <div class="form-control">
                <label for="fact">
                    Numero de facture:
                    <input type="text" name="facture" id="fact" require pattern="[0-9]*">
                </label>
            </div>

            <div class="form-control">
                <label for="descr">
                    Description
                    <textarea name="descr" id="descr" cols="30" rows="5" require></textarea>
                </label><br><br>
            </div>
            </div>

            <div class="form-control">
                <label for="image">
                    Image
                    <input type="file" name="image" id="image" required>
                </label>
            </div>

            <button type="submit" name="valider">Envoyer</button>
            
        </form>
    </section>
      
    
</body>
</html>