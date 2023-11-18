document.addEventListener("DOMContentLoaded", function() {
    // Allow user to change CSS styles from a dropdown list
  var changeStylesButton = document.getElementById("changeStylesButton");
  var backgroundColorSelect = document.getElementById("backgroundColorSelect");
  var textColorSelect = document.getElementById("textColorSelect");
  var fontTypeSelect = document.getElementById("fontTypeSelect");

  changeStylesButton.addEventListener("click", function() {
      // Get user choices from the dropdown lists
      var backgroundColorIndex = backgroundColorSelect.selectedIndex;
      var textColorIndex = textColorSelect.selectedIndex;
      var fontTypeIndex = fontTypeSelect.selectedIndex;

      // Apply styles to the body
      document.body.style.backgroundColor = backgroundColorSelect.options[backgroundColorIndex].value;
      document.body.style.color = textColorSelect.options[textColorIndex].value;
      document.body.style.fontFamily = fontTypeSelect.options[fontTypeIndex].value;
   });
});