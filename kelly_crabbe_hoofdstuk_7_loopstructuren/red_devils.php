<?php
    // const declaration
    define ("NUM_GOALS", rand(0,5));
    define ("WARCRY", "We are Belgium!");

    $i = 0;

    // Loop 
    do {
        echo WARCRY . "<br>";
        $i++;
    } while ($i <= NUM_GOALS);
?>