<?php
	require_once('interface.php');
	if(isset($_SESSION['userid']) == false || $_SESSION['statut_admin'] == 0){
		header("location: accueil.php");
        exit;
	}

	$req = mysqli_query($link, 'SELECT id, username, email, signup_date, statut_admin FROM user');
	$ligne = mysqli_fetch_array($req);

	mysqli_query($link,'DELETE FROM user');
?>
<body>
    <div class="block">
        <div class="container">
            <div class="box">  
                <h3 align="center" class='label'>Liste des comptes :</h3><br/>

				<table class="table">
					<thead>
						<tr>
							<th align="center">ID</th>
							<th align="center">Nom d'utilisateur</th>
							<th align="center">Email</th>
							<th align="center">Date d'Inscription</th>
							<th align="center">Statut Admin</th>
						</tr>
					</thread>
					<tbody>	
						<?php   
							while($ligne = mysqli_fetch_array($req)){
								echo '<tr>
                                    <th align="center">'.$ligne['id'].'</th>
                                    <th align="center">'.$ligne['username'].'</th>
                                    <th align="center">'.$ligne['email'].'</th>
                                    <th align="center">'.$ligne['signup_date'].'</th>
                                    <th align="center">'.$ligne['statut_admin'].'</th>
                                    <th align="center"><input type="submit" value="Supprimer"></th>
								</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>