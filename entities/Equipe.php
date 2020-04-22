<?php

class Equipe {
    
    private $_idEquipe;
    private $_idJoueur1;
    private $_idJoueur2;


    
    public function __construct($idE, $jou1, $jou2){
        $this->_idEquipe = $idE;
        $this->_idJoueur1 = $jou1;
        $this->_idJoueur2 = $jou2;
    }

    // GETTER
    public function getIdEquipe(){
        return $this->_idEquipe;
    }
    public function getIdJoueur1(){
        return $this->_idJoueur1;
    }

    public function getIdJoueur2(){
        return $this->_idJoueur2;
    }

    //SETTER
    public function setIdEquipe($id){
        $this->_idJoueur = $id;
    }

    public function setIdJoueur1($name){
        $this->_nomJ = $name;
    }

    public function setIdJoueur2($prenom){
        $this->_prenomJ = $prenom;
    }

}