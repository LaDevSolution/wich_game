<?php
require './Game.php';

echo 'Bienvenue dans "Le grimoire". Un jeu où une apprentie sorcière doit retrouver un grimoire magique gardé par un griffon !';

$game = new Game();

while(true){
    $result = $game->turn();
    if(!empty($result) && $result['winner'] == "Griffon le griffon"){
        echo "<br><br>Le gagnant est ".$result['winner'].". Il transforme l'apprentie sorcière en grenouille et conserve son grimoire.";
        break;
    } elseif(!empty($result) && $result['winner'] == "Mia l'apprenti sorcière"){
        echo "<br><br>Le gagnant est ".$result['winner'].". Elle s'empare du grimoire au nez et à la barbe de Griffon le griffon !";
        break;
    }
};


