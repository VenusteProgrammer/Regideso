<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <header id="main-navigation">
        <h1><a href="#">
            <img src="images/logo1.png" alt="logo Regideso" width="70rem" class="logo">
        </a></h1>
        <div class="nav-wrapper">
            <nav class="dropdown navig">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Insertions
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="insertion_facture.php">Insertion des Factures</a></li>
                    <li><a class="dropdown-item" href="insertion_client.php">Insertion des Clients</a></li>
                    <li><a class="dropdown-item" href="insertion_compteur.php">Insertion des Compteurs</a></li>
                    <li><a class="dropdown-item" href="insertion_administrateur.php">Insertion des Admins</a></li>
                    <li><a class="dropdown-item" href="insertion_adresse.php">Insertion des Adresses</a></li>
                    <li><a class="dropdown-item" href="insertion_publication.php">Insertion des Publications</a></li>
                </ul>
            </nav>
            <nav class="dropdown navig">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Affichages
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="afichage_reclamation.php">Affichage des Réclamations</a></li>
                    <li><a class="dropdown-item" href="affichage_facture.php">Affichage des Factures</a></li>
                    <li><a class="dropdown-item" href="affichage_client.php">Affichage des Clients</a></li>
                    <li><a class="dropdown-item" href="affichage_contactez.php">Affichage des Contactez-Nous</a></li>
                    <li><a class="dropdown-item" href="affichage_compteur.php">Affichage des Compteurs</a></li>
                    <li><a class="dropdown-item" href="affichage_administrateur.php">Affichage des Admins</a></li>
                    <li><a class="dropdown-item" href="affichage_adresse.php">Affichage des Adresses</a></li>
                    <li><a class="dropdown-item" href="affichage_publication.php">Affichage des Publications</a></li>
                    <li><a class="dropdown-item" href="affichage_comments.php">Affichage des Commentaires</a></li>
                </ul>
            </nav>
            <nav class="navig">
                <button class="btn" ><a href="index.php">Deconnexion</a></button>
            </nav>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    </header>
    <footer class="footer">
        <p>REGIDESO </p>
    </footer>
</body>
</html>