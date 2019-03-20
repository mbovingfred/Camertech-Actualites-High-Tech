<?php
	$titre = $_POST['titre'];
	$description = $_POST['description'];
	$nbreElements = (int) $_POST['nbreElements'];
	$nbreArticles = (int) $_POST['nbreArticles'];
	echo"<pre>";
	print_r($_POST);
	print_r($_FILES);
	echo"</pre>";

	// ENREGISTREMENT DANS LES FICHIERS
	//----------------------------------------
	$fichierArticle = fopen("../modele/fichiers/articles/textes/".($nbreArticles+1).".txt", "w") or die("Erreur de creation du fichier");
	for ($i=1; $i<=$nbreElements; $i++){
		if(isset($_POST['texte'.$i])){
			fwrite($fichierArticle, $_POST['texte'.$i]."\n");
		}
		if(isset($_FILES['file'.$i])){
			$img = "<img src=\"modele/fichiers/articles/images/".($nbreArticles+1)."_".$i.".jpg\" title=\"".$_POST['imgTitre'.$i]."\" alt=\"".$_POST['legendeImg'.$i]."\" />";
			fwrite($fichierArticle, $img."\n");
			echo "Ligne ecrite <br />";
		}
	}
	for ($i=0; $i<=sizeof($_FILES); $i++){
		if (isset($_FILES['file'.$i]) AND $_FILES['file'.$i]['error'] == 0){
			if ($_FILES['file'.$i]['size'] <= 10000000){
				$infosfichier = pathinfo($_FILES['file'.$i]['name']);
				$extension = $infosfichier['extension'];
				move_uploaded_file($_FILES['file'.$i]['tmp_name'], '../modele/fichiers/articles/images/'.($nbreArticles+1)."_".$i.".".$extension);
				echo 'File sent !';
			} else {
				echo "File too heavy to be sent";
				echo "Fichier copie <br />";
			}
		}
	}
	echo "ecriture du HomeImage ... \n";
	if (isset($_FILES['imageAcceuil']) AND $_FILES['imageAcceuil']['error'] == 0){
		if ($_FILES['imageAcceuil']['size'] <= 10000000){
			$infosfichier = pathinfo($_FILES['imageAcceuil']['name']);
			$extension = $infosfichier['extension'];
			move_uploaded_file($_FILES['imageAcceuil']['tmp_name'], '../modele/fichiers/articles/homeImages/'.($nbreArticles+1).".".$extension);
			echo 'HomeImage File sent !';
		} else {
			echo "HomeImage File too heavy to be sent";
			echo "HomeImage Fichier copie <br />";
		}
	}
	echo "fin d'ecriture du HomeImage <br />";
	
	// ENREGISTREMENT DANS LA BASE DE DONNEE
	//-------------------------------------------
	try{
        $bdd = new PDO('mysql:host=sql205.hebergratuit.net;dbname=heber_16559516_camtech', 'heber_16559516', 'sarambang');
    }
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}
	$req = $bdd->prepare('INSERT INTO articles VALUES(\'\', :titreArticle, :description, :contenue, NOW(), \'1\', \'\')');
	$req->execute(array(
		'titreArticle' => $titre,
		'description' => $description,
		'contenue' => "contenue"));
    echo "fin... <br />";