<?php
    define("VETERINARIAN", "Lien Van Peer"); // Constants on top; and vet name (string) doesn't change in script => constant

    $patients_in_observation = ["Simba", "Rocko", "Augurk"]; // array of strings

    $next_patient = "Minoes"; //string
    echo "De volgende patient is ".$next_patient." voor Dr. ".VETERINARIAN."<br>";

    $next_patient  = "Kiwi"; //string - mutating
    echo "De volgende patient is ".$next_patient." voor Dr. ".VETERINARIAN."<br>";

    echo "De patienten in observatie zijn: ";
    var_dump($patients_in_observation);
?>