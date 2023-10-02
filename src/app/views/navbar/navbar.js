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

const closeModalLogoutBtn = document.querySelector(".close-btn-logout");

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden")) {
    closeModal();
  }
});

closeModalLogoutBtn.addEventListener("click", () => {
  closeModal();
});

function closeDialogLogout() {
  var dialogLogout = document.getElementById('dialog-logout');
  var overlayLogout = document.getElementById('overlay-logout');
  dialogLogout.close();
  overlayLogout.style.display = 'none';
}