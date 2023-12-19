<?php
session_start();




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
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    // $newLogin = validateData($_POST['new_login']);
    // $newPassword = validateData($_POST['new_password']);
    // $newFirstName = validateData($_POST['first_name']);
    // $newLastName = validateData($_POST['last_name']);

    // Tutaj możesz dodać dodatkowe reguły walidacji

    // Sprawdź, czy użytkownik jest zalogowany
    //session_start();
    
    if ((isset($_SESSION['user']))) {
         if(isset($_POST['modify_data'])){
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
        
        header('Location: o_miescie.php');
        exit();

         }
    } else {
        if(isset($_POST['register'])){
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
}
?>

