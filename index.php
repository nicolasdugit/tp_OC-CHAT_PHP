<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon premier chat</title>
	<style type="text/css">
		form {
		text-align: center;
		}
	</style>
</head>
<body>
	<form method="POST" action="minichat_post.php">
		<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo"><br>
		<label for="message">Message</label> : <input type="text" name="message"><br>
		<input type="submit" value="Envoyer">
	</form>
	<div class="chat">
		<?php
		try
		{
			$bdd = new PDO('mysql:host=db708551779.db.1and1.com;dbname=db708551779', 'dbo708551779', '\][poiu=-09876Q');
		}
		catch (Exception $e)
		{
			die('Erreur : ' .$e->getMessage());
		}
		//recuperation des  10 derniers messages
		$reponse = $bdd->query('SELECT pseudo, message, date_message FROM minichat ORDER BY ID DESC');
		// affichage de chaque message
		while ($donnees = $reponse->fetch()) 
		{
			echo '<p>'. $donnees['date_message'] .' <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> a écrit : <br>' . htmlspecialchars($donnees['message']) . '</p>';
		}
		$reponse->closeCursor();
		?>
	</div>
</body>
</html>
