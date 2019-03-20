<?php
	if (isset($_SESSION['utilisateur'])){
		$req = $bdd->prepare('INSERT INTO commentaire (id_commentaire, pseudo, commentaire, article_id_article, date_heure, utilisateur_id_utilisateur) VALUES(\'\', :pseudo, :commentaire, :id_article, NOW(), :id_utilisateur)');
		$req->execute(array('pseudo' => $_POST['pseudo'],
			'commentaire' => $_POST['commentaire'],
			'id_article' => $_POST['id_article'],
			'id_utilisateur' => $_SESSION['utilisateur']->getId()));
		echo "Message enregistre";
	} else {
        echo "<pre>";
        print_r($bdd);
        echo "</pre>";
		$req = $bdd->prepare('INSERT INTO commentaire (id_commentaire, pseudo, commentaire, article_id_article, date_heure, utilisateur_id_utilisateur) VALUES(\'\', :pseudo, :commentaire, :id_article, NOW(), NULL)');
		$req->execute(array('pseudo' => $_POST['pseudo'],
			'commentaire' => $_POST['commentaire'],
			'id_article' => $_POST['id_article']));
		echo "Message anonyme enregistre";
	}
	header('Location:index.php?page=article&id='.$_POST['id_article'].'&message=Commentaire envoye');