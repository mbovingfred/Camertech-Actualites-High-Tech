<?php
    session_start();
    if (!($_SESSION['connected'] == 1))
        header('Location:index.php?message=Erreur nom d\'utilisateur ou de mot de passe');
    else{
		try{
            $bdd = new PDO('mysql:host=sql205.hebergratuit.net;dbname=heber_16559516_camtech', 'heber_16559516', 'sarambang');
        }
		catch(Exception $e){
			die('Erreur: '.$e->getMessage());
		}
		$req = $bdd->query('SELECT MAX(id_article) FROM articles');
		$nbreArticles = $req->fetch();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>CamTech | Admin</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <header>
            <img src="../modele/fichiers/images/logoCamTech.png" title="logo" alt="logo" />
        </header>
        
        <section id="articles">
            <form id="mainForm" method="post" action="tNvArticle.php" enctype="multipart/form-data">
                <label for="titre">Titre</label> : <textarea name="titre" id="titre" autofocus></textarea><br />
                <label for="description">Description</label> : <textarea name="description" id="description"></textarea><br />
                <label for="imageAcceuil">Choisir une image d'acceuil</label> : <input type="file" name="imageAcceuil" id="imageAcceuil"><br />
                <iframe></iframe>
                
                <div id="outilsRedac">
                    <button id="btnImg">IMG</button>
                    <button id="btnTexte">+Contenue</button>
                </div>
                <fieldset id="champTexte">
                    <legend>Texte</legend>
                    <label for="texte1">Contenue</label> : <br />
                    <textarea name="texte1" id="texte1"></textarea>
                </fieldset>
                
                <input id="nbreElements" type="hidden" value="1" name="nbreElements" />
                <input id="nbreArticles" type="hidden" value="<?php echo $nbreArticles[0]; ?>" name="nbreArticles" />
                <input type="submit" />
            </form>
        </section>
        
        <script src="redac.js"></script>
    </body>
</html>
<?php
}
?>