<?php
session_start();

// Połączenie z bazą danych (Uzupełnij dane dostępowe do bazy)
$host = 'localhost';
$dbname = 'web';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd: " . $e->getMessage());
}

// Funkcja do walidacji danych
function validateData($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ((isset($_POST['register']) || isset($_POST['modify_data'])) && isset($_POST['first_name'])) {
        $newLogin = validateData($_POST['new_login']);
        $newPassword = validateData($_POST['new_password']);
        $newFirstName = validateData($_POST['first_name']);
        $newLastName = validateData($_POST['last_name']);

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        if (isset($_SESSION['user'])) {
            $login = $_SESSION['user']['login'];
            $stmt = $pdo->prepare("UPDATE users SET first_name=?, last_name=? WHERE login=?");
            $stmt->execute([$newFirstName, $newLastName, $login]);

            $modificationSuccess = 'Pomyślnie zmieniono dane użytkownika.';

            header('Location: o_miescie.php');
            exit();
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (login, password, first_name, last_name) VALUES (?, ?, ?, ?)");
            $stmt->execute([$newLogin, $hashedPassword, $newFirstName, $newLastName]);

            header('Location: login.php');
            exit();
        }
    }
}

$userData = isset($_SESSION['user']) ? $_SESSION['user'] : [];

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
    <h1>Rejestracja / Zmiana danych</h1>

    <?php
    if (isset($error)) {
        echo '<p style="color: red;">' . $error . '</p>';
    }
    ?>

    <?php if (isset($modificationSuccess)): ?>
        <p style="color: green;"><?php echo $modificationSuccess; ?></p>
    <?php endif; ?>

    <form method="post" action="register.php">
        <label for="new_login">Login:</label>
        <input type="text" id="new_login" name="new_login" value="<?php echo isset($userData['login']) ? $userData['login'] : ''; ?>" required>
        <br>
        <label for="new_password">Hasło:</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <label for="first_name">Imię:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo isset($userData['first_name']) ? $userData['first_name'] : ''; ?>" required>
        <br>
        <label for="last_name">Nazwisko:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo isset($userData['last_name']) ? $userData['last_name'] : ''; ?>" required>
        <br>
        <button type="submit" name="register">Zarejestruj / Zmień dane</button>
    </form>
    <?php
        if (isset($_SESSION['user'])) {
            echo '<form method="post" action="logout.php">
                    <button type="submit" name="logout">Wyloguj się</button>
                </form>';
        } else {
            echo '<form method="post" action="login.php">
                    <button type="submit" name="login">Przejdź do logowania</button>
                </form>';
        }
    ?>
</body>
</html>
