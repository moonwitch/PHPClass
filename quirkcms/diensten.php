<?php
$pageTitle = "Diensten";
$pageDescription = "Ontdek de tuindiensten die Zeis en Bijl aanbiedt: tuinonderhoud, tuinaanleg, snoeien en meer.";
$heroImage = "https://picsum.photos/id/42/1200/400";
$heroAlt = "Professionele tuindiensten van Zeis en Bijl";
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

        <section class="container">
            <div class="services-intro">
                <h2>Onze Diensten</h2>
                <p>Bij Zeis en Bijl zijn we gepassioneerd over het creëren en onderhouden van prachtige buitenruimtes.
                    We bieden een breed scala aan tuindiensten aan om aan uw specifieke behoeften te voldoen.</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <img src="https://picsum.photos/id/124/400/300" alt="Tuinonderhoud">
                    <h3>Tuinonderhoud</h3>
                    <p>Regelmatig onderhoud om uw tuin het hele jaar door in topconditie te houden, inclusief maaien,
                        wieden, bemesten en algemene verzorging.</p>
                    <a href="#" class="btn-secondary">Meer info</a>
                </div>

                <div class="service-card">
                    <img src="https://picsum.photos/id/128/400/300" alt="Tuinaanleg">
                    <h3>Tuinaanleg</h3>
                    <p>Van ontwerp tot uitvoering: we realiseren de tuin van uw dromen met creatieve ontwerpen die
                        passen bij uw wensen en de omgeving.</p>
                    <a href="#" class="btn-secondary">Meer info</a>
                </div>

                <div class="service-card">
                    <img src="https://picsum.photos/id/131/400/300" alt="Boomverzorging">
                    <h3>Boomverzorging</h3>
                    <p>Professioneel snoeien, kappen en verzorgen van bomen en struiken door onze ervaren specialisten.</p>
                    <a href="#" class="btn-secondary">Meer info</a>
                </div>

                <div class="service-card">
                    <img src="https://picsum.photos/id/133/400/300" alt="Bestrating">
                    <h3>Bestrating</h3>
                    <p>Aanleg van terrassen, paden en opritten met diverse materialen zoals natuursteen,
                        klinkers en tegels.</p>
                    <a href="#" class="btn-secondary">Meer info</a>
                </div>
            </div>
        </section>

        <section class="container cta-section">
            <div class="cta-content">
                <h2>Klaar om uw tuin te transformeren?</h2>
                <p>Neem contact met ons op voor een gratis adviesgesprek en offerte.</p>
                <a href="contact.php" class="btn-primary">Contact opnemen</a>
            </div>
        </section>
    </main>

    <?php include './assets/footer.php'; ?>
</body>

</html>