<?php
    $language = "fr";
    $languageFullName;

    switch(strtoupper($language)){
        case "NL":
            $languageFullName = "Nederlands";
        break;
        case "EN":
            $languageFullName = "Engels";
        break;
        case "FR":
            $languageFullName = "Frans";
        break;
        case "DE":
            $languageFullName = "Duits";
        break;
        default:
            $languageFullName = "Onbekend";
    }

echo "De afkorting ".strtoupper($language)." staat voor $languageFullName.";

?>