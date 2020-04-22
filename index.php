<?php
session_start();

require_once('./config/configuration.php');
require_once(PATH_TEXTES . LANG . '.php');

/**
 * Cérifie si un utilisateur est connecté
 */

if (isset($_SESSION['user'])) {
  require_once(PATH_ENTITY . 'User.php');
  $utilisateur = unserialize($_SESSION['user']);
}

/**
 * Verifie si le panier existe, le crée sinon
 */

if (!isset($_SESSION['panier'])) {
  $_SESSION['panier'] = array();
  $_SESSION['panier']['idMatch'] = array();
  $_SESSION['panier']['typeMatch'] = array();
  $_SESSION['panier']['prixMatch'] = array();
  $_SESSION['panier']['nbTicket'] = array();
  $_SESSION['panier']['place'] = array();
  $_SESSION['panier']['verrou'] = false;
}


if (isset($_GET['page'])) {
  $page = htmlspecialchars($_GET['page']);
  if (!is_file(PATH_CONTROLLERS . $_GET['page'] . ".php")) {
    $_SESSION['flash']['danger'] = "Cette page n'existe pas";
    $page = "404";
  }
} else
  $page = "accueil";

require_once(PATH_CONTROLLERS . $page . '.php');
