<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $article->getTitre(); ?> | Camtech</title>
        <link rel="stylesheet" href="vue/style.css" />
    </head>
    <body>
        <?php include_once('vue/header.php'); ?>
        
        <?php include_once('vue/nav.php'); ?> 
        <?php
            echo"
        <p>Article vue ".$article->getNbreVues()." fois</p>";
        ?>   
        
        <section id="articles">
            <article>
                <h1 id="titreArticle"><?php echo htmlspecialchars($article->getTitre()); ?></h1>
                <p><?php echo htmlspecialchars($article->getDescription()); ?></p>
                <p class="article_wrap">
                <?php
                    $fichierArticle = fopen('modele/fichiers/articles/textes/'.$article->getIdArticle().'.txt', 'r');
                    while($ligne = fgets($fichierArticle)){
                        if(preg_match("#^<img#", $ligne) and preg_match("#src=[0-9a-zA-Z./]+\s#", $ligne)){
                            echo "<div class=\"imgWrap\"><img ";

                            //Affichage de la source de l'image a partir du fichier
                            //-------------------------------------------------------------
                            preg_match("#src=\"[0-9a-zA-Z./ ]+\"#", $ligne, $src);
                            echo $src[0];

                            //Affichage du texte alternatif de l'image a partir du fichier
                            //-------------------------------------------------------------
                            preg_match("#alt=\"[0-9a-zA-Z./ ]+\"#", $ligne, $src);
                            if (isset($src[0]))
                            echo $src[0];

                            //Affichage du titre de l'image a partir du fichier
                            //-------------------------------------------------------------
                            preg_match("#alt=\"[0-9a-zA-Z./ ]+\"#", $ligne, $src);
                            if (isset($src[0]))
                            echo $src[0];

                            echo " /></div>";
                        }
                        else{
                            echo "<p>".$ligne."</p>";
                        }
                    }
                ?>
                </p>
            </article>
            <section id="commentaire">
                <h2>Commentaires</h2>
                <form method="post" action="index.php?page=treatments/commenter">
                    <label for="pseudo">Pseudonyme : </label><input type="text" placeholder="Entrer votre nom" name="pseudo" id="pseudo" required/><br /><br />
                    <label for="commentaire">Votre commentaire : </label><textarea id="commentaire" name="commentaire" required></textarea><br /><br />
                    <input type="hidden" name="id_article" value="<?php echo $_GET['id']; ?>" />
                    <input type="submit" value="commenter" />
                </form>
            <?php 
            $i = 0;
            while(isset($commentaires[$i])){
            ?>
                <p><?php echo $commentaires[$i]->getPseudo(); ?> le <?php echo date_format($commentaires[$i]->getDateHeure(), "d/m/Y \a H:m:s") ; ?> a ecrit:</p>
                <p><?php echo $commentaires[$i]->getCommentaire(); ?></p>
            <?php
            $i++;
            }
            ?>
            </section>
        </section>
        
        <?php include_once('vue/footer.php'); ?>
    </body>
</html>