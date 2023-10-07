let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();
});


function openModalLogout() {
  var myDialogLogout = document.getElementById('dialog-logout');
  var overlayLogout = document.getElementById('overlay-logout');
  myDialogLogout.showModal();
  overlayLogout.style.display = 'block';
}

function closeDialogLogout() {
  var dialogLogout = document.getElementById('dialog-logout');
  var overlayLogout = document.getElementById('overlay-logout');
  dialogLogout.close();
  overlayLogout.style.display = 'none';
}