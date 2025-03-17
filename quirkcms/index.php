<!DOCTYPE html>
<html lang="nl">
<?php include './assets/head.php'; ?>

<body>
	<main>
		<header>
			<?php include './assets/navigation.php'; ?>
		</header>
		<section class="hero">
			<?php include './assets/title.php'; ?>

			<img src="https://picsum.photos/id/197/1200/500" alt="Tuinaanleg door Zeis en Bijl" class="hero-image">
			<p>Vakmanschap in tuinaanleg en onderhoud. Sinds 1985 toonaangevend in Geetbets en omstreken.</p>

			<a href="contact.php" class="button primary">Vraag een offerte aan</a>
		</section>

		<section class="features">
			<div class="grid">
				<article class="featured">
					<header>
						<h3><a href="tuinaanleg.php">Tuinaanleg</a></h3>
						<img src="https://picsum.photos/id/128/400/200" alt="Tuinaanleg services">
					</header>
					<p>Van ontwerp tot uitvoering, wij creëren tuinen die bij uw levensstijl passen met oog voor detail en duurzaamheid.</p>
					<a href="tuinaanleg.php" class="read-more">Meer informatie</a>
				</article>

				<article>
					<header>
						<h3><a href="onderhoud.php">Onderhoud <span class="seasonal-badge">Seizoen</span></a></h3>
						<img src="https://picsum.photos/id/106/400/200" alt="Tuin onderhoud">
					</header>
					<p>Regulier onderhoud, snoeien, maaien en seizoensgebonden werkzaamheden voor een blijvend mooie tuin.</p>
					<a href="onderhoud.php" class="read-more">Meer informatie</a>
				</article>

				<article>
					<header>
						<h3><a href="beplanting.php">Beplanting</a></h3>
						<img src="https://picsum.photos/id/124/400/200" alt="Beplanting advies">
					</header>
					<p>Deskundig advies over de juiste planten voor uw tuin, rekening houdend met grondsoort, lichtinval en persoonlijke voorkeuren.</p>
					<a href="beplanting.php" class="read-more">Meer informatie</a>
				</article>
			</div>
		</section>
		
		<section class="testimonial">
			<blockquote>
				"Zeis en Bijl heeft onze tuin compleet getransformeerd. Vakmanschap en oog voor detail maken het verschil."
				<cite>— Familie Janssens, Geetbets</cite>
			</blockquote>
		</section>
	</main>

	<footer>
		<?php include './assets/footer.php'; ?>
	</footer>
</body>

</html>