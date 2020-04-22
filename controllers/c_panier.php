<?php
include_once(PATH_LIB . "fonctionPanier.php");

// AJOUTER LA PARTIE CATEGORIE DU MATCH DIRECTEMENT DANS LE PANIER


$erreur = false;

$action = (isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : null));

if ($action !== null) {
   if (!in_array($action, array('ajout', 'suppression', 'refresh', 'annuler', 'code')))
      $erreur = true;

   //récupération des variables en POST ou GET
   $idMatch = (isset($_POST['idMatch']) ? $_POST['idMatch'] : (isset($_GET['idMatch']) ? $_GET['idMatch'] : null));
   $nbTicket = (isset($_POST['nbTicket']) ? $_POST['nbTicket'] : (isset($_GET['nbTicket']) ? $_GET['nbTicket'] : 1));
   $prixMatch = (isset($_POST['prixMatch']) ? $_POST['prixMatch'] : (isset($_GET['prixMatch']) ? $_GET['prixMatch'] : null));
   $typeMatch = (isset($_POST['typeMatch']) ? $_POST['typeMatch'] : (isset($_GET['typeMatch']) ? $_GET['typeMatch'] : null));
   $categorie = (isset($_POST['categorie']) ? $_POST['categorie'] : (isset($_GET['categorie']) ? $_GET['categorie'] : null));
   if ($categorie != 1) {
      require_once(PATH_MODELS . "EmplacementDAO.php");
      require_once(PATH_ENTITY . "Emplacement.php");
      $emDAO = new EmplacementDAO(DEBUG);

      $places = $emDAO->getPlacesLibres($idMatch);
      $place = $places[0]->get_idEmpl();
      $emDAO->reserverPlace($places[0]);
   } else {
      $place = (isset($_POST['place']) ? $_POST['place'] : (isset($_GET['place']) ? $_GET['place'] : null));
   }
   (isset($_GET['code']) ? $_SESSION['code'] = htmlspecialchars($_GET['code']) : $_SESSION['code'] = null);

   //On vérifie que $nbTicket est un float
   $nbTicket = floatval($nbTicket);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
   if (is_array($nbTicket)) {
      $QteArticle = array();
      $i = 0;
      foreach ($nbTicket as $contenu) {
         $QteArticle[$i++] = intval($contenu);
      }
   } else
      $nbTicket = intval($nbTicket);
}
if (!isset($_SESSION['usecode'])) {
   $_SESSION['usecode'] = false;
}


// Ajout du code de promo
if ($action == 'code') {
   if ($_SESSION['usecode']) { // ON VÉRIFIE SI L'USER A DÉJÀ UTILISÉ UNE PROMOTION POUR CETTE COMMANDE
      $_SESSION['flash']['warning'] = "Vous ne pouvez pas appliquer plusieurs promotions sur la même commande";
      header('Location: index.php?page=panier');
      exit();
   }
   require_once(PATH_MODELS . "PromotionDAO.php");
   $pdao = new PromotionDAO(DEBUG);
   $use = $pdao->usePromo($pdao->getPromoByCode($_SESSION['code']));
   $code = verifierPromo($_SESSION['code']); // VÉRIFIER LE CODE PROMO
   if ($code == 1) {
      $_SESSION['flash']['warning'] = "Le code de promotion n'existe pas";
      header('Location: index.php?page=panier');
      exit();
   } else { // APPLIQUER LE PROMO = AJOUTER DANS LA SESSION LA RÉDUCTION QUI SERA UTILISER POUR LE CALCUL DU MONTANT TOTAL

      if ($use == 0) {
         $_SESSION['promo'] = $code;
         $_SESSION['usecode'] = true;
         $_SESSION['flash']['success'] = "La promotion a été appliqué";
      } else {
         $_SESSION['flash']['danger'] = "Le code n'est plus valide";
      }
      header('Location: index.php?page=panier');
      exit();
   }
}


if (!$erreur) {
   switch ($action) {
      case "ajout":
         if ($categorie == null) {
            $_SESSION['flash']['danger'] = "Erreur de catégorie de place";
            header('Location: index.php?page=panier');
            exit();
         }
         ajouterArticle($idMatch, $typeMatch, $prixMatch, $nbTicket, $categorie, $place);
         header('Location: index.php?page=panier');
         exit();
         break;

      case "suppression":
         supprimerArticle($idMatch);
         break;

      case "refresh":
         for ($i = 0; $i < count($QteArticle); $i++) {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i], round($QteArticle[$i]));
         }
         break;

      case "annuler":
         supprimePanier();
         break;

      default:
         break;
   }
}
if (isset($_SESSION['panier'])) {
   $montantTotal = MontantGlobal((isset($_SESSION['promo']) ? $_SESSION['promo'] : 1));
}






require_once(PATH_VIEWS . $page . '.php');
