<?php
$pageTitle = "Home";
$pageDescription =
    "Zeis en Bijl - Specialist in tuinaanleg en tuinonderhoud in Limburg en Vlaams-Brabant";
$heroImage = "https://picsum.photos/id/233/1200/400";
$heroAlt = "Prachtige aangelegde tuin door Zeis en Bijl";
?>

<!DOCTYPE html>
<html lang="nl">
<?php include "./includes/head.php"; ?>

<body>
	<header>
		<?php include "./includes/navigation.php"; ?>
	</header>
	<main>
		<section class="hero">
			<?php include "./includes/title.php"; ?>
			<img src="<?php echo $heroImage; ?>" alt="<?php echo $heroAlt; ?>" class="hero-image">
		</section>

		<section class="container">
			<?php include "./admin/cms/data/home/content.php"; ?>

			<?php include "./admin/cms/data/home/testimonials.php"; ?>
		</section>

	</main>
	<footer>
		<?php include "./includes/footer.php"; ?>
	</footer>
</body>

</html>
