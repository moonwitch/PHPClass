<?php
// Determine which page to display based on the current URL
$currentPage = basename($_SERVER["PHP_SELF"], ".php");

// Add a header based on the current page
switch ($currentPage) {
    case "tuinaanleg":
        echo '<h2 class="hero">Professionele Tuinaanleg</h2>';
        break;
    case "onderhoud":
        echo '<h2 class="hero">Tuin Onderhoud</h2>';
        break;
    case "beplanting":
        echo 'h2 class="hero">Beplanting & Advies</h2>';
        break;
    case "materialen":
        echo '<h2 class="hero">Materialen & Gereedschap</h2>';
        break;
    case "over-ons":
        echo '<h2 class="hero">Over Zeis en Bijl</h2>';
        break;
    case "contact":
        echo '<h2 class="hero">Contact Opnemen</h2>';
        break;
    default:
        echo '<h2 class="hero">Welkom bij Zeis en Bijl</h2>';
        break;
}
?>
