<?php
    require_once("../../../app/models/Admin.php");
    require_once("../../../app/core/App.php");
    require_once("../../../app/core/Database.php");
    require_once("../../../app/models/User.php");
    require_once("../../../app/core/Table.php");
    require_once("../../../config/config.php");
    require_once("../../../config/config.php");
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_POST['title']) && isset($_POST["description"])){
        $admin = new Admin();
        $title = $_POST["title"];
        $description = $_POST["description"];
        $uploaded = true;
        $saved_image = "";
        $course_password = "";
    
        if(isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] !== ""){
            var_dump("Masuk ke sini");
            $directory = "../../../public/image/course/";
            $file_name = $_FILES["image"]["name"];
            $cleaned_file_name = str_replace(' ','',$file_name);
            $targeted_file = $directory . basename($cleaned_file_name);
            $image_file = "/public/image/course/" . basename($cleaned_file_name);
            $message = "";
            $type = strtolower(pathinfo($targeted_file,PATHINFO_EXTENSION));
            if($_FILES["image"]["size"] > 10000000){
                $message = "Sorry your file is too large";
                header("Location: /admin/addcourse");
            }
            if($type != "png" && $type != "jpeg" && $type != "jpg"){
                $_SESSION["error"] = "Only png, jpeg, and jpg file is allowed!";
                header("Location: /admin/addcourse");
            }
            
            $response = move_uploaded_file($_FILES["image"]["tmp_name"],$targeted_file);
            $saved_image = $image_file;
            
        }
        if(isset($_POST["course_password"])){
            $course_password = $_POST["course_password"];
        }
        $rows = $admin->add_course($title,$description,$saved_image,$course_password);
        if($rows){
            http_response_code(200);
            $_SESSION["success"] = "Course has sucesfully added";
            header("Location: /admin/courses");
        }else{
            http_response_code(500);
            $_SESSION["error"] = "Course can't be added";
            header("Location: /admin/courses");
        }
    }
?>