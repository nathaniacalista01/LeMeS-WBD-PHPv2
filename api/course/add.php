<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
     require_once("../../app/models/Admin.php");
     require_once("../../app/core/App.php");
     require_once("../../app/core/Database.php");
     require_once("../../app/models/User.php");
     require_once("../../app/core/Table.php");
     require_once("../../config/config.php");

    $directory = "../../public/image/course/";
    $file_name = $_FILES["image_path"]["name"];
    $cleaned_file_name = str_replace(' ','',$file_name);
    $targeted_file = $directory . basename($cleaned_file_name);
    $image_file = "/public/image/course/" . basename($cleaned_file_name);

    if(isset($_POST["title"]) && isset($_POST["description"])){
        $uploaded = true;
        $message = "";
        $type = strtolower(pathinfo($targeted_file,PATHINFO_EXTENSION));
        if($_FILES["image_path"]["size"] > 10000000){
            $message =  "Sorry your file is too large.";
            $uploaded = false;
        }
        if($type != "png" && $type != "jpeg" && $type !== "jpg"){
            $message = "Only png ,jpg, and jpeg files are allowed";
            $uploaded = false;
        }

        if($uploaded){
            $response = move_uploaded_file($_FILES["image_path"]["tmp_name"],$targeted_file);
            $admin = new Admin();
            $title = $_POST["title"];
            $description = $_POST["description"];
            $rows = $admin->add_course($title,$description,$image_file);
            if($rows){
                http_response_code(200);
                $_SESSION["success"] = "Album has sucesfully added";
                echo json_encode(array("status" => "success","message" =>"Album sucesfully added"));
            }else{
                echo json_encode(array("status" => "failed","message" => "Something went wrong"));
            }
        }else{
            echo json_encode(array("status" => "failed","message" => $message));
        }
    }else{
        http_response_code(400);
        echo json_encode(array("message" => "Bad request."));
    }
?>