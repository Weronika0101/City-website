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

// Dane do uwierzytelniania (login i hasło)
$logins = array('user1', 'user2','admin');
$passwords = array('password1', 'password2','admin');

// Sprawdź, czy przesłano dane logowania
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Sprawdź poprawność danych
    $isValidLogin = in_array($login, $logins);
    $isValidPassword = in_array($password, $passwords);

    if ($isValidLogin && $isValidPassword) {
        $_SESSION['user'] = $login; // Zapisz użytkownika w sesji
        header('Location: o_miescie.php'); // Przekieruj na stronę po zalogowaniu
        exit();
    } else {
        $loginError = 'Błędny login lub hasło.';
    }
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

    <form method="post">
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
