<?php
//isoler ici dans des constantes les textes affichés sur le site
define('LOGO', 'Logo de la compagnie'); // Affiché si image non trouvée

define('MENU_ACCUEIL','Accueil');
define('MENU_BILLETTERIE','Billetterie');
define('MENU_ADMIN','Admin');


define('TITRE_SITE', 'OPEN PARC ARAL');
define('TITRE_PAGE_ACCUEIL','accueil');
define('TITRE_PAGE_BILLETTERIE','billetterie');
define('TITRE_PAGE_CONNEXION','connexion');
define('TITRE_PAGE_PANIER','panier');
define('TITRE_PAGE_ADMIN','admin');
define('TITRE_BIENVENUE','Bienvenue !');


define('TITRE_ROW_PLANNING','Planning complet');
define('TITRE_ROW_JOUEURS','Planning par joueur');
define('TITRE_ROW_INFOS','Informations');
define('TITRE_ROW_MATCHS_SIMPLES','Matchs simples');
define('TITRE_ROW_MATCHS_DOUBLES','Matchs doubles');
define('TITRE_ROW_EXPLICATIONS','Où se situent les différentes catégories de tickets ?');

define('TEXTE_PAGE_404','Oops, la page demandée n\'existe pas !');
define('MESSAGE_ERREUR',"Une erreur s'est produite");
define('MESSAGE_CONNEXION',"Vous êtes connecté(e)");
define('MESSAGE_INCORRECT_PASSWORD',"Mot de passe incorrect");
define('MESSAGE_INCORRECT_LOGIN',"Login incorrect");
define("MESSAGE_prenom_ADD", 'Vous devez saisir un prénom (min 1 caractère)');

define('ERREUR_CONNECT_BDD', 'Connexion à la BD impossible.');
define('ERREUR_INSCRIPTION', 'Le login est inconnu!');
define('ERREUR_QUERY_BDD', 'Problème avec la requete.');
define('LOGIN_NOT_ENTER', 'Veuillez saisir le login!');


define('BTN_LOGIN', 'Se connecter');
define('CONNEXION','Connexion');
define('DECONNEXION','Deconnexion');
define('SUBMIT','Visualiser');
define('SEARCH_PLACEHOLDER','Joueur');
define('SEARCH','Rechercher');
define('OU','Ou');
define('ALT_JOUEUR','Photo du joueur');
define('ALT_EXPLICATIONS_BILLETS','Schéma des catégories de billets');
define('ALT_IMAGE_ACCUEIL','Image de l\'open parc');
define('RETOUR','Retour');
define('BIENVENUE','Bienvenue, ');
define('NB_UTIL','Nombre d\'utilisations : ');
define('PROMOTION','Promotion : ');
define('VALIDER','Valider');

define('EMAIL','Email');
define('MDP','Mot de passe');
define('PAS_COMPTE','Vous n\'avez pas de compte ? ');
define('CREER_COMPTE','Créer un compte maintenant');
define('CREATION','Création de compte');
define('INSCRIRE','S\'inscrire');
define('NOM','Nom');
define('PRENOM','Prénom');
define('JOUEURS','Joueurs');
define('BILLETS','Billets');
define('RDC','RDC');
define('NUMEROTE','Numéroté');
define('LIBRE','Libre');

define('MATCH_SELECT', 'Match sélectionné :');
define('AJOUTER_PANIER', 'Ajouter au panier');

define('DROITS','Le site et les éléments de ce site appartiennent à leurs propriétaires respectifs, tous drois réservés.');



define('TEXTE_EXPLICATIONS','Les tickets sont répartis en 3 catégories selon le placement choisi. Le prix peut varier selon les matchs et les codes promotionnels appliqués. Les places numérotées sont attribuées automatiquement à la suite.');
define('TEXTE_ROW_INFOS','Les billets du court central donnent accès aux courts annexes à la date prévue de début du match. Les matchs peuvent être reportés, le billet reste valable. Des promotions peuvent s\'appliquer, consultez votre panier pour les saisir.');
define('TEXTE_PLACE', 'Votre place est indiqué dans panier');