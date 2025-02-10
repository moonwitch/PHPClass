<?php
$member = "Japan";
$member_states = [
    // Indexed Array
    "Oostenrijk",
    "België",
    "Bulgarije",
    "Kroatië",
    "Cyprus",
    "Tsjechië",
    "Denemarken",
    "Groot-Brittannië", // Brexit hahaha
    "Estland",
    "Finland",
    "Frankrijk",
    "Duitsland",
    "Griekenland",
    "Hongarije",
    "Ierland",
    "Italië",
    "Letland",
    "Litouwen",
    "Luxemburg",
    "Malta",
    "Nederland",
    "Polen",
    "Portugal",
    "Roemenië",
    "Slowakije",
    "Slovenië",
    "Spanje",
    "Zweden",
];

// De Brexit nog eens uitvoeren en de UK er uit gooien
// array_search() geeft de index van een waarde in een array terug
// unset() verwijdert een element uit een array
$index = array_search("Groot-Brittannië", $member_states);
array_splice($member_states, $index, 1);

// Tel het aantal lidstaten van de Europese Unie
echo "De Europese Unie telt " . count($member_states) . " lidstaten.<br>";

// Check of Japan lid is van de Europese Unie
// in_array() controleert of een waarde voorkomt in een array
if (in_array($member, $member_states)) {
    echo "Het land " . $member . " is lid van de Europese Unie.";
} else {
    echo "Het land " . $member . " is geen lid van de Europese Unie.";
}
?>
