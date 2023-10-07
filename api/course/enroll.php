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
    if(!isset($_SESSION["user_id"])){
        $_SESSION["error"] = "You need to login first!";
        http_response_code(500);
    }else{
        if($_POST["course_id"]){
            $user = new User();
            $course = new Course();
            $course_id = $_POST["course_id"];
            $course_enrolled = $course->single_course($_POST["course_id"]);
            if($course_enrolled["course_password"] !== NULL){
                if(isset($_POST["course_password"])){
                    $course_password = $_POST["course_password"];
                    if($course_password === $course_enrolled["course_password"]){
                        // Kalau berhasil enroll 
                        $rows = $user->enroll($course_id);
                        if($rows){
                            $_SESSION["success"] = "You have sucesfully enrolled!";
                            http_response_code(200);
                            echo json_encode(array("status" => "success"));
                        }else{
                            $_SESSION["error"] = "Enrolled failed!";
                            echo json_encode(array("status" => "fail"));
                        }
                    }else{
                        $_SESSION["error"] = "Wrong password!";
                        echo json_encode(array("status" => "fail"));
                    }
                }
            }else{
                $rows = $user->enroll($course_id);
                if($rows){
                    $_SESSION["success"] = "You have sucesfully enrolled";
                    echo json_encode(array("status" => "success"));
                }
            }
        }
    }
?>