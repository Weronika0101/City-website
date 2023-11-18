document.addEventListener('DOMContentLoaded', function () {
    'use strict';
  
    // Zdarzenia focus i blur do wyświetlania tekstów pomocy
    const formInputs = document.querySelectorAll('.form-input');
  
    formInputs.forEach(function (input) {
      input.addEventListener('focus', showHelpText);
      input.addEventListener('blur', hideHelpText);
    });
  
    // Zdarzenia submit i reset do wyzwalania okien potwierdzających
    const form = document.querySelector('form');
    form.addEventListener('submit', handleSubmit);
    form.addEventListener('reset', handleReset);
  });
  
  function showHelpText(event) {
    'use strict';
    const helpText = event.target.nextElementSibling;
    if (helpText) {
      helpText.style.display = 'inline';
    }
  }
  
  function hideHelpText(event) {
    'use strict';
    const helpText = event.target.nextElementSibling;
    if (helpText) {
      helpText.style.display = 'none';
    }
  }
  
  function handleSubmit(event) {
    'use strict';
    event.preventDefault(); // Zapobiegaj domyślnemu zachowaniu formularza
    const confirmation = confirm('Czy na pewno chcesz wysłać formularz?');
    if (confirmation) {
      // Tutaj możesz dodać kod obsługi wysłania formularza
      alert('Formularz został wysłany!');
    }
  }
  
  function handleReset(event) {
    'use strict';
    const confirmation = confirm('Czy na pewno chcesz wyczyścić formularz?');
    if (confirmation) {
      // Tutaj możesz dodać kod obsługi resetowania formularza
      alert('Formularz został wyczyszczony!');
    } else {
      event.preventDefault(); // Zapobiegaj domyślnemu zachowaniu resetu
    }
  }
  