<?php
//Cette page permet aux utilisateurs de se connecter ou de se deconnecter
require_once('interface.php');

if(isset($_SESSION['username']))
{
	unset($_SESSION['username'], $_SESSION['userid']);
?>

<body>
    <br/>
    <p align="center"><FONT color="red"><B>vous avez été deconnecté</B></FONT></p>
</body>


<?php
}
else{
if(isset($_POST['username'], $_POST['password']))
{
    if(get_magic_quotes_gpc())
    {
        $username = mysqli_real_escape_string($link,stripslashes($_POST['username']));
        $password = stripslashes($_POST['password']);
    }
    else
    {
        $username = mysqli_real_escape_string($link,$_POST['username']);
        $password = $_POST['password'];
    }
    $req = mysqli_query($link,'select password,id,statut_admin from user where username="'.$username.'"');
    $dn = mysqli_fetch_array($req);
    if($dn['password']==$password and mysqli_num_rows($req)>0)
    {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['userid'] = $dn['id'];
        $_SESSION['statut_admin'] = $dn['statut_admin'];
        //ferme la page et ouvre la page d'index
        header("location: accueil.php");
        exit;
        ?>
    <?php
    }
    else
    {
        $message = 'La combinaison que vous avez entré n\'est pas bonne.';
    }
}    
?>

<body>
    <?php 
    if(isset($message)){
        echo '<p align="center">','<FONT color="red">','<B>',$message.'</p>','</FONT>';
    }
    ?>

    <div class="block">
            <div class="container">
                <div class="box">  
                    <form action="login.php" method="post">
                        <label class="label">Veuillez entrer vos identifiants pour vous connecter :<br/><br/>   
                            <div class="login">
                                <label for="username">Nom d'utilisateur : </label>
                                <input class="input is-small is-link" type="text" name="username" id="username" placeholder="Veuillez entrer nom d'utilisateur" /><br />

                                <label for="password">Mot de passe : </label>
                                <input class="input is-small is-link" type="password" name="password" id="password" placeholder="Veuillez entrer votre mot de passe"/><br />
                                <br/>
                                <input type="submit" value="Connexion" />
                            </div>
                        </label>
                    </form>
</div>
<?php
}
?>
</body>