<?php
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/User.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    $xml = file_get_contents('php://input');
    $data = json_decode($xml, true);
    $user = new User();
    $old_username = $data["oldUsername"];
    if(isset($data["username"])){
        $username = $data["username"];
        $result = $user->getUserByUsername($username);
        if($result == null){
            // Kalau result = null
            echo json_encode(array("status" => "success","message" => "username hasnt exists"));
        } else{
            if($username == $old_username){
                echo json_encode(array("status" => "success","message" => "username hasnt exists"));
            } else{
                // Kalau tidak null, berarti username sudah dimiliki 
                echo json_encode(array("status"=>"fail","message"=>"Username has already existed"));
            }
        }
    }
?>