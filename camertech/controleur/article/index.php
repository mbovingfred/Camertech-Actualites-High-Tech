<?php
	//Connexion a la base de donnees effectuees
	//-------------------------------------------------
	
	//Traitement des donnees recus
	//-------------------------------
	$id = (int) $_GET['id'];
	
    include_once('modele/classes/Article.class.php');
    include_once('modele/classes/Commentaire.class.php');
    include_once('modele/functions.php');
	include_once('modele/connexion_bd.php');
    $article = getArticleById($id);
    $commentaires = get_commentaires(0, 10, $article);
	
	//Affichage de la page de l'article
	//-------------------------------------------
	include_once('vue/article/index.php');