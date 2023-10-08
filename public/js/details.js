function navigateToMaterials(module_id) {
    window.location.href = '/course/module/' + module_id;
  }

const check_area = (savebtn, titlebtn, descbtn) => {
    var submit_button = document.getElementById(savebtn);
    var name_input = document.getElementById(titlebtn);
    var desc_input = document.getElementById(descbtn);
    
    var name_value = name_input.value.trim();
    var desc_value = desc_input.value.trim();
    
    if (name_value === "" || desc_value === "") {
      submit_button.disabled = true;
    } else {
      submit_button.disabled = false;
    }
  };

const check_area2 = (savebtn, titlebtn, descbtn) => {
    var submit_button = document.getElementById(savebtn);
    var name_input = document.getElementById(titlebtn);
    var desc_input = document.getElementById(descbtn);
    var materialFile = document.getElementById('materialFile').value;
    
    var name_value = name_input.value.trim();
    var desc_value = desc_input.value.trim();
    
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
        description.style.height = `${description.scrollHeight}px`;
        item.querySelector("i").classList.replace("fa-plus", "fa-minus");
      } else {
        description.style.height = "0px";
        item.querySelector("i").classList.replace("fa-minus", "fa-plus");
      }
      removeOpen(index);
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