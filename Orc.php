<?php

class Orc extends Character {
    //attributs
    private $_damage;

    /**
     * Get the value of damage
     */
    public function get_damage()
    {
        return $this->_damage;
    }

    /**
     * Set the value of damage
     */
    public function set_damage($damage): self
    {
        $this->_damage = $damage;
        return $this;
    }

    //constructor
    public function __construct($health, $rage)
    {
        parent::__construct($health, $rage);
        $this->_health = $health;
        $this->_rage = $rage;
        return $this->_health . " " . $this->_rage;
    }

    //methodes
    public function attack(){
        $damage = random_int(600, 800);
        $this->_damage = $damage;
        return $this->_damage;
    }

    public function attacked($heroDamage){
        $this->set_health($this->get_health() - $heroDamage);
        return $this->get_health();
    }
}