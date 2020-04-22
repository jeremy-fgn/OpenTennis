<?php
require_once(PATH_DAO);
require_once(PATH_ENTITY . 'Promotion.php');

class PromotionDAO extends DAO
{
    public function getPromotions()
    {
        $sql = "SELECT * FROM Promotion";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $promos = array();
        } else {
            foreach ($req as $bil) {
                $promos[] = new Promotion($bil['idPromotion'], $bil['promo'], $bil['pourcentage'], $bil['nbUtilisation']);
            }
        }

        return $promos;
    }


    public function getPromoById($id)
    {
        $sql = "SELECT * FROM Promotion WHERE idPromotion = ?";
        $req = DAO::queryRow($sql, [$id]);
        if ($req == false) {
            return false;
        }
        $promo = new Promotion(
            $req['idPromotion'],
            $req['promo'],
            $req['pourcentage'],
            $req['nbUtilisation'],
        );
        return $promo;
    }

    public function getPromoByCode($code)
    {
        $sql = "SELECT idPromo FROM CodePromo WHERE code = ?";
        $req = DAO::queryRow($sql, [$code]);
        return $req['idPromo'];
    }

    public function verifierCodePromo($code)
    {
        $sql = "SELECT idPromo FROM CodePromo WHERE code = ?";
        $req = DAO::queryRow($sql, [$code]);
        if ($req['idPromo'] != false) {
            $sql = "SELECT pourcentage FROM Promotion WHERE idPromotion = ?";
            $req = DAO::queryRow($sql, [$req['idPromo']]);
            return (1 - ($req['pourcentage'] / 100));
        }
        return false;
    }

    public function changePour($id, $pour)
    {
        $sql = 'UPDATE Promotion SET pourcentage = ? WHERE idPromotion = ?';
        $res = DAO::queryExec($sql, array($pour, $id));
    }

    public function changeNb($id, $nb)
    {
        $sql = 'UPDATE Promotion SET nbUtilisation = nbUtilisation-1 WHERE idPromotion = ?';
        $res = DAO::queryExec($sql, array($nb, $id));
    }

    public function usePromo($promo)
    {
        $sql = "SELECT count(*) as nb FROM Commande WHERE idPromotion = ?";
        $req = DAO::queryRow($sql, [$promo]);
        return $req['nb'];
    }
}
