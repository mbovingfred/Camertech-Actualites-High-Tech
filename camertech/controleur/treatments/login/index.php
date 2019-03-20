<?php
	//	INCLUSIONS
	//=====================
	include_once('modele/classes/Utilisateur.class.php');

	
	$utilisateur = new Utilisateur(null, $_POST['email'], null, $_POST['pwd']);

	$result = $utilisateur->authenticate();
	if($result instanceof Utilisateur){
		session_start();
		$_SESSION['utilisateur'] = $result;
		header('Location:index.php');
	} else {
		header("Location:index.php?message=Erreur de nom d'utilisateur/mot de passe");
	}