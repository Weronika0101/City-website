<?php
session_start();


if (isset($_SESSION['user'])) {
    header('Location: modify.php'); // Przekieruj na stronę logowania
    exit();
}

// Połączenie z bazą danych (Uzupełnij dane dostępowe do bazy)
$host = 'localhost';
$dbname = 'web';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Funkcja do walidacji danych
function validateData($data) {
    // Tutaj możesz dodać dowolne reguły walidacji
    return htmlspecialchars(trim($data));
}

// Sprawdź, czy przesłano dane rejestracji
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // $newLogin = validateData($_POST['new_login']);
    // $newPassword = validateData($_POST['new_password']);
    // $newFirstName = validateData($_POST['first_name']);
    // $newLastName = validateData($_POST['last_name']);

    // Tutaj możesz dodać dodatkowe reguły walidacji

    // Sprawdź, czy użytkownik jest zalogowany
    //session_start();
    if ((isset($_SESSION['user']))) {
        $newFirstName = validateData($_POST['first_name']);
        $newLastName = validateData($_POST['last_name']);

        // Aktualizuj dane użytkownika w bazie
        $login = $_SESSION['user']['login'];
       // $userId = $_SESSION['user']['id']; // Zaktualizuj na rzeczywiste pole identyfikatora
       // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET first_name=?, last_name=? WHERE login=?");
        $stmt->execute([ $newFirstName, $newLastName, $login]);
    
        // Wyświetl komunikat o pomyślnej zmianie danych
        $modificationSuccess = 'Pomyślnie zmieniono dane użytkownika.';
    } else {
        $newLogin = validateData($_POST['new_login']);
        $newPassword = validateData($_POST['new_password']);
        $newFirstName = validateData($_POST['first_name']);
        $newLastName = validateData($_POST['last_name']);
        // Dodaj nowego użytkownika do bazy danych
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (login, password, first_name, last_name) VALUES (?, ?, ?, ?)");
        $stmt->execute([$newLogin, $hashedPassword, $newFirstName, $newLastName]);
    
        // Przekieruj na stronę logowania po zarejestrowaniu

        header('Location: login.php');
        exit();
    }
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

    <form method="post">
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
