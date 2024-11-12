<?php
// Multidimensionale array met gegevens van planeten
$planets = [
    [
        "name" => "Mercurius",
        "diameter" => "4,880 km",
        "circumference" => "15,329 km",
    ],
    [
        "name" => "Venus",
        "diameter" => "12,104 km",
        "circumference" => "37,832 km",
    ],
    [
        "name" => "Aarde",
        "diameter" => "12,742 km",
        "circumference" => "40,075 km",
    ],
];

// Toegang tot de tweede planeet in de array
$secondPlanet = $planets[1]; // Venus is de tweede planeet
echo "De tweede planeet is " . $secondPlanet["name"] . ". ";
echo "De diameter van " .
    $secondPlanet["name"] .
    " is " .
    $secondPlanet["diameter"] .
    " en de omtrek is " .
    $secondPlanet["circumference"] .
    ".";
?>
