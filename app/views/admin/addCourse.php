<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Course</title>
        <link rel="stylesheet" href="../../public/css/admin/addCourse.css">
        <script src="../../public/js/admin.js" defer></script>
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
                <h1>Are you sure you want to add course?</h1>
                <div class="button-container">
                    <button id="cancel-btn" class="cancel-btn">Cancel</button>
                    <button id="confirm-btn" class="add-btn">Add</button>
                </div>
            </div>
        </div>
        <div class="form-container">
            <form method="POST" id="form" action="/api/admin/course/add.php" enctype="multipart/form-data">
                <div class="image-container">
                    <img class="picture" src="" id="course-image" />
                </div>
                <div class="login-box" id="username-box">
                <input type="text" 
                    placeholder="Title" 
                    id="title-input" 
                    name="title" 
                    class="login-input" 
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
                <button type="submit" class="add-btn" id="action-button">Add</button>
            </div>
            </form>
        </div>
    </body>
</html>