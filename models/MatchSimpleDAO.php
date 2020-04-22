<?php

require_once(PATH_DAO);
require_once(PATH_ENTITY . 'MatchSimple.php');

class MatchSimpleDAO extends DAO
{

    public function getAllMatchs()
    {
        $sql = "SELECT * FROM Matchs NATURAL JOIN MatchSimple ORDER BY dateMatch";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $matchs = array();
        } else {
            foreach ($req as $ma) {
                $matchs[] = new MatchSimple(
                    $ma['idMatch'],
                    $ma['prixNiv0'],
                    $ma['prixNiv12'],
                    $ma['prixNiv3'],
                    $ma['dateMatch'],
                    $ma['idJoueur1'],
                    $ma['idJoueur2'],
                    $ma['idCourt']
                );
            }
        }

        return $matchs;
    }

    public function getMatchById($id)
    {
        $sql = "SELECT * FROM Matchs NATURAL JOIN MatchSimple WHERE idMatch = ?";
        $args = array($id);
        $req = DAO::queryRow($sql, $args);
        if ($req == false) {
            return false;
        }
        $match = new MatchSimple(
            $req['idMatch'],
            $req['prixNiv0'],
            $req['prixNiv12'],
            $req['prixNiv3'],
            $req['dateMatch'],
            $req['idJoueur1'],
            $req['idJoueur2'],
            $req['idCourt']
        );
        return $match;
    }

    public function getMatchsJoueur($idjoueur)
    {
        $sql = "SELECT * FROM Matchs NATURAL JOIN MatchSimple where idJoueur1 = ? OR idJoueur2 = ? ORDER BY dateMatch";
        $args = array($idjoueur, $idjoueur);
        $req = DAO::queryAll($sql, $args);
        if ($req == false) {
            $matchs = array();
        } else {
            foreach ($req as $ma) {
                $matchs[] = new MatchSimple(
                    $ma['idMatch'],
                    $ma['prixNiv0'],
                    $ma['prixNiv12'],
                    $ma['prixNiv3'],
                    $ma['dateMatch'],
                    $ma['idJoueur1'],
                    $ma['idJoueur2'],
                    $ma['idCourt']
                );
            }
        }

        return $matchs;
    }
}
