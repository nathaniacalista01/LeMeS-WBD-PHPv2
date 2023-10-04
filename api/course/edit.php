<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once("../../app/models/Course.php");
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/User.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");
    $image_file = $_POST["old_image"];
    if(isset($_FILES["image_path"])){
        // Kasus kalau image mau di update
        $directory = "../../public/image/course/";
        $file_name = $_FILES["image_path"]["name"];
        $cleaned_file_name = str_replace(' ','',$file_name);
        $targeted_file = $directory . basename($cleaned_file_name);
        $image_file = "/public/image/course/" . basename($cleaned_file_name);
        $type = strtolower(pathinfo($targeted_file,PATHINFO_EXTENSION));
        $uploaded = true;
        if($_FILES["image_path"]["size"] > 10000000){
            echo "Sorry your file is too large.";
            $uploaded = false;
        }
        if($type != "png" && $type != "jpeg" && $type != "jpg"){
            echo "Only png and jpeg files are allowed";
            $uploaded = false;
        }
        if($uploaded){
            $response = move_uploaded_file($_FILES["image_path"]["tmp_name"],$targeted_file);
        }
    }

    if(isset($_POST["title"]) && isset($_POST["description"])){
        $course = new Course();
        $title = $_POST["title"];
        $description = $_POST["description"];
        $course_id = $_POST["course_id"];
        $rows = $course->update_course($title,$description,$image_file,$course_id);
        if($rows){
            http_response_code(200);
            $_SESSION["success"] = "Album has sucesfully edited";
            echo json_encode(array("message" =>"Album sucesfully updated"));
        }else{
            http_response_code(500);
            echo json_encode(array("message" => "Something went wrong"));
        }
    }else{
        http_response_code(400);
        echo json_encode(array("message" => "Bad request."));
    }
?>