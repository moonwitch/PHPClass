<?php
$pageTitle = "Contact";
$pageDescription = "Neem contact op met Zeis en Bijl voor een vrijblijvende offerte of meer informatie over onze diensten.";
$heroImage = "https://picsum.photos/id/180/1200/400";
$heroAlt = "Neem contact op met Zeis en Bijl";

$formSubmitted = false;
$formErrors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simple form validation
    if (empty($_POST['name'])) {
        $formErrors['name'] = 'Vul uw naam in';
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $formErrors['email'] = 'Vul een geldig e-mailadres in';
    }

    if (empty($_POST['message'])) {
        $formErrors['message'] = 'Vul uw bericht in';
    }

    // If no errors, process form
    if (empty($formErrors)) {
        // In a real situation, you would send an email or save to database
        // For now, just set formSubmitted to true
        $formSubmitted = true;
    }
}
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
            <?php include './admin/cms/data/contact/content.php'; ?>
        </section>
    </main>

    <?php include './includes/footer.php'; ?>
</body>

</html>