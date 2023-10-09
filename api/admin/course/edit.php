<?php
    require_once("../../../app/models/Admin.php");
    require_once("../../../app/core/App.php");
    require_once("../../../app/core/Database.php");
    require_once("../../../app/models/User.php");
    require_once("../../../app/core/Table.php");
    require_once("../../../config/config.php");
    require_once("../../../config/config.php");
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(isset($_POST["course_id"]) && isset($_POST["title"]) && isset($_POST["description"])){
        $course_id = $_POST["course_id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $image_file = $_POST["old_image"];
        $course_password =  isset($_POST["course_password"]) ? $_POST["course_password"] : $_POST["old_password"];
        if(isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] !== ""){
            // Kasus kalau imagenya mau diganti
            $directory = "../../../public/image/course/";
            $file_name = $_FILES["image"]["name"];
            $cleaned_file_name = str_replace(' ','',$file_name);
            $targeted_file = $directory . basename($cleaned_file_name);
            $image_file = "/public/image/course/" . basename($cleaned_file_name);
            $type = strtolower(pathinfo($targeted_file,PATHINFO_EXTENSION));
            $uploaded = true;
            if($_FILES["image"]["size"] > 10000000){
                $_SESSION["error"] = "Your image's size is too large";
                $uploaded = false;
            }
            if($type != "png" && $type != "jpeg" && $type != "jpg"){
                $_SESSION["error"] = "Only png, jpeg, and jpg file is allowed!";
                $uploaded = false;
            }
            if($uploaded){
                $rm = "rm ../../..".$_POST["old_image"];
                exec($rm);
                $response = move_uploaded_file($_FILES["image"]["tmp_name"],$targeted_file);
            }else{
                header("Location: /admin/courses");
            }
        }
        $admin = new Admin();
        $rows = $admin->update_course($title,$description,$course_password,$image_file,$course_id);
        if($rows){
            $_SESSION["success"] = "Your edit has been saved!";
            header("Location: /admin/courses");
        }else{
            $_SESSION["error"] = "Something went wrong!";
            header("Location: /admin/courses");
        }
    }
?>