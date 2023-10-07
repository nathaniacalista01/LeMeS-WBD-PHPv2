const openModule = (title, description) => {
  let title_place = document.getElementById("course-title");
  let desc_place = document.getElementById("course-desc");
  title_place.innerText = title;
  desc_place.innerText = description;
};

function openFormDelete(course_id, module_id, title) {
  var popupSection = document.querySelector(".popup-section2");
  var popupOverlay = document.querySelector(".popup-overlay2");
  var closePopup = document.querySelector(".cancel-save2");
  popupSection.classList.add("active");
  popupOverlay.style.display = 'block';
  popupSection.style.display = 'block';
  
  
  // Add a click event listener to the overlay
  popupOverlay.addEventListener("click", function () {
    popupSection.classList.remove("active");
    popupOverlay.style.display = 'none';
    popupSection.style.display = 'none';
  });

  // Add a click event listener to the close button
  closePopup.addEventListener("click", function () {
    popupSection.classList.remove("active");
    popupOverlay.style.display = 'none';
    popupSection.style.display = 'none';
  }); 
  var message = document.querySelector(".delete-warning");
  message.innerText = "Delete module " + title + "?";
  var button = document.querySelector('.confirm-save2');
  button.onclick = function() {
    handleDeleteModule(course_id, module_id);
  };
};

function openForm() {
  var popupSection = document.querySelector(".popup-section");
  var popupOverlay = document.querySelector(".popup-overlay");
  var closePopup = document.querySelector(".cancel-save");
  popupSection.classList.add("active");
  popupOverlay.style.display = 'block';
  popupSection.style.display = 'block';


  // Add a click event listener to the overlay
  popupOverlay.addEventListener("click", function () {
    popupSection.classList.remove("active");
    popupOverlay.style.display = 'none';
    popupSection.style.display = 'none';
  });

  // Add a click event listener to the close button
  closePopup.addEventListener("click", function () {
    popupSection.classList.remove("active");
    popupOverlay.style.display = 'none';
    popupSection.style.display = 'none';
  });
};

const openFormEdit = (course_id, module_id, title, description) => {
  document.querySelector('#confirm-save').textContent = 'Edit';
  document.querySelector('#moduleName').value = title;
  document.querySelector('#moduleDescription').value = description;
  var button = document.getElementById('confirm-save');
  button.onclick = function() {
    handleEditModule(course_id, module_id);
  };
  openForm();
};


const cancelButton = document.getElementById('cancel-save');
cancelButton.addEventListener('click', () => {
  var nameArea = document.getElementById('moduleName');
  var descArea = document.getElementById('moduleDescription');
  nameArea.value = '';
  descArea.value = '';
  var submit_button = document.getElementById("confirm-save");
  submit_button.disabled = true;
});

const check_area = () => {
  var submit_button = document.getElementById("confirm-save");
  var name_input = document.getElementById("moduleName");
  var desc_input = document.getElementById("moduleDescription");

  // Get the values of the textareas
  var name_value = name_input.value.trim();
  var desc_value = desc_input.value.trim();

  // Check if the values are blank
  if (name_value === "" || desc_value === "") {
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