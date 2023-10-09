<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/Material.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");

    if(isset($_POST["material_id"])){
            $material = new Material();
            
            $deleted_material = $material->single_material($_POST["material_id"]);
            $rm_file = 'rm ../..' . $deleted_material["material_path"];
            exec($rm_file);

            $rows = $material->delete_material($_POST["material_id"]);
            if($rows){
                http_response_code(200);
                $_SESSION["success"] = "Material has been deleted!";
                echo json_encode(array("status" => "success"));
            }else{
                $_SESSION["error"] = "Delete failed";
                echo json_encode(array("status" => "failed"));
            }
    }else{
        http_response_code(500);
    }
?>