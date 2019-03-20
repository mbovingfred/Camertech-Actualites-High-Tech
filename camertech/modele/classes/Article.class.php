<?php
	class Article
	{
        private $idArticle;
		private $homeImagePath;
		private $titre;	
		private $description;	
		private $contenue;	
		private $datePublication;
		private $nbreVues;	
		
		//  Constructeur
		//-------------------
		public function __construct($idArticle, $titre, $homeImagePath, $description, $contenue, $datePublication, $nbreVues)
		{
			$this->homeImagePath = $homeImagePath;
            $this->idArticle = $idArticle;
			$this->titre = $titre;	
			$this->description = $description;
			$this->contenue = $contenue;
			$this->nbreVues = $nbreVues;
		}	
		public function getIdArticle()
		{
			return $this->idArticle;	
		}
		public function setIdArticle($idArticle)
		{
			$this->idArticle = $idArticle;
		}	
		public function getTitre()
		{
			return $this->titre;	
		}
		public function setTitre($titre)
		{
			$this->titre = $titre;
		}
		public function getDescription()
		{
			return $this->description;		
		}
		public function setDescription($description)
		{
			$this->description = $description;
		}
		public function getContenue()
		{
			return $this->contenue;
		}
		public function setContenue($contenue)
		{
			$this->contenue = $contenue;
		}
		public function getDatePublication()
		{
			return $this->datePublication;
		}
		public function setDatePublication($datePublication)
		{
			$this->datePublication = $datePublication;
		}
		
		public function getHomeImagePath()
		{
			return $this->homeImagePath;	
		}
		public function setHomeImagePath($homeImagePath)
		{
			$this->homeImagePath = $homeImagePath;
		}

		public function getNbreVues()
		{
			return $this->nbreVues;	
		}
		public function setNbreVues($nbreVues)
		{
			$this->nbreVues = $nbreVues;
		}		
	}