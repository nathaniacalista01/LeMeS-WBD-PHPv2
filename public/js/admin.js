const handleOpen = (id) => {
  const popup = document.getElementById("delete-popup");
  const user_id = document.getElementById("id");
  user_id.innerText = id;
  popup.style.visibility = "visible";
};

const handleDeleteClose = () => {
  const popup = document.getElementById("delete-popup");
  popup.style.visibility = "hidden";
};

const handleDelete = (type) => {
  const data = new FormData();
  const id = document.getElementById("id").innerText;
  data.append("id", parseInt(id));
  const xml = new XMLHttpRequest();
  xml.open("POST", "/api/admin/" + type + "/delete.php", true);
  xml.onload = function () {
    if (this.status === 200) {
      if (type === "user") {
        window.location.href = "/admin/users";
      } else {
        window.location.href = "/admin/courses";
      }
    } else {
      console.log("gagal");
    }
  };
  xml.send(data);
};

var updateButton = document.getElementById("action-button");
let cancelButton = document.getElementById("cancel-btn");
let confirmButton = document.getElementById("confirm-btn");
let popup = document.getElementById("popup-container");
let form = document.getElementById("form");
let backButton = document.getElementById("back-button");
let oldUsername = document.getElementById("old-username");
let oldFullname = document.getElementById("old-fullname");
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
  var submit_button = document.getElementById("action-button");
  var fullname_input = document.getElementById("fullname-input");
  var username_input = document.getElementById("username-input");
  if (
    fullname_input.style.borderColor == "green" &&
    username_input.style.borderColor == "green"
  ) {
    submit_button.disabled = false;
  } else {
    if (
      username_input.style.borderColor === "green" &&
      fullname_input.value === oldFullname.value
    ) {
      submit_button.disabled = false;
    }
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
          if (username_input.value !== oldUsername.value) {
            // Kalau tidak succes, berarti username sudah dimiliki pengguna lain
            username_alert.className = "alert-show";
            username_alert.innerText = response.message;
            username_input.style.borderColor = "red";
            check_button();
          }
        }
      }
    };
    check_button();
    xmr.send(JSON.stringify({ username: username }));
  }
  check_button();
};
backButton.addEventListener("click", (e) => {
  e.preventDefault();
  window.location.href = "/admin/users";
});

const handleUpload = () => {
  var image = document.getElementById("course-image");
  var new_image = document.getElementById("image-input");
  var old_image = document.getElementById("oldPicture");
  if (new_image.files && new_image.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      image.src = e.target.result;
    };
    reader.readAsDataURL(new_image.files[0]);
  }
};

const check_title = () => {
  var title_input = document.getElementById("title-input");
  var title = title_input.value;
  var title_alert = document.getElementById("title-alert");
  if (title.length < 3) {
    title_alert.className = "alert-show";
    title_alert.innerText = "Title's minimum length is 3";
  } else {
    title_alert.className = "";
    title_alert.innerText = "";
    title_input.style.borderColor = "green";
  }
  check_update_button();
};

const check_desc = ()=>{
  var desc_input = document.getElementById("desc-input");
  var desc = desc_input.value;
  var desc_alert = document.getElementById("desc-alert");
  if(desc.length < 5){
    desc_alert.className = "alert-show";
    desc_alert.innerText = "Description's minimum length is 5";
  }else{
    desc_alert.className = "";
    desc_alert.innerText = "";
    desc_input.style.borderColor = "green";
  }
  check_update_button();
}

const check_update_button = () =>{
  var title = document.getElementById("title-input").value;
  var desc = document.getElementById("desc-input").value;
  var update_button = document.getElementById("action-button");

  if(title.length < 3 || desc.length < 5){
      update_button.disabled = true;
  }else{
    update_button.disabled = false;
  }
}