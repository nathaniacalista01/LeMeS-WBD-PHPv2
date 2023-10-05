const openModule = (title,description) => {
    let title_place = document.getElementById("course-title");
    let desc_place = document.getElementById("course-desc");
    title_place.innerText = title;
    desc_place.innerText = description;
}