<?php
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/User.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");
    // $dotenv = DotEnv::getInstance(__DIR__. "/../../.env");
    // $dotenv->load();
    $xml = file_get_contents('php://input');
    $data = json_decode($xml, true);
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(isset($data["username"])){
        $user = new User;  
        $username = $data["username"];
        $result = $user->getUserByUsername($username);
        if($result == null){
            echo json_encode(array("status" => "fail","message" => "Username doesn't exist"));
        }else{
            echo json_encode(array("status" => "success","message" => "Username exists"));
        }
    }
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $user = new User;
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = $user->getUserByUsername($username);
        if($result !== null){
            $hashed_pass = $result["password"];
            if(password_verify($password,$hashed_pass)){
                $_SESSION['success'] = "Log in succesful!";
                $_SESSION["user_id"] = $result["user_id"];
                $courses = $user->getAllCoursesEnrolled();
                $_SESSION["courses_enrolled"] = $courses;
                header('Location: /');
                exit;
            }else{
                $_SESSION['error'] = "Invalid username or password";
                header ("Location: /login");
                exit;
            }
        }
    }
?>