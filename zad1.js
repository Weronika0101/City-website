
document.addEventListener("DOMContentLoaded", function() {

    var list = document.getElementById("menu");

    // stworz nowy element
    var newItem = document.createElement("li");
    var textNode = document.createTextNode("New Element");

    // dodaj do menu na koncu
    newItem.appendChild(textNode);
    list.appendChild(newItem);

  
   // var numberedList = document.createElement("ol");
    //numberedList.setAttribute("id", "numberedList");

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

    var myList = document.getElementById("numberedList");
    var parentNodeInfoContainer = document.getElementById("parentNodeInfo");

    for (var i = 1; i <= 5; i++) {
      var listItem = document.createElement("li");
        listItem.appendChild(document.createTextNode("Element " + i));

        // dodaj element do listy
        myList.appendChild(listItem);

        // wysiwtl parent node elementów listy
        var parentNode = listItem.parentNode;
        var infoText = "Parent Node of Element " + i + ": " + parentNode.nodeName;

        var infoElement = document.createElement("p");
        infoElement.textContent = infoText;

        parentNodeInfoContainer.appendChild(infoElement);
    }
});


var addButton = document.getElementById("addButton");
addButton.addEventListener("click", add);

var replaceButton = document.getElementById("replaceButton");
replaceButton.addEventListener("click", replace);

var deleteButton = document.getElementById("deleteButton");
deleteButton.addEventListener("click", deleteEl);

var numberedList = document.createElement("ol");
var list;

function add() {

  var textfield = document.getElementById("text").value;
  var idfield = document.getElementById("index").value;


    numberedList.setAttribute("id", "numberedList");

        var listItem = document.createElement("li");
        listItem.appendChild(document.createTextNode(textfield));
        numberedList.appendChild(listItem);

    document.getElementById("content").appendChild(numberedList);
}

function replace() {

  var listItem = numberedList.children;

  numberedList.replaceChild(listItem[2],document.createTextNode("eee"))
}

function deleteEl() {

  var listItem = numberedList.lastElementChild;
  numberedList.removeChild(listItem);

}
