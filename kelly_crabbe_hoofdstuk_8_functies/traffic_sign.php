<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Het snelheidsbord</title>
    <style>
        .traffic_sign {
            height: 100px;
            width: 100px;
            background-color: white;
            border-radius: 50%;
            border: 20px solid rgba(200,0,0);
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 50px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<?php
function traffic_sign($speed)
{
    echo "<div class='traffic_sign'>$speed</div>";
}

traffic_sign(50);
traffic_sign(70);
?>
</body>
</html>
