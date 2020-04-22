<?php

if (isset($_SESSION['logged']) and $_SESSION['logged']) {
    if (
        isset($_GET['pour'])
        and isset($_GET['id'])
        and is_numeric($_GET['id'])
        and is_numeric($_GET['pour'])
    ) {
        $id = htmlspecialchars($_GET['id']);
        $pour = htmlspecialchars($_GET['pour']);

        require_once(PATH_MODELS . "PromotionDAO.php");
        $promoDAO = new PromotionDAO(DEBUG);
        $promo = $promoDAO->getPromoById($id);

        $modif = false;
        if ($pour != $promo->get_pourcentage()) {
            $promoDAO->changePour($id, $pour);
            $promo->set_pourcentage($pour);
            $modif = true;
        }


        if ($modif) {
            $_SESSION['flash']['success'] = "Les informations ont été modifié";
        }
        header('Location: index.php?page=admin');
        exit();
    } else {
        $_SESSION['flash']['danger'] = "Erreur de paramètres";
        header('Location: index.php?page=admin');
        exit();
    }
} else {
    $_SESSION['flash']['danger'] = "Vous devez vous connecté pour accéder à cette page";
    header('Location: index.php');
    exit();
}
