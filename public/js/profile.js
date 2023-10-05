function toggle() {
    var toggleChange = document.getElementsByClassName('profile-toggle-change');
    for (var i = 0; i < toggleChange.length; i++) {
        var element = toggleChange[i];
        element.style.display = (element.style.display === 'none' || element.style.display === '') ? 'block' : 'none';
    }

    var toggleFixed = document.getElementsByClassName('profile-toggle-fixed');
    for (var i = 0; i < toggleFixed.length; i++) {
        var element = toggleFixed[i];
        element.style.display = (element.style.display === 'block' || element.style.display === '') ? 'none' : 'block';
    }

    var inputFields = document.getElementsByClassName('profile-input');
    for (var i = 0; i < inputFields.length; i++) {
        var inputField = inputFields[i];
        inputField.disabled = !inputField.disabled;
    }
};

const reset = (component) => {
  component.innerText = "";
  component.className = "";
};

const check_button = () => {
  var submit_button = document.getElementById("save-profile-button");
  var fullname_input = document.getElementById("fullname-input");
  var username_input = document.getElementById("username-input");
  var password_input = document.getElementById("password-input");
  if (
    fullname_input.style.borderColor !== "red" &&
    username_input.style.borderColor !== "red" &&
    password_input.style.borderColor !== "red" 
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
  var oldUsername = document.getElementById('oldUsername').value;
  var username_input = document.getElementById("username-input");
  var username = username_input.value;
  var username_alert = document.getElementById("username-alert");
    if (username.length < 3){
        // Kasus kalau username kurang panjang
        username_alert.className = "alert-show";
        username_alert.innerText = "Username's minimum length is 3";
        username_input.style.borderColor = "red";
        check_button();
    } else {
        // Kasus kalau username sudah cukup panjang, cek di database apakah unique
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/api/profile/check.php");
        xhr.onload = function () {
          if (this.status == 200) {
            let response = JSON.parse(this.responseText);
            if (response.status === "success") {
              // Kalau response success, berarti username unique
              reset(username_alert);
              username_input.style.borderColor = "green";
            }else{
              // Kalau tidak success, berarti username sudah dimiliki pengguna lain
              username_alert.className = "alert-show"
              username_alert.innerText = response.message;
              username_input.style.borderColor = "red";
              check_button()
          } 
        };
        check_button();
        }
        xhr.send(JSON.stringify({ username: username, oldUsername: oldUsername }));
        check_button();
    }
};

const check_password = () => {
  var password_input = document.getElementById("password-input");
  var password = password_input.value;
  var password_alert = document.getElementById("password-alert");
  const regex = /^(?=.*\d)(?=.*[A-Z]).{8,}$/;
  if (password.length == 0){
    reset(password_alert);
    password_input.style.borderColor = "green";
  } else if (password.length < 8) {
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

function previewProfilePicture() {
    var input = document.getElementById('files');
    var img = document.getElementById('profilePicture');
    var image_input = document.getElementById("oldPicture");

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        img.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
        image_input.style.borderColor = "green";
    }
    check_button();
};

function resetProfilePicture() {
    var initialImage = document.getElementById('oldPicture').value
    var img = document.getElementById('profilePicture');
    img.src = initialImage;
};

const handleUpdate = (id) => {
    let fullname = document.getElementById("fullname-input").value;
    let username = document.getElementById("username-input").value;
    let password = document.getElementById("password-input").value;
    let images = document.getElementById("files");
    let image_src = document.getElementById("profilePicture").getAttribute("src");
  
    const data = new FormData();
    data.append("fullname", fullname);
    data.append("username", username);
    if (password.length !== 0){
        data.append("password", password);
    }
    data.append("image_path", images.files[0]);
    data.append("old_image",image_src);
    data.append("user_id",parseInt(id));
    const xhr = new XMLHttpRequest();
    xhr.open("POST","/api/profile/edit.php",true)
    xhr.onload = function(){
      if(this.status === 200){
        window.location.href = "/profile";
      }else{
        console.log(this);
        alert("Something went wrong!");
      }
    }
    xhr.send(data);
  };