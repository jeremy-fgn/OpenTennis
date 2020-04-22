<?php

require_once(PATH_DAO);
require_once(PATH_ENTITY . 'Billet.php');

class BilletDAO extends DAO
{

    public function getAllBillets()
    {
        $sql = "SELECT * FROM Billet";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $billets = array();
        } else {
            foreach ($req as $bil) {
                $billets[] = new Billet($bil['idBillet'], $bil['idMatch'], $bil['idCommande'], $bil['emplacement'], $bil['idCategorie']);
            }
        }

        return $billets;
    }

    public function getBilletsByLetter($letter)
    {
        $sql = "SELECT * FROM Billet WHERE emplacement LIKE '$letter%'";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $billets = array();
        } else {
            foreach ($req as $bil) {
                $billets[] = new Billet($bil['idBillet'], $bil['idMatch'], $bil['idCommande'], $bil['emplacement'], $bil['idCategorie']);
            }
        }

        return $billets;
    }

    public function getBillet($id)
    {
        $sql = "SELECT * FROM Billet WHERE idBillet = ?";
        $args = array($id);
        $req = DAO::queryRow($sql, $args);
        if ($req == false) {
            return false;
        }
        $billet = new Billet($req['idBillet'], $req['idMatch'], $req['idCommande'], $req['emplacement'], $req['idCategorie']);
        return $billet;
    }

    public function addBillet($billet)
    {
        $sql = 'INSERT INTO Billet VALUES(?, ?, ?, ?, ?)';
        $args = array(
            $billet->get_idBillet(),
            $billet->get_idMatch(),
            $billet->get_idCommande(),
            $billet->get_emplacement(),
            $billet->get_idCategorie(),
        );
        $res = DAO::queryExec($sql, $args);
    }
}
