<?php
// Get current page name
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="main-nav">
    <div class="logo">
        <a href="index.php">
            <span>Zeis en Bijl</span>
        </a>
    </div>
    <ul class="nav-links">
        <li><a href="index.php" class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">Home</a></li>
        <li><a href="diensten.php" class="<?php echo ($currentPage == 'diensten.php') ? 'active' : ''; ?>">Diensten</a></li>
        <li><a href="projecten.php" class="<?php echo ($currentPage == 'projecten.php') ? 'active' : ''; ?>">Projecten</a></li>
        <li><a href="over-ons.php" class="<?php echo ($currentPage == 'over-ons.php') ? 'active' : ''; ?>">Over ons</a></li>
        <li><a href="contact.php" class="<?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
    </ul>
    <div class="mobile-menu-toggle">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>