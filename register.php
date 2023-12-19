<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: modify.php'); // Przekieruj na stronę logowania
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Strona rejestracji użytkownika">
    <meta name="keywords" content="rejestracja, użytkownik, formularz">
    <title>Miasto Kórnik - Rejestracja</title>
</head>
<body>
    <h1>Rejestracja</h1>

    <?php if (isset($registrationSuccess)): ?>
        <p style="color: green;"><?php echo $registrationSuccess; ?></p>
    <?php endif; ?>

    <form method="post" action = "register-form.php">
        <label for="new_login">Login:</label>
        <input type="text" id="new_login" name="new_login" required>
        <br>
        <label for="new_password">Hasło:</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <label for="first_name">Imię:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br>
        <label for="last_name">Nazwisko:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br>
        <button type="submit" name="register">Zarejestruj/Zmień dane</button>
    </form>
</body>
</html>
