document.addEventListener('mousemove', handleMouseMove);
document.addEventListener('mousedown', handleMouseDown);
document.addEventListener('mouseover', handleMouseOver);
document.addEventListener('mouseout', handleMouseOut);

function handleMouseMove(event) {
  'use strict';
  displayEventInfo(event);
}

function handleMouseDown(event) {
  'use strict';
  displayEventInfo(event);
}

function handleMouseOver(event) {
  'use strict';
  displayEventInfo(event);
}

function handleMouseOut(event) {
  'use strict';
  displayEventInfo(event);
}

function displayEventInfo(event) {
  'use strict';
  document.getElementById('altKey').innerText = `altKey: ${event.altKey}`;
  document.getElementById('ctrlKey').innerText = `ctrlKey: ${event.ctrlKey}`;
  document.getElementById('shiftKey').innerText = `shiftKey: ${event.shiftKey}`;
  document.getElementById('keyCode').innerText = `keyCode: ${event.keyCode}`;
  document.getElementById('clientX').innerText = `clientX: ${event.clientX}`;
  document.getElementById('clientY').innerText = `clientY: ${event.clientY}`;
  document.getElementById('screenX').innerText = `screenX: ${event.screenX}`;
  document.getElementById('screenY').innerText = `screenY: ${event.screenY}`;
}
