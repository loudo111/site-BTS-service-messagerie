<?php
	require_once('interface.php');

		if(isset($_POST['Ajout'])){
		mysqli_query($link, 'INSERT INTO evenement(nom, date, description, ville, CP, adresse, id_user) VALUES("'.$_POST['nom'].'","'.$_POST['date'].'","'.$_POST['description'].'","'.$_POST['ville'].'","'.$_POST['CP'].'","'.$_POST['adresse'].'", "'.$_SESSION['userid'].'");');
	}
	elseif(isset($_POST['proposer'])){
		mysqli_query($link, 'INSERT INTO proposition_evenement(nom, date, description, ville, CP, adresse, id_user) VALUES("'.$_POST['nom'].'","'.$_POST['date'].'","'.$_POST['description'].'","'.$_POST['ville'].'","'.$_POST['CP'].'","'.$_POST['adresse'].'", "'.$_SESSION['userid'].'");');
	}
		if(isset($_POST['proposition'])){
			$req = mysqli_query($link, 'SELECT nom, date, description, ville, CP, adresse FROM proposition_evenement ORDER BY date');
		}
		else {
		$req = mysqli_query($link, 'SELECT nom, date, description, ville, CP, adresse FROM evenement ORDER BY date;');
		}
	?>
	<body>
		<div class="block">
			<div class="container">
				<div class="box">
					<br/>

					<?php
							if(isset($_SESSION['username']) && isset($_POST['Ajouter']) == false){
						?>
						<form action="" method="post">
						<input type="hidden" name="Ajouter">
						<input type="submit" value="Ajouter un evenement">
						</form>
						<?php
							}
							if(isset($_SESSION['username']) && $_SESSION['statut_admin'] == 1){
						?>
						<form action="evenement_propose.php" method="post">
						<input type="hidden" name="proposition">
						<input type="submit" value="voir les evennement proposer" > 
						</form>
						<?php
							}

					if(isset($_POST['Ajouter'])){
						?>
						<form action="" method="post">
						<?php
							if(isset($_SESSION['username']) && $_SESSION['statut_admin'] != 1){
								echo '<input type="hidden" name="proposer">';
							}
							elseif(isset($_SESSION['username']) && $_SESSION['statut_admin'] == 1){
								echo '<input type="hidden" name="Ajout">';
							}
						?>
						<input type="text" name="nom" id="" placeholder="Nom de l'évenement">
						<input type="date" name="date" id="">
						<input type="text" name="description" id="" placeholder="Description">
						<input type="text" name="adresse" id="" placeholder="Adresse">
						<input type="number" name="CP" id="" placeholder="Code Postale">
						<input type="text" name="ville" id="" placeholder="Ville">
						<input type="submit" value="Ajouter">
						
						</form>
						<?php
							}
						?>

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
						</thead>
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