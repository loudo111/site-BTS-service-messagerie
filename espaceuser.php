    <?php
    require_once('config.php');
    require_once('interface.php');

    $req = mysqli_query($link, 'SELECT username, signup_date, password, email, lien_portfolio  FROM user WHERE id = "'.$_SESSION['userid'].'";');
    $ligne = mysqli_fetch_array($req);
    if(isset($_POST['username'], $_POST['mail'])&& $_POST['username'] != "" && $_POST['mail'] != "" && $_POST['password'] == ""){
        $req = mysqli_query($link,'select id from user where username="'.$_POST['username'].'" AND id NOT IN (select id from user WHERE id = "'.$_SESSION['userid'].'")');
        $dn = mysqli_num_rows($req);
        if($dn == 0)
        {   
            mysqli_query($link, 'update user set username = "'.$_POST['username'].'", email = "'.$_POST['mail'].'" ,lien_portfolio = "'.$_POST['portfolio'].'" where id = "'.$_SESSION['userid'].'"');
            $_SESSION['username'] = $_POST['username'];

        }
        else{
            $_POST['passmodif'] = $ligne['password'];
            $message = 'le nom d\'utilisateur est déjà utiliser';
        }
    }
    elseif(isset($_POST['password']) && $_POST['password'] != ''){
        if($_POST['password']==$_POST['passverif'])
        {
            if(strlen($_POST['password'])>=6)
            {
                    $req = mysqli_query($link,'select id from user where username="'.$_POST['username'].'" AND id NOT IN (select id from user WHERE id = "'.$_SESSION['userid'].'")');
                    $dn = mysqli_num_rows($req);
                    if($dn==0)
                    {
                        //On enregistre les informations dans la base de donnee
                        if(mysqli_query($link, 'update user set username = "'.$_POST['username'].'", email = "'.$_POST['mail'].'", lien_portfolio = "'.$_POST['portfolio'].'", password = "'.$_POST['password'].'" where id = "'.$_SESSION['userid'].'"'))
                        {
                            $_SESSION['username'] = $_POST['username'];
                        }
                        else
                        {
                            $message = 'Une erreur est survenue lors de l\'inscription.';
                            $_POST['passmodif'] = $ligne['password'];   
                        }
                    }
                    else
                    {
                        $message = 'Un autre utilisateur utilise déjà le nom d\'utilisateur que vous désirez utiliser.';
                        $_POST['passmodif'] = $ligne['password'];
                    }
            }
            else{
                $message = 'Le mot de passe que vous avez entré contient moins de 6 caractères.';
                $_POST['passmodif'] = $ligne['password'];
            }
        }
        else
        {
            $message = 'Les mots de passe que vous avez entré ne sont pas identiques.';
            $_POST['passmodif'] = $ligne['password'];
        }
    }
    elseif(isset($_POST['username'])) {
        $_POST['passmodif'] = $ligne['password'];
    }
    ?>

    <body>
        <div class="block">
            <div class="container">
                <div class="box">  
        <?php
        if(isset($_POST['passmodif']) and $_POST['passmodif'] == $ligne['password']){
            if(isset($message)){
                echo '<FONT color="red">','<B>',$message, '<B>', '</FONT>';
            }
        ?>
        <form action="espaceuser.php" method="post">
            <label class='label' for="username">Nom d'utilisateur : </label>
            <input class='input is-link'type="text" name="username" id="" value="<?php echo $ligne['username'];?>" > <br>
            
            <label class='label' for="mail">Email : </label>
            <input class='input is-link' type="text" name="mail" id="" value="<?php echo $ligne['email'];?>">
            
            <label class='label' for="portfolio">portfolio : </label>
            <input class='input is-link' type="text" name="portfolio" id="" value="<?php echo $ligne['lien_portfolio'];?>">

            <label class='label'for="password">Nouveau mot de passe :</label>
            <input class='input is-link' type="password" name="password" id=""><br>
            
            <label class='label' for="passverif">Confirmer le nouveau mot de passe :</label>
            <input class='input is-link' type="password" name="passverif" id="">

            <br/>
            <br/>
            <input type="submit" value="changer">
        </form>

            <?php
        }
        else{        
                echo '<label class="label">','Nom d\'Utilisateur : ','<br/>','</label>', $ligne['username'];
                echo '<br>';
                echo '<label class="label">','Date d\'Inscription','<br/>','</label>', date("Y-m-d H:i:s", $ligne['signup_date']);
                echo '<br/>';
                echo '<label class="label">','Portfolio : ','<br/>','</label>', $ligne['lien_portfolio'];
                echo '<br/>';
            ?>
            <form action="espaceuser.php" method="post">
            <label class="label">Veuillez entrer votre mot de passe pour modifier votre profil : </label>
            <input class="input is-small is-link" type="password" name="passmodif" id="" placeholder="Veuillez entrer votre mot de passe">
            
            <br/>
            <br>
            <input type="submit" value="Modifier son profil">
            </form>
        <?php
        }
        ?>
    </body>
</html>