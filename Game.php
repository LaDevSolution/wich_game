<?php
require('./Character.php');
require './Wich.php';
require './Gryphon.php';


class Game {
    private Wich $wich;
    private Gryphon $gryphon;
    private int $turnNumber = 0;
    private string $wichName;
    private string $gryphonName;

    public function __construct(){
        $this->wich = new Wich();
        $this->gryphon = new Gryphon();
        $this->wichName = $this->wich->getName();
        $this->gryphonName = $this->gryphon->getName();
    }

    /**
     * Represents a game turn
     *
     * @return array
     */
    public function turn(): array{
        $this->turnNumber++;
        $result = [];

        echo '<br><br>TOUR N°'.$this->turnNumber;

        //Wich mooves first
        $this->wich->move();

        //Check if Wich and Gryphon are on the same position
        if($this->wich->getPosition() == $this->gryphon->getPosition()){
            echo "<br>Mince ".$this->gryphonName." est présent sur cette case ! Vite ! ".$this->wichName." tire une carte Chance";
            $this->wich->chanceCard($this->gryphon);
        }

        //Check if there is a winner
        if($this->wich->getRestart() == -1){
            return ['winner' => $this->gryphonName];
        }elseif($this->wich->getPosition() == 101){
            return ['winner' => $this->wichName];
        }

        //Gryphon mooves
        $this->gryphon->move();

        //Check if Gryphon and Wich are on the same position
        if($this->gryphon->getPosition() == $this->wich->getPosition()){
            echo "<br>Oh ! ".$this->wichName." est sur la même case que ".$this->gryphonName." qui aimerait bien la dévorer !";
            $wichDice = $this->wich->throwDice();
            echo "<br>Elle lance alors le dé pour tenter de l'éviter et fait un scrore de ".$wichDice.".";
            if($wichDice > 3){
                echo "<br>Son score étant supérieur à 3. Elle tire alors une carte Chance";
                $this->wich->chanceCard($this->gryphon);
            } else {
                echo "<br>Son scrore n'étant pas supérieur à 3. Elle recommence la quête et se trouve sur la case 0.";
                $this->wich->setPosition(-100);
            }
        }

        //Check if there is a winner
        if($this->wich->getRestart() == -1){
            return ['winner' => $this->gryphonName];
        }elseif($this->wich->getPosition() == 101){
            return ['winner' => $this->wichName];
        }

        return $result;
    }   
}