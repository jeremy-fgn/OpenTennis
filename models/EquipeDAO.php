<?php

require_once(PATH_DAO);
require_once(PATH_ENTITY.'Equipe.php');

class EquipeDAO extends DAO{

    public function getEquipe($id){
        $sql = "SELECT * FROM Equipe WHERE idEquipe = ?";
        $args = array($id);
        $req = DAO::queryRow($sql, $args);
        if($req == false){
            return false;
        }
        $equipe = new Equipe($req['idEquipe'],$req['idJoueur1'],$req['idJoueur2']);
        return $equipe;
    }



}
