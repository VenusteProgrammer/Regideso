<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <?php 
        include "Connexion.php" ;
        $affichagePub = $bdd->query("Select * from Publication order by id_pub DESC");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionPub = $bdd->query("delete from Publication where id_pub=".$_GET['sup']);
            header("location: affichage_publication.php");
        }
    ?>

    <?php include "Header1.php" ?>
</head>
<body>
    <div class="container">
    
        <h1>Nos Publications</h1>
        <table>
            <tr>
                <th>Objectif</th>
                <th>Publicite</th>
                <th>Date de Publication</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichagePub->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["objectif"]; ?></td>
                    <td><?php echo $dataRecup["publicite"]; ?></td>
                    <td><?php echo $dataRecup["date_pub"]; ?></td>
                    <td><a class="delete" href="affichage_publication.php?sup=<?php echo $dataRecup["id_pub"]; ?>"><i class="bi bi-trash"></i></a></td>
                    <td><a class="modify" href="modif_publication.php?mod=<?php echo $dataRecup["id_pub"]; ?>"><i class="bi bi-pen-fill"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
