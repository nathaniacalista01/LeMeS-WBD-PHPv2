var updateButton = document.getElementById("update-button");
let cancelButton = document.getElementById("cancel-btn");
let confirmButton = document.getElementById("confirm-btn");
let popup = document.getElementById("popup-container");
let form = document.getElementById("update-form");

updateButton && updateButton.addEventListener("click",(e)=>{
    e.preventDefault();
    popup.style.visibility = "visible";
    cancelButton = document.getElementById("cancel-btn");
})
cancelButton && cancelButton.addEventListener("click",(e)=>{
    popup.style.visibility = "hidden";
})

confirmButton.addEventListener("click",(e)=>{
    form.submit();
})

