<?php
// Multidimensionale array met gegevens over continenten
$continents = [
    [
        "name" => "Afrika",
        "population" => "1,428 miljard" // 2023 schatting
    ],
    [
        "name" => "Europa",
        "population" => "748 miljoen" // 2023 schatting
    ],
    [
        "name" => "Azië",
        "population" => "4,754 miljard" // 2023 schatting
    ]
];

// Itereren door de continenten met een foreach-loop
foreach ($continents as $continent) {
    echo '<div style="
        display: inline-block;
        height: 100px; 
        width: 200px;
        border: 1px solid black; 
        padding: 5px; 
        margin: 10px;"
        box-sizing: border-box;"
        >';
    foreach ($continent as $key => $value) {
        echo "<p><strong>" . $key . ":</strong> " . $value . "</p>";
    }
    echo '</div>';
}
