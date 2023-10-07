const getNewUrl = (added_url) => {
  return "/search/" + added_url;
};
// function openModalTesting(
//   id,
//   title,
//   description,
//   formattedDate,
//   course_password
// ) {
//   var myDialog = document.getElementById("dialog");
//   var overlay = document.getElementById("overlay");
//   var upload_text = document.getElementById("upload-date");
//   var course_title = document.getElementById("course-title");
//   var course_desc = document.getElementById("course-desc");
//   var course_id = document.getElementById("course_id");
//   var enroll_button = document.getElementById("enroll-btn");
//   var go_button = document.getElementById("course-detail");
//   myDialog.showModal();
//   overlay.style.display = "block";
//   course_title.innerText = title;
//   course_desc.innerText = description;
//   upload_text.innerText = formattedDate;
//   course_id.innerText = id;
//   if (joined) {
//     // Kalau sudah bergabung
//     enroll_button.style.display = "none";
//     go_button.style.visibility = "visible";
//   } else {
//     // Kalau belum berabung
//     enroll_button.style.display = "block";
//     go_button.style.visibility = "hidden";
//     if (course_password) {
//       var input_button = document.getElementById("password-input");
//       input_button.type = "text";
//     }
//   }
// }

const searchCourse = (page_number = 1) => {
  let request_url = "/api/course/search.php?";
  let added_url = "";
  try {
    const title = document.getElementById("search").value;
    const sort = document.getElementById("sort").value;
    const password = document.getElementById("course_password").value;
    const release_year = document.getElementById("release_year").value;
    if (title.length > 0) {
      added_url += "title=" + title;
    }
    if (sort) {
      added_url += "&sort=" + sort;
    }
    if (password) {
      if (password === "required") {
        added_url += "&password=true";
      } else {
        added_url += "&password=false";
      }
    }
    if (release_year) {
      added_url += "&release_year=" + release_year;
    }
  } catch (error) {
    console.log(error);
  }

  let page = "&page=" + page_number;
  added_url += page;
  let final_url = (request_url += added_url);
  window.history.pushState(
    { path: getNewUrl(added_url) },
    "",
    getNewUrl(added_url)
  );
  const xhr = new XMLHttpRequest();
  xhr.open("GET", final_url, true);
  xhr.onload = function () {
    console.log(this);
    if (this.status === 200) {
      let data = JSON.parse(this.responseText);
      let courses = data["courses"];
      let max_page = data["max_page"];
      let joined_courses = data["joined_courses"];
      let result_container = document.getElementById("result-container");
      let pagination = document.getElementById("pagination");
      let prev_index = page_number <= 1 ? 1 : page_number - 1;
      let has_joined = false;
      result_container.innerHTML = "";
      pagination.innerHTML = "";
      if (courses.length === 0) {
        result_container.innerHTML = `<p>No courses match your search...</p>`;
      } else {
        courses.forEach((course) => {
          if (joined_courses.includes(course)) {
            has_joined = true;
          }
          const formattedDate = new Date(course["release_date"]);
          const day = formattedDate.getDay();
          result_container.innerHTML += `<div class='card' onclick='openModal(
                                    ${has_joined},
                                    "${course["course_id"]}",
                                    "${course["title"]}",
                                    "${course["description"]}",
                                    "${course["release_date"]}",
                                    "${course["course_password"]}")' style='cursor:pointer'>
                                  <div class='card-top'>
                                      <img src='${course["image_path"]}' /?
                                  </div>
                                  <div class='card-info'>
                                      <div class='course-name'>
                                          <h2>${course["title"]}</h2>
                                      </div>
                                      <span class='lecturer'>${course["description"]}</span>
                                  </div>
                                  <div class='card-bottom flex-row'>
                                      <p>${day}</p>
                                  </div>
                          </div>`;
        });
        if (page_number > 1) {
          prev_index = page_number - 1;
          pagination.innerHTML += `<a onclick='searchCourse(${prev_index})'>PREV</a>`;
        }
        for (let i = prev_index; i < page_number + 2; i++) {
          if (i == max_page) {
            break;
          }
          if (i === page_number) {
            pagination.innerHTML += `<a style='background-color:#9e51d8;color:white;'>${i}</a>`;
          } else {
            pagination.innerHTML += `<a id='pagination-number' onclick='searchCourse(${i})'>${i}</a>`;
          }
        }
        if (page_number < max_page - 2) {
          pagination.innerHTML += "<a>...</a>";
        }
        if (page_number === max_page) {
          pagination.innerHTML += `<a style='background-color:#9e51d8;color:white;'>${max_page}</a>`;
        } else {
          pagination.innerHTML += `<a onclick='searchCourse(${max_page})'>${max_page}</a>`;
        }

        if (page_number < max_page) {
          next_index = page_number + 1;
          pagination.innerHTML += `<a onclick='searchCourse(${next_index})'>NEXT</a>`;
        }
      }
    }
  };
  xhr.send();
};
