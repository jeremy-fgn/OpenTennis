<?php

class User {
    
    private $_idUser;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_login;
    private $_password;
    private $_isAdmin;




    public function __construct($id, $nom, $prenom, $mail, $login, $pwd, $admin=false){
        $this->_idUser = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_mail = $mail;
        $this->_login = $login;
        $this->_password = $pwd;
        $this->_isAdmin = (boolean) $admin;
    }

    // GETTER
    public function getidUser(){
        return $this->_idUser;
    }
    public function getnom(){
        return $this->_nom;
    }

    public function getprenom(){
        return $this->_prenom;
    }

    public function getMail(){
        return $this->_mail;
    }

    public function getLogin()
    {
        return $this->_login;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function getIsAdmin(){
        return (boolean) $this->_isAdmin;
    }


    //SETTER
    public function setidUser($id){
        $this->_idUser = $id;
    }

    public function setnom($name){
        $this->_nom = $name;
    }

    public function setprenom($desc){
        $this->_prenom = $desc;
    }

    public function setMail($mail){
        $this->_mail = $mail;
    }

    public function setLogin($login)
    {
        $this->_login = $login;
    }

    public function setPassword($pwd){
        $this->_password = $pwd;
    }

    public function setIsAdmin($admin){
        $this->_isAdmin = (boolean) $admin;
    }

    
    


}