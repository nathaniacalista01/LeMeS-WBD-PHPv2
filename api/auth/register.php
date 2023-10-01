<?php
require_once("../../app/core/App.php");
require_once("../../app/core/Database.php");
require_once("../../app/models/Student.php");
require_once("../../app/core/Table.php");

if(isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["password"])){
    $student = new Student;
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $password=$_POST["password"];
    $student->register($fullname,$username,$password);
}

?>