<?php
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/Student.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");
    require_once("../../app/models/Teacher.php");

    $xml = file_get_contents('php://input');
    $data = json_decode($xml, true);
    $teacher = new Teacher();
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(isset($data["username"])){
        $student = new Student();  
        $username = $data["username"];
        $result = $student->getStudentByUsername($username);
        if($result == null){
            echo json_encode(array("status" => "fail","message" => "Username doesn't exist"));
        }else{
            echo json_encode(array("status" => "success","message" => "Username exists"));
        }
    }
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $student = new Student;
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = $student->getStudentByUsername($username);
        if($result !== null){
            $hashed_pass = $result["password"];
            if(password_verify($password,$hashed_pass)){
                $_SESSION['success'] = "Log in succesful!";
                $_SESSION['username'] = $username;
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