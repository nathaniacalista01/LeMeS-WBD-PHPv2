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
    if(isset($_POST["username"]) && isset($_POST["fullname"]) && isset($_POST["user_id"])){
        $admin = new Admin();
        $user_id = $_POST["user_id"];
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $rows = $admin->updateUser($username,$fullname,$user_id);
        if($rows){
            $_SESSION["success"] = "Users has been updated!";
        }else{
            $_SESSION["error"] = "Update failed!";
        }
        header("Location: /admin/users");
    }else{
        $_SESSION["error"] = "Something went wrong!";
        header("Location: /admin/users/".$_POST["user_id"]);
    }
?>