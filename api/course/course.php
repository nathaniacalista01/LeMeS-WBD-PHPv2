<?php
    require_once("../../app/models/Course.php");
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/User.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");

    $xml= file_get_contents("php://input");
    $data = json_decode($xml,true);
    if(isset($data["page_number"])){
        $course = new Course();
        $page = $data["page_number"] + 1;
        $courses = $course->getFewCourses($page);
        echo json_encode($courses);
    }
?>