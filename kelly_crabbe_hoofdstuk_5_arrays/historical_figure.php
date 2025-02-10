<?php
// Associatieve array met de gegevens van een historisch figuur
$historicalFigure = [
    "name" => "Napoleon Bonaparte",
    "country" => "Frankrijk",
    "cause_of_death" => "maagkanker",
];
// Toon de gegevens van de historische figuur
echo "De historische figuur die we onderzoeken is " .
    $historicalFigure["name"] .
    ". ";
echo "Hij komt uit " .
    $historicalFigure["country"] .
    " en stierf aan " .
    $historicalFigure["cause_of_death"] .
    ".";
?>
