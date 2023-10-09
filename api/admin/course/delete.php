<?php
    require_once("../../../app/models/Admin.php");
    require_once("../../../app/core/App.php");
    require_once("../../../app/core/Database.php");
    
    require_once("../../../app/models/Course.php");
    require_once("../../../app/models/User.php");
    require_once("../../../app/core/Table.php");
    require_once("../../../config/config.php");
    require_once("../../../config/config.php");
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(isset($_POST["id"])){
        $admin = new Admin;
        $course = new Course;
        $deleted_course = $course->single_course($_POST["id"]);
        
        $rows = $admin->delete_course($_POST["id"]);
        if($rows){
            $rm_image = 'rm ../../..' . $deleted_course["image_path"];
            exec($rm_image);
            http_response_code(200);
            $_SESSION["success"] = "Course has been deleted!";
        }else{
            http_response_code(200);
            $_SESSION["error"] = "Course can't be deleted!";
        }
    }
?>