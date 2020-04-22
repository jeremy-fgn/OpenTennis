<?php

require_once(PATH_DAO);
require_once(PATH_ENTITY . 'Joueur.php');


class JoueurDAO extends DAO
{

    public function getAllJoueurs()
    {
        $sql = "SELECT * FROM Users NATURAL JOIN Joueur";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $joueurs = array();
        } else {
            foreach ($req as $play) {
                $joueurs[] = new Joueur(
                    $play['idUser'],
                    $play['nom'],
                    $play['prenom'],
                    $play['mail'],
                    $play['login'],
                    $play['password'],
                    $play['nationaliteJ'],
                    $play['libPhoto'],
                    $play['classementATP']
                );
            }
        }

        return $joueurs;
    }

    public function getJoueur($id)
    {
        $sql = "SELECT * FROM Users NATURAL JOIN Joueur WHERE Joueur.idUser = ?";
        $args = array($id);
        $req = DAO::queryRow($sql, $args);
        if ($req == false) {
            return false;
        }
        $joueur = new Joueur($req['idUser'], $req['nom'], $req['prenom'], $req['mail'], $req['login'], $req['password'], $req['nationaliteJ'], $req['libPhoto'], $req['classementATP']);
        return $joueur;
    }

    public function getJoueursByName($recherche)
    {
        $sql = "SELECT * FROM Users NATURAL JOIN Joueur where nom LIKE '$recherche%'";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $joueurs = array();
        } else {
            foreach ($req as $play) {
                $joueurs[] = new Joueur(
                    $play['idUser'],
                    $play['nom'],
                    $play['prenom'],
                    $play['mail'],
                    $play['login'],
                    $play['password'],
                    $play['nationaliteJ'],
                    $play['libPhoto'],
                    $play['classementATP']
                );
            }
        }

        return $joueurs;
    }
}
