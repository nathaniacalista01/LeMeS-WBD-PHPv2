const url = window.location.href;
const parts = url.split("/");
const id = parts[parts.length-1]

const checkTitle = () => {
  let title_input = document.getElementById("title-input");
  let title = title_input.value;
  var title_alert = document.getElementById("title-alert");
  if (title.length < 3) {
    title_alert.className = "show-alert";
    title_alert.innerText = "Title's minimum length is 3";
  } else {
    title_alert.className = "";
    title_alert.innerText = "";
  }
};

const handleSubmit = (e) => {
  let title = document.getElementById("title-input").value;
  let description = document.getElementById("description-input").value;
  let images = document.getElementById("image-input");
  const data = new FormData();
  data.append("title", title);
  data.append("description", description);
  data.append("image_path", images.files[0]);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/api/course/addCourse.php", true);
  xhr.onload = function () {
    let response = this.responseText;
    if (this.status == 200) {
      window.location.href = "/";
    } else {
      alert(response);
    }
  };
  xhr.send(data);
};

const handleUpdate = () => {
  let title = document.getElementById("title-input").value;
  let description = document.getElementById("description-input").value;
  let images = document.getElementById("image-input");
  let image_src = document.getElementById("course-image").getAttribute("src");

  const data = new FormData();
  data.append("title", title);
  data.append("description", description);
  data.append("image_path", images.files[0]);
  data.append("old_image",image_src);
  data.append("course_id",parseInt(id));
  const xhr = new XMLHttpRequest();
  xhr.open("POST","/api/course/edit.php",true)
  xhr.onload = function(){
    if(this.status === 200){
      window.location.href = "/course";
    }else{
      alert("Something went wrong!");
    }
  }
  xhr.send(data);
};
