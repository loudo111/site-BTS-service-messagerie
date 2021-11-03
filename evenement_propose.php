<?php
	require_once('interface.php');

	if(isset($_POST['accepter'])){
		$req = mysqli_query($link, 'SELECT nom, date, description, ville, CP, adresse FROM proposition_evenement where id = "'.$_POST['id'].'"');
		$ligne = mysqli_fetch_array($req);

		mysqli_query($link, 'INSERT INTO evenement(nom, date, description, ville, CP, adresse, id_user) VALUES("'.$ligne['nom'].'","'.$ligne['date'].'","'.$ligne['description'].'","'.$ligne['ville'].'","'.$ligne['CP'].'","'.$ligne['adresse'].'", "'.$_SESSION['userid'].'");');
		mysqli_query($link,'DELETE FROM proposition_evenement WHERE id = "'.$_POST['id'].'"');
	
	}
	elseif(isset($_POST['refuser']))
	{
		mysqli_query($link,'DELETE FROM proposition_evenement WHERE id = "'.$_POST['id'].'"');
	}
	

			$req = mysqli_query($link, 'SELECT id, nom, date, description, ville, CP, adresse FROM proposition_evenement ORDER BY date');

	?>
	<body>
		<div class="block">
			<div class="container">
				<div class="box">
				<br/>
					<form action="evenement.php" method="POST">
						<input type="submit" href="evenement.php" value="Retour aux Evenements">
					</form>

				<br/>
					<table class="table">
						<thead>
							<tr>
								<th align="center">Nom de l'évenement</th>
								<th align="center">Date</th>
								<th align="center">Description</th>
								<th align="center">Adresse</th>
								<th align="center">Code Postal</th>
								<th align="center">Ville</th>
							</tr>
						</thread>
						<tbody>	
							<?php   
								while($ligne = mysqli_fetch_array($req)){
									echo '<tr>
										<th align="center">'.$ligne['nom'].'</th>
										<th align="center">'.$ligne['date'].'</th>
										<th align="center">'.$ligne['description'].'</th>
										<th align="center">'.$ligne['adresse'].'</th>
										<th align="center">'.$ligne['CP'].'</th>
										<th align="center">'.$ligne['ville'].'</th>
										<th align="center"><form action="" method="post">
											<input type="hidden" name="accepter">
											<input type="hidden" name="id" value="'.$ligne['id'].'">
											<input type="submit" value="Accepter">
										</form></th>
										<th align="center"><form action="" method="post">
											<input type="hidden" name="id" value="'.$ligne['id'].'">
											<input type="hidden" name="refuser">
											<input type="submit" value="Refuser">
										</form></th>
									</tr>';
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>			
	</body>
</html>