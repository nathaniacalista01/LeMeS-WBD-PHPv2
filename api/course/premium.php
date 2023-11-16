<?php
    $raw = file_get_contents("http://host.docker.internal:8000/api/course");
    $data = json_decode($raw, true);
    $course = $data["data"];
    var_dump($course);
?>