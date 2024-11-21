<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
    <?php 
        include "Connexion.php";
        $affichageComm = $bdd->query("Select * from commentaire as cm join Publication as p on cm.publication = p.id_pub order by id_comm DESC");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionComm = $bdd->query("delete from commentaire where id_comm=".$_GET['sup']);
            header("location: affichage_comments.php");
        }
    ?>

    <?php include "Header1.php" ?>
</head>
<body>
    <div class="container">
    
        <h1>Commentaires</h1>
        <table>
            <tr>
                <th>Objectif</th>
                <th>Publicite</th>
                <th>Date de Publication</th>
                <th>Commentaire</th>
                <th>Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageComm->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["objectif"]; ?></td>
                    <td><?php echo $dataRecup["publicite"]; ?></td>
                    <td><?php echo $dataRecup["date_pub"]; ?></td>
                    <td><?php echo $dataRecup["commentaire"]; ?></td>
                    <td style="text-align: center;"><a class="delete" href="affichage_comments.php?sup=<?php echo $dataRecup["id_comm"]; ?>"><i class="bi bi-trash"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>