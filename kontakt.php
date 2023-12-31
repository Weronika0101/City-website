<?php
// Funkcja do odczytywania ciasteczek
function getCookie($name) {
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}

// Odczytaj preferencje z ciasteczek
$backgroundColor = getCookie("backgroundColor");
$textColor = getCookie("textColor");
$fontType = getCookie("fontType");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Witryna prezentująca metody kontaktu">
    <meta name="keywords" content="miasto, atrakcje, turystyka, zwiedzanie, Kórnik, zamek, kontakt">
    <title>Miasto Kórnik - Kontakt</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- <script src="script.js" defer></script>
    <script src="zad5.js" defer></script>
    <script src="zad2.js" defer></script> -->
    <script src="script.js" defer></script>
    <style>
        /* Dodaj style na podstawie preferencji z ciasteczek */
        body {
            background-color: <?php echo $backgroundColor ? $backgroundColor : '#ffffff'; ?>;
            color: <?php echo $textColor ? $textColor : '#000000'; ?>;
            font-family: <?php echo $fontType ? $fontType : 'Arial'; ?>;
        }
    </style>

</head>
<body>
    <div id = "container">        
        <header style="text-align:center">
            <h1><img src="Zamek.jpg" alt="Zamek Kórnik" width="80" height="60"> Strona główna</h1>
        </header>


        
        <nav style=" text-align:center ">
            <ol id="menu">
                <li><a href="index.php">Strona Główna</a></li>
                <li><a href="o_miescie.php">O Mieście</a></li>
                <li class="dol"><a href="atrakcje.php">Atrakcje</a>
                <ul style="list-style: none;">
                    <li class="prawo"><a href="#">Zamek</a>
                    <ol>
                        <li><a href="#">Godziny otwarcia</a></li>
                        <li><a href="#">Cennik</a></li>
                      </ol>
                    </li>
                    <li><a href="#">Rynek</a></li>
                </ul>
            </li>
                <li><a href="kontakt.php">Kontakt</a></li>
                <li><a href="register.php">Moje konto</a></li>   <!-- Nowa strona "Kontakt" -->
            </ol>
        </nav>


    <main>
        <div id ="content">
        <section>
            <h2>Witamy na naszej stronie!</h2>
            
            <p>Tutaj znajdziesz informacje o naszym pięknym mieście oraz jego atrakcjach turystycznych.</p>
        </section>
        <div id="calculator">
            <h2>Kalkulator</h2>
            <p>Kliknij, by dodać dwie liczby</p>
            <button id="getUserCalcButton">Losuj</button>
        </div>

        <section>
            <h2>Informacje Kontaktowe</h2>
            <p>Skontaktuj się z nami:</p>
            <address>
                <ol>
                    <li>
                        Email: <a href="mailto:kontakt.kornik@onet.pl"><mark>kontakt@kornik.pl</mark></a><br>
                    </li>
                    <li>
                        Telefon: <mark>123-456-789</mark>
                    </li>
                </ol>
            </address>
        </section>

        <section>
            <h2>Formularz Kontaktowy</h2>
            <h4>Jeśli masz jakieś pytania, zachęcamy do skontaktowania się z nami przez formularz</h4>
            <form id="contact_form" action = "form.php" method="post">
                <fieldset>
                    <legend>Zaimek:</legend>
                    <input type="radio" id="opcja1" name="zaimek" value="opcja1">
                    <label for="opcja1">Pani</label><br>
                    <input type="radio" id="opcja2" name="zaimek" value="opcja2">
                    <label for="opcja2">Pan</label><br>
                    <input type="radio" id="opcja3" name="zaimek" value="opcja3">
                    <label for="opcja3">Nie chcę podawać</label><br>
                </fieldset>

                <div>
                    <label for="imie" class="form-label">Imię:</label>
                    <input type="text" id="imie" name="imie" class="form-input" autocomplete="given-name" autofocus>
                    <span class="form-input" style="display: none;">np. Jan</span>
                </div>

                <div>
                    <label for="nazwisko" class="form-label">Nazwisko:</label>
                    <input type="text" id="nazwisko" name="nazwisko" class="form-input" required autocomplete="family-name">
                    <span class="form-input" style="display: none;">np. Kowalski</span>
                </div>

                <div>
                    <label for="miesiac" class="form-label">Miesiąc urodzin:</label>
                    <input list="miesiace" id="miesiac" name="miesiac" class="form-input" autocomplete="bday-month">
                    <datalist id="miesiace">
                        <option value="Styczeń">
                        <option value="Luty">
                        <option value="Marzec">
                        <option value="Kwiecień">
                        <option value="Maj">
                        <option value="Czerwiec">
                        <option value="Lipiec">
                        <option value="Sierpień">
                        <option value="Wrzesień">
                        <option value="Październik">
                        <option value="Listopad">
                        <option value="Grudzień">
                    </datalist>
                    <span class="form-input" style="display: none;">np. Styczeń</span>
                </div>

                <div>
                    <label for="email" class="form-label">Adres e-mail:</label>
                    <input type="email" id="email" name="email" class="form-input" required autocomplete="email">
                    <span class="form-input" style="display: none;">np. jan.kowalski@example.com</span>
                </div>

                <div>
                    <label for="telefon" class="form-label">Telefon:</label>
                    <input type="tel" id="telefon" name="telefon" class="form-input" autocomplete="tel" pattern="[\+][0-9]{2} [0-9]{3}-[0-9]{3}-[0-9]{3}">
                    <span class="form-input" style="display: none;">np. +48 689-345-233</span>
                </div>

                <div>
                    <input type="tel" id="niedostepny" name="niedostepny" class="form-input" placeholder="Niedostepne pole" disabled="true">
                </div>

                <label for="wiadomosc">Wiadomość:</label>
                <textarea id="wiadomosc" name="wiadomosc" rows="4" cols="50" maxlength="200" required></textarea><br>

                <label for="kategoria">Kategoria:</label>
                <select id="kategoria" name="kategoria">
                    <optgroup label="Pytanie">
                        <option value="pytanie">O zamek</option>
                        <option value="pytanie">O Arboretum</option>
                        <option value="pytanie">Inne</option>
                    </optgroup>
                    <optgroup label="Uwaga">
                        <option value="pytanie">Do zamku</option>
                        <option value="pytanie">Do Arboretum</option>
                        <option value="pytanie">Inne</option>
                    </optgroup>
                    <option value="inna">Inna</option>
                </select><br>
            
                <fieldset>
                    <legend>Temat wiadomości:</legend>
                    <ul>
                        <li>
                            <label for="temat1">Zwiedzanie</label><br>
                            <ul>
                                <li>
                                    <input type="checkbox" id="temat1" name="temat[]" value="zwiedzanie">
                                    <label for="temat1">Zamek</label><br>
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="temat1" name="temat[]" value="zwiedzanie">
                                            <label for="temat1">+ komnaty</label><br>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <input type="checkbox" id="temat1" name="temat[]" value="zwiedzanie">
                                    <label for="temat1">Arboretum</label><br>
                                </li>
                                <li>
                                    <input type="checkbox" id="temat1" name="temat[]" value="zwiedzanie">
                                    <label for="temat1">Jezioro</label><br>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <input type="checkbox" id="temat2" name="temat[]" value="obiekty">
                            <label for="temat2">Informacja na temat obiektów</label><br>
                        </li>
                        <li>
                            <input type="checkbox" id="temat3" name="temat[]" value="inne">
                            <label for="temat3">Inne</label><br>
                        </li>
                    </ul>
                </fieldset>

                <input type="reset" value="Wyczyść">
                <input type="submit" value="Wyślij">
            </form>
            </br>
            </br>
            </br>
        </section>
        </div>
    </br>
</br>
    </main>

    <footer>
        &copy; 2023 Moje Miasto
    </footer>
    </div>
</body>
</html>