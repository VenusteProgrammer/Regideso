<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compteurs</title>
    <?php 
        include "Connexion.php" ;
        $affichageCompt = $bdd->query("Select * from Compteur as cp join Client as cl on cp.client = cl.id_client order by id_compt DESC");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionCompt = $bdd->query("delete from Compteur where id_compt=".$_GET['sup']);
            header("location: affichage_compteur.php");
        }
    ?>

    <?php include "Header1.php" ?>
</head>
<body>
    <div class="container">
    
        <h1>Compteurs</h1>
        <table>
            <tr>
                <th>Client</th>
                <th>Telephone</th>
                <th>Numero de Compteur</th>
                <th>Type</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageCompt->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["nom"]; ?></td>
                    <td ><?php echo $dataRecup["telephone"]; ?></td>
                    <td><?php echo $dataRecup["num_compteur"]; ?></td>
                    <td><?php echo $dataRecup["type"]; ?></td>
                    <td><a class="delete" href="affichage_compteur.php?sup=<?php echo $dataRecup["id_compt"]; ?>"><i class="bi bi-trash"></i></a></td>
                    <td><a class="modify" href="modif_compteur.php?mod=<?php echo $dataRecup["id_compt"]; ?>"><i class="bi bi-pen-fill"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>