<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Reclamations</title>
    <?php 
        include "Connexion.php" ;
        $affichageRecl = $bdd->query("Select * from Reclamation as recl join (Facture as f join (Compteur as cp join Client as cl on cp.client = cl.id_client) on f.compteur = cp.id_compt) on recl.num_fact = f.id_fact order by id_recl DESC");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionRecl = $bdd->query("delete from Reclamation where id_recl=".$_GET['sup']);
            header("location: afichage_reclamation.php");
        }
        
        if(isset($_GET["desap"])){
            $modifetat2 = $bdd->query("update Reclamation set etat='2' where id_recl=".$_GET['desap']);
            header("location: afichage_reclamation.php");
        }
    ?>
    <?php
    if(isset($_GET["ap"])){
            $modifetat1 = $bdd->query("update Reclamation set etat='1' where id_recl=".$_GET['ap']);
            header("location: afichage_reclamation.php");
        }
    ?>

    <style>
        .image-preview {
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
        }
    </style>

    <?php include "Header1.php" ?>
</head>
<body>
    <div class="container">
    
        <h1>Nos Reclamations</h1>
        <table>
            <tr>
                <th>Client</th>
                <th>Telephone</th>
                <th>Numero de Compteur</th>
                <th>Numero Facture</th>
                <th>Description</th>
                <th>Date de Reclamation</th>
                <th>Etat</th>
                <th>Image</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageRecl->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["nom"]; ?></td>
                    <td ><?php echo $dataRecup["telephone"]; ?></td>
                    <td ><?php echo $dataRecup["num_compteur"]; ?></td>
                    <td style="text-align: center;"><?php echo $dataRecup["num_fact"]; ?></td>
                    <td><?php echo $dataRecup["description"]; ?></td>
                    <td><?php echo $dataRecup["date_recl"]; ?></td>
                    <td><?php echo($dataRecup["etat"] == 0) ? 'En attente' : (($dataRecup["etat"] == 1) ? 'Approuve' : 'Desapprouve'); ?></td>
                    <td>
                        <?php if (!empty($dataRecup["image_path"])): ?>
                            <img src="uploads/<?php echo htmlspecialchars($dataRecup["image_path"]); ?>" alt="Reclamation Image" class="image-preview">
                        <?php else: ?>
                            Pas d'image
                        <?php endif; ?>
                    </td>
                    <td><a class="delete" href="afichage_reclamation.php?sup=<?php echo $dataRecup["id_recl"]; ?>"><i class="bi bi-trash"></i></a></td>

                    <td><a class="modify" href="afichage_reclamation.php?<?php echo(($dataRecup["etat"] == 1) ? 'desap' : 'ap'); ?>=<?php echo $dataRecup["id_recl"]; ?>"><?php echo(($dataRecup["etat"] == 1) ? '<i class="bi bi-hand-thumbs-down-fill"></i>' : '<i class="bi bi-hand-thumbs-up-fill"></i>'); ?></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>