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
    <meta name="description" content="Witryna prezentująca aktualności miasta Kórnik">
    <meta name="keywords" content="miasto, atrakcje, turystyka, zwiedzanie, Kórnik, aktualności">
    <title>Miasto Kórnik - Strona Główna</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
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
    <div id = "container" style="width: 1000px; margin: 0 auto;">
        
            <header style="text-align:center">
                <h1><img src="Zamek.jpg" alt="Zamek Kórnik" width="80" height="60"> Strona główna</h1>
            </header>
            

        
            <nav style=" margin-top: 112px;text-align:center ">
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
                    <li><a href="register.php">Moje konto</a></li>  
                </ol>
            </nav>

        <main>
            <div id ="content">
             
            <section>
                <article>
                  <h2>Witamy na naszej stronie!</h2>
                  
            <button id="getUserRateButton">Oceń stronę</button>

                  <p>Tutaj znajdziesz informacje o naszym pięknym mieście oraz jego atrakcjach turystycznych.</p>
                </article>
                
            </section>

            <section>
              <h4>Loteria</h4>
              <p>Weź udział w loterii i wygraj atrakcyjne nagrody! By wylosować numer, kliknij poniżej.</p>
              <button id="getUserLotteryButton">Losuj</button>
            </section>

            <section>
                <p id="empty_space"></p>
            </section>

            </div>
        </main>

        <footer>
            &copy; 2023 Moje Miasto
        </footer>
    </div>
</body>
</html>