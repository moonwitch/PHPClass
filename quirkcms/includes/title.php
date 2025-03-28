<?php
// Determine which page to display based on the current URL
$currentPage = basename($_SERVER['PHP_SELF'], ".php");

// Add a header based on the current page
switch ($currentPage) {
    case 'tuinaanleg':
        echo '<h2>Professionele Tuinaanleg</h2>';
        break;
    case 'onderhoud':
        echo '<h2>Tuin Onderhoud</h2>';
        break;
    case 'beplanting':
        echo '<h2>Beplanting & Advies</h2>';
        break;
    case 'materialen':
        echo '<h2>Materialen & Gereedschap</h2>';
        break;
    case 'over-ons':
        echo '<h2>Over Zeis en Bijl</h2>';
        break;
    case 'contact':
        echo '<h2>Contact Opnemen</h2>';
        break;
    default:
        echo '<h2>Welkom bij Zeis en Bijl</h2>';
        break;
}
?>