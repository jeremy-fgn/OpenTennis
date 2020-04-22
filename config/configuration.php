<?php

 
const DEBUG = true; // production : false; dev : true

// Accès base de données
const BD_HOST = 'iutdoua-web.univ-lyon1.fr';
const BD_DBNAME = 'p1801978';
const BD_USER = 'p1801978';
const BD_PWD = '365703';

// Langue du site
const LANG ='FR-fr';



//dossiers racines du site
define('PATH_CONTROLLERS','./controllers/c_');
define('PATH_ASSETS','./assets/');
define('PATH_LIB','./lib/');
define('PATH_MODELS','./models/');
define('PATH_VIEWS','./views/v_');
define('PATH_TEXTES','./languages/');
define('PATH_ENTITY','./entities/');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_SCRIPTS',PATH_ASSETS.'scripts/');


//fichiers
define('PATH_MENU', PATH_VIEWS.'menu.php');
define('PATH_CONNEXION_BD', PATH_MODELS.'Connexion.php');
define('PATH_DAO', PATH_MODELS.'DAO.php');
define('PATH_ICON', PATH_ASSETS.'images/tennis_ball.png');
define('PATH_SCHEMA', PATH_ASSETS.'images/schema_billets.jpg');
define('PATH_IMAGE_ACCUEIL', PATH_ASSETS.'images/accueil.jpg');

//autre
define('MAX_NB_BILLETS', 10);
define('MIN_NB_BILLETS', 1);