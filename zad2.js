document.addEventListener('DOMContentLoaded', function () {
    for (let i = 0; i < document.images.length; i++) {
      console.log('Image ' + (i + 1) + ': ' + document.images.item(i).src);
    }

    for (let i = 0; i < document.links.length; i++) {
      console.log('Link ' + (i + 1) + ': ' + document.links.item(i).href);
    }

    for (let i = 0; i < document.forms.length; i++) {
      console.log('Form ' + (i + 1) + ': ' + document.forms.item(i).id);
    }

    for (let i = 0; i < document.anchors.length; i++) {
      console.log('Anchor ' + (i + 1) + ': ' + document.anchors.item(i).name);
    }

    console.log(document.forms.namedItem('contact_form'));
});