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
            
        }
    ?>

    <?php include "Header1.php" ?>
    <style>
        .post {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .post a {
            text-decoration: none;
            color: black;
            padding: 0.5rem;
            transform-origin: center;
            border-radius: 12px;
            background-color: blue;
        }

        .post a:hover,
        .post a:active{
            color: blue;
            background-color: black;
        }

        .post h3 {
            margin: 0.25rem 0;
        }

        .post date {
            color: #666666;
            margin: 0.25rem;
            font-style: italic;
            font-size: 0.85rem;
        }

        #all-posts {
            margin: 7rem auto;
            width: 90%;
            max-width: 60rem;
        }

        #all-posts h2 {
            text-align: center;
            font-size: 2rem;
            color: #2e2e2e;
            margin: 3rem 0;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(17rem, 1fr));
            gap: 1.5rem;
        }

    </style>
</head>
<body>
        <section id="all-posts">
            <h2>Nos Publications</h2>
            <ul>  
                <?php 
                    while ( $dataRecup = $affichagePub->fetch()) {         
                ?>         
                    <li>
                        <article class="post">
                            <div class="post__content">
                                <h3><?php echo $dataRecup["objectif"]; ?></h3>
                                <p><?php echo $dataRecup["publicite"]; ?></p>
                                <date><?php echo $dataRecup["date_pub"]; ?></date>
                                <a href="insertion_comments.php?id=<?php echo $dataRecup["id_pub"]; ?>">Commenter</a>
                            </div>
                        </article>
                    </li>
                <?php } ?>
            </ul>
        </section>

</body>
</html>


