<?php


    $swimwear = "bikini"; // Omdat het leuker is om het helemaal rnadom te maken.

    // Array met mogelijke kledingstukken
    $swimwearOptions = [
        "bikini",
        "badpak",
        "aansluitende zwembroek",
        "zwemshort",
        "wetsuit",
        "ondergoed"
    ];

    // Selecteer een willekeurig kledingstuk uit de array
    $swimwear = $swimwearOptions[array_rand($swimwearOptions)];

    switch ($swimwear) {
        case "bikini":
        case "badpak":
        case "aansluitende zwembroek":
            echo "<p style='color: green'>Dit kledingstuk is toegestaan in ons zwembad.</p>";
        break;

        case "zwemshort":
        case "wetsuit":
        case "ondergoed":
            echo "<p style='color: red'>Dit kledingstuk is niet toegestaan in ons zwembad.</p>";
        break;

        default:
            echo "<p style='color: red'>Dit kledingstuk werd niet herkend.</p>";
    }

?>