<?php

require_once(PATH_CONNEXION_BD);
require_once(PATH_MODELS."JoueurDAO.php");
require_once(PATH_ENTITY.'Joueur.php');

$joueurDAO = new JoueurDAO(DEBUG);

if(!isset($_POST['recherche'])){
    $joueurs = $joueurDAO->getAllJoueurs();
}else{
    $recherche = htmlspecialchars($_POST['recherche']);
    $joueurs = $joueurDAO->getJoueursByName($recherche);
}



require_once(PATH_VIEWS.$page.'.php');