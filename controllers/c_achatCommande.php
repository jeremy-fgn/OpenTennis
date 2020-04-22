<?php

// LORSQU'ON PASSE LA COMMANDE ON VIDE/SUPPRIME LE PANIER


if (!isset($_SESSION['logged']) or !$_SESSION['logged']) {
    $_SESSION['flash']['danger'] = "Vous devez être connecté pour accéder à cette page";
    header('Location: index.php');
    exit();
}

require_once(PATH_LIB . "fonctionPanier.php");

require_once(PATH_MODELS . "BilletDAO.php");
require_once(PATH_MODELS . "PromotionDAO.php");
require_once(PATH_MODELS . "CommandeDAO.php");
require_once(PATH_ENTITY . "Billet.php");
require_once(PATH_ENTITY . "Promotion.php");
require_once(PATH_ENTITY . "Commande.php");

// les DAOs
$comDAO = new CommandeDAO(DEBUG);
$bilDAO = new BilletDAO(DEBUG);
$promoDAO = new PromotionDAO(DEBUG);

// VARIABLES INDISPONSABLES / SESSIONs
$montant = MontantGlobal((isset($_SESSION['promo']) ? $_SESSION['promo'] : 1));
$promo = $promoDAO->getPromoByCode($_SESSION['code']);

// CRÉATION DE COMMANDE
$commande = new Commande(0, $montant, $utilisateur->getidUser(), $promo);
$commande = $comDAO->addCommande($commande);
$idCommande = $commande->get_idCommande();

//CRÉATION ET AJOUT DE BILLETs DANS LA BD

// ++++++++++++ A MODIFIER - ADAPTER LES PLACES AUX CATÉGORIES
for ($i = 0; $i < count($_SESSION['panier']['idMatch']); $i++) {
    $nbT = $_SESSION['panier']['nbTicket'][$i];
    for ($j = 0; $j < $nbT; $j++) {
        $billet = new Billet(0, $_SESSION['panier']['idMatch'][$i], $idCommande, ($_SESSION['panier']['categorie'][$i] != 1) ? $_SESSION['panier']['place'][$i] : null, $_SESSION['panier']['categorie'][$i]);
        $bilDAO->addBillet($billet);
    }
}


require_once(PATH_MODELS . "EmplacementDAO.php");
$emDAO = new EmplacementDAO(DEBUG);
$emDAO->removeAllRes();

$_SESSION['flash']['success'] = 'Votre commande a bien été prise en compte';
header('Location: index.php?page=panier&action=annuler');
exit();
