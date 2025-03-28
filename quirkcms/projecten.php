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
            <div class="projects-intro">
                <h2>Onze Projecten</h2>
                <p>Ontdek enkele van onze recente projecten. Van kleine stadstuinen tot grote landschapsprojecten,
                    we zorgen altijd voor kwaliteit en aandacht voor detail.</p>
            </div>

            <div class="project-filters">
                <button class="filter-btn active" data-filter="all">Alle projecten</button>
                <button class="filter-btn" data-filter="tuinaanleg">Tuinaanleg</button>
                <button class="filter-btn" data-filter="onderhoud">Onderhoud</button>
                <button class="filter-btn" data-filter="bestrating">Bestrating</button>
            </div>

            <div class="projects-grid">
                <div class="project-card" data-category="tuinaanleg">
                    <img src="https://picsum.photos/id/225/600/400" alt="Moderne tuin Genk">
                    <div class="project-info">
                        <h3>Moderne tuin in Genk</h3>
                        <p>Een volledig herontworpen moderne tuin met strakke lijnen en een harmonieus evenwicht tussen
                            verharding en groen.</p>
                        <span class="project-tag">Tuinaanleg</span>
                    </div>
                </div>

                <div class="project-card" data-category="bestrating">
                    <img src="https://picsum.photos/id/227/600/400" alt="Natuursteen terras">
                    <div class="project-info">
                        <h3>Natuursteen terras in Hasselt</h3>
                        <p>Een elegant terras in natuursteen met geïntegreerde verlichting en verhoogde plantenbakken.</p>
                        <span class="project-tag">Bestrating</span>
                    </div>
                </div>

                <div class="project-card" data-category="onderhoud">
                    <img src="https://picsum.photos/id/235/600/400" alt="Landschapstuin onderhoud">
                    <div class="project-info">
                        <h3>Landschapstuin in Sint-Truiden</h3>
                        <p>Doorlopend onderhoud van een grote landschapstuin met diverse beplanting en waterpartijen.</p>
                        <span class="project-tag">Onderhoud</span>
                    </div>
                </div>

                <div class="project-card" data-category="tuinaanleg">
                    <img src="https://picsum.photos/id/237/600/400" alt="Japanse tuin">
                    <div class="project-info">
                        <h3>Japanse tuin in Leuven</h3>
                        <p>Een serene Japanse tuin met authentieke elementen zoals een vijver, stenen en zorgvuldig
                            geselecteerde beplanting.</p>
                        <span class="project-tag">Tuinaanleg</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="container testimonial-section">
            <h2>Wat onze klanten zeggen</h2>
            <div class="testimonials">
                <div class="testimonial">
                    <blockquote>
                        "Zeis en Bijl heeft onze tuin volledig getransformeerd. Het team was professioneel,
                        punctueel en leverde uitstekend werk. Sterk aanbevolen!"
                    </blockquote>
                    <cite>— Jan Peeters, Hasselt</cite>
                </div>

                <div class="testimonial">
                    <blockquote>
                        "Zeer tevreden over het onderhoudscontract dat we hebben. Onze tuin ziet er het hele jaar
                        perfect uit zonder dat we er zelf tijd aan moeten besteden."
                    </blockquote>
                    <cite>— Marie Claessens, Genk</cite>
                </div>
            </div>
        </section>
    </main>

    <?php include './includes/footer.php'; ?>
</body>

</html>