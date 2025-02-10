<?php
// snelle functie
function calculateBMI($weight, $height)
{
    $BMI = $weight / ($height * $height);

    switch ($BMI) {
        case $BMI < 18.5:
            return "Ondergewicht";
        case $BMI >= 18.5 && $BMI < 25:
            return "Normaal gewicht";
        case $BMI >= 25 && $BMI < 30:
            return "Overgewicht";
        case $BMI >= 30:
            return "Obesitas";
    }
}

echo calculateBMI(80, 1.8);
echo "<br>";
echo calculateBMI(60, 1.8);
?>
