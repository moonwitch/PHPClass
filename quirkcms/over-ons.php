<?php
$pageTitle = "Over Ons";
$pageDescription = "Maak kennis met Zeis en Bijl: een familiebedrijf met meer dan 20 jaar ervaring in tuinonderhoud en tuinaanleg.";
$heroImage = "https://picsum.photos/id/287/1200/400";
$heroAlt = "Het team van Zeis en Bijl";
?>

<!DOCTYPE html>
<html lang="nl">
<?php include './includes/head.php'; ?>

<body>
    <header>
        <?php include './includes/navigation.php'; ?>
    </header>
    <main>
        <section class="hero">
            <?php include './includes/title.php'; ?>
            <img src="<?php echo $heroImage; ?>" alt="<?php echo $heroAlt; ?>" class="hero-image">
        </section>

        <section class="container about-section">
            <?php include './admin/cms/data/over-ons/who-we-are.php'; ?>
            <?php include './admin/cms/data/over-ons/our-history.php'; ?>
            <?php include './admin/cms/data/over-ons/our-values.php'; ?>
        </section>

        <section class="container cta-section">
            <?php include './admin/cms/data/over-ons/call-to-action.php'; ?>
        </section>
    </main>

    <?php include './includes/footer.php'; ?>
</body>

</html>