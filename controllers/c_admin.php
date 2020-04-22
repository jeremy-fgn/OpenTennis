<?php
if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    if ($utilisateur->getIsAdmin() === true) {

        require_once(PATH_CONNEXION_BD);

        require_once(PATH_MODELS . "UserDAO.php");
        require_once(PATH_MODELS . "PromotionDAO.php");

        require_once(PATH_ENTITY . 'User.php');
        require_once(PATH_ENTITY . 'Promotion.php');

        $user_dao = new UserDAO(DEBUG);
        $promoDAO = new PromotionDAO(DEBUG);

        $users = $user_dao->getAllUsers();
        $promos = $promoDAO->getPromotions();



        require_once(PATH_VIEWS . $page . '.php');
    } else {
        $_SESSION['flash']['danger'] = "Vous n'avez pas l'autorisation d'accès";
        header('Location: index.php');
        exit();
    }
} else {
    $_SESSION['flash']['danger'] = "Veuillez vous connecter pour accéder à cette page";
    header('Location: index.php?page=connexion');
    exit();
}
