// -------------- HEADER SLIDESHOW ----------------------
let slideIndex = 1;

if (!window.location.href.includes("search")) {
  showSlides(slideIndex);
}

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

// ------------------- ENROLLMENT POPUP -----------------------

function openModal(
  joined,
  id,
  title,
  description,
  formattedDate,
  course_password
) {
  console.log(joined,id,title,description,formattedDate,course_password);
  var myDialog = document.getElementById("dialog");
  var overlay = document.getElementById("overlay");
  var upload_text = document.getElementById("upload-date");
  var course_title = document.getElementById("course-title");
  var course_desc = document.getElementById("course-desc");
  var course_id = document.getElementById("course_id");
  var enroll_button = document.getElementById("enroll-btn");
  var go_button = document.getElementById("course-detail");
  myDialog.showModal();
  overlay.style.display = "block";
  course_title.innerText = title;
  course_desc.innerText = description;
  upload_text.innerText = formattedDate;
  course_id.innerText = id;
  if (joined) {
    // Kalau sudah bergabung
    enroll_button.style.display = "none";
    go_button.style.visibility = "visible";
  } else {
    // Kalau belum berabung
    enroll_button.style.display = "block";
    go_button.style.visibility = "hidden";
    if (course_password && course_password !== "null") {
      var input_button = document.getElementById("password-input");
      input_button.type = "text";
    }
  }
}

function closeDialog() {
  var dialog = document.getElementById("dialog");
  var overlay = document.getElementById("overlay");
  var input = document.getElementById("password-input");
  var enroll = document.getElementById("course-detail");
  enroll.style.visibility = "hidden";
  input.value = "";
  input.type = "hidden";
  dialog.close();
  overlay.style.display = "none";
}

function enrolled() {
  var password_input = document.getElementById("password-input");
  const course_id = document.getElementById("course_id").innerText;
  var course_password = password_input.value;
  const data = new FormData();
  data.append("course_id", course_id);
  data.append("course_password", course_password);
  const xml = new XMLHttpRequest();
  xml.open("POST", "/api/course/enroll.php");
  xml.onload = function () {
    if (this.response == 200) {
      window.location.href = "/";
    } else if (this.status == 500) {
      window.location.href = "/login";
    } else {
      window.location.href = "/";
    }
  };
  xml.send(data);
}
const visitCourse = () => {
  var course_id = document.getElementById("course_id").innerText;
  window.location.href = "/course/preview/" + course_id;
};
