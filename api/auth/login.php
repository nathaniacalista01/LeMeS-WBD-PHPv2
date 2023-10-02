<?php
    require_once("../../app/core/App.php");
    require_once("../../app/core/Database.php");
    require_once("../../app/models/Student.php");
    require_once("../../app/core/Table.php");
    require_once("../../config/config.php");
    require_once("../../app/models/Teacher.php");
    $xml = file_get_contents('php://input');
    $data = json_decode($xml, true);
    $student = new Student();  
    $teacher = new Teacher();

    if(isset($data["username"])){
        $username = $data["username"];
        $result = $student->getStudentByUsername($username);
        if($result == null){
            echo json_encode(array("status" => "fail","message" => "Username doesn't exist"));
        }else{
            echo json_encode(array("status" => "success","message" => "Username exists"));
        }
    }
?>