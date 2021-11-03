<?php
        require_once('interface.php');
    if(isset($_POST['nom'],$_POST['type'])){
		mysqli_query($link, 'INSERT INTO offre_emploi_stage (nom_entreprise, type_offre, description, critere, mail, telephone, id_user) VALUES("'.$_POST['nom'].'","'.$_POST['type'].'","'.$_POST['description'].'","'.$_POST['critere'].'","'.$_POST['mail'].'","'.$_POST['telephone'].'", "'.$_SESSION['userid'].'");');

    }

        $req = mysqli_query($link, 'SELECT nom_entreprise, type_offre, description, critere, mail, telephone FROM offre_emploi_stage');
       
    ?>
    <body>
        <div class="block">
            <div class="container">
                <div class="box"> 
                    <?php
                        if(isset($_SESSION['statut_admin']) && isset($_POST['Ajouter']) == false && $_SESSION['statut_admin'] == 1){
                    ?>
                    <form action="" method="post">
                    <input type="hidden" name="Ajouter">
                    <input type="submit" value="Ajouter une Offre">
                    </form>
                    <?php
                        }
                    if(isset($_POST['Ajouter'])){
                    ?>
                    <form action="" method="post">
                    <input type="text" name="nom" id="" placeholder="Nom de l'Entreprise" required>
                    <input type="text" name="type" id="" placeholder="type d'offre (emploi ou stage)" required>
                    <input type="text" name="description" id="" placeholder="Description">
                    <input type="text" name="critere" id="" placeholder="Critère" required>
                    <input type="text" name="mail" id="" placeholder="Adresse Email" required>
                    <input type="text" name="telephone" id="" placeholder="Téléphone" required>
                    <input type="submit" value="Ajouter">
                    
                    </form>
                    <?php
                        }
                    ?>
                            <h2 align="center">Liste des Offres d'Emplois et de Stages :</h2><br/>
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th align="center">Nom de l'Entreprise</th>
                                        <th align="center">Type d'Offre</th>
                                        <th align="center">Description</th>
                                        <th align="center">Profil Recherché</th>
                                        <th align="center">Adresse Mail</th>
                                        <th align="center">Téléphone</th>
                                    </tr>
                                </thread>
                                <tbody>	
                                    <?php   
                                        while($ligne = mysqli_fetch_array($req)){
                                            echo '<tr>
                                                <th align="center">'.$ligne['nom_entreprise'].'</th>
                                                <th align="center">'.$ligne['type_offre'].'</th>
                                                <th align="center">'.$ligne['description'].'</th>
                                                <th align="center">'.$ligne['critere'].'</th>
                                                <th align="center">'.$ligne['mail'].'</th>
                                                <th align="center">'.$ligne['telephone'].'</th>
                                            </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>    
                    </div>                        
                </div>
            </div>
        </div>