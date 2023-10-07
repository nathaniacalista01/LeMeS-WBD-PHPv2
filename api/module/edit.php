<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/Module.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");

    if(isset($_POST["module_id"]) && isset($_POST["title"]) && isset($_POST["description"])){
        $module = new Module();
        $module_id = $_POST["module_id"];
        $description = $_POST["description"];
        $title = $_POST["title"];
        $rows = $module->update_module($title,$description,$module_id);
        if($rows){
            $_SESSION["success"] = "Module has been updated!";
        }else{
            $_SESSION["error"] = "Update failed!";
        }
    }else{
        $_SESSION["error"] = "Something went wrong!";
    }
?>