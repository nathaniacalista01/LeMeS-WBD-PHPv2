const openModule = (title, description) => {
  let title_place = document.getElementById("course-title");
  let desc_place = document.getElementById("course-desc");
  title_place.innerText = title;
  desc_place.innerText = description;
};


const nameArea = document.getElementById('moduleName');
const descArea = document.getElementById('moduleDescription');
const cancelButton = document.getElementById('cancel-save');

cancelButton.addEventListener('click', () => {
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
