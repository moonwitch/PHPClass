<?php
// $light_on = true;
$light_on = 0;

if ($light_on) { echo "De lamp brandt.";} else { echo "De lamp brandt niet.";}

echo "<br>";
// of korter
if ($light_on) echo "De lamp brandt ook."; else echo "De lamp brandt niet.";

echo "<br>";
// of nog korter
echo $light_on ? "De lamp brandt ook nog." : "De lamp brandt niet.";
?>