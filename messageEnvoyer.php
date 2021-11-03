    <?php
    require_once('interface.php');
    ?>

    <body>
        <div class="block">
            <div class="container">
                <div class="box">
                    <label class='label' >Liste de mes Messages envoyés : </label>
                    <?php
                    $req = mysqli_query($link,'select id, objet, lu
                        from message 
                        where expediteur = "'.$_SESSION['userid'].'"and objet is not null');
                    //$req = mysqli_query($link,'select username from users');

                    while($ligne = mysqli_fetch_array($req)){

                    echo '<a href="mail.php?idmail='.$ligne['id'].'">'.$ligne['objet'].'<br/></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>