<?php
require_once(PATH_DAO);
require_once(PATH_ENTITY . 'Commande.php');

class CommandeDAO extends DAO
{
    public function getAllCommandes()
    {
        $sql = "SELECT * FROM Commande";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $commandes = array();
        } else {
            foreach ($req as $com) {
                $commandes[] = new Promotion($com['idCommande'], $com['montantTotal'], $com['idUser'], $com['idPromotion']);
            }
        }
        return $commandes;
    }


    public function addCommande($com)
    {
        $sql = 'INSERT INTO Commande VALUES(?, ?, ?, ?)';
        $args = array(
            $com->get_idCommande(),
            $com->get_montantTotal(),
            $com->get_idUser(),
            $com->get_idPromotion()
        );
        $res = DAO::queryExec($sql, $args);
        $sql = "SELECT max(idCommande) as lastC FROM Commande";
        $res = DAO::queryRow($sql);
        $com->set_idCommande($res['lastC']);
        return $com;
    }
}
