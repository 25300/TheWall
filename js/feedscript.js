//=============================TOP NAV

var element = document.getElementById("myDropcontent");
element.classList.toggle("show");
document.getElementById("butt1").addEventListener("click",()=>{
    element.classList.toggle("show");
});

window.addEventListener("click",()=>{
    if (!event.target.matches('.dropbutt')) {
        element.classList.remove("show");
    }
});

//===========================MODAL BOX

var modalBack = document.createElement("div");
modalBack.id = "modalBack";

var modalBox = document.createElement("div");
modalBox.id = "modalBox";

var modalInside = document.createElement("div");
modalInside.id = "modalInside";

var modalObject = document.createElement("div");
modalObject.id = "modalObject";

var buttHolder = document.createElement("div");
buttHolder.id = "buttHolder";

var modalButt = document.createElement("i");
modalButt.id = "modalButt";
modalButt.className = "far fa-arrow-alt-circle-left";


var imgHolder = document.querySelectorAll(".imgHolder");
var imgEnt = document.querySelectorAll(".imgEnt");

let modalImg = document.createElement("IMG");

var modalInsides = new Object();

//var titleButt = document.getElementById('title');

for (i = 0; i < imgEnt.length; i++) {
    let item = imgEnt[i].id;
    let itemName = document.getElementById(item).value;
    modalInsides[item] = document.getElementById(item);

    imgHolder[i].addEventListener("click",(e)=>{
        /*
        e.preventDefault();
        let imgID = document.getElementsByTagName('IMG').id
        let fullClass = e.srcElement.className;
        let idClass = fullClass.split("imgHolder ");
        console.log("NEXT UP ID CLASS: ");
        console.log(idClass);
        let imgSrc = document.getElementById(idClass[1]).src;
        console.log(imgSrc);
        createModal(imgSrc);
        */

        e.preventDefault();
        let imgSrc = document.getElementById(item).src;
        console.log(imgSrc);
        console.log(itemName);
        createModal(imgSrc);
    });

}

console.log(modalInsides);

function createModal(argument) {
    modalBack.appendChild(modalBox);
    modalBox.appendChild(buttHolder);
    buttHolder.appendChild(modalButt);
    modalBox.appendChild(modalInside);
    //modalButt.appendChild(buttText);
    modalBox.appendChild(modalObject);
    let appendModal = document.getElementsByTagName("BODY")[0];
    appendModal.appendChild(modalBack);
    console.log("CREATE MODAL: DONE");

    modalImg.src = argument;
    console.log(modalImg);
    modalObject.appendChild(modalImg);

    document.getElementById("modalButt").src = "siteimg/arrowback.svg";
    modalImg.focus();
}



buttHolder.addEventListener("click",()=>{

    var elem = document.getElementById('modalButt');

    elem.parentNode.removeChild(elem);


    modalBack.parentNode.removeChild(modalBack);
    modalObject.removeChild(modalImg);
    //buttHolder.removeChild(modalButt);
    modalBox.removeChild(buttHolder);
});










