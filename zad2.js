document.addEventListener("DOMContentLoaded", function() {
    // Accessing collections
    var imagesCollection = document.images;
    var linksCollection = document.links;
    var formsCollection = document.forms;
    var anchorsCollection = document.anchors;

    // Display information about the collections on the webpage
    displayCollectionInfo("Images Collection:", imagesCollection);
    displayCollectionInfo("Links Collection:", linksCollection);
    displayCollectionInfo("Forms Collection:", formsCollection);
    displayCollectionInfo("Anchors Collection:", anchorsCollection);

    // Demonstrating item and namedItem methods
    var firstImage = imagesCollection.item(0); // Get the first image
    var firstLink = linksCollection.namedItem("firstLink"); // Assuming you have an anchor with name="firstLink"

    // Display information about the first image and link on the webpage
    displayItemInfo("Link with name 'firstLink':", firstLink);
    displayItemInfo("First Image:", firstImage);


    function displayCollectionInfo(label, collection) {
        // Create a paragraph element for collection information
        var infoElement = document.createElement("p");
        infoElement.textContent = label + " " + collection.length + " elements";
        infoElement.style.marginBottom = "50px";
        // Append the infoElement to the body
        document.body.appendChild(infoElement);
    }

    function displayItemInfo(label, item) {
        // Create a paragraph element for item information
        var infoElement = document.createElement("p");
        infoElement.textContent = label + " " + (item ? item.nodeName : "Not found");
        
        infoElement.style.marginBottom = "50px";
        // Append the infoElement to the body
        document.body.appendChild(infoElement);
    }
});