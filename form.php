<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function validateText($input, $fieldName, $minLength, $maxLength) {
        $input = trim($input);

        if (empty($input) || strlen($input) < $minLength || strlen($input) > $maxLength) {
            return "Pole $fieldName powinno mieć od $minLength do $maxLength znaków.";
        }

        return "";
    }

    function validateEmail($email) {
        $email = trim($email);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Proszę podać poprawny adres e-mail.";
        }

        return "";
    }

    function validatePhone($phone) {
        $phone = trim($phone);

        if (!preg_match("/^\+\d{2} \d{3}-\d{3}-\d{3}$/", $phone)) {
            return "Proszę podać poprawny numer telefonu.";
        }

        return "";
    }

    $zaimek = $_POST["zaimek"];
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $miesiac = $_POST["miesiac"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $wiadomosc = $_POST["wiadomosc"];
    $kategoria = $_POST["kategoria"];
    $tematy = $_POST["temat"];

    $errors = array();
    $fieldsToValidate = array(
        array("imie", 2, 50),
        array("nazwisko", 2, 50),
        array("wiadomosc", 1, 200)
    );

    for ($i = 0; $i < count($fieldsToValidate); $i++) {
        $fieldName = $fieldsToValidate[$i][0];
        $input = $_POST[$fieldName];
        $minLength = $fieldsToValidate[$i][1];
        $maxLength = $fieldsToValidate[$i][2];
        $errors[$fieldName] = validateText($input, $fieldName, $minLength, $maxLength);
    }

    $errors["email"] = validateEmail($email);
    $errors["telefon"] = validatePhone($telefon);
    $errors["kategoria"] = empty($kategoria) ? "Proszę wybrać kategorię." : "";
    $errors["tematy"] = empty($tematy) ? "Proszę wybrać przynajmniej jeden temat." : "";

    foreach ($errors as $error) {
        if (!empty($error)) {
            die($error);
        }
    }

    // Jeśli dane są poprawne, można wykonywać dalsze operacje
    // ...

    echo "Dane zostały poprawnie przetworzone!";
}
?>
