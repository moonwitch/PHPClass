<?php
    class Jet {
        private $maxAltitude = 15000;
        public $currentAltitude = 124500;
        private $attackModeActivated = false;
        private $jetName = "F-35";

        // methods
        public function attackMode() {
            if (!$this->attackModeActivated) {
                $this->attackModeActivated = true;
                return "De aanvalsmodus werd geactiveerd!";
            } else {
                $this->attackModeActivated = false;
                return "De aanvalsmodus werd gedeactiveerd!";
            }
        }

        public function changeAltitude($newAltitude) {
            if ($newAltitude < $this->maxAltitude) {
                $this->currentAltitude = $newAltitude;
                return "De hoogte werd aangepast naar $newAltitude.";
            } else {
                return "<p style='color: red;'>De hoogte mag niet hoger zijn dan $this->maxAltitude.</p>";
            }
        }

        private  function areWeTooHigh() {
            if ($this->currentAltitude > $this->maxAltitude) {
                return "<p style='color:red;'>We vliegen te hoog!<br>Daal tot onder $this->maxAltitude.</p>";
            } 
        }
    }

    $f35 = new Jet();
    echo $f35->attackMode();
    echo "<br>"; // sorry maar ik wil echt een linebreak 
    echo $f35->attackMode();
    echo "<br>";
    // echo $f35->areWeTooHigh();
    echo "<br>";
    echo $f35->changeAltitude(124560);

?>