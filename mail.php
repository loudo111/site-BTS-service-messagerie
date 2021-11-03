    <?php
    require_once('interface.php');

    if(isset($_POST['destinataire'])){
        $destinataire = $_POST['destinataire'];
        $text = $_POST['description'];
        $reponse = $_POST['idreponse'];
        //echo 'insert into message( objet, description, destinataire, expediteur , date) values ( null, "'.$text.'", "'.$destinataire.'","'.$_SESSION['userid'].'", "'.time().'")';
        //echo 'select id from message where expediteur = "'.$_SESSION['userid'].'" and date = "'.time().'"';
        //echo 'update message set reponse = '.$ligne['id'].' where id = '.$reponse.'';
        mysqli_query($link,'insert into message( objet, description, destinataire, expediteur , date) values (null, "'.$text.'", "'.$destinataire.'","'.$_SESSION['userid'].'", "'.time().'")');
        $req = mysqli_query($link,'select id from message where expediteur = '.$_SESSION['userid'].' and date = '.time().'');
        $ligne = mysqli_fetch_array($req);
        mysqli_query($link, 'update message set reponse = "'.$ligne['id'].'" where id = "'.$reponse.'"');
    }
    $id = $_GET['idmail'];
    ?>
    <body>
        <div class="block">
            <div class="container">
                <div class="box">
                    <h3 class='label'>Conversation</h3><br/>
                    <?php
                    do{
                    $req = mysqli_query($link, 'select * from message where id = "'.$id.'"');
                    $ligne = mysqli_fetch_array($req);
                    $idrep = $ligne['reponse'];
                    $expediteur = $ligne['expediteur'];
                    $req = mysqli_query($link, 'select username from user where id = "'.$expediteur.'"');
                    $expe = mysqli_fetch_array($req);
                    ?>

                        <h1><?php echo '<label class=\'label\'>','<U>',$ligne['objet'],'</U>','</label>'?></h1>
                        <br/>
                        <h3><?php echo '<U>', date("Y-m-d H:i:s", $ligne['date'])?>, par <?php echo $expe['username']?></U></h3>
                        <p><?php echo $ligne['description']?></p>
                        <br/>
                    <?php

                    if($idrep != null ){
                        $id = $idrep;
                    }
                    } while($idrep != null)
                    ?>

                    <?php
                    if(isset($_POST['reponse'])){
                        echo $_POST['reponse'];
                        
                        echo '<form action="mail.php?idmail='.$_GET['idmail'].'"method="post">'
                        ?>
                            <input type="hidden" name="destinataire" value="<?php echo $expediteur?>">
                            <input type="hidden" name="idreponse" value="<?php echo $id?>" >

                            <br/>
                            <label class="label" for="description">Contenu du message :</label>
                            <input class="input" type="text" name="description" placeholder="Ecriver votre message" required> <br/>

                            <input type="submit" value="envoyer">
                        </form>
                    <?php
                    }
                    else{
                        echo '<form action="mail.php?idmail='.$_GET['idmail'].'"method="post">'
                    ?>   
                        <input type="hidden" name="reponse" value="">
                        <input type="submit" value="Repondre">
                    </form>
                        <?php
                    }
                    ?>
                </div>
            </div>    
        </div>
    </body>
</html>