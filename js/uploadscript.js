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




