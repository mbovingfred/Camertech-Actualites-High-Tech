<?php
    $login = $_POST['login'];
    $mtp = $_POST['mtp'];
    
    include_once('../modele/connexion_bd.php');
    
    $req = $bdd->prepare('SELECT * FROM admin WHERE login = :login AND mtp = :mtp');
    $req->execute(array(
    'login' => $login,
    'mtp' => $mtp));
    $resultat = $req->fetch();

    if ($resultat){
        session_start();
        $_SESSION['connected'] = 1;
        header('Location:admin.php');
    }
    else{
        header('Location:index.php?message=Erreur nom d\'utilisateur ou mot de passe');
    }