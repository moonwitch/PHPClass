<?php
$pageTitle = "Projecten";
$pageDescription = "Bekijk enkele van onze recente tuinprojecten: van kleine stadstuin tot grote landschapsprojecten.";
$heroImage = "https://picsum.photos/id/106/1200/400";
$heroAlt = "Recente tuinprojecten door Zeis en Bijl";
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

        <section class="container">
            <?php include './admin/cms/data/projecten/content.php'; ?>
        </section>

        <section class="container testimonial-section">
            <?php include './admin/cms/data/projecten/testimonials.php'; ?>
        </section>
    </main>

    <?php include './includes/footer.php'; ?>
</body>

</html>