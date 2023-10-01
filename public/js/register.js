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

const check_button= ()=>{
    var submit_button = document.getElementById("login-button");
    var fullname_input = document.getElementById("fullname-input");
    var username_input = document.getElementById("username-input")
    var password_input = document.getElementById("password-input")
    if(fullname_input.style.borderColor == "green" && username_input.style.borderColor == "green" && password_input.style.borderColor == "green"){
        submit_button.disabled = false;
    }else{
        submit_button.disabled = true;
    }
}

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
    username_alert.className = "alert-show";
    username_alert.innerText = "Username's minimum length is 3";
    username_input.style.borderColor = "red";
  } else {
    reset(username_alert);
    username_input.style.borderColor = "green";
  }
  check_button()
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

