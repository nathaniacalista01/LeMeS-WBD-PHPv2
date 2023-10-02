<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION["success"])){
            $message = $_SESSION["success"];
            $type = "success";
            include(__DIR__."/../components/alertBox.php");
        }
    ?>
    <h1>This is home page</h1>
</body>
</html>