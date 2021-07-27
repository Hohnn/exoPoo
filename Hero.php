<?php

/**
 * Classe représentant un héros, héritant de la classe Character
 */
class Hero extends Character {
    //atrributes
    /**
     * attribute représentant le nom de l'arme
     * @var string
     */
    private $_weapon;

    /**
     * atrribute représentant le nombre de damage de l'arme
     * @var int
     */
    private $_weaponDamage;

    /**
     * atrribute représentant le nom du shield
     * @var string
     */
    private $_shield;

    /**
     * atrribute représentant le nombre du shield
     * @var int
     */
    private $_shieldValue;

    /**
     * get the value of weapon
     * @return string
     */
    public function get_weapon() {
        return $this->_weapon;
    }

    /**
     * set the value of weapon
     * @param string $value
     * @return self
     */
    public function set_weapon($weapon): self {
        $this->_weapon = $weapon;
        return $this;
    }

    /**
     * Get the value of _weaponDamage
     * @return int
     */
    public function get_weaponDamage()
    {
        return $this->_weaponDamage;
    }

    /**
     * Set the value of _weaponDamage
     * @param int $weaponDamage
     * @return self
     */
    public function set_weaponDamage($weaponDamage): self
    {
        $this->_weaponDamage = $weaponDamage;

        return $this;
    }

    /**
     * Get the value of _shield
     * @return string
     */
    public function get_shield()
    {
        return $this->_shield;
    }

    /**
     * Set the value of _shield
     * @param string $shield
     * @return self
     */
    public function set_shield($shield): self
    {
        $this->_shield = $shield;

        return $this;
    }

    /**
     * Get the value of _shieldValue
     * @return int
     */
    public function get_shieldValue()
    {
        return $this->_shieldValue;
    }

    /**
     * Set the value of _shieldValue
     * @param int $shieldValue
     * @return self
     */
    public function set_shieldValue($shieldValue): self
    {
        $this->_shieldValue = $shieldValue;

        return $this;
    }

    //constructor
    /**
     * Constructeur de la classe Hero
     * @param int $health
     * @param int $rage
     * @param string $weapon
     * @param int $weaponDamage
     * @param string $shield
     * @param int $shieldValue
     */
    public function __construct(int $health, int $rage, string $weapon, int $weaponDamage, string $shield, int $shieldValue) {
        parent::__construct($health, $rage);
        $this->_weapon = $weapon;
        $this->_weaponDamage = $weaponDamage;
        $this->_shield = $shield;
        $this->_shieldValue = $shieldValue;
        //return a string with all parameters
        return $this->get_health() . " " . $this->get_rage() . " " . $this->_weapon . " " . $this->_weaponDamage . " " . $this->_shield . " " . $this->_shieldValue;
    }

    /**
     * Hero take damage
     */
    public function attacked($orcDamage){
        
        if($this->_shieldValue < $orcDamage){
            $this->set_health($this->get_health() - ($orcDamage - $this->_shieldValue)) ;
            /* $this->_shieldValue = 0; */
        }
            /* $this->_shieldValue -= $orcDamage; */
        $this->increaseRage();
        return $this->get_health();
    }

    /**
     * Rage up
     */
    public function increaseRage(){    
        $this->set_rage($this->get_rage() + 30);
        return $this->get_rage();
    }

}