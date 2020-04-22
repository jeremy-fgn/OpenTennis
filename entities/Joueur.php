<?php
require_once(PATH_ENTITY.'User.php');

class Joueur extends User{
    
    private $_idUser;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_login;
    private $_password;
    private $_nationaliteJ;
    private $_libPhoto;
    private $_classementATP;

    
    public function __construct($id, $nom, $prenom, $mail, $login, $pwd, $nationalite, $libPhoto, $classement){
        parent::__construct($id, $nom, $prenom, $mail,$login,$pwd);
        $this->_nationaliteJ = $nationalite;
        $this->_libPhoto = $libPhoto;
        $this->_classementATP = $classement;
    }

    public function getNationalite(){
        return $this->_nationaliteJ;
    }

    public function getLibPhoto(){
        return $this->_libPhoto;
    }

    public function getClassement(){
        return $this->_classementATP;
    }
    


    public function setNationalie($nat){
        $this->_nationaliteJ = $nat;
    }

    public function setLibPhoto($lib){
        $this->_libPhoto = $lib;
    }

    
    


    


}