<?php
// Definicja stałych
define("MAX_WIADOMOSC_LENGTH", 200);

// Funkcja sprawdzająca poprawność numeru telefonu
function validatePhone($phone) {
    return preg_match("/^\+\d{2} \d{3}-\d{3}-\d{3}$/", $phone);
}

// Pobranie danych z formularza
$zaimek = $_POST['zaimek'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$miesiac = $_POST['miesiac'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$wiadomosc = $_POST['wiadomosc'];
$kategoria = $_POST['kategoria'];
$tematy = isset($_POST['temat']) ? $_POST['temat'] : [];
$niedostepnePole = $_POST['niedostepny'];

// Walidacja danych
if (!in_array($zaimek, ['opcja1', 'opcja2', 'opcja3'])) {
    die("Błędny zaimek");
}

if (empty($imie) || !is_string($imie)) {
    die("Błędne imię");
}

if (empty($nazwisko) || !is_string($nazwisko)) {
    die("Błędne nazwisko");
}

if (empty($miesiac) || !is_string($miesiac)) {
    die("Błędny miesiąc urodzin");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Błędny adres e-mail");
}

if (!validatePhone($telefon)) {
    die("Błędny numer telefonu");
}

if (strlen($wiadomosc) > MAX_WIADOMOSC_LENGTH) {
    die("Wiadomość przekracza maksymalną długość");
}

if (!in_array($kategoria, ['pytanie', 'uwaga', 'inna'])) {
    die("Błędna kategoria");
}

// Przetwarzanie tematów
foreach ($tematy as $temat) {
    // Tutaj można dodatkowo sprawdzić, czy wartość tematu jest poprawna
}

// Przykład użycia tablic superglobalnych
echo "Adres IP klienta: " . $_SERVER['REMOTE_ADDR'];

// Tutaj możesz dodać kod odpowiedzialny za dalsze przetwarzanie danych

?>
