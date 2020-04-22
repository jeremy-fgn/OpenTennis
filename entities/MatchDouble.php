<?php

require_once(PATH_ENTITY . "Match.php");
class MatchDouble extends Match
{

    private $_idMatch;
    private $_prixNiv0;
    private $_prixNiv12;
    private $_prixNiv3;
    private $_dateMatch;
    private $_idEquipe1;
    private $_idEquipe2;
    private $_idCourt;

    public function __construct($id, $prix1, $prix2, $prix3, $date, $equ1, $equ2, $court)
    {
        parent::__construct($id, $prix1, $prix2, $prix3, $date, $court);
        $this->_idEquipe1 = $equ1;
        $this->_idEquipe2 = $equ2;
    }


    public function getEquipe1()
    {
        return $this->_idEquipe1;
    }

    public function getEquipe2()
    {
        return $this->_idEquipe2;
    }



    public function setEquipe1($equ)
    {
        $this->_idEquipe1 = $equ;
    }

    public function setEquipe2($equ)
    {
        $this->_idEquipe2 = $equ;
    }
}
