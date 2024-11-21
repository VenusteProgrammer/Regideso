<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <?php 
        include "Connexion.php" ;
        $affichageAdd = $bdd->query("Select * from Adresse order by id_adr DESC");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionAdr = $bdd->query("delete from Adresse where id_adr=".$_GET['sup']);
            header("location: affichage_adresse.php");
        }
    ?>

    <?php include "Header1.php" ?>
</head> 
<body>
    <div class="container">
    
        <h1>Adresses</h1>
        <table>
            <tr>
                <th>Pays</th>
                <th>Province</th>
                <th>Commune</th>
                <th>Quartier</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageAdd->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["pays"]; ?></td>
                    <td><?php echo $dataRecup["province"]; ?></td>
                    <td><?php echo $dataRecup["commune"]; ?></td>
                    <td><?php echo $dataRecup["quartier"]; ?></td>
                    <td><a class="delete" href="affichage_adresse.php?sup=<?php echo $dataRecup["id_adr"]; ?>"><i class="bi bi-trash"></i></a></td>
                    <td><a class="modify" href="modif_adresse.php?mod=<?php echo $dataRecup["id_adr"]; ?>"><i class="bi bi-pen-fill"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>