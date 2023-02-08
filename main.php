<?php

	session_start();

	$message = "<h4></h4>";

	$max_attempts = 4; // nombre maximum de tentatives de connexion
	$delay = 30; // délai en secondes avant de pouvoir retenter une connexion

	// Connexion à la base de données
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sécurité";

	$conn = mysqli_connect($host, $username, $password, $dbname);

	if (isset($_POST['valider'])) {

		if($_POST['id']!="" && $_POST['mdp']!="" ){
		
			$id = mysqli_real_escape_string($conn, $_POST['id']);
			$mdp = mysqli_real_escape_string($conn, $_POST['mdp']);

			$sql = "SELECT * FROM `login` WHERE identifiant='$id' and mdp='$mdp' ";
			$result = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($result);

			if($rows==1){
				$_SESSION['attempts'] = 0;
				$message= "<h3> Vous êtes connecté ! </h3>";
			} 
			else{

				if($_SESSION['attempts'] >= $max_attempts) {
					$_SESSION['attempts']++;
					$valeur = ($_SESSION['attempts']-$max_attempts); //valeur ajouter au delay à chaques tentatives
					$message= "<h4> Erreur Connexion : ID / Mot de passe incorrect. <h4>";
					$message=$message."<h4> Vous avez dépassé le nombre maximum de tentatives de connexion.</h4>";
					$message= $message."<h5> Attention : Au prochain échec de connexion, vous attendrais ".$delay*($valeur+1) ." secondes </h5> ";
					sleep($delay*($valeur));
				} 
				
				else{

					$_SESSION['attempts']++;
					$nbEssais = $max_attempts-$_SESSION['attempts'];
					$message= "<h4> Erreur Connexion : ID / Mot de passe incorrect. <h4>";

					if($nbEssais==0){
						$message = $message. "<h5> Attention : Au prochain échec de connexion, vous attendrais ".$delay." secondes </h5>";
					}
					else{
						$message = $message. "<h5> Tentatives restantes : ".$nbEssais." essais. </h5>";
					}
					
				}

			
			}
		}
		else{
			$message= "<h4> Erreur Connexion : ID / Mot de passe non renseigné. </h4>";
		}

		

	}

	elseif (isset($_POST['ajout'])) {


		if ($_POST['id']==$_POST['mdp']) {
			$message= "<h4> Echec de l'ajout : ID et mdp sont similaire, donc pas assez sécurisé !</h4>";
		}

		elseif ($_POST['id']!="" && $_POST['mdp']!="") {


			$id = mysqli_real_escape_string($conn, $_POST['id']);
			$mdp = mysqli_real_escape_string($conn, $_POST['mdp']);

			$sql = "SELECT * FROM `login` WHERE identifiant='$id' and mdp='$mdp' ";
			$result = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($result);

			if($rows==1){
				$message= " <h4> Echec de l'ajout : Compte déja existant </h4>";
			} else {

				$sql = "INSERT into `login` (identifiant, mdp) VALUES ('$id', '$mdp')";
				$result = mysqli_query($conn, $sql);

				if ($result) {
					$message= "<h3> Compte ajouté avec succès ! </h3>";
				}
			}
		}

		else{
			$message= "<h4> Echec de l'ajout : ID ou mdp non renseigné ! </h4>";
		}

	}


?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>Le Formulaire de Aaron Amani</title>
		<link href="style.css" rel="stylesheet">
	</head>

	<body>
		<img class="image" src="images/Logo_Aaron.png" alt="Logo Aaron"/>
		<form action="main.php" method="post" enctype="multipart/form-data">
		
			<h1>Authentification</h1>
			<p>Identifiant : <input type="text" name="id" /></p>
			
			<div class="input">
				<p>Mot de passe : <input type="password" id="mdp" name="mdp"/>   <img src="images/red_eye.png" id="eye" onClick="changer()"/></p>
			</div>
			<script>
				e=true;
				function changer(){
					if(e){
						document.getElementById("mdp").setAttribute ("type", "text" ) ;
						document.getElementById("eye").src="images/green_eye.png";
						e=false;
					}
					else{
						document.getElementById("mdp").setAttribute ("type", "password" ) ;
						document.getElementById("eye").src="images/red_eye.png" ;
						e=true;
					}
				}
			</script>

			<input type="reset" value="Reset">
			<input type="submit" name="valider" value="Valider">
			<input type="submit" name="ajout" value="Ajout d'un compte">

			<p><?php echo $message; ?></p>

		</form>
	</body>
</html>