<?php
    session_start();
    if(isset($_SESSION["user_id"])){
        unset($_SESSION["user_id"]);
        
    }
    if(isset($_SESSION["courses_enrolled"])){
        unset($_SESSION["courses_enrolled"]);
    }
    header("Location: /login");
    exit;
?>