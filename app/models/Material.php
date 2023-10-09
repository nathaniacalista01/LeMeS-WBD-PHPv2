<?php
require_once(__DIR__."/Model.php");
class Material extends Model{
    public function __construct(){
        parent::__construct("materials");
    }
    public function add_material($module_id,$title,$description,$material_type,$material_path){
        $query = "INSERT INTO materials(module_id,title,description,material_type,material_path) VALUES (:module_id,:title,:description,:material_type,:material_path)";
        $this->database->query($query);
        $this->database->bind("module_id",$module_id);
        $this->database->bind("title",$title);
        $this->database->bind("description",$description);
        $this->database->bind("material_type",$material_type);
        $this->database->bind("material_path",$material_path);
        $this->database->execute();
        return $this->database->rowCount();
    }
    public function delete_material($material_id){
        $query = "DELETE FROM materials WHERE material_id = :material_id";
        $this->database->query($query);
        $this->database->bind("material_id",$material_id);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function update_material($material_id,$title,$description,$material_type,$material_path){
        $query = "UPDATE materials SET title = :title, description = :description, material_type = :material_type, material_path = :material_path WHERE material_id = :material_id";
        $this->database->query($query);
        $this->database->bind("material_id",$material_id);
        $this->database->bind("title",$title);
        $this->database->bind("description",$description);
        $this->database->bind("material_type",$material_type);
        $this->database->bind("material_path",$material_path);
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function single_material($id){
        $query = "SELECT * FROM materials WHERE material_id = :material_id";
        $this->database->query($query);
        $this->database->bind("material_id",$id);
        $result = $this->database->single_fetch();
        return $result;            
    }

}
?>