<?php
    require_once("core/App.php");
    require_once("core/Controller.php");
    require_once("core/Database.php");
    require_once("core/Table.php");
    require_once("core/Seed.php");
    require_once("models/User.php");
    require_once("models/Course.php");
    require_once("models/Material.php");
    $app = new App;
    $database = Database::instance();
    // Uncomment ini cuma pas awal2 ya (pas mau nge seed aja)
    // $seed = new Seed;
?>