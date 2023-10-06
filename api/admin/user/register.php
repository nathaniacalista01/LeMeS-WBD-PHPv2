<?php
require_once("../../../app/core/App.php");
require_once("../../../app/core/Database.php");
require_once("../../../app/models/Admin.php");
require_once("../../../app/models/User.php");
require_once("../../../app/core/Table.php");
require_once("../../../config/config.php");
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
$xml = file_get_contents('php://input');
$data = json_decode($xml, true);
$user = new User();

if(isset($data["username"])){
    $username = $data["username"];
    $result = $user->getUserByUsername($username);
    if($result == null){
        // Kalau result = null, berarti username belum ada 
        echo json_encode(array("status" => "success","message" => "username hasnt exists"));
    }else{
        // Kalau tidak null, berarti username sudah dimiliki 
        echo json_encode(array("status"=>"fail","message"=>"Username has already existed"));
    }
}

if(isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["user_role"])){
    $admin = new Admin;
    $user_role = $_POST["user_role"];
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $password=$_POST["password"];
    $rows = $admin->register_user($fullname,$username,$password,$user_role);
    if($rows){
        $_SESSION["success"] = "Sucesfully register users!";
    }else{
        $_SESSION["error"] = "Register error!";
    }
    header('Location: /admin/users');
    exit;
}
?>