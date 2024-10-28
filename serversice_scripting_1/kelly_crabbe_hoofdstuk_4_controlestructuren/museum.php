<?php
    $age = 27;
    $regular_ticket_price = 19.99;
    $discount_in_percentage = 0;


    // Oefening 7
    // stap 2
    // if ($age >= 65) $discount_in_percentage = 20;
    // Oef 10 - stap 2
    if ($age < 26 || $age >= 65) $discount_in_percentage = 20;

    // stap 3
    $discounted_ticket = $regular_ticket_price - ($regular_ticket_price * $discount_in_percentage / 100);
    echo "De prijs voor toegang is " .round($discounted_ticket,2). " euro.";

?>