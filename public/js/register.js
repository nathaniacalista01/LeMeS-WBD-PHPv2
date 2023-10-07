var fullname = document.getElementById("fullname-input");
var password = document.getElementById("password-input");
var forms = document.getElementById("form-register");
var password_alert = document.getElementById("password-alert");
var fullname_valid = false;
var username_valid = false;
var password_valid = false;

const reset = (component) => {
  component.innerText = "";
  component.className = "";
};

const check_button = () => {
  var submit_button = document.getElementById("login-button");
  var fullname_input = document.getElementById("fullname-input");
  var username_input = document.getElementById("username-input");
  var password_input = document.getElementById("password-input");
  if (
    fullname_input.style.borderColor == "green" &&
    username_input.style.borderColor == "green" &&
    password_input.style.borderColor == "green"
  ) {
    submit_button.disabled = false;
  } else {
    submit_button.disabled = true;
  }
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

const check_password = () => {
  var password_input = document.getElementById("password-input");
  var password = password_input.value;
  var password_alert = document.getElementById("password-alert");
  const regex = /^(?=.*\d)(?=.*[A-Z]).{8,}$/;
  if (password.length < 8) {
    password_alert.innerText = "Password's minimum length is 8";
    password_alert.className = "alert-show";
    password_input.style.borderColor = "red";
  } else {
    if (!regex.test(password)) {
      password_alert.innerText =
        "Password must have at least 1 capital and 1 number";
      password_alert.className = "alert-show";
      password_input.style.borderColor = "red";
    } else {
      reset(password_alert);
      password_input.style.borderColor = "green";
    }
  }
  check_button();
};
const debounce = (fn, delay = 1000) => {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      fn(...args);
    }, delay);
  };
};

const check_username_debounce = debounce(check_username);
