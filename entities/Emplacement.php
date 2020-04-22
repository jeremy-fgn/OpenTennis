
<?php


class Emplacement
{

    private $_idEmpl;
    private $_place;


    public function __construct($idEmpl, $place)
    {
        $this->_idEmpl = $idEmpl;
        $this->_place = $place;
    }

    /**
     * Get the value of _idEmpl
     */
    public function get_idEmpl()
    {
        return $this->_idEmpl;
    }

    /**
     * Set the value of _idEmpl
     *
     * @return  self
     */
    public function set_idEmpl($_idEmpl)
    {
        $this->_idEmpl = $_idEmpl;

        return $this;
    }

    /**
     * Get the value of _place
     */
    public function get_place()
    {
        return $this->_place;
    }

    /**
     * Set the value of _place
     *
     * @return  self
     */
    public function set_place($_place)
    {
        $this->_place = $_place;

        return $this;
    }
}
