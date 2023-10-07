<?php
    require_once("../../app/models/Course.php");
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/User.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");
    if(isset($_GET["title"])){
        $data["title"] = $_GET["title"];
    }
    if(isset($_GET["sort"])){
        $data["sort"] = $_GET["sort"];
    }
    if(isset($_GET["password"])){
        $data["password"] = $_GET["password"];
    }
    if(isset($_GET["release_year"])){
        $data["release_year"] = str_replace("now",date("Y"),$_GET["release_year"]);
        $data["release_year"] = str_replace("<","",$data["release_year"]);
    }
    $course = new Course();
    $max_page = ceil(count($course->searchCourses($data))/4);
    $courses = $course->searchFewCourses($_GET["page"],$data);
    echo json_encode(array("courses" => $courses,"max_page" => $max_page));

?>