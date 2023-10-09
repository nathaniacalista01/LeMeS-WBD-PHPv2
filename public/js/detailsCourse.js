// DIFFER WITH THE COURSE.JS BECAUSE OF THE NAVIGATION AFTER ACTION
// AND ADD MATERIAL BUTTON AND ACCORDION ONLY IN MODULE

function reset(){
  var nameArea = document.getElementById('moduleName');
  var descArea = document.getElementById('moduleDescription');
  nameArea.value = '';
  descArea.value = '';
  var submit_button = document.getElementById("confirm-save");
  submit_button.disabled = true;
  var test = document.querySelector('.addForm-header');
  test.textContent = 'Add Module';
  document.querySelector('#confirm-save').textContent = 'Add';
};

function openForm(section, cancel, popup) {
  var popupOverlay = document.querySelector(popup);
  var popupSection = document.querySelector(section);
  var closePopup = document.querySelector(cancel);
  popupSection.classList.add("active");
  popupOverlay.style.display = 'block';
  popupSection.style.display = 'block';

  // Add a click event listener to the overlay
  popupOverlay.addEventListener("click", function () {
    popupSection.classList.remove("active");
    popupOverlay.style.display = 'none';
    popupSection.style.display = 'none';
    reset();
  });

  // Add a click event listener to the close button
  closePopup.addEventListener("click", function () {
    popupSection.classList.remove("active");
    popupOverlay.style.display = 'none';
    popupSection.style.display = 'none';
    reset();
  });
};

function openFormDeleteModule(course_id, module_id, title) {
  openForm(".popup-section2", ".cancel-save2", ".popup-overlay2");
  var message = document.querySelector(".delete-warning");
  message.innerText = "Delete module " + title + "?";
  var button = document.querySelector('.confirm-save2');
  button.onclick = function() {
    handleDeleteModule(course_id, module_id);
  };
};

function openFormAddModule() {
  openForm(".popup-section", ".cancel-save", ".popup-overlay");
};

const openFormEditModule = (course_id, module_id, title, description) => {
  console.log("Edit module")
  var test = document.querySelector('.addForm-header');
  test.textContent = 'Edit Module';
  document.querySelector('#confirm-save').textContent = 'Edit';
  document.querySelector('#moduleName').value = title;
  document.querySelector('#moduleDescription').value = description;
  var button = document.getElementById('confirm-save');
  button.onclick = function() {
    handleEditModule(course_id, module_id);
  };
  openForm(".popup-section", ".cancel-save", ".popup-overlay");
};

const handleAddModule = (id) => {
  let title = document.getElementById("moduleName").value;
  let description = document.getElementById("moduleDescription").value;
  const data = new FormData();
  data.append("course_id", parseInt(id));
  data.append("title", title);
  data.append("description", description);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/api/module/add.php", true)
  xhr.onload = function () {
    if (this.status === 200) {
      window.location.href = "/course/preview/" + id;
    } else {
      alert("Something went wrong!");
    }
  }
  xhr.send(data);
};

const handleEditModule = (course_id, module_id) => {
  var title = document.getElementById('moduleName').value;
  var description = document.getElementById('moduleDescription').value;
  const data = new FormData();
  data.append("module_id", parseInt(module_id));
  data.append("title", title);
  data.append("description", description);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/api/module/edit.php", true)
  xhr.onload = function () {
    if (this.status === 200) {
      window.location.href = "/course/preview/" + course_id;
    } else {
      alert("Something went wrong!");
    }
  }
  xhr.send(data);
};

const handleDeleteModule = (course_id, module_id) => {
  const data = new FormData();
  data.append("module_id", parseInt(module_id));
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/api/module/delete.php", true)
  xhr.onload = function () {
    if (this.status === 200) {
      window.location.href = "/course/preview/" + course_id;
    } else {
      alert("Something went wrong!");
    }
  }
  xhr.send(data);
};
