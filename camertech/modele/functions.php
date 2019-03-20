<?php
    function incre_vues_articles($m_Article){
     	global $bdd;
 		$req = $bdd->prepare('UPDATE articles SET nbre_vues = nbre_vues+1 WHERE id_article = :id_article');
 		$req->bindParam(':id_article', $m_Article->getIdArticle(), PDO::PARAM_INT);
 		$req->execute();
 	}
    function get_articles($offset, $limit)
     {
		global $bdd;
		$offset = (int) $offset;
		$limit = (int) $limit;

		$req = $bdd->prepare('SELECT * FROM articles
			ORDER BY datePublication DESC LIMIT :offset, :limit');
		$req->bindParam(':offset', $offset, PDO::PARAM_INT);
		$req->bindParam(':limit', $limit, PDO::PARAM_INT);
		$req->execute();
        $article = $req->fetchAll();
		foreach($article as $index => $value)
		{
			$homeImagePath = "modele/fichiers/articles/homeImages/".$article[$index]['id_article'].".jpg";
            $articles[] = new Article($article[$index]['id_article'], $article[$index]['titreArticle'], $homeImagePath, $article[$index]['description'], $article[$index]['contenue'], $article[$index]['datePublication'], $article[$index]['nbre_vues']);
			
		}
		return $articles;
 	}
	
	function get_astuces($offset, $limit, $dossier)
 	{
		global $bdd;
		$offset = (int) $offset;
		$limit = (int) $limit;

		$req = $bdd->prepare('SELECT * FROM articles, categories
			WHERE `categories_id_categories` = id_categories
			AND name = :dossier
			ORDER BY datePublication DESC LIMIT :offset, :limit');
		$req->bindParam(':offset', $offset, PDO::PARAM_INT);
		$req->bindParam(':limit', $limit, PDO::PARAM_INT);
		$req->bindParam(':dossier', $dossier);
		$req->execute();
		while($article = $req->fetch())
		{
			$homeImagePath = "modele/fichiers/articles/homeImages/".$article['id_article'].".jpg";
			$articles[] = new Article($article['id_article'], $article['titreArticle'], $homeImagePath, $article['description'], $article['contenue'], $article['datePublication']);
		}
		return $articles;
 	}
 
	function getArticleById($id)
	{
		global $bdd;
		$id = (int) $id;
		$req = $bdd->prepare('SELECT * FROM articles WHERE id_article = :id');
		$req->execute(array('id' => $id));
		$article = $req->fetch();
		if (!empty($article)){
			$homeImagePath = "modele/fichiers/articles/homeImages/".$article['id_article'].".jpg";
			$objArticle = new Article($article['id_article'], $article['titreArticle'], $homeImagePath, $article['description'], $article['contenue'], $article['datePublication'], $article['nbre_vues']+1);
			incre_vues_articles($objArticle);
		} else {
			$objArticle = null;
			echo "article not found";
		}
		return $objArticle;
	}	// fin de fonction

	function get_commentaires($offset, $limit, $article){
		global $bdd;
		$offset = (int) $offset;
		$limit = (int) $limit;

		$req = $bdd->prepare('SELECT *
			FROM `commentaire` , `articles`
			WHERE article_id_article = id_article
			AND article_id_article = :id_article
			ORDER BY date_heurE DESC
			LIMIT :offset, :limit');
		$req->bindParam(':offset', $offset, PDO::PARAM_INT);
		$req->bindParam(':limit', $limit, PDO::PARAM_INT);
		$req->bindParam(':id_article', $article->getIdArticle());
		$req->execute();
		while($resultat = $req->fetch())
		{
			//$m_Article = new Article($resultat['id_article'], $resultat['titreArticle'], null, $resultat['description'], null, $resultat['datePublication']);
			$dateHeure = date_create($resultat['date_heure']);
			$commentaires[] = new Commentaire($resultat['id_commentaire'], $resultat['commentaire'], $resultat['pseudo'], null, $article, $dateHeure);
		}
		return $commentaires;
 	}
