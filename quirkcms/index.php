<?php
$pageTitle = "Home";
$pageDescription = "Zeis en Bijl - Specialist in tuinaanleg en tuinonderhoud in Limburg en Vlaams-Brabant";
$heroImage = "https://picsum.photos/id/233/1200/400";
$heroAlt = "Prachtige aangelegde tuin door Zeis en Bijl";
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
			<div class="welcome-section">
				<h2>Welkom bij Zeis en Bijl</h2>
				<p>Specialist in tuinaanleg en tuinonderhoud in Limburg en Vlaams-Brabant</p>

				<div class="service-highlights">
					<div class="service-card">
						<img src="https://picsum.photos/id/235/400/300" alt="Tuinaanleg">
						<h3>Tuinaanleg</h3>
						<p>Van ontwerp tot realisatie verzorgen wij uw complete tuin.</p>
						<a href="tuinaanleg.php" class="button">Meer info</a>
					</div>

					<div class="service-card">
						<img src="https://picsum.photos/id/237/400/300" alt="Tuinonderhoud">
						<h3>Tuinonderhoud</h3>
						<p>Wij houden uw tuin het hele jaar door in topconditie.</p>
						<a href="tuinonderhoud.php" class="button">Meer info</a>
					</div>

					<div class="service-card">
						<img src="https://picsum.photos/id/239/400/300" alt="Tuinontwerp">
						<h3>Tuinontwerp</h3>
						<p>Laat uw droomtuin tot leven komen met een professioneel ontwerp.</p>
						<a href="tuinontwerp.php" class="button">Meer info</a>
					</div>
				</div>
			</div>

			<div class="testimonials">
				<h2>Wat onze klanten zeggen</h2>
				<div class="testimonial-grid">
					<div class="testimonial">
						<div class="quote">"Uitstekende service! Onze tuin is volledig getransformeerd en precies zoals we het hadden gewenst."</div>
						<div class="client">— Familie Janssens, Hasselt</div>
					</div>
					<div class="testimonial">
						<div class="quote">"Zeis en Bijl heeft onze verwaarloosde tuin omgetoverd tot een prachtige buitenruimte waar we elke dag van genieten."</div>
						<div class="client">— Karlien Verstraeten, Leuven</div>
					</div>
				</div>
				<a href="portfolio.php" class="button primary">Bekijk ons portfolio</a>
			</div>
		</section>
	</main>
	<footer>
		<?php include './includes/footer.php'; ?>
	</footer>
</body>

</html>