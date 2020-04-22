<?php

require_once(PATH_CONNEXION_BD);
require_once(PATH_ENTITY . "Joueur.php");
require_once(PATH_MODELS . "JoueurDAO.php");
require_once(PATH_MODELS . "EquipeDAO.php");



// GESTION MATCHS SIMPLES
require_once(PATH_MODELS . "MatchSimpleDAO.php");
require_once(PATH_ENTITY . 'MatchSimple.php');



$mSimpleDAO = new MatchSimpleDAO(DEBUG);
$matchsS = $mSimpleDAO->getAllMatchs();
// GESTION MATCHS DOUBLES
require_once(PATH_MODELS . "MatchDoubleDAO.php");
require_once(PATH_ENTITY . 'MatchDouble.php');


$mDoubleDAO = new MatchDoubleDAO(DEBUG);
$matchsD = $mDoubleDAO->getAllMatchs();

$joueurDAO = new JoueurDAO(DEBUG);
$equipeDAO = new EquipeDAO(DEBUG);


require_once(PATH_VIEWS . $page . '.php');
