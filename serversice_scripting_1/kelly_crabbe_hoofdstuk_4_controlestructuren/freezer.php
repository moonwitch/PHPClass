<?php

// Oef 9
$temperature = rand(-30,-10);

echo "Temp generated is: $temperature <br>";

// If temp is lower than -22 or higher than -18, it's not perfect
if ($temperature <= -22|| $temperature > -18) {
    echo "De ijskasttemperatuur is niet optimaal.";
} else {
    echo "De ijskasttemperatuur is optimaal.";
}

?>
