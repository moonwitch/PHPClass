<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Het weer voor de komende 3 datefmt_get_calendar</title>
</head>

<body>
    <?php
    // the icons!
    $sun_icon = "☀︎";
    $rain_icon = "☂";

    // for loop
    for ($i = 1; $i <= 3; $i++) {
        $rain = rand(0, 100);
        $sun = 100 - $rain;
        echo "Day $i: $sun_icon $sun% $rain_icon $rain%<br>";
    }
    ?>
</body>

</html>