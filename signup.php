	<?php
	require_once('interface.php');

	if(isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email']) and $_POST['username']!='')
	{
		//On enleve lechappement si get_magic_quotes_gpc est active
		if(get_magic_quotes_gpc())
		{
			$_POST['username'] = stripslashes($_POST['username']);
			$_POST['password'] = stripslashes($_POST['password']);
			$_POST['passverif'] = stripslashes($_POST['passverif']);
			$_POST['email'] = stripslashes($_POST['email']);
		}
		if($_POST['password']==$_POST['passverif'])
		{
			if(strlen($_POST['password'])>=6)
			{
				$username = mysqli_real_escape_string($link,$_POST['username']);
				$password = mysqli_real_escape_string($link,$_POST['password']);
				$email = mysqli_real_escape_string($link,$_POST['email']);
				$dn = mysqli_num_rows(mysqli_query($link,'select id from user where username="'.$username.'"'));
				if($dn==0)
				{
					//On enregistre les informations dans la base de donnee
					if(mysqli_query($link,'insert into user( username, password, email, signup_date) values ( "'.$username.'", "'.$password.'", "'.$email.'", "'.time().'")'))
					{
						header("location: accueil.php");
						exit;
					}
					else
					{
						$message = 'Une erreur est survenue lors de l\'inscription.';
					}
				}
				else
				{
					$message = 'Un autre utilisateur utilise déjà le nom d\'utilisateur que vous désirez utiliser.';
				}
			}
			else
			{

				$message = 'Le mot de passe que vous avez entré contient moins de 6 caractères.';
			}
		}
		else
		{
			$message = 'Les mots de passe que vous avez entré ne sont pas identiques.';
		}

		if(isset($message))
		{
			echo '<p align="center">','<FONT color="red">','<B>'.$message.'</p>','</FONT>';
		}
	}
		//On affiche le formulaire
	?>
	<body>
		<div class="block">
			<div class="container">
				<div class="box">
					<form action="signup.php" method="post">
						<div class="field">
							<label class="label">Veuillez remplir ce formulaire pour vous inscrire:</label><br/>
								<label class="label" for="username">Nom d'utilisateur</label>
									<input class="input is-link" type="text" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" placeholder="Veuillez entrer votre nom d'utilisateur">
							
								<label class="label" for="password">Mot de passe(6 caract&egrave;res min.)</label>
									<input class="input is-link" type="password" name="password" placeholder="Veuillez entrer votre mot de passe">

								<label class="label" for="passverif">Mot de passe<span class="small">(v&eacute;rification)</label>
									<input class="input is-link" type="password" name="passverif" placeholder="Veuillez retaper votre mot de passe">

								<label class="label" for="email">Email</label>
									<div class="control has-icons-left has-icons-right">
										<input class="input is-link" type="email" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" placeholder="Veuillez entrer votre email">
										<span class="icon is-left">
										<i class="fas fa-envelope"></i>
										</span>
									</div>	
							<br/>	
							<input type="submit" value="Envoyer" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>