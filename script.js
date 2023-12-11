document.addEventListener("DOMContentLoaded", function () {
    // Funkcja do zmiany stylów
    function changeStyles() {
        var backgroundColor = document.getElementById("backgroundColorSelect").value;
        var textColor = document.getElementById("textColorSelect").value;
        var fontType = document.getElementById("fontTypeSelect").value;

        document.body.style.backgroundColor = backgroundColor;
        document.body.style.color = textColor;
        document.body.style.fontFamily = fontType;

        // Zapisz preferencje w ciasteczku na 1 minutę
        setCookie("backgroundColor", backgroundColor, 1 / (24 * 60)); // 1 minutę przeliczoną na dni
        setCookie("textColor", textColor, 1 / (24 * 60));
        setCookie("fontType", fontType, 1 / (24 * 60));
    }

    // Obsługa przycisku zmiany stylów
    var changeStylesButton = document.getElementById("changeStylesButton");
    changeStylesButton.addEventListener("click", function () {
        changeStyles();
    });

    // Funkcja do ustawiania ciasteczek
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }
});
