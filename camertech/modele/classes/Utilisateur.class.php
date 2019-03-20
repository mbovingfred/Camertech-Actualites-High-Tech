<?php
	class Utilisateur
	{
        private $id;	
		private $email;
		private $pseudo;
		private $pass;	
		private static $nbreConnecte = 0;
		
		//  Constructeur
		//-------------------
		public function __construct($id, $email, $pseudo, $pass)
		{
			$this->id = $id;
			$this->email = $email;
			$this->pseudo = $pseudo;
			$this->pass = $pass;
			$this->nbreConnecte++;
		}
		
		//  Getters et Setters
		//---------------------------
		public function getId()
		{
			return $this->id;	
		}
		public function setId($id)
		{
			$this->id = $id;
		}
			
		public function getPass()
		{
			return $this->pass;	
		}
		public function setPass($pass)
		{
			$this->pass = $pass;
		}	
		
		public function getEmail()
		{
			return $this->email;	
		}
		public function setEmail($email)
		{
			$this->email = $email;
		}
		
		public function getPseudo()
		{
			return $this->pseudo;	
		}
		public function setPseudo($newPseudo)
		{
			$this->pseudo = $newPseudo;
		}
		
		//  Autres methodes
		//---------------------------
		public function authenticate(){
			global $bdd;
			$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email_utilisateur = :email and passe_utilisateur = :passe');
			$req->execute(array('email' => $this->getEmail(),
							   'passe' => $this->getPass())
			);
			$res = $req->fetch();
			$req->closeCursor();
			if(!empty($res)){
				echo "found!";
				return new Utilisateur($res['id_utilisateur'], $res['email_utilisateur'], $res['passe_utilisateur']);
			} else {
				return false;
			}
			
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
			while($article = $req->fetch())
			{
				$homeImagePath = "modele/fichiers/articles/homeImages/".$article['id_article'].".jpg";
				$articles[] = new Article($article['id_article'], $article['titreArticle'], $homeImagePath, $article['description'], $article['contenue'], $article['datePublication']);
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
				$objArticle = new Article($article['id_article'], $article['titreArticle'], $homeImagePath, $article['description'], $article['contenue'], $article['datePublication']);
			} else {
				$objArticle = null;
				echo "article not found";
			}
			return $objArticle;
		}	// fin de fonction
	}