<?php


if (
    isset($_POST['inputNomSignup'])
    and isset($_POST['inputPrenomSignup'])
    and isset($_POST['inputMail'])
    and isset($_POST['inputPwd'])
) {

    if (
        !empty($_POST['inputNomSignup'])
        and !empty($_POST['inputPrenomSignup'])
        and !empty($_POST['inputMail'])
        and !empty($_POST['inputPwd'])
    ) {

        require_once(PATH_CONNEXION_BD);
        require_once(PATH_MODELS . "UserDAO.php");
        require_once(PATH_ENTITY . 'User.php');

        // Connexion BD
        //$bdd = Connexion::getInstance();
        $user_dao = new UserDAO(DEBUG);

        //Données sur l'user
        $id = 0;
        $nom = htmlspecialchars($_POST['inputNomSignup']);
        $prenom = htmlspecialchars($_POST['inputPrenomSignup']);
        $email = htmlspecialchars($_POST['inputMail']);
        //VÉRIFIER MOT DE PASSE CORRECTE
        if (!preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $email)) {
            $_SESSION['flash']['danger'] = "Veuillez saisir un mail correct.";
            header('Location: index.php?page=inscription');
            exit();
        }
        // VÈRIFIER TAILLE MOT DE PASSE
        $password = htmlspecialchars($_POST['inputPwd']);
        if (strlen($password) < 6) {
            $_SESSION['flash']['danger'] = "Le mot de passe doit contenir au moins 6 caractères.";
            header('Location: index.php?page=inscription');
            exit();
        }

        // VÉRIFIER MAIL EXISTE
        $mailExist = $user_dao->verifierMail($email);

        if ($mailExist != 0) {
            $_SESSION['flash']['danger'] = "Un compte avec cette adresse mail existe déjà.";
            header('Location: index.php?page=signup');
            exit();
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        //Création user
        $user = new User($id, $nom, $prenom, $email, $mail, $password);
        $user_dao->registerUser($user);

        //Redirection
        $_SESSION['flash']['success'] = "Votre compte a bien été créé";
        header('Location: index.php');
        exit();
    }
    $_SESSION['flash']['danger'] = "Veuillez compléter le formulaire";
}


require_once(PATH_VIEWS . $page . ".php");
