<?php
    include_once('modele/classes/article.class.php');
     include_once('modele/connexion_bd.php');
     // Demande des 5 articles recents
     //---------------------------------------
     include_once('modele/functions.php');
        $articles = get_astuces(0, 5, 'astuces');
     
     //Traitement des donnees
     //------------------------------
     
    
    // Affichage de la page
    
    include_once('vue/acceuil/index.php');