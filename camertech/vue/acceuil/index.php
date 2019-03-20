<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Acceuil | Camtech</title>
        <link rel="stylesheet" href="vue/style.css" />
    </head>
    <body>
        <?php include_once('vue/header.php'); ?>
        
        <?php include_once('vue/nav.php');
		
        // ------------------ DISPLAY MESSAGE -----------------						
		if (isset($_GET['message']))
		{
			echo "<div id=\"message\">".htmlspecialchars($_GET['message'])."</div>";
		}				
		?>
		
        <section id="articles">
            <h1>ACTUALITES</h1>
            <?php
            $i = 0;
            while(isset($articles[$i]))
            {
            ?>
            <article class="homeArticle">
                <img src="<?php echo $articles[$i]->getHomeImagePath();?>" alt="Image de l'article" title="<?php echo htmlspecialchars($articles[$i]->getTitre()); ?>" />
                <h2> <?php echo "".htmlspecialchars($articles[$i]->getTitre()); ?></h2>
                <p> <?php echo htmlspecialchars($articles[$i]->getDescription()); ?><br />
                <a href="index.php?page=article&amp;id=<?php echo htmlspecialchars($articles[$i]->getIdArticle()); ?>" title="En savoir plus">En savoir plus</a></p>
            </article>
            <?php
            $i++;
            }
            ?>
        </section>
        
        <section id="ads">
        
        </section>
        
       <?php include_once('vue/footer.php'); ?>
        
    </body>
</html>