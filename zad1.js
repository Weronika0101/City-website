
//lista js 2
document.addEventListener("DOMContentLoaded", function() {

    var list = document.getElementById("menu");

    // stworz nowy element
    var newItem = document.createElement("li");
    var textNode = document.createTextNode("New Element");

    // dodaj do menu na koncu
    newItem.appendChild(textNode);
    list.appendChild(newItem);

    // Create a new numbered list and append it to the section
    var numberedList = document.createElement("ol");
    numberedList.setAttribute("id", "numberedList");

    // for (var i = 1; i <= 5; i++) {
    //     var listItem = document.createElement("li");
    //     listItem.appendChild(document.createTextNode("Element " + i));
    //     numberedList.appendChild(listItem);
    // }

    // document.getElementById("content").appendChild(numberedList);

    // dodawanie nowego elementu menu na początku
    var newListItem = document.createElement("li");
    newListItem.appendChild(document.createTextNode("Nowa Zakładka"));
    list.insertBefore(newListItem, list.firstChild);

    //zastępowanie "Nowa Zakładka" elementem "Aktualności"
    var replacementItem = document.createElement("li");
     replacementItem.appendChild(document.createTextNode("Aktualności"));
    list.replaceChild(replacementItem, list.firstElementChild);

    //usuń ostatnią zakładkę w menu
    var lastItem = list.lastElementChild;
    list.removeChild(lastItem);


    for (var i = 1; i <= 5; i++) {
        var listItem = document.createElement("li");
        listItem.appendChild(document.createTextNode("Element " + i));

        // Insert the new list item into the existing list
        myList.appendChild(listItem);

        // Access the parent node of the new list item and display it on the webpage
        var parentNode = listItem.parentNode;
        var infoText = "Parent Node of Element " + i + ": " + parentNode.nodeName;
        
        var infoElement = document.createElement("p");
        infoElement.textContent = infoText;
        parentNodeInfoContainer.appendChild(infoElement);
    }
});