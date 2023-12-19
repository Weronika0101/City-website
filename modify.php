<!-- Kod formularza do zmiany danych -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Formularz zmiany danych użytkownika">
    <meta name="keywords" content="zmiana danych, użytkownik, formularz">
    <title>Miasto Kórnik - Zmiana danych</title>
</head>
<body>
    <h1>Zmiana danych użytkownika</h1>

    <?php if (isset($modificationSuccess)): ?>
        <p style="color: green;"><?php echo $modificationSuccess; ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="first_name">Nowe imię:</label>
        <input type="text" id="first_name" name="first_name"  required>
        <br>
        <label for="last_name">Nowe nazwisko:</label>
        <input type="text" id="last_name" name="last_name"  required>
        <br>
        <button type="submit" name="modify_data">Zapisz zmiany</button>
    </form>
</body>
</html>
