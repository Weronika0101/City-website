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
        $trimmed_email = trim($email);

        if (!filter_var($trimmed_email, FILTER_VALIDATE_EMAIL)) {
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

    $errors = array();
    $fieldsToValidate = array(
        array("imie", 2, 50),
        array("nazwisko", 2, 50),
        array("wiadomosc", 10, 200)
    );

    for ($i = 0; $i < count($fieldsToValidate); $i++) {
        $fieldName = $fieldsToValidate[$i][0];
        $input = $_POST[$fieldName];
        $minLength = $fieldsToValidate[$i][1];
        $maxLength = $fieldsToValidate[$i][2];
        $errors[$fieldName] = validateText($input, $fieldName, $minLength, $maxLength);
    }

    define("EMAIL", $_POST["email"]);
    define("TELEFON", $_POST["telefon"]);
    define("KATEGORIA", $_POST["kategoria"]);
    define("TEMATY", $_POST["temat"]);

    $errors["email"] = validateEmail(EMAIL);
    $errors["telefon"] = validatePhone(TELEFON);
    $errors["kategoria"] = empty(KATEGORIA) ? "Proszę wybrać kategorię." : "";
    $errors["tematy"] = empty(TEMATY) ? "Proszę wybrać przynajmniej jeden temat." : "";

    foreach ($errors as $error) {
        if (!empty($error)) {
            die($error);
        }
    }


    echo "Dane zostały poprawnie przetworzone na adresie {$_SERVER['REMOTE_ADDR']}";

    $assocArray = array(
        "1" => "1.1", 
        "2" => "2.1", 
        "3" => "3.1", 
        "4" => "4.1"
    );
    $sum_int = 0;
    $sum_float = 0.0;
    echo "<br><br>TABLICA: 1=>1.1, 2=>2,1, 3=>3.1 4=>4.1";
    echo "<br>Obecny element: ", key($assocArray), " => ", current($assocArray); 
    $sum_int += (int)key($assocArray);
    $sum_float += (float)current($assocArray);
    next($assocArray);
    echo "<br>Następny element: ", key($assocArray), " => ", current($assocArray); 
    $sum_int += (int)key($assocArray);
    $sum_float += (float)current($assocArray);
    next($assocArray);
    echo "<br>Następny element: ", key($assocArray), " => ", current($assocArray);
    $sum_int += (int)key($assocArray);
    $sum_float += (float)current($assocArray);
    reset($assocArray); 
    echo "<br>Po uzyciu reset: ", key($assocArray), " => ", current($assocArray); 
    $sum_int += (int)key($assocArray);
    $sum_float += (float)current($assocArray);

    echo "<br><br>Suma kluczy podczas iteracji (s1): ", $sum_int;
    echo "<br>Suma wartości podczas iteracji (s2): ", $sum_float;
    echo "<br>Czy s1*s2+10 = 10+s1*s2?:  ", $sum_int * $sum_float + 10 == 10 + $sum_int * $sum_float;

    $pattern = '/(\+\d{2} \d{3})-(\d{3})-(\d{3})/';
    $replacement = '$1 $2 $3';
    $newPhoneNumber = preg_replace($pattern, $replacement, $_POST["telefon"]);
    echo "<br><br>Pobrany nr tel: ", $_POST['telefon'];
    echo "<br>Po uyciu preg_replace: ", $newPhoneNumber;
    echo "<br>Czy te numery są takie same?: ", (int) ($_POST['telefon'] == $newPhoneNumber);

    define('S1', 'abc');
    define('S2', 'abcd');
    $compare = strcmp(S1, S2);
    echo "<br><br>S1: abc, S2: abcd";
    echo "<br>Czy\040S1\040jest\040dłusze\040od\040S2:\040", (int) ($compare > 0);
    echo "<br>Czy\040S1\040i\040S2\040są\040równe:\040", (int) ($compare == 0);
    echo "<br>Czy\040S1\040jest\040krótsze\040od\040S2:\040", (int) ($compare < 0);
}
?>
