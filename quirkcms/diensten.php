<?php
$pageTitle = "Diensten";
$pageDescription = "Ontdek de tuindiensten die Zeis en Bijl aanbiedt: tuinonderhoud, tuinaanleg, snoeien en meer.";
$heroImage = "https://picsum.photos/id/42/1200/400";
$heroAlt = "Professionele tuindiensten van Zeis en Bijl";
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
            <?php include './admin/cms/data/diensten/content.php'; ?>
        </section>

        <section class="container cta-section">
            <?php include './admin/cms/data/diensten/call-to-action.php'; ?>
        </section>
    </main>

    <?php include './includes/footer.php'; ?>
</body>

</html>