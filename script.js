
//ocenianie strony
function ocenStrone() {
    var ocena = window.prompt("Oceń tę stronę w skali od 1 do 5:");

    if (ocena === null) {
        window.alert("Ocena anulowana");
        return;
    }

    ocena = parseInt(ocena);

    if (!isNaN(ocena) && ocena >= 1 && ocena <= 5) {
        alert("Dziękujemy za ocenę: " + ocena);
    } else {
        alert("Wprowadź poprawną ocenę od 1 do 5!");
    }
}

var getUserRateButton = document.getElementById("getUserRateButton");
if (getUserRateButton) {
    getUserRateButton.addEventListener("click", ocenStrone);
}

//ukrywanie reklam
function hideAds() {
    var ad = document.getElementById("hideAds");
    if (ad) {
        ad.innerHTML = " ";
    }
}

var getUserHideButton = document.getElementById("adbutton");
if (getUserHideButton) {
    getUserHideButton.addEventListener("click", hideAds);
}

//konkurs losowanie
function generateRandomNumber() {
    var randomNumber = Math.floor(Math.random() * 100) + 1;
    document.writeln("Gratulacje, wylosowałeś liczbę: " + randomNumber);
}

var getUserLotteryNumber = document.getElementById("getUserLotteryButton");
if (getUserLotteryNumber) {
    getUserLotteryNumber.addEventListener("click", generateRandomNumber);
}


//kalkulator
function calculateSum() {
    // Przykład użycia zmiennych globalnych
    num1 = parseFloat(prompt('Podaj pierwszą liczbę:'));
    num2 = parseFloat(prompt('Podaj drugą liczbę:'));


    if (!isNaN(num1) && !isNaN(num2)) {
        var sum = num1 + num2;
        alert('Suma wynosi: ' + sum);
    } else {
        alert('Wprowadź poprawne liczby!');
    }
}

var getUserCalculateNumber = document.getElementById("getUserCalcButton");
if (getUserCalculateNumber) {
    getUserCalculateNumber.addEventListener("click", calculateSum);
}

window.addEventListener("click", addEmoji);

var emojiCreated = 0

function addEmoji() {
    wasWindowClicked = false
    emojiCreated += 1
    emoji = ""
    switch (emojiCreated % 3) {
        case 0:
            emoji = ":) ";
            break;
        case 1:
            emoji = ":D ";
            break;
        default:
            emoji ="B) "
    }
    document.getElementById("empty_space").innerHTML += emoji;
}