document.addEventListener("DOMContentLoaded", function() {
  var changeStylesButton = document.getElementById("changeStylesButton");
  var backgroundColorSelect = document.getElementById("backgroundColorSelect");
  var textColorSelect = document.getElementById("textColorSelect");
  var fontTypeSelect = document.getElementById("fontTypeSelect");

  changeStylesButton.addEventListener("click", function() {
      var backgroundColorIndex = backgroundColorSelect.selectedIndex;
      var textColorIndex = textColorSelect.selectedIndex;
      var fontTypeIndex = fontTypeSelect.selectedIndex;

      document.body.style.backgroundColor = backgroundColorSelect.options[backgroundColorIndex].value;
      document.body.style.color = textColorSelect.options[textColorIndex].value;
      document.body.style.fontFamily = fontTypeSelect.options[fontTypeIndex].value;
   });
});