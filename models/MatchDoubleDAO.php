<?php

require_once(PATH_DAO);
require_once(PATH_ENTITY . 'MatchDouble.php');

class MatchDoubleDAO extends DAO
{


    public function getAllMatchs()
    {
        $sql = "SELECT * FROM Matchs NATURAL JOIN MatchDouble ORDER BY dateMatch";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $matchs = array();
        } else {
            foreach ($req as $ma) {
                $matchs[] = new MatchDouble(
                    $ma['idMatch'],
                    $ma['prixNiv0'],
                    $ma['prixNiv12'],
                    $ma['prixNiv3'],
                    $ma['dateMatch'],
                    $ma['idEquipe1'],
                    $ma['idEquipe2'],
                    $ma['idCourt']
                );
            }
        }

        return $matchs;
    }

    public function getMatchById($id)
    {
        $sql = "SELECT * FROM Matchs NATURAL JOIN MatchDouble WHERE idMatch = ?";
        $args = array($id);
        $req = DAO::queryRow($sql, $args);
        if ($req == false) {
            return false;
        }
        $match = new MatchDouble(
            $req['idMatch'],
            $req['prixNiv0'],
            $req['prixNiv12'],
            $req['prixNiv3'],
            $req['dateMatch'],
            $req['idEquipe1'],
            $req['idEquipe2'],
            $req['idCourt']
        );
        return $match;
    }

    public function getMatchsJoueur($idjoueur)
    {
        $sql = "SELECT * FROM Matchs NATURAL JOIN MatchDouble where idEquipe1 in (SELECT idEquipe FROM Equipe WHERE idJoueur1 = ? or idJoueur2 = ?) ORDER BY dateMatch";
        $args = array($idjoueur, $idjoueur);
        $req = DAO::queryAll($sql, $args);
        if ($req == false) {
            $matchs = array();
        } else {
            foreach ($req as $ma) {
                $matchs[] = new MatchDouble(
                    $ma['idMatch'],
                    $ma['prixNiv0'],
                    $ma['prixNiv12'],
                    $ma['prixNiv3'],
                    $ma['dateMatch'],
                    $ma['idEquipe1'],
                    $ma['idEquipe2'],
                    $ma['idCourt']
                );
            }
        }

        return $matchs;
    }
}
