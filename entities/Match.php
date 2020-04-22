<?php

class Match
{


    private $_idMatch;
    private $_dateMatch;
    private $_prixNiv0;
    private $_prixNiv12;
    private $_prixNiv3;
    private $_idCourt;

    public function __construct($id, $prix1, $prix2, $prix3, $date, $court)
    {
        $this->_idMatch = $id;
        $this->_prixNiv0 = $prix1;
        $this->_prixNiv12 = $prix2;
        $this->_prixNiv3 = $prix3;
        $this->_dateMatch = $date;
        $this->_idCourt = $court;
    }

    // GETTER
    public function getIdMatch()
    {
        return $this->_idMatch;
    }

    public function getDateCompleteMatch()
    {
        return $this->_dateMatch;
    }

    public function getDateMatch()
    {
        return date("D, d M Y", strtotime($this->_dateMatch));
    }

    public function getHeureMatch()
    {
        return date("H:i", strtotime($this->_dateMatch));
    }

    public function getCourt()
    {
        return $this->_idCourt;
    }


    //SETTER
    public function setIdMatch($id)
    {
        $this->_idMatch = $id;
    }

    public function setDateMatch($date)
    {
        $this->_dateMatch = $date;
    }

    public function setCourt($court)
    {
        $this->_idCourt = $court;
    }

    /**
     * Get the value of _prixNiv0
     */
    public function get_prixNiv0()
    {
        return $this->_prixNiv0;
    }

    /**
     * Set the value of _prixNiv0
     *
     * @return  self
     */
    public function set_prixNiv0($_prixNiv0)
    {
        $this->_prixNiv0 = $_prixNiv0;

        return $this;
    }

    /**
     * Get the value of _prixNiv12
     */
    public function get_prixNiv12()
    {
        return $this->_prixNiv12;
    }

    /**
     * Set the value of _prixNiv12
     *
     * @return  self
     */
    public function set_prixNiv12($_prixNiv12)
    {
        $this->_prixNiv12 = $_prixNiv12;

        return $this;
    }

    /**
     * Get the value of _prixNiv3
     */
    public function get_prixNiv3()
    {
        return $this->_prixNiv3;
    }

    /**
     * Set the value of _prixNiv3
     *
     * @return  self
     */
    public function set_prixNiv3($_prixNiv3)
    {
        $this->_prixNiv3 = $_prixNiv3;

        return $this;
    }
}
