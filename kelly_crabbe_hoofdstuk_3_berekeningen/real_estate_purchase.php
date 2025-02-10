<?php
$real_estate_price = rand(275000,400000); // 6.2 rand() function
$real_estate_price *= (1 - 0.023); // 6.5 decrease by 2,3%
$real_estate_price = round($real_estate_price, 2); // 6.6 round
$budget = 145000;
++$budget // 6.7 -- ik had hier $budget++ staan omdat we budget pas hieronder gebruiken.
$shortcoming = $budget - $real_estate_price; // 6.3

// echo "Om dit vastgoed te kunnen kopen, moet je ".abs($shortcoming)." lenen bij de bank." // 6.4
echo "Om dit vastgoed te kunnen kopen, moet je " . floor(abs($shortcoming)) . " lenen bij de bank." // 6.8

?>