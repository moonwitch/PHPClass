<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Douane</title>
    <!-- Pico.css and bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2.0.6/css/pico.classless.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .icon {
            margin-right: 5px;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <main>
        <h1>Douane - Pakket verwerking</h1>
        <form method="post">
            <label for="packages_expected">Hoeveel pakketten verwacht u?</label>
            <input name="packages_expected" id="packages_expected" type="number" required>
            <button type="submit">Verwerk</button>
        </form>
        <!-- Feedback-->
        <section>
            <?php
            $error = "";
            $no_check = 0;
            $check = 0;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!isset($_POST['packages_expected'])) {
                    $error = "Verzenden van aantal pakketten mislukt.";
                } else if (empty($_POST['packages_expected'])) {
                    $error = "Vul het aantal pakketten in.";
                } else if (!is_numeric($_POST['packages_expected'])) {
                    $error = "Het aantal pakketten moet een getal zijn.";
                } else {
                    for ($i = 1; $i <= $_POST['packages_expected']; $i++) {
                        $random = rand(0, 100);
                        if ($random <= 20) {
                            echo "<i class='bi bi-box-seam'></i> $i<br>";
                            $check++;
                        } else {
                            $no_check++;
                        }
                    }
                    echo "<p class='error'>Er zijn $no_check pakketten die niet gecontroleerd moeten worden.</p>";
                    echo "<p class='success'>Er zijn $check pakketten die gecontroleerd moeten worden.</p>";
                }
            }
            ?>
            <!-- Error message -->
            <?php
            echo $error;
            ?>
        </section>
    </main>
</body>

</html>