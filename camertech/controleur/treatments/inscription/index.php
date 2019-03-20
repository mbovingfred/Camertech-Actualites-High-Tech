<?php
	if((strlen($_POST['email']) < 6) OR (strlen($_POST['mtp']) > 32))
	{
		header('index.php?page=inscription&message=Votre mot de passe doit contenir entre 6 et 32 caracteres');
	}
	$duplicate_req = $bdd->prepare('SELECT id FROM utilisateurs WHERE email_utilisateur = :email');
	$duplicate_req->execute(array('email' => $_POST['email']));
	if($duplicate = $duplicate_req->fetch())
	{
		header('Location:index.php?page=inscription&message=Addresse email deja inscrit');
	}
	$save_req = $bdd->prepare('INSERT INTO utilisateurs (id_utilisateur, email_utilisateur, passe_utilisateur) 
	VALUES(\'\', :email, :mtp)');
	$save_req->execute(array(
	'email' => $_POST['email'],
	'mtp' => $_POST['mtp']
	));
	header('Location:index.php?message=Inscription Reussi');
?>