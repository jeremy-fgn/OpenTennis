<?php


class Promotion
{

    private $_idPromotion;
    private $_promo;
    private $_pourcentage;
    private $_nbUtilisation;

    public function __construct($id, $promo, $pour, $nb)
    {
        $this->_idPromotion = $id;
        $this->_promo = $promo;
        $this->_pourcentage = $pour;
        $this->_nbUtilisation = $nb;
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

    /**
     * Get the value of _pourcentage
     */
    public function get_pourcentage()
    {
        return $this->_pourcentage;
    }

    /**
     * Set the value of _pourcentage
     *
     * @return  self
     */
    public function set_pourcentage($_pourcentage)
    {
        $this->_pourcentage = $_pourcentage;

        return $this;
    }

    /**
     * Get the value of _nbUtilisationn
     */
    public function get_nbUtilisation()
    {
        return $this->_nbUtilisation;
    }

    /**
     * Set the value of _nbUtilisationn
     *
     * @return  self
     */
    public function set_nbUtilisation($_nbUtilisation)
    {
        $this->_nbUtilisation = $_nbUtilisation;
        return $this;
    }

    /**
     * Get the value of _promo
     */
    public function get_promo()
    {
        return $this->_promo;
    }

    /**
     * Set the value of _promo
     *
     * @return  self
     */
    public function set_promo($_promo)
    {
        $this->_promo = $_promo;

        return $this;
    }
}
