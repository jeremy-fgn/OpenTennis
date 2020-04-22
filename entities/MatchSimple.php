<?php

require_once(PATH_ENTITY . "Match.php");
class MatchSimple extends Match
{

    private $_idMatch;
    private $_prixNiv0;
    private $_prixNiv12;
    private $_prixNiv3;
    private $_dateMatch;
    private $_idJoueur1;
    private $_idJoueur2;
    private $_idCourt;

    public function __construct($id, $prix1, $prix2, $prix3, $date, $jou1, $jou2, $court)
    {
        parent::__construct($id, $prix1, $prix2, $prix3, $date, $court);
        $this->_idJoueur1 = $jou1;
        $this->_idJoueur2 = $jou2;
        $this->_idCourt = $court;
    }

    public function getEquipe1()
    {
        return $this->_idJoueur1;
    }

    public function getEquipe2()
    {
        return $this->_idJoueur2;
    }



    public function setEquipe1($jou)
    {
        $this->_idJoueur1 = $jou;
    }

    public function setEquipe2($jou)
    {
        $this->_idJoueur2 = $jou;
    }
}
