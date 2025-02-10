<?php
$mushroomCount = 10; // Global scope

function findMushrooms() {
    $foundMushrooms = 5; // Local scope
    global $mushroomCount; // Global scope
    $mushroomCount += $foundMushrooms; // Global scope since it references the globally defined one

    echo "Aantal gevonden paddenstoelen: $foundMushrooms\n";
    echo "Totaal aantal paddenstoelen nu: $mushroomCount\n";
}

function displayTotalMushrooms() {
    echo "Totaal aantal paddenstoelen buiten de functie: {$GLOBALS['mushroomCount']}\n";
}

// echo $foundMushrooms; // Undefined variable error want deze is enkel in de findMushrooms() functie gedefinieerd

findMushrooms();
displayTotalMushrooms();
?>
