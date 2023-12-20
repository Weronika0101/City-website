<?php
$session_lifetime = 2 * 60;

// Ustaw opcje sesji
ini_set('session.cookie_lifetime', $session_lifetime);
ini_set('session.gc_maxlifetime', $session_lifetime);
session_start();

// Sprawdź, czy użytkownik jest już zalogowany
if (isset($_SESSION['user'])) {
    header('Location: o_miescie.php'); // Przekieruj na stronę po zalogowaniu
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Strona logowania">
    <meta name="keywords" content="logowanie, uwierzytelnianie">
    <title>Miasto Kórnik - Logowanie</title>
</head>
<body>
    <h1>Logowanie</h1>

    <?php if (isset($loginError)): ?>
        <p style="color: red;"><?php echo $loginError; ?></p>
    <?php endif; ?>
    <?php if (isset($_POST['login_communicate'])): ?>
        <p style="color: green;"><?php echo $_POST['login_communicate'];?></p>
    <?php endif; ?>
    <form method="post" action="login_verification.php">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>
        <br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Zaloguj</button>
    </form>
</body>
</html>
