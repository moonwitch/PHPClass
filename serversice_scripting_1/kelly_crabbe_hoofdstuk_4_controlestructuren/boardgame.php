<?php

// Step 2
$dice = rand(1, 6);

// Step 3
switch($dice){
    case 1:
        echo "Zet 1 stap vooruit.";
    break;
    case 2:
        echo "Sla een beurt over.";
    break;
    case 3:
        echo "Zet 1 stap achteruit.";
    break;
    case 4:
        echo "Trek een upgrade kaart.";
    break;
    case 5:
        echo "Laat de persoon links van je een kaart trekken.";
    break;
    case 6:
        echo "Trek 4 kaarten.";
}
?>