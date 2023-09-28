<?php
    require_once("init.php");
    $app = new App;
    $db = Database::instance();
    $db->prepare("SELECT * from `users`");
?>