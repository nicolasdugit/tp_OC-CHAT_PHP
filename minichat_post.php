<?php
// Effectuer ici la requête qui insère le message
try
{
	$bdd = new PDO('mysql:host=db708551779.db.1and1.com;dbname=db708551779', 'dbo708551779', '\][poiu=-09876Q');
}
catch (Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}
$requete = $bdd->prepare('INSERT INTO minichat(pseudo, message, date_message) VALUES(?,?,NOW())');
$requete->execute(array($_POST['pseudo'], $_POST['message']));


// Puis rediriger vers minichat.php comme ceci :
header('Location: index.php');
?>
