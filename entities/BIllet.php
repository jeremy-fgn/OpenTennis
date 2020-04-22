
<?php


class Billet{

    private $_idBillet;
    private $_idMatch;
    private $_idCommande;
    private $_emplacement;
    private $_idCategorie;

    public function __construct($idBillet, $idMatch, $idCommande, $emplacement, $idCategorie)
    {
        $this->_idBillet = $idBillet;
        $this->_idMatch = $idMatch;
        $this->_idCommande = $idCommande;
        $this->_emplacement = $emplacement;
        $this->_idCategorie = $idCategorie;
    }


    /**
     * Get the value of _idBillet
     */ 
    public function get_idBillet()
    {
        return $this->_idBillet;
    }

    /**
     * Set the value of _idBillet
     *
     * @return  self
     */ 
    public function set_idBillet($_idBillet)
    {
        $this->_idBillet = $_idBillet;

        return $this;
    }

    /**
     * Get the value of _idMatch
     */ 
    public function get_idMatch()
    {
        return $this->_idMatch;
    }

    /**
     * Set the value of _idMatch
     *
     * @return  self
     */ 
    public function set_idMatch($_idMatch)
    {
        $this->_idMatch = $_idMatch;

        return $this;
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
     * Get the value of _emplacement
     */ 
    public function get_emplacement()
    {
        return $this->_emplacement;
    }

    /**
     * Set the value of _emplacement
     *
     * @return  self
     */ 
    public function set_emplacement($_emplacement)
    {
        $this->_emplacement = $_emplacement;

        return $this;
    }

    /**
     * Get the value of _idCategorie
     */ 
    public function get_idCategorie()
    {
        return $this->_idCategorie;
    }

    /**
     * Set the value of _idCategorie
     *
     * @return  self
     */ 
    public function set_idCategorie($_idCategorie)
    {
        $this->_idCategorie = $_idCategorie;

        return $this;
    }
}