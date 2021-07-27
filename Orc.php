<?php

class Orc extends Character {
    //attributs
    private $_damage;
    /**
     * Get the value of damage
     * @return int
     */
    public function get_damage()
    {
        return $this->_damage;
    }

    /**
     * Set the value of damage
     * @param int $damage
     * @return self
     */
    public function set_damage($damage): self
    {
        $this->_damage = $damage;
        return $this;
    }

    private $_weapon;
    private $_damageMin;
    private $_damageMax;

    //constructor
    /**
     * Contructeur de la classe Orc
     *
     * @param int $healthmin
     * @param int $healthmax
     * @param int $rage
     */
    public function __construct($healthmin, $healthmax, $rage, $increaseRage, $weapon, $damageMin, $damageMax)
    {
        parent::__construct($healthmin, $healthmax, $rage, $increaseRage);
        $this->_weapon = $weapon;
        $this->_damageMin = $damageMin;
        $this->_damageMax = $damageMax;
    }

    //methodes
    /**
     * damage attack random
     * @return int
     */
    public function attack(){
        $damage = random_int($this->_damageMin, $this->_damageMax);
        $this->_damage = $damage;
        return $this->_damage;
    }

    /**
     * reception de l'attack en fonction de damage
     * @param int $heroDamage
     * @return int
     */
    public function attacked(int $heroDamage){
        $this->set_health($this->get_health() - $heroDamage);
        return $this->get_health();
    }


}