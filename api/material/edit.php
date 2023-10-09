<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/Material.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");

    if(isset($_POST["material_id"]) && isset($_POST["title"]) && isset($_POST["description"])){
        $material = new Material();
        $material_id = $_POST["material_id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $material_type = "";
        $saved_file = "";
        if(isset($_FILES["material_path"]["name"])){
            echo ($_FILES["material_path"]["name"]);
            $directory = "../../public/file/";
            $file_name = $_FILES["material_path"]["name"];
            $cleaned_file_name = str_replace(' ','',$file_name);
            $targeted_file = $directory . basename($cleaned_file_name);
            $material_file = "/public/file/" . basename($cleaned_file_name);  
            $type = strtolower(pathinfo($targeted_file,PATHINFO_EXTENSION));
            if($type == "pdf"){
                $material_type = "pdf";
            } else{
                $material_type = "video";
            }
            
            $response = move_uploaded_file($_FILES["material_path"]["tmp_name"],$targeted_file);
            $saved_file = $material_file;
        }

        $deleted_material = $material->single_material($_POST["material_id"]);
        $rm_file = 'rm ../..' . $deleted_material["material_path"];
        exec($rm_file);
        
        $rows = $material->update_material($material_id,$title,$description,$material_type,$saved_file);
        if($rows){
            http_response_code(200);
            $_SESSION["success"] = "Material has sucesfully updated";
            echo json_encode(array("status" => "success","message" =>"Material sucesfully updated"));
        }else{
            echo json_encode(array("status" => "failed","message" => "Something went wrong"));
        }
    } else{
        http_response_code(400);
        echo json_encode(array("message" => "Bad request."));
    }
?>