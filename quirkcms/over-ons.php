<?php
$pageTitle = "Over Ons";
$pageDescription = "Maak kennis met Zeis en Bijl: een familiebedrijf met meer dan 20 jaar ervaring in tuinonderhoud en tuinaanleg.";
$heroImage = "https://picsum.photos/id/287/1200/400";
$heroAlt = "Het team van Zeis en Bijl";
?>

<!DOCTYPE html>
<html lang="nl">
<?php include './assets/head.php'; ?>

<body>
    <header>
        <?php include './assets/navigation.php'; ?>
    </header>
    <main>
        <section class="hero">
            <?php include './assets/title.php'; ?>
            <img src="<?php echo $heroImage; ?>" alt="<?php echo $heroAlt; ?>" class="hero-image">
        </section>

        <section class="container about-section">
            <div class="about-intro">
                <h2>Wie zijn wij?</h2>
                <p class="lead">Zeis en Bijl is een familiebedrijf met meer dan 20 jaar ervaring in het creëren en onderhouden
                    van prachtige buitenruimtes in heel Limburg.</p>
            </div>

            <div class="about-content">
                <div class="about-text">
                    <h3>Onze geschiedenis</h3>
                    <p>Opgericht in 2003 door Marc Janssens, is Zeis en Bijl uitgegroeid van een eenmanszaak tot een
                        volwaardig tuinbedrijf met 12 medewerkers. Wat begon als een passie voor planten en tuinen,
                        is nu een gerenommeerd bedrijf dat bekend staat om zijn kwaliteit en klanttevredenheid.</p>

                    <h3>Onze visie</h3>
                    <p>Wij geloven dat elke buitenruimte, hoe groot of klein ook, het potentieel heeft om een oase van
                        rust en schoonheid te worden. Onze missie is om duurzame en onderhoudsvriendelijke tuinen te creëren
                        die perfect aansluiten bij de wensen en levensstijl van onze klanten.</p>

                    <h3>Ons team</h3>
                    <p>Ons team bestaat uit gepassioneerde professionals met diverse specialisaties, van tuinarchitecten
                        tot hoveniers en boomspecialisten. Allemaal delen ze dezelfde toewijding aan vakmanschap en
                        klanttevredenheid.</p>
                </div>

                <div class="about-image">
                    <img src="https://picsum.photos/id/219/600/800" alt="Ons team aan het werk">
                </div>
            </div>

            <div class="values-section">
                <h3>Onze waarden</h3>
                <div class="values-grid">
                    <div class="value-card">
                        <h4>Kwaliteit</h4>
                        <p>We streven naar de hoogste standaarden in alles wat we doen, van materialen tot uitvoering.</p>
                    </div>

                    <div class="value-card">
                        <h4>Duurzaamheid</h4>
                        <p>We werken met respect voor de natuur en zoeken altijd naar milieuvriendelijke oplossingen.</p>
                    </div>

                    <div class="value-card">
                        <h4>Betrouwbaarheid</h4>
                        <p>We komen onze afspraken na en zijn transparant in onze communicatie en prijzen.</p>
                    </div>

                    <div class="value-card">
                        <h4>Creativiteit</h4>
                        <p>We denken out-of-the-box om unieke oplossingen te vinden die bij uw specifieke situatie passen.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container cta-section">
            <div class="cta-content">
                <h2>Werken bij Zeis en Bijl?</h2>
                <p>We zijn altijd op zoek naar getalenteerde mensen die ons team willen versterken.</p>
                <a href="contact.php" class="btn-primary">Neem contact op</a>
            </div>
        </section>
    </main>

    <?php include './assets/footer.php'; ?>
</body>

</html>