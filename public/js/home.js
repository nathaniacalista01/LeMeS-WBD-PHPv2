// -------------- HEADER SLIDESHOW ----------------------
let slideIndex = 1;
showSlides(slideIndex);

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

// -------------- SEARCH BAR WITH FILTER ----------------------
let select = document.getElementById("select");
let list = document.getElementById("list");
let selectText = document.getElementById("selectText");
let inputField = document.getElementById("inputField");
let options = document.getElementsByClassName("options");

select.onclick = function () {
  list.classList.toggle("open");
};

for (option of options) {
  option.onclick = function () {
    selectText.innerHTML = this.innerHTML;
    inputField.placeholder = "Search In " + selectText.innerHTML;
  };
}

// ---------------------- SORT --------------------------
let sort = document.getElementById("sort");
let sortOptions = document.getElementsByClassName("sort-options");

sort.onclick = function () {
  sortList.classList.toggle("open");
};

for (option of sortOptions) {
  option.onclick = function () {
    sortText.innerHTML = this.innerHTML;
  };
}

// ------------------- ENROLLMENT POPUP -----------------------

function openModal(joined,id, title, description, formattedDate) {
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
  if(joined){
    enroll_button.style.display = "none";
    go_button.style.display="block";
  }else{
  }
}

const closeModalBtn = document.querySelector(".close-btn");

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden")) {
    closeModal();
  }
});

closeModalBtn.addEventListener("click", () => {
  dialog.close();
});

function closeDialog() {
  var dialog = document.getElementById("dialog");
  var overlay = document.getElementById("overlay");
  dialog.close();
  overlay.style.display = "none";
}

function enrolled() {
  const course_id = document.getElementById("course_id").innerText;
  const data = new FormData();
  data.append("course_id", course_id);
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
