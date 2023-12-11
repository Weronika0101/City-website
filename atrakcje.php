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
    <meta name="description" content="Witryna opisująca atrakcje w Kórniku">
    <meta name="keywords" content="atrakcje, miasto, turystyka, zwiedzanie, Kórnik, zamek">
    <title>Miasto Kórnik -Atrakcje</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
   
    <!-- <script src="zad1.js" defer></script>
    <script src="zad2.js" defer></script>
    <script src="zad3.js" defer></script> -->
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
        
        <header >
            <h1><img src="Zamek.jpg" alt="Zamek Kórnik" width="80" height="60"> Strona główna</h1>

        </header>



  

      
        <nav style=" text-align:center ">
            <ol id="menu">
                <li><a href="index.php" name="firstLink">Strona Główna</a></li>
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
                <li><a href="kontakt.php">Kontakt</a></li> <!-- Nowa strona "Kontakt" -->
            </ol>
        </nav>



    <main>

        <div id ="content">
        <section>
            <h2>Witamy na naszej stronie!</h2>
            <p>Tutaj znajdziesz informacje o naszym pięknym mieście oraz jego atrakcjach turystycznych.</p>
        </section>

        
            <div>
                <label for="backgroundColorSelect">Kolor tła:</label>
                <select id="backgroundColorSelect">
                    <option value="#ffffff">Biały</option>
                    <option value="#f0f0f0">Szary</option>
                    <option value="#a6e6e6">Niebieski</option>
                </select>
        
                <label for="textColorSelect">Kolor tekstu:</label>
                <select id="textColorSelect">
                    <option value="#000000">Czarny</option>
                    <option value="#333333">Ciemnoszary</option>
                    <option value="#666666">Jasnoszary</option>
                </select>
        
                <label for="fontTypeSelect">Czcionka:</label>
                <select id="fontTypeSelect">
                    <option value="Arial">Arial</option>
                    <option value="Verdana">Verdana</option>
                    <option value="Tahoma">Tahoma</option>
                </select>
        
                <button id="changeStylesButton">Change Styles</button>
            </div>
                <!-- Existing ordered list and container for parent node information -->
    <ol id="numberedList"></ol>
    <div id="parentNodeInfo"></div>

        <section>
            <h2>Lista Atrakcji</h2>
            <ul>
                <li><a href="#zamek">Zamek w Kórniku</a>
                    <details>
                        <summary>Informacje</summary>
                        <ul>
                            <li>Adres: Zamkowa 5</li>
                            <li>Telefon Kontaktowy: 531 990 142</li>
                        </ul>
                    </details>
                </li>
                <li><a href="#arboretum">Arboretum</a>
                    <details>
                        <summary>Informacje</summary>
                        <ul>
                            <li>Adres: Zamkowa</li>
                            <li>Telefon Kontaktowy: 61 817 00 33</li>
                        </ul>
                    </details>
                </li>
                <li><a href="#jezioro">Jezioro Kórnickie</a>
                </li>
            </ul>
            <a href="some_zip/zdjecia.zip" download>Pobierz zdjęcia atrakcji.</a>
        </section>
        <section>
            <h2>Galeria</h2>
            <ol class="simple-border">
                <li><div id="zamek">Zamek w Kórniku <br><a href="https://www.zamkipolskie.com/korni/korni.html"><img src="Zamek.jpg" alt="Zamek Kórnik"></a><br>Kliknij na obrazek, żeby dowiedzieć się więcej o zamku</div></li>
                
                <li><div id="arboretum">Arboretum <br><img src="arboretum.jpg" alt="Arboretum" ></div></li>
                
                <li><div id="jezioro">Jezioro Kórnickie <br><img src="jezioro.jpg" alt="Jezioro" ></div></li>
                
            </ol>
        </section>
        </div>

        <div>
            <label for="index" class="form-label">Indeks:</label>
            <input type="text" id="index" name="index" class="form-input">
            <label for="text" class="form-label">Tekst:</label>
            <input type="text" id="text" name="text" class="form-input">
            <button id="addButton">Dodaj</button>
            <button id="replaceButton">Zastąp</button>
            <button id="deleteButton">Usuń</button>
        </div>

    </main>
    <aside>
        <h2>Informacje Dodatkowe</h2>
        <p>Parking przy Zamku - płatny 12 zł/ doba</p>
        <label for="parking1">Wolne miejsca:</label>
        <meter id="parking1" min="0" max="100" low="33" high="66" optimum="80" value="80">at 80/100</meter>
        <p>Parking przy Rynku - bezpłatny</p>
        <label for="parking2">Wolne miejsca:</label>
        <meter id="parking2" min="0" max="100" low="33" high="66" optimum="80" value="0">at 30/100</meter>
    </aside>
    <footer>
        &copy; 2023 Moje Miasto
    </footer>
    </div>
</body>
</html>