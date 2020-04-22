<?php
if(isset($_GET['idjoueur']) and is_numeric($_GET['idjoueur'])){
    require_once(PATH_CONNEXION_BD);
    require_once(PATH_ENTITY."Joueur.php");
    require_once(PATH_MODELS."JoueurDAO.php");
    require_once(PATH_MODELS."EquipeDAO.php");


    $id = htmlspecialchars($_GET['idjoueur']);

    // GESTION MATCHS SIMPLES
    require_once(PATH_MODELS."MatchSimpleDAO.php");
    require_once(PATH_ENTITY.'MatchSimple.php');
    $mSimpleDAO = new MatchSimpleDAO(DEBUG);
    $matchsS = $mSimpleDAO->getMatchsJoueur($id);


    // GESTION MATCHS DOUBLES
    require_once(PATH_MODELS."MatchDoubleDAO.php");
    require_once(PATH_ENTITY.'MatchDouble.php');
    $mDoubleDAO = new MatchDoubleDAO(DEBUG);
    $matchsD = $mDoubleDAO->getMatchsJoueur($id);



    $joueurDAO = new JoueurDAO(DEBUG);
    $equipeDAO = new EquipeDAO(DEBUG);

    require_once(PATH_VIEWS.$page.'.php');
}else{
    $_SESSION['flash']['danger'] = "Veuillez choisir un joueur";
    header('Location: index.php?page=billetterie_joueur');
    exit();
}
