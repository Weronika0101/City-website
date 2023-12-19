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

// Połączenie z bazą danych (Uzupełnij dane dostępowe do bazy)
$host = 'localhost';
$dbname = 'web';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Sprawdź, czy przesłano dane logowania
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Przygotuj zapytanie SQL
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user; // Zapisz cały rekord użytkownika w sesji
    header('Location: o_miescie.php'); // Przekieruj na stronę po zalogowaniu
    exit();
} else {
    $loginError = 'Błędny login lub hasło.';
}

    // // Sprawdź poprawność danych
    // if ($user && password_verify($password, $user['password'])) {
    //     $_SESSION['user'] = $user['login']; // Zapisz użytkownika w sesji
    //     header('Location: o_miescie.php'); // Przekieruj na stronę po zalogowaniu
    //     exit();
    // } else {
    //     $loginError = 'Błędny login lub hasło.';
    // }
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
