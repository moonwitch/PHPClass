<?php
// Indexed Array with list of /img
$img = [
    "img/aloe-vera.jpg",
    "img/cactus-euphorbia.jpg",
    "img/echinocactus-grusonii.png",
];

// Show random image
echo "<h1>Cactus van de maand</h1>
<img src='".$img[array_rand($img)]."' alt='Cactus'>";
?>
