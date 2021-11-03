    <?php
    require_once('interface.php');

    if(isset($_POST['objet'], $_POST['description'])){
        $req = mysqli_query($link,'insert into message( objet, description, destinataire, expediteur , date) values ( "'.$_POST['objet'].'", "'.$_POST['description'].'", "'.$_POST['destinataire'].'","'.$_SESSION['userid'].'", "'.time().'")');
        header("location: messageEnvoyer.php");
        exit;
    }
    ?>
    <body>

        <div class="block">
            <div class="container">
                <div class="box">
                    <form action="envoie.php" method="post">
                        <label class="label" for="destinataire">Destinataire</label>
                        <select class ="label"name="destinataire" id=""><?php option($link); ?></select>
                        <label class ="label"for="objet">Objet</label>
                        <input type="text" name="objet" required> <br/>
                        <label class ="label"for="description">Description</label>
                        <input type="text" name="description" required> <br/><br/>
                        <input type="submit" value="Envoyer">
                    </form>
                </div>
            </div>
        </div>    
    </body>



    <?php

    function option($link){
        $req = mysqli_query($link, 'select id, username from user order by username;');
        while($ligne = mysqli_fetch_array($req)){
            echo '<option value="'.$ligne["id"].'"';
            echo '>'.$ligne["username"].'</option>'; 
        }
    }
    ?>
</html>