<?php
    require_once("../../app/models/Course.php");
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/User.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");
    if(isset($_GET["page"]) && isset($_GET["title"])){
        $page = $_GET["page"];
        $title = $_GET["title"];
        $course = new Course();
        $max_page = ceil(count($course->searchCourses($title))/4);
        $courses = $course->searchFewCourses($page,$title);
        echo json_encode(array("courses" => $courses,"max_page" => $max_page));
    }
?>