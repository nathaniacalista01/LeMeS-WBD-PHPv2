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
            <h1>Are you sure you want to update course?</h1>
            <div class="button-container">
                <button id="cancel-btn" class="cancel-btn">Cancel</button>
                <button id="confirm-btn" class="update-btn">Update</button>
            </div>
        </div>
    </div>
    <div class="form-container">
        <form method="POST" id="update-form" action="/api/admin/course/edit.php" enctype="multipart/form-data">
            <input type="hidden" name="course_id" value = <?php echo $data["course"]["course_id"] ?> />
            <input type="hidden" id="old-title" value = <?php echo $data["course"]["title"] ?> />
            <input type="hidden" id="old-description" value = <?php echo $data["course"]["description"] ?> />
            <input type ="hidden" id="old-password" name="old_password" value = <?php echo $data["course"]["course_password"] ?> />
            <div class="image-container">
                <input type="hidden" id="oldPicture" name="old_image" value=<?php echo $data["course"]["image_path"] ?> />
                <img class="picture" src=<?php echo $data["course"]["image_path"] ?> id="course-image" />
            </div>
            <div class="login-box" id="username-box">
                <input type="text" 
                    placeholder="Title" 
                    id="title-input" 
                    name="title" 
                    class="login-input" 
                    value = <?php echo $data["course"]["title"] ?>
                    required
                    onkeyup="check_title()"
                />
                <p id ="title-alert"></p>
            </div>
            <div class="login-box" id="fullname-box">
                <input type="text" 
                    placeholder="Description"
                    name="description"
                    id="desc-input" 
                    class="login-input"
                    required
                    value = <?php echo $data["course"]["description"] ?>
                    onkeyup="check_desc()"
                />
                <p id="desc-alert"></p>
            </div>
            <div class="login-box" id="fullname-box">
                <input type="text" 
                    placeholder="Course Password"
                    name="course_password"
                    id="password-input" 
                    class="login-input"
                    required
                    value = <?php echo ($data["course"]["course_password"] ?  $data["course"]["course_password"] : "") ?>
                />
            </div>
            <div class="login-box">
                <label for="image" class="img-label">                 
                    <input 
                        type="file" 
                        name="image" 
                        class="image-select" 
                        accept="image/png, image/jpeg, image/jpg" 
                        id="image-input" 
                        onchange="handleUpload()";
                    />
                </label>
            </div>
            <div class="button-container">
                <button id = "back-button" class="back-btn">Back</button>
                <button type="submit" class="update-btn" id="update-button">Update</button>
            </div>
        </form>
    </div>
</body>
</html>