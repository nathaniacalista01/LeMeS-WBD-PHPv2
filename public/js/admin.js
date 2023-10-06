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
