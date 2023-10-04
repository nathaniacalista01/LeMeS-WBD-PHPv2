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

    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'GET':
            var_dump($_SERVER);
            break;
        case 'POST':
            if(!isset($_SESSION["user_id"])){
                $_SESSION["error"] = "You need to login first!";
                http_response_code(500);
            }else{
                if($_POST["course_id"]){
                    $user = new User();
                    $course_id = $_POST["course_id"];
                    $rows = $user->enroll($course_id);
                    if($rows){
                        http_response_code(200);
                        $_SESSION["success"] = "You have succesfully enrolled this course!";
                    }else{
                        http_response_code(501);
                        $_SESSION["error"] = "Something went wrong!";
                    }
                }
            }
            break;
        default:
            # code...
            break;
    }
    
    
?>