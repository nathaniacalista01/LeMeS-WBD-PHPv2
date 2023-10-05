<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(isset($_POST["id"])){
        
    }
    require_once("../../../app/models/Course.php");
    require_once("../../../app/core/App.php");
    require_once("../../../app/core/Database.php");
    require_once("../../../app/models/User.php");
    require_once("../../../app/core/Table.php");
    require_once("../../../config/config.php");

?>