<?php


class Commande{

    private $_idCommande;
    private $_montantTotal;
    private $_idUser;
    private $_idPromotion;



    public function __construct($idCommande, $montantTotal, $idUser, $idPromotion){
        $this->_idCommande = $idCommande;
        $this->_montantTotal = $montantTotal;
        $this->_idUser = $idUser;
        $this->_idPromotion = $idPromotion;
    }





    /**
     * Get the value of _idCommande
     */ 
    public function get_idCommande()
    {
        return $this->_idCommande;
    }

    /**
     * Set the value of _idCommande
     *
     * @return  self
     */ 
    public function set_idCommande($_idCommande)
    {
        $this->_idCommande = $_idCommande;

        return $this;
    }

    /**
     * Get the value of _montantTotal
     */ 
    public function get_montantTotal()
    {
        return $this->_montantTotal;
    }

    /**
     * Set the value of _montantTotal
     *
     * @return  self
     */ 
    public function set_montantTotal($_montantTotal)
    {
        $this->_montantTotal = $_montantTotal;

        return $this;
    }

    /**
     * Get the value of _idUser
     */ 
    public function get_idUser()
    {
        return $this->_idUser;
    }

    /**
     * Set the value of _idUser
     *
     * @return  self
     */ 
    public function set_idUser($_idUser)
    {
        $this->_idUser = $_idUser;

        return $this;
    }

    /**
     * Get the value of _idPromotion
     */ 
    public function get_idPromotion()
    {
        return $this->_idPromotion;
    }

    /**
     * Set the value of _idPromotion
     *
     * @return  self
     */ 
    public function set_idPromotion($_idPromotion)
    {
        $this->_idPromotion = $_idPromotion;

        return $this;
    }
}