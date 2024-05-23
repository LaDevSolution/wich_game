<?php
class Wich extends Character{
    private int $restart;

    public function __construct()
    {
        $this->restart = mt_rand(1, 6);
        $this->name = "Mia l'apprenti sorcière";
        $this->position = 0;
    }

    /**
     * Get the number of remaining restarts
     *
     * @return integer
     */
    public function getRestart() : int
    {
        return $this->restart;
    }

    /**
     * Draw chance card
     *
     * @param [Gryphon] $Gryphon
     * @return void
     */
    public function chanceCard($Gryphon) : void
    {
        $card = mt_rand(1, 3);
        switch ($card) {
            case 1 :
                $Gryphon->setPosition(3);
                echo " et pioche une carte Sort : Elle lance un sort explosif qui fait reculer Griffon le griffon de 3 cases qui se retrouve sur la case ".$Gryphon->getPosition().".";
                break;
            case 2 :
                $this->setPosition(-1);
                echo " et pioche une carte Fuite : Elle recule d'une case et se retrouve sur la case ".$this->position.".";
                if($this->getPosition() == 0){
                    $this->restart--;
                }
                break;
            case 3:
                $this->setPosition(3);
                echo " et pioche une carte Téléportation : Elle avance de 3 cases et se retrouve sur la case ".$this->position." !";
                break;
            default:
                break;
        }
    }
}