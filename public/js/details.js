var global_module_id = null;
var global_course_id = null;

const openModule = (course_id, module_id, title, description) => {
  let button = document.getElementById("addMaterialBtn");
  let title_place = document.getElementById("course-title");
  let desc_place = document.getElementById("course-desc");
  title_place.innerText = title;
  desc_place.innerText = description;
  global_course_id = course_id;
  global_module_id = module_id;
  button.style.display = 'block';
};

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

function openFormAddMaterial() {
  openForm(".popup-section3", ".cancel-save3", ".popup-overlay3");
  button.onclick = function() {
    handleAddMaterial();
  };
}

const check_area = (savebtn, titlebtn, descbtn) => {
  var submit_button = document.getElementById(savebtn);
  var name_input = document.getElementById(titlebtn);
  var desc_input = document.getElementById(descbtn);
  var materialFile = document.getElementById('materialFile').value;
  
  // Get the values of the textareas
  var name_value = name_input.value.trim();
  var desc_value = desc_input.value.trim();
  
  // Check if the values are blank
  if (name_value === "" || desc_value === "" || materialFile === "") {
    submit_button.disabled = true;
  } else {
    submit_button.disabled = false;
  }
};

document.addEventListener("DOMContentLoaded", function () {
  const sections = document.querySelectorAll(".accordion-section");

  sections.forEach(function (section) {
    const header = section.querySelector(".accordion-header");
    const content = section.querySelector(".accordion-content");

    header.addEventListener("click", function () {
      if (content.style.display === "none" || content.style.display === "") {
        content.style.display = "block";
      } else {
        content.style.display = "none";
      }
    });
  });
});

const accordionContent = document.querySelectorAll(".accordion-content");
accordionContent.forEach((item, index) => {
  let header = item.querySelector("header");
  header.addEventListener("click", () => {
    item.classList.toggle("open");
    let description = item.querySelector(".description");
    if (item.classList.contains("open")) {
      description.style.height = `${description.scrollHeight}px`; //scrollHeight property returns the height of an element including padding , but excluding borders, scrollbar or margin
      item.querySelector("i").classList.replace("fa-plus", "fa-minus");
    } else {
      description.style.height = "0px";
      item.querySelector("i").classList.replace("fa-minus", "fa-plus");
    }
    removeOpen(index); //calling the funtion and also passing the index number of the clicked header
  })
})

function removeOpen(index1) {
  accordionContent.forEach((item2, index2) => {
    if (index1 != index2) {
      item2.classList.remove("open");
      let des = item2.querySelector(".description");
      des.style.height = "0px";
      item2.querySelector("i").classList.replace("fa-minus", "fa-plus");
    }
  })
}

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
      console.log(this);
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
      console.log(this);
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
      console.log(this);
      alert("Something went wrong!");
    }
  }
  xhr.send(data);
};

const handleAddMaterial = () => {
  let title = document.getElementById('materialName').value;
  let description = document.getElementById('materialDescription').value;
  let material = document.getElementById("materialFile");
  const data = new FormData();
  data.append("module_id", parseInt(global_module_id));
  data.append("title", title);
  data.append("description", description);
  data.append("material_path", material.files[0]);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/api/material/add.php", true)
  xhr.onload = function () {
    if (this.status === 200) {
      console.log(this);
      window.location.href = "/course/preview/" + global_course_id;
    } else {
      console.log(this);
      alert("Something went wrong!");
    }
  }
  xhr.send(data);
};