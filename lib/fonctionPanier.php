<?php


// LORS DE L'AJOUT IL FAUT VÉRIFIER EN PLUS QUE LA CATÉGORIE EST LA MÊME ET NON SEULEMENT LE ID - SINON AUTRE BILLET


/**
 * Verifie si le panier existe, le crée sinon
 * @return booleen
 */
function creationPanier()
{
   if (!isset($_SESSION['panier'])) {
      $_SESSION['panier'] = array();
      $_SESSION['panier']['idMatch'] = array();
      $_SESSION['panier']['typeMatch'] = array();
      $_SESSION['panier']['prixMatch'] = array();
      $_SESSION['panier']['nbTicket'] = array();
      $_SESSION['panier']['categorie'] = array();
      $_SESSION['panier']['place'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}


/**
 * Ajoute un article dans le panier
 */
function ajouterArticle($idMatch, $typeMatch, $prixMatch, $nbTicket, $categorie, $place)
{

   //Si le panier existe
   if (creationPanier() && !isVerrouille()) {
      //Si le produit existe déjà on ajoute seulement la quantité

      // if (($positionProduit = array_search($idMatch,  $_SESSION['panier']['idMatch'])) !== false
      // ) {
      //    if ($_SESSION['panier']['categorie'][$positionProduit] == $categorie) {
      //       $_SESSION['panier']['nbTicket'][$positionProduit] += $nbTicket;
      //    } else {
      //       $_SESSION['flash']['warning'] = "Vous ne pouvez pas achetez plusieurs tickets de cette catégorie";
      //       header('Location: index.php?page=panier');
      //       exit();
      //    }
      // } else {
      //Sinon on ajoute le produit
      array_push($_SESSION['panier']['idMatch'], $idMatch);
      array_push($_SESSION['panier']['typeMatch'], $typeMatch);
      array_push($_SESSION['panier']['prixMatch'], $prixMatch);
      array_push($_SESSION['panier']['nbTicket'], $nbTicket);
      array_push($_SESSION['panier']['categorie'], $categorie);
      array_push($_SESSION['panier']['place'], $place);
      // array_push($_SESSION['placeres'], $place);
      // }
   } else
      echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



/**
 * Modifie la quantité d'un article
 * @param $idMatch
 * @param $nbTicket
 * @return void
 */
function modifierQTeArticle($idMatch, $nbTicket)
{
   //Si le panier existe
   if (creationPanier() && !isVerrouille()) {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($nbTicket > 0) {
         //Recharche du produit dans le panier
         $positionProduit = array_search($idMatch,  $_SESSION['panier']['idMatch']);

         if ($positionProduit !== false) {
            $_SESSION['panier']['nbTicket'][$positionProduit] = $nbTicket;
         }
      } else
         supprimerArticle($idMatch);
   } else
      echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Supprime un article du panier
 * @param $idMatch
 * @return unknown_type
 */
function supprimerArticle($idMatch)
{
   //Si le panier existe
   if (creationPanier() && !isVerrouille()) {
      //Nous allons passer par un panier temporaire
      $tmp = array();
      $tmp['idMatch'] = array();
      $tmp['typeMatch'] = array();
      $tmp['prixMatch'] = array();
      $tmp['nbTicket'] = array();
      $tmp['categorie'] = array();
      $tmp['place'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for ($i = 0; $i < count($_SESSION['panier']['idMatch']); $i++) {
         if ($_SESSION['panier']['idMatch'][$i] !== $idMatch) {
            array_push($tmp['idMatch'], $_SESSION['panier']['idMatch'][$i]);
            array_push($tmp['typeMatch'], $_SESSION['panier']['typeMatch'][$i]);
            array_push($tmp['prixMatch'], $_SESSION['panier']['prixMatch'][$i]);
            array_push($tmp['nbTicket'], $_SESSION['panier']['nbTicket'][$i]);
            array_push($tmp['categorie'], $_SESSION['panier']['categorie'][$i]);
            array_push($tmp['place'], $_SESSION['panier']['place'][$i]);
         }
      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
      if (MontantGlobal() == 0) {
         supprimePanier();
      }
   } else
      echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



function verifierPromo($code)
{
   require_once(PATH_MODELS . "PromotionDAO.php");
   $promoDAO = new PromotionDAO(DEBUG);
   $promo = $promoDAO->verifierCodePromo($code);
   if ($promo != false) {
      return $promo;
   }
   return 1;
}
/**
 * Montant total du panier
 * @return int
 */
function MontantGlobal($promo = 1)
{
   $total = 0;
   for ($i = 0; $i < count($_SESSION['panier']['idMatch']); $i++) {
      $total += $_SESSION['panier']['nbTicket'][$i] * $_SESSION['panier']['prixMatch'][$i];
   }
   return $total * $promo;
}


/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier()
{
   unset($_SESSION['panier']);
   if (isset($_SESSION['code'])) {
      unset($_SERVER['code']);
   }
   if (isset($_SESSION['promo'])) {
      unset($_SESSION['promo']);
   }
   if (isset($_SESSION['usecode'])) {
      unset($_SESSION['usecode']);
   }
   require_once(PATH_MODELS . "EmplacementDAO.php");
   $emDAO = new EmplacementDAO(DEBUG);
   $emDAO->removeAllRes();
}

/**
 * Permet de savoir si le panier est verrouillé
 * @return booleen
 */
function isVerrouille()
{
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
      return true;
   else
      return false;
}

/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
      return count($_SESSION['panier']['idMatch']);
   else
      return 0;
}
