<?php 
abstract class Character{
    protected string $name;
    protected int $position;

    /**
     * Get the value of name
     */ 
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Throw the dice
     *
     * @return int
     */
    public function throwDice(): int
    {
        return mt_rand(1, 6);
    }
    
    /**
     * Get the value of position
     */ 
    public function getPosition() : int
    {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @return void
     */ 
    public function setPosition($number): void
    {
        $this->position += $number;
        if($this->position < 0){
            $this->position = 0;
        }elseif($this->position > 101 && $this->name == "Mia l'apprenti sorcière"){
            $this->position = 101;
        }elseif($this->position > 100 && $this->name == "Griffon le griffon"){
            $this->position = 100;
        }
    }
    
    /**
     * Character mooves
     *
     * @return void
     */
    public function move(): void
    {
        $dice = $this->throwDice();
        if($this->name == "Mia l'apprenti sorcière"){
            $this->setPosition($dice);
        } else {
            $this->setPosition(-$dice);
        } 
        echo "<br><br>".$this->name." lance le dés et avance de ".$dice." case(s).<br>".$this->name." est sur la case ".$this->position.".";
    }
}