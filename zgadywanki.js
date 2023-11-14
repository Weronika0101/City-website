function zad1() {
    const miesiace = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];
    const poprawnaOdpowiedz = miesiace[Math.floor(Math.random() * 12)];
    let szanse = 3;
    do {
        const odpowiedz = prompt('Pozostałe szanse: ' + szanse + '\nWprowadź nazwę miesiąca.');
        if (odpowiedz === poprawnaOdpowiedz) {
            alert('Dobry traf! Poprawna odpowiedź to ' + poprawnaOdpowiedz);
            return;
        } else {
            if (szanse == 1)
                alert('Koniec prób. Poprawna odpowiedź to ' + poprawnaOdpowiedz);
            else
                alert('Zły strzał, spróbuj ponownie.');
        }
        szanse--;
    } while (szanse > 0)
}

var przycisk1 = document.getElementById("zad1");
if (przycisk1) {
    przycisk1.addEventListener("click", zad1);
}
  
function zgadywankaLiczby(szanse) {
    const poprawnaOdpowiedz = Math.floor(Math.random() * 100) + 1;
    while (szanse > 0) {
        const odpowiedz = parseInt(prompt('Pozostałe szanse: ' + szanse + '\nWprowadź liczbę z zakresu 1-100.'));
        if (odpowiedz === poprawnaOdpowiedz) {
            alert('Dobry traf! Poprawna odpowiedź to ' + poprawnaOdpowiedz);
            return;
        } else if (szanse == 1) {
            alert('Koniec prób. Poprawna odpowiedź to ' + poprawnaOdpowiedz);
        } else if (odpowiedz < poprawnaOdpowiedz) {
            alert('Szukana liczba jest większa. Spróbuj ponownie!');
        } else {
            alert('Szukana liczba jest mniejsza. Spróbuj ponownie!');
        }
        szanse--;
    }
}

function zad2() {
    zgadywankaLiczby(3)
}

var przycisk2 = document.getElementById("zad2");
if (przycisk2) {
    przycisk2.addEventListener("click", zad2);
}

function zad3() {
    const N = prompt('Wprowadź liczbę prób.');
    zgadywankaLiczby(N)
}

var przycisk3 = document.getElementById("zad3");
if (przycisk3) {
    przycisk3.addEventListener("click", zad3);
}
  
function zad4() {
    let suma = 0;
    const N = prompt('Wprowadź N.');
    for (let i = 0; i < N; i++) {
        const liczba = parseInt(prompt('Podano ' + i + ' z ' + N + ' liczb\nDotychczasowa suma: ' + suma + '\nPodaj kolejną liczbę'));
        suma += liczba;
    }
    alert('Ostateczna suma: ' + suma);
}

var przycisk4 = document.getElementById("zad4");
if (przycisk4) {
    przycisk4.addEventListener("click", zad4);
}