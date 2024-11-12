<?php
$sushi = [
    "Tempura",
    "Maki",
    "Uramaki",
    "Temaki",
    "Tempura",
    "Nigiri sushi",
    "Sashimi",
    "Uramaki",
];

$sushi = array_unique($sushi); // Verwijdert duplicaten
sort($sushi); // Sorteert de array
echo join("<br>", $sushi); // Toont de array in een lijst
?>
