<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/alertBox.css" rel="stylesheet">
    <script src="../../public/js/alertBox.js" defer>
        </script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class=<?php echo $type ?> id="alert-box">
            <?php echo $message ?>
        </div>
    </div>
    
</body>
</html>