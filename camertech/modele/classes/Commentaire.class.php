<?php
	class Commentaire{
		private $id;
		private $commentaire;
		private $pseudo;
		private $m_Utilisateur;
		private $dateHeure;
		private $m_Article;

		public function __construct($id, $commentaire, $pseudo, $m_Utilisateur, $m_Article, $dateHeure){
			$this->id = $id;
			$this->commentaire = $commentaire;
			$this->pseudo = $pseudo;
			$this->m_Utilisateur = $m_Utilisateur;
			$this->m_Article = $m_Article;
			$this->dateHeure = $dateHeure;
		}

		public function getId(){
			return $this->id;
		}
		public function setId($newId){
			$this->id = $newId;
		}

		public function getCommentaire(){
			return $this->commentaire;
		}
		public function setCommentaire($newCommentaire){
			$this->commentaire = $newCommentaire;
		}

		public function getPseudo(){
			return $this->pseudo;
		}
		public function setPseudo($newPseudo){
			$this->pseudo = $newPseudo;
		}

		public function getUtilisateur(){
			return $this->m_Utilisateur;
		}
		public function setUtilisateur($newUtilisateur){
			$this->m_Utilisateur = $newUtilisateur;
		}

		public function getArticle(){
			return $this->m_Article;
		}
		public function setArticle($newArticle){
			$this->m_Article = $newArticle;
		}

		public function getDateHeure(){
			return $this->dateHeure;
		}
		public function setDateHeure($newDateHeure){
			$this->dateHeure = $newDateHeure;
		}

	}