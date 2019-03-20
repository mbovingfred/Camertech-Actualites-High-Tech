<?php
	include_once('modele/classes/Utilisateur.class.php');	
	include_once('modele/connexion_bd.php');

	if (isset($_GET['page'])){
		if(is_file('controleur/'.$_GET['page'].'/index.php')){
 			include_once('controleur/'.$_GET['page'].'/index.php');
		} else {
			echo "Page does not exist";
		}
	} else {
		include_once('controleur/acceuil/index.php');
	}
		
