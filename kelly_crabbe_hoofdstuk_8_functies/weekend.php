<?php

function isWeekend()
{
    $today = date("N");
    if ($today == 6 || $today == 7) {
        return true;
    } else {
        return false;
    }
}

echo isWeekend();
?>
