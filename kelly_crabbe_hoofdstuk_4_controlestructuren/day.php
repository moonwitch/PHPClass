<?php
// Random hour
// $hour = rand(0, 23);

// Switch to date func
$hour = date("H");

//debug
echo "Hour is: $hour <br>";

if ($hour >= 6 && $hour < 11) {
    echo "Het is momenteel $hour u. (ochtend).";
} elseif ($hour >= 12 && $hour < 13) {
    echo "Het is momenteel $hour u. (middag).";
} elseif ($hour >= 14 && $hour < 17) {
    echo "Het is momenteel $hour u. (namiddag).";
} elseif ($hour >= 18 && $hour < 22) {
    echo "Het is momenteel $hour u. (avond).";
} else {
    echo "Het is momenteel $hour u. (nacht).";
}
?>