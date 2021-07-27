<?php
/**
 * Classe représentant un personnage
 */
class Character{
    //attributes
    /**
     * Attribut concernant la vie du personnage
     * @var integer
     */
    private $_health;
    /**
     * Attribut concernant la rage du personnage
     * @var integer
     */
    private $_rage;

    /**
     * Get the value of _health
     * @return integer
     */
    public function get_health(): int
    {
        return $this->_health;
    }

    /**
     * Set the value of _health
     * @param integer $health
     * @return self
     */
    public function set_health($health): self
    {
        $this->_health = $health;
        return $this;
    }

    /**
     * Get the value of _rage
     * 
     * @return integer
     */
    public function get_rage(): int
    {
        return $this->_rage;
    }

    /**
     * Set the value of _rage
     * @param integer $rage
     * @return self
     */
    public function set_rage($rage): self
    {
        $this->_rage = $rage;
        return $this;
    }

    /**
     * @param int $health
     * @param int $rage
     */
    public function __construct($health, $rage){
        $this->_health = $health;
        $this->_rage = $rage;
    }
    
}