<?php


//AJOUTER LES VÉRIFICATIONS DE CONNEXION POUR L'ACHAT


if (isset($_GET['typeMatch']) and isset($_GET['idMatch']) and is_numeric($_GET['idMatch']) and isset($_GET['prixMatch']) and is_numeric($_GET['prixMatch'])) {

    require_once(PATH_CONNEXION_BD);

    $type = htmlspecialchars($_GET['typeMatch']);
    $categorie = htmlspecialchars($_GET['categorie']);
    $id = htmlspecialchars($_GET['idMatch']);
    $prixMatch = htmlspecialchars($_GET['prixMatch']);

    if ($type == 'simple') {
        require_once(PATH_MODELS . "MatchSimpleDAO.php");
        require_once(PATH_ENTITY . 'MatchSimple.php');
        $matchDAO = new MatchSimpleDAO(DEBUG);
        require_once(PATH_ENTITY . "Joueur.php");
        require_once(PATH_MODELS . "JoueurDAO.php");
        $joueurDAO = new JoueurDAO(DEBUG);
    } elseif ($type == 'double') {
        require_once(PATH_MODELS . "MatchDoubleDAO.php");
        require_once(PATH_ENTITY . 'MatchDouble.php');
        $matchDAO = new MatchDoubleDAO(DEBUG);
        require_once(PATH_ENTITY . "Equipe.php");
        require_once(PATH_MODELS . "EquipeDAO.php");
        $joueurDAO = new EquipeDAO(DEBUG);
    } else {
        $_SESSION['flash']['danger'] = "Probleme veuillez reessayez";
        header('Location: index.php?page=visualisation');
        exit();
    }

    if (!(($categorie == '1') || ($categorie == '2') || ($categorie == '3'))) {
        $_SESSION['flash']['danger'] = "Probleme veuillez reessayez";
        header('Location: index.php?page=visualisation');
        exit();
    }





    $match = $matchDAO->getMatchById($id);
    $jou1 = $joueurDAO->getJoueur($match->getEquipe1())->getnom();
    $jou2 = $joueurDAO->getJoueur($match->getEquipe2())->getnom();


    if (!$match) {
        $_SESSION['flash']['danger'] = "Le match n'existe pas";
        header('Location: index.php?page=visualisation');
        exit();
    }
}

else {
    $_SESSION['flash']['danger'] = "Veuillez choisir un billet";
    header('Location: index.php?page=billetterie');
    exit();
}



require_once(PATH_VIEWS . $page . ".php");
