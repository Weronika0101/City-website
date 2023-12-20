<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Przygotuj zapytanie SQL
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Refresh: 2; URL=o_miescie.php');
        echo "Witaj uzytkowniku ". $user['first_name'];
        exit();
    } else {
        $_SESSION['error'] = 'Invalid username or password';
        header('Refresh: 2; URL=login.php');
        echo 'Invalid username or password.';
        exit();
    }
}
?>
