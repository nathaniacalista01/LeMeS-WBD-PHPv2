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
    if(isset($_POST["id"])){
        if(isset($_SESSION["user_id"])){
            $admin = new Admin();
            $old_user = $admin->getUserById($_POST["id"]);
            $rows = $admin->deleteUserById($_POST["id"]);    
            if($rows){
                if(isset($old_user["image_path"]) && $old_user["image_path"] !== ""){
                    $rm = 'rm ../../..'.$old_user["image_path"];
                    exec($rm);
                }
                http_response_code(200);
                $_SESSION["success"] = "User has been deleted!";
                echo json_encode(array("status" => "success"));
            }else{
                $_SESSION["error"] = "Delete failed";
                echo json_encode(array("status" => "failed"));
            }
        }else{
            $_SESSION["error"] = "You need to login first!";
            header("Location: /login");
            exit;
        }
    }else{
        http_response_code(500);
    }
    

?>