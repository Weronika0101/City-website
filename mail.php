<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $zaimek = $_POST["zaimek"];
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $email = $_POST["email"];
    $wiadomosc = $_POST["wiadomosc"];
    $kategoria = $_POST["kategoria"];
    $temat = $_POST["temat"];

    $message = "Zaimek: $zaimek\n";
    $message .= "Imię: $imie\n";
    $message .= "Nazwisko: $nazwisko\n";
    $message .= "Email: $email\n";
    $message .= "Wiadomość: $wiadomosc\n";
    $message .= "Kategoria: $kategoria\n";

    if (!empty($temat)) {
        $message .= "Temat: " . implode(", ", $temat) . "\n";
    }

    $to = "266873@student.pwr.edu.pl";
    $subject = "Form Submission from $imie $nazwisko";

    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "Dziękujemy, Twoja wiadomość została wysłana.";
    } else {
        echo "Wystąpił problem podczas wysyłania wiadomości. Spróbuj ponownie później.";
    }
} else {
    header("Location: your-form-page.html"); 
}
?>