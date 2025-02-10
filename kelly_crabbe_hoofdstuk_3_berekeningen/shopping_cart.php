<?php
    $number_of_products = 3;
    $product_1_price = 4.99;
    // Ex 3.2
    $product_1_price /= 2; // $product_1_price = $product_1_price / 2;
    $product_2_price = 19.95;
    // Ex 3.3
    $product_2_price *= 1.10; // $product_2_price * 1.10; 10% = 10/100, increase by 10% = 1.10
    $product_3_price = 9.99;

    // Calculate the total price and drop it into a variable (Ex 2.2)
    $total_price = $product_1_price + $product_2_price + $product_3_price;
    // Calculate the average price and drop it into a variable (Ex 2.3)
    $average_price = $total_price / $number_of_products;
    // Define the constants - tax rate because vadertje staat needs to get his share
    // (Ex 2.4)
    define('TAX_RATE', 21);
    // procuct 3 price without vat (Ex 2.5)
    $product_3_price_without_tax = $product_3_price - (($product_3_price / 100) * TAX_RATE);

    // Ex 2.6
    echo "product 3 without vat" . $product_3_price_without_tax . " euro.<br>";
    // Ex 3.4
    echo "product 1:" . $product_1_price . " euro.<br>";
    echo "product 2:" . $product_2_price . " euro.<br>";

    $f = 11 + 4 / (8 - 3);
    echo $f;
    $f += 49;
    echo $f;
    $f /= 2;
    echo $f;
?>