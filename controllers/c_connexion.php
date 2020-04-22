<?php

if(isset($_POST['inputMail']) and isset($_POST['inputPwd'])){
    require_once(PATH_CONNEXION_BD);
    require_once(PATH_MODELS."UserDAO.php");
    require_once(PATH_ENTITY.'User.php');

    $mail = htmlspecialchars($_POST['inputMail']);
    $password = htmlspecialchars($_POST['inputPwd']);


    $user_dao = new UserDAO(DEBUG);
    $user = $user_dao->verifierMail($mail);
    if($user){
        $pwdBD = $user->getPassword();
        if(password_verify($password, $pwdBD)){
            $_SESSION['logged'] = true;
            $_SESSION['user'] = serialize($user);
            $_SESSION['flash']['success'] = "Bienvenue " . $user->getprenom();
            header('Location: index.php');
            exit();
        }else{
            $_SESSION['flash']['danger'] = "Le mot de passe est incorrecte";
        }

    }else{
        $_SESSION['flash']['danger'] = "Pas de compte associé à ce mail";

    }
}


require_once(PATH_VIEWS.$page.".php");