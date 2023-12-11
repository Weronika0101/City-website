<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Strona diagnostyczna">
    <meta name="keywords" content="diagnostyka, ciastko">
    <title>Diagnostyka</title>
</head>
<body>
    <h1>Zawartość ciastek</h1>

    <?php
    // Sprawdź czy ciastko o nazwie "backgroundColor" istnieje
    if (isset($_COOKIE['backgroundColor'])) {
        echo '<p>Kolor tła: ' . htmlspecialchars($_COOKIE['backgroundColor']) . '</p>';
    } else {
        echo '<p>Brak ciastka o nazwie "backgroundColor"</p>';
    }

    // Sprawdź czy ciastko o nazwie "textColor" istnieje
    if (isset($_COOKIE['textColor'])) {
        echo '<p>Kolor tekstu: ' . htmlspecialchars($_COOKIE['textColor']) . '</p>';
    } else {
        echo '<p>Brak ciastka o nazwie "textColor"</p>';
    }

    // Sprawdź czy ciastko o nazwie "fontType" istnieje
    if (isset($_COOKIE['fontType'])) {
        echo '<p>Czcionka: ' . htmlspecialchars($_COOKIE['fontType']) . '</p>';
    } else {
        echo '<p>Brak ciastka o nazwie "fontType"</p>';
    }
    ?>

    <p><a href="index.html">Wróć do strony głównej</a></p>
</body>
</html>
