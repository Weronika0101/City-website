<?php


function getCookie($name) {
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}


$backgroundColor = getCookie("backgroundColor");
$textColor = getCookie("textColor");
$fontType = getCookie("fontType");

// $session_lifetime = 2 * 60;

// ini_set('session.cookie_lifetime', $session_lifetime);
$session_lifetime = 20;


ini_set('session.cookie_lifetime', $session_lifetime);
ini_set('session.gc_maxlifetime', $session_lifetime);
session_start();



if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Przekieruj na stronę logowania
    exit();
}

// Reszta kodu strony "o_miescie.php"...

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Witryna opisująca historię miasta">
    <meta name="keywords" content="miasto, atrakcje, turystyka, zwiedzanie, Kórnik, zamek, opis">
    <title>Miasto Kórnik - O mieście</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js" defer></script>
    <script src="zad2.js" defer></script>
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
        
        <header>
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
                <li><a href="register.php">Moje konto</a></li> 
            </ol>
        </nav>
    <main>
        <div id ="content">
            <div id="adds">
                <h3>Reklamy</h3>
                <p id="hideAds">Miejsce na reklamy.</p>
                
            </div>
            <button id="adbutton">Ukryj reklamy</button>
        <section>
            <h2 id = "welcome" class="pixels">Witamy na naszej stronie!</h2>
            
            <?php if (isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['login'])): ?>
    <p id="welcome-user">Witaj użytkowniku, <?php echo $_SESSION['user']['login']; ?>!</p>
<?php endif; ?>
            <p>Tutaj znajdziesz informacje o naszym pięknym mieście oraz jego atrakcjach turystycznych.</p>
        </section>
        <section>
            <h3 class="em">Historia</h3>
            <p> <mark>Pierwsze wzmianki o mieście pochodzą z <b>XII wieku</b></mark>.  Początkowo była to osada wiejska, która zaczęła się intensywnie rozwijać dopiero, gdy znalazła się w rękach rodu Górków.
                W 1426 r. Mikołaj Górka zarządził budowę drewnianego łącznika zamku, a Łukasz Górka w <b> 1437 r.</b> zlecił budowę kościoła parafialnego i przekształcił majątek kórnicki w 
                swoją siedzibę rodową. Zabiegi Górków o nadanie praw miejskich Kórnikowi przyniosły efekt w ok. 1450 r., miasto lokowane było na prawie magdeburskim. Po śmierci ostatniego
                 z rodu Górków, majątek przeszedł w ręce rodu Czarnkowskich, a później Grudzińskich.</p>
                 <p>
                    W 1676 r. dobra kórnickie kupili <b>Działyńscy</b>. Były one ich własnością przez ponad dwa stulecia. W okresie tym przyczynili się do rozkwitu rezydencji, miasta, jak i okolicznych wiosek.

                        Wielkie zasługi w rozbudowie majątku poczyniła <mark>Teofila z Działyńskich Szołdrska-Potulicka</mark>, która nie tylko przebudowała swoją rezydencję, ale przede wszystkim odbudowała i unowocześniła miasto, sprowadziła
                        nowych osadników, rzemieślników oraz kupców i nadała im liczne przywileje.
                 </p>
                 <p>
                    <mark>W 1793 r. Wielkopolska została wcielona do państwa pruskiego</mark> jako prowincja o nazwie Prusy Południowe. Mieszkańcy Kórnika i okolic bohatersko walczyli w toczących się w Wielkopolsce powstaniach (1794 r. i 1806 r.).
                    W 1807 r. Wielkopolska wcielona została do Księstwa Warszawskiego, a po kongresie wiedeńskim region oddano Prusom jako Wielkie Księstwo Poznańskie. Od tego czasu przez ponad sto lat trwała walka z narastającą germanizacją.
                 </p>
        </section>

        <div id="additional-info">
        <section>
            <h3 class="points">Informacje dodatkowe</h3>
            <table border="10" id="table">
                <caption class="percent">Dane o Kórniku</caption> 
                <thead>
                    <tr><th colspan="2">Kórnik</th></tr>
                </thead>
                    <tr> 
                        <td>Miasto w liczbach</td>
                        <td rowspan="2"><b>
                            (niem. Kurnik lub Kurnick,<br>
                             w latach 1939–1945 Burgstadt)</b>
                        </td>
                    </tr> 
                    <tr> 
                        <td>
                            <table border="5">
                                <tbody>
                                    <tr> 
                                        <td>Powierzchnia</td>
                                        <td>6,08 km<sup>2</sup></td> 
                                    </tr> 
                                    <tr> 
                                        <td>Ludność (2022)</td> 
                                        <td>9931</td>
                                    </tr> 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Zaludnienie</th> 
                                        <td>1600/km<sup>2</sup></td>
                                    </tr>
                                </tfoot> 
                            </table>
                        </td> 
                    </tr> 
            </table>

    </section>
</div>
</div>
    </main>

    <footer>
        &copy; 2023 Moje Miasto
    </footer>
    </div>  
</body>
</html>