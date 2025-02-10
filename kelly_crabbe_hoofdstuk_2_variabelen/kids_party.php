<?php
     // Because I prefer constants at the start of the file (sorry)
     define("NUMBER_OF_CHILDREN", 23);
     define("TIME_PER_BALLOON", 3);

     $clown = "Pippo";
     // $numberOfChildren = 23;
     // $timePerBalloon = 3;

     echo $clown."<br>";
     echo "Aantal benodigde ballonnen:".NUMBER_OF_CHILDREN."<br>";
     echo "Totale ballonplooitijd: ".(TIME_PER_BALLOON * NUMBER_OF_CHILDREN)."<br>";
?>