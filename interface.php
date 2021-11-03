<?php
//Cette page permet dafficher la liste des categories
require_once('config.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Site du BTS SIO</title>
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
        <script src="https://kit.fontawesome.com/8cc7022a47.js" crossorigin="anonymous"></script>
    </head>

        <div class="block">
            <header class="header">
            <?php
	        	if(isset($_SESSION['username'])&& $_SESSION['statut_admin'] == 0 )
	        	{
            ?>
            <a href="accueil.php" class="header-logo">Accueil</a>
                <nav class="header-menu">
                    <a href= "espaceuser.php"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <a href="envoie.php">Espace Messagerie</a>
                    <a href="messageRecu.php">Messages Reçu</a>
                    <a href="messageEnvoyer.php">Messages Envoyé</a>
                    <a href="evenement.php">Evenements</a>
                    <a href="gestion_offre_emploi_stage.php">Offre Emploi / Stage</a>
                    <a href = "login.php">Deconnexion</a>
                </nav>
	        <?php
            }
        
	        elseif(isset($_SESSION['username'])&& $_SESSION['statut_admin'] == 1 )
	        	{
            ?>
            <a href="accueil.php" class="header-logo">Accueil</a>
                <nav class="header-menu">
                    <a href= "espaceuser.php"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <a href="envoie.php">Espace Messagerie</a>
                    <a href="messageRecu.php">Messages Reçu</a>
                    <a href="messageEnvoyer.php">Messages Envoyé</a>
                    <a href="evenement.php">Evenements</a>
                    <a href="liste_compte.php">Listing Comptes</a>

                    <a href="gestion_offre_emploi_stage.php">Gestion Offre Emploi / Stage</a>
                    <a href = "login.php">Deconnexion</a>
                </nav>

	        <?php
                }
		    else {
            ?>
             <a href="accueil.php" class="header-logo">Accueil</a>
                <nav class="header-menu">
                    <a href="evenement.php">Evenements</a>
                    <a href = "signup.php">Inscription</a>
                    <a href = "login.php">Connexion</a>
                </nav>
            <?php
		}
    ?>
    </header>
    <body>