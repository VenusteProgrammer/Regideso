<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Contactez_nous</title>
    <?php 
        include "Connexion.php" ;
        $affichageContact = $bdd->query("Select * from Contactez_nous order by id_cont DESC");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionCont = $bdd->query("delete from Contactez_nous where id_cont=".$_GET['sup']);
            header("location: affichage_contactez.php");
        }
    ?>

    <?php include "Header1.php" ?>
</head> 
<body>
    <div class="container">
    
        <h1>Contactez_nous</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Objet</th>
                <th>Message</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageContact->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["nom"]; ?></td>
                    <td><?php echo $dataRecup["prenom"]; ?></td>
                    <td><?php echo $dataRecup["adresse"]; ?></td>
                    <td ><?php echo $dataRecup["telephone"]; ?></td>
                    <td><?php echo $dataRecup["objet"]; ?></td>
                    <td><p style="width: 400px;"><?php echo $dataRecup["message"]; ?></p></td>
                    <td style="text-align: center;"><a class="delete" href="affichage_contactez.php?sup=<?php echo $dataRecup["id_cont"]; ?>"><i class="bi bi-trash"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>