
document.addEventListener("DOMContentLoaded", function() {
    // Accessing collections
    var imagesCollection = document.images;
    var linksCollection = document.links;
    var formsCollection = document.forms;
    var anchorsCollection = document.anchors;

    // Log information about the collections
    console.log("Images Collection:", imagesCollection);
    console.log("Links Collection:", linksCollection);
    console.log("Forms Collection:", formsCollection);
    console.log("Anchors Collection:", anchorsCollection);

    // Demonstrating item and namedItem methods
    var firstImage = imagesCollection.item(0); // Get the first image
    var firstLink = linksCollection.namedItem("firstLink"); // Assuming you have an anchor with name="firstLink"

    console.log("First Image:", firstImage);
    console.log("Link with name 'firstLink':", firstLink);
  
});