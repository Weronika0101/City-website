<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Stała
    define("MAX_WIADOMOSC_DLUGOSC", 200);

    //operatory przypisania
    $zaimek = $_POST["zaimek"];
    $imie = (string)$_POST["imie"]; //rzutowanie, konwersja typów
    $nazwisko = (string)$_POST["nazwisko"];
    $email = (string)$_POST["email"];
    $telefon = (string)$_POST["telefon"];
    $wiadomosc = (string)$_POST["wiadomosc"];
    $kategoria = $_POST["kategoria"];

    // Tablica indeksowana numerycznie
    $tematyNumeryczne = isset($_POST["temat"]) ? (array)$_POST["temat"] : [];
    $tematyNumeryczneString = implode(", ", $tematyNumeryczne);

    // Tablica asocjacyjna
    $tematyAsocjacyjne = [
        "pytanie" => ["O zamek", "O Arboretum", "Inne"],
        "uwaga" => ["Do zamku", "Do Arboretum", "Inne"],
        "inna" => ["Inna"]
    ];

    $tematyAsocjacyjneString = "";

    // Sprawdzanie, czy temat z danej kategorii został zaznaczony
    foreach ($tematyAsocjacyjne as $kategoria => $tematy) {
        foreach ($tematy as $temat) {
            if (in_array($temat, $tematyNumeryczne)) {
                $tematyAsocjacyjneString .= "$kategoria: $temat, ";
            }
        }
    }
    // Usunięcie ostatniego przecinka i spacji
    $tematyAsocjacyjneString = rtrim($tematyAsocjacyjneString, ", ");
    print($tematyAsocjacyjneString);

    //operator porownania - sprawdzamy, czy imię jest identyczne z nazwiskiem
    $czyToSamoImieINazwisko = ($imie === $nazwisko);

    $message = "Zaimek: $zaimek\n";
    $message .= "Imię: $imie\n";
    $message .= "Nazwisko: $nazwisko\n";
    $message .= "Email: $email\n";
    $message .= "Wiadomość: $wiadomosc\n";
    $message .= "Kategoria: $kategoria\n";
    $message .= "Tematy: $tematyAsocjacyjneString\n";

    //operatowry arytmetyczne, pierwszenstwo operatorow(sztuczne na maxa xd)
    $wynik = ($a + $b) * 2 - 3;

    if (strlen($wiadomosc) > MAX_WIADOMOSC_DLUGOSC) {
        echo "Wiadomość przekracza maksymalną długość.\n";
    }

    // if (!empty($temat)) {
    //     $message .= "Temat: " . implode(", ", $temat) . "\n";
    // }

    $to = "266535@student.pwr.edu.pl";
    $subject = "Form Submission from $imie $nazwisko";

    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

     // Operatory porównania
    if ($czyToSamoImieINazwisko) {
        echo " Imię i nazwisko są identyczne.";
    }

    if (mail($to, $subject, $message, $headers)) {
        echo "Dziękujemy, Twoja wiadomość została wysłana.";
        echo " Wynik obliczeń: $wynik";
    } else {
        echo "Wystąpił problem podczas wysyłania wiadomości. Spróbuj ponownie później.";
    }
} else {
    header("Location: kontakt.html"); 
    echo("fail");
    print("fail");
}
?>