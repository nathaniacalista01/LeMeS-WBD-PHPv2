const reset = (component) => {
  component.innerText = "";
  component.className = "";
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
    const xml = new XMLHttpRequest();
    xml.open("POST", "/api/auth/login.php");
    xml.onload = function () {
      if (this.status == 200) {
        let response = JSON.parse(this.responseText);
        if (response.status === "success") {
          reset(username_alert);
          username_input.style.borderColor = "green";
        }else{
            username_alert.className = "alert-show";
            username_alert.innerText = "Username doesn't exists"
            username_input.style.borderColor = "red";
        }
      }
      check_button();
    };
    xml.send(JSON.stringify({ username: username }));
  }
  check_button();
};

const check_button = () =>{
  var username_input = document.getElementById("username-input");
  if(username_input.style.borderColor == "green"){
    var button = document.getElementById("login-button");
    button.disabled = false;
  }
}
