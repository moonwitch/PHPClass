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
            
            <img src="https://picsum.photos/id/235/1200/400" alt="Tuinaanleg werkzaamheden" class="hero-image">
        </section>
        
        <section class="container">
            <?php include './admin/cms/data/tuinaanleg/content.php'; ?>
            <?php include './admin/cms/data/tuinaanleg/showcase.php'; ?>
        </section>
    </main>
    <footer>
        <?php include './includes/footer.php'; ?>
    </footer>
</body>

</html>
