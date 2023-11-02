<?php
    require_once("dotenv.php");
    $dir = __DIR__."/../.env";
    $dotenv = DotEnv::getInstance($dir);
    $dotenv->load();
?>