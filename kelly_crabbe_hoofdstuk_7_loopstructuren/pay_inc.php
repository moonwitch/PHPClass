<?php
    $cur_pay = 2147;
    $inc = 2.6;
    $years = 0;

    while ($years < 10) {
        $cur_pay *= (1 + $inc / 100);
        $years += 2; // Inc with 2 years
        echo "Na <b>" . $years . " jaar</b> verdient Pieter <b>" . round($cur_pay) . " euro</b>.<br>";
    }

?>