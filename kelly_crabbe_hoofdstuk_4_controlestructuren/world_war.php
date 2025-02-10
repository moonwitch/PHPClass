<?php

// Definieer het jaartal
$jaar = 1917; // Vervang dit door een jaartal naar keuze

// Controleer of de variabele leeg is
if (empty($jaar)) {
  echo "<p style='color: red;'>Fout: Het jaartal is niet gedefinieerd.</p>";
} else {
  // Controleer of het jaartal binnen de periode van Wereldoorlog 1 valt
  if ($jaar >= 1914 && $jaar <= 1918) {
    echo "Wereldoorlog 1";
  } // Controleer of het jaartal binnen de periode van Wereldoorlog 2 valt
  elseif ($jaar >= 1940 && $jaar <= 1945) {
    echo "Wereldoorlog 2";
  } // Als het jaartal niet binnen de periode van beide wereldoorlogen valt
  else {
    echo "Geen oorlog in België";
  }
}

?>