<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/Module.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");

    if(isset($_POST["module_id"])){
            $module = new Module();
            $rows = $module->delete_module($_POST["module_id"]);    
            if($rows){
                http_response_code(200);
                $_SESSION["success"] = "Module has been deleted!";
                echo json_encode(array("status" => "success"));
            }else{
                $_SESSION["error"] = "Delete failed";
                echo json_encode(array("status" => "failed"));
            }
    }else{
        http_response_code(500);
    }
?>