<?php
require_once("../../app/core/App.php");
require_once("../../app/core/Database.php");
require_once("../../app/models/Student.php");
require_once("../../app/core/Table.php");
require_once("../../config/config.php");

$xml = file_get_contents('php://input');
$data = json_decode($xml, true);
$student = new Student();

if(isset($data["username"])){
    $username = $data["username"];
    $result = $student->getStudentByUsername($username);
    if($result == null){
        // Kalau result = null, berarti username belum ada 
        echo json_encode(array("status" => "success","message" => "username hasnt exists"));
    }else{
        // Kalau tidak null, berarti username sudah dimiliki 
        echo json_encode(array("status"=>"fail","message"=>"Username has already existed"));
    }
}

if(isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["password"])){
    $student = new Student;
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $password=$_POST["password"];
    $student->register($fullname,$username,$password);
    header('Location: /login/redirect');
    exit;
}
?>