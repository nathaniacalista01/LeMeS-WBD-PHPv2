var updateButton = document.getElementById("update-button");
let cancelButton = document.getElementById("cancel-btn");
let confirmButton = document.getElementById("confirm-btn");
let popup = document.getElementById("popup-container");
let form = document.getElementById("update-form");
let backButton = document.getElementById("back-button");

updateButton &&
  updateButton.addEventListener("click", (e) => {
    e.preventDefault();
    popup.style.visibility = "visible";
    cancelButton = document.getElementById("cancel-btn");
  });
cancelButton &&
  cancelButton.addEventListener("click", (e) => {
    popup.style.visibility = "hidden";
  });

confirmButton.addEventListener("click", (e) => {
  form.submit();
});

const check_button = () => {
  var submit_button = document.getElementById("update-button");
  var fullname_input = document.getElementById("fullname-input");
  var username_input = document.getElementById("username-input");
  if (
    fullname_input.style.borderColor == "green" &&
    username_input.style.borderColor == "green"
  ) {
    submit_button.disabled = false;
  } else {
    submit_button.disabled = true;
  }
};
const reset = (component) => {
  component.innerText = "";
  component.className = "";
};
const check_fullname = () => {
  var fullname_input = document.getElementById("fullname-input");
  var fullname = fullname_input.value;
  var fullname_alert = document.getElementById("fullname-alert");
  if (fullname.length < 3) {
    fullname_alert.className = "alert-show";
    fullname_alert.innerText = "Fullname's minimum length is 3";
    fullname_input.style.borderColor = "red";
  } else {
    reset(fullname_alert);
    fullname_input.style.borderColor = "green";
  }
  check_button();
};

const check_username = () => {
  var username_input = document.getElementById("username-input");
  var username = username_input.value;
  var username_alert = document.getElementById("username-alert");
  if (username.length < 3) {
    // Kasus kalau username kurang panjang
    username_alert.className = "alert-show";
    username_alert.innerText = "Username's minimum length is 3";
    username_input.style.borderColor = "red";
  } else {
    // Kasus kalau username sudah cukup panjang, cek di database apakah unique
    const xmr = new XMLHttpRequest();
    xmr.open("POST", "/api/auth/register.php");
    xmr.onload = function () {
      if (this.status == 200) {
        let response = JSON.parse(this.responseText);
        if (response.status === "success") {
          // Kalau response success, berarti username unique
          reset(username_alert);
          username_input.style.borderColor = "green";
        } else {
          // Kalau tidak succes, berarti username sudah dimiliki pengguna lain
          username_alert.className = "alert-show";
          username_alert.innerText = response.message;
          username_input.style.borderColor = "red";
          check_button();
        }
      }
    };
    check_button();
    xmr.send(JSON.stringify({ username: username }));
  }
  check_button();
};
backButton.addEventListener("click",(e)=>{
  e.preventDefault();
  window.location.href="/admin/users";
})
