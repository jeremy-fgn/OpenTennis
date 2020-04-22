<?php


if (isset($_SESSION['logged'])) {
    unset($_SESSION['logged']);
    unset($_SESSION['user']);
    $_SESSION['flash']['success'] = "Vous êtes déconnecté";
}
header('Location: index.php');
exit();
