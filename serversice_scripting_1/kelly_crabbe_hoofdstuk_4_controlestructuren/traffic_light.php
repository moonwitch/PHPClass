<?php
$traffic_light_color = "green";
switch($traffic_light_color){
    case "red":
        echo "Je moet stoppen!";
    break;
    case "orange":
        echo "Als je veilig kan stoppen, stop!";
    break;
    case "green":
        echo "Een kikker! Je mag doorrijden!";
    break;
    default:
        echo "Deze kleur werd niet herkend.";
}
?>