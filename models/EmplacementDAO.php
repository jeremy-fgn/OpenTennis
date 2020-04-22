<?php

require_once(PATH_DAO);
require_once(PATH_ENTITY . 'Emplacement.php');

class EmplacementDAO extends DAO
{
    public function getEmpl()
    {
        $sql = "SELECT * FROM Emplacement";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $emp = array();
        } else {
            foreach ($req as $e) {
                $emp[] = new Emplacement(
                    $e['idEmpl'],
                    $e['place']
                );
            }
        }

        return $emp;
    }

    public function getPlacesLibres($idMatch)
    {
        $sql = "SELECT * FROM Emplacement WHERE idEmpl not in (SELECT emplacement FROM Billet WHERE idMatch = ?) and idEmpl not in (select * from PlaceRes)";
        $req = DAO::queryAll($sql, array($idMatch));
        if ($req == false) {
            $emp = array();
        } else {
            foreach ($req as $e) {
                $emp[] = new Emplacement(
                    $e['idEmpl'],
                    $e['place']
                );
            }
        }

        return $emp;
    }

    public function reserverPlace($place)
    {
        $sql = 'INSERT INTO PlaceRes VALUES (?)';
        $args = array(
            $place->get_idEmpl(),
        );
        $res = DAO::queryExec($sql, $args);
    }

    public function removeAllRes()
    {
        $sql = 'TRUNCATE TABLE PlaceRes';
        $res = DAO::queryExec($sql);
    }
}
