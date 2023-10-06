<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/admin/editUser.css">
    <script src="../../public/js/admin/edit.js" defer></script>
</head>
<body>
    <?php include __DIR__ . '/../navbar/navbar.php'?>
    <?php
        if(isset($_SESSION["error"])){
            $message = $_SESSION["error"];
            $type = "error";
            include(__DIR__."/../components/alertBox.php");
            unset($_SESSION["error"]);
        }
    ?>
    <div id="popup-container">
        <div class="popup-content">
            <h1>Are you sure you want to update user?</h1>
            <div class="button-container">
                <button id="cancel-btn" class="cancel-btn">Cancel</button>
                <button id="confirm-btn" class="update-btn">Update</button>
            </div>
        </div>
    </div>
    <div  class="form-container">
        <form method="POST" id="update-form" action="/api/admin/user/edit.php">
            <h1 id="form-title">Edit user with id <?php echo $data["user"]["user_id"] ?></h1>
            <input type="hidden" name="user_id" value = <?php echo $data["user"]["user_id"] ?> />
            <div class="login-box" id="fullname-box">
                <input type="text" 
                    placeholder="Full Name"
                    name="fullname"
                    id="fullname-input" 
                    class="login-input"
                    required
                    value = <?php echo $data["user"]["fullname"] ?>
                    onkeyup="check_fullname()"
                />
            </div>
            <p id="fullname-alert"></p>
            <div class="login-box" id="username-box">
                <input type="text" 
                    placeholder="Username" 
                    id="username-input" 
                    name="username" 
                    class="login-input" 
                    value = <?php echo $data["user"]["username"] ?>
                    required
                    onkeyup="check_username()"
                />
            </div>
            <p id="username-alert"></p>
            <div class="button-container">
                <button id = "back-button" class="back-btn">Back</button>
                <button type="submit" class="update-btn" id="update-button" disabled>Update</button>
            </div>
        </form>
    </div>
</body>
</html>