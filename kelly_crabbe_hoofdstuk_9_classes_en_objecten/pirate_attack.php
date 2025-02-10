<?php
    class PirateShip {
        public $shipname;
        public $captain;
        public $crew;
        public $number_of_cannons;
        public $health_points;

        function __construct($shipname, $captain) {
            $this->shipname = $shipname;
            $this->captain = $captain;
            $this->crew = rand(80, 120);
            $this->number_of_cannons = rand(10, 40);
            $this->health_points = rand(80,100);
        }

        public function showInfo() {
            return "De kapitein van $this->shipname is $this->captain. We hebben een bemanning van $this->crew piraten en $this->number_of_cannons kanonnen.";
        }
        public function enemySpotted() {
            return "Kapitein $this->captain! Vijand in zicht!";
        }
        public function attackEnemy($enemyShip){
            $damageDone = $this->number_of_cannons * 1.2 + $this->crew * 0.3;
            $enemyShip->health_points -= $damageDone;

            if ($enemyShip->health_points < 0) {
                $enemyShip->health_points = 0;
                return "We hebben $damageDone schade aangericht aan de $enemyShip->shipname. Het schip is gezonken!";
            } else {
                return "We hebben $damageDone schade aangericht aan de $enemyShip->shipname. Het schip heeft nog $enemyShip->health_points HP over.";
            }
        }
    }

    $blackPearl = new PirateShip("Black Pearl", "Jack Sparrow");
    $flyingDutchman = new PirateShip("Flying Dutchman", "Davy Jones");

    echo $blackPearl->showInfo();
    echo "<br>";
    echo $flyingDutchman->showInfo();
    echo "<br>";
    echo $blackPearl->enemySpotted();
    echo "<br>";
    echo $blackPearl->attackEnemy($flyingDutchman);
    echo "<br>";
    echo $blackPearl->attackEnemy($flyingDutchman); 
?>