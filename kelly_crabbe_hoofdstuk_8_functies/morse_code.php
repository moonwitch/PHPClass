<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Morse Convertor</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <h1>Morsecode Converter</h1>
            <form method="POST">
                <label for="text">Voer tekst in:</label>
                <input type="text" id="text" name="text" required>
                <button type="submit">Omzetten naar Morse</button>
            </form>

            <?php
                // Functie om een karakter om te zetten naar morse met een switch
                function charToMorse($char) {
                    switch ($char) {
                        case 'a': return "&#x25AA; &#x25AC;";
                        case 'b': return "&#x25AC; &#x25AA; &#x25AA; &#x25AA;";
                        case 'c': return "&#x25AC; &#x25AA; &#x25AC; &#x25AA;";
                        case 'd': return "&#x25AC; &#x25AA; &#x25AA;";
                        case 'e': return "&#x25AA;";
                        case 'f': return "&#x25AA; &#x25AA; &#x25AC; &#x25AA;";
                        case 'g': return "&#x25AC; &#x25AC; &#x25AA;";
                        case 'h': return "&#x25AA; &#x25AA; &#x25AA; &#x25AA;";
                        case 'i': return "&#x25AA; &#x25AA;";
                        case 'j': return "&#x25AA; &#x25AC; &#x25AC; &#x25AC;";
                        case 'k': return "&#x25AC; &#x25AA; &#x25AC;";
                        case 'l': return "&#x25AA; &#x25AC; &#x25AA; &#x25AA;";
                        case 'm': return "&#x25AC; &#x25AC;";
                        case 'n': return "&#x25AC; &#x25AA;";
                        case 'o': return "&#x25AC; &#x25AC; &#x25AC;";
                        case 'p': return "&#x25AA; &#x25AC; &#x25AC; &#x25AA;";
                        case 'q': return "&#x25AC; &#x25AC; &#x25AA; &#x25AC;";
                        case 'r': return "&#x25AA; &#x25AC; &#x25AA;";
                        case 's': return "&#x25AA; &#x25AA; &#x25AA;";
                        case 't': return "&#x25AC;";
                        case 'u': return "&#x25AA; &#x25AA; &#x25AC;";
                        case 'v': return "&#x25AA; &#x25AA; &#x25AA; &#x25AC;";
                        case 'w': return "&#x25AA; &#x25AC; &#x25AC;";
                        case 'x': return "&#x25AC; &#x25AA; &#x25AA; &#x25AC;";
                        case 'y': return "&#x25AC; &#x25AA; &#x25AC; &#x25AC;";
                        case 'z': return "&#x25AC; &#x25AC; &#x25AA; &#x25AA;";
                        case ' ': return " "; // Spatie tussen woorden
                        default: return " "; // Onbekend teken
                    }
                }
                
                if(isset($_POST['text'])) {
                    $text = strtolower($_POST['text']);
                    $morse = "";
                    
                    for($i = 0; $i < strlen($text); $i++) {
                        $morse .= charToMorse($text[$i]) . " ";
                    }
                    echo "<p>$morse</p>";
                }
            ?>
    </body>
</html>
