<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/Module.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");

    if(isset($_POST["title"]) && isset($_POST["description"])){
        $module = new Module();
        $course_id = $_POST["course_id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $rows = $module->add_module($course_id,$title,$description);
        if($rows){
            http_response_code(200);
            $_SESSION["success"] = "Module has sucesfully added";
            echo json_encode(array("status" => "success","message" =>"Module sucesfully added"));
        }else{
            echo json_encode(array("status" => "failed","message" => "Something went wrong"));
        }
    } else{
        http_response_code(400);
        echo json_encode(array("message" => "Bad request."));
    }
?>