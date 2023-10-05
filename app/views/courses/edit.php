<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/course/add.css" rel="stylesheet"></link>
    <title>Document</title>
    <script src="../../public/js/course.js">
    </script>
</head>
<body>
    <?php include __DIR__ . '/../navbar/navbar.php'?>
    <section class="form-section">
        <div class="form-container">
            <h1>
                Edit <?php $course=$data["course"]; echo $course["title"] ?>
            </h1>
            <form class="form" action="javascript:" onsubmit="return handleUpdate()">
                <div class="image-container">
                    <?php
                        $course = $data["course"];
                        if($course["image_path"]){
                            echo "<img src=$course[image_path] id='course-image' class='course-image' alt='$course[title]' />";
                        }
                    ?>
                </div>
                <div class="edit-detail-container">
                    <label>Course's Title</label><br>
                    <input 
                        name="title" 
                        placeholder="Course's title" 
                        class="login-input" 
                        id="title-input" 
                        onkeyup="checkTitle()" 
                        value=<?php echo $course["title"] ?>
                    /> 
                    <p id="title-alert"></p><br>
                    <label>Enter descriptions for this course</label> <br>
                    <input 
                        placeholder="Enter Description" 
                        class="login-input" 
                        name="description" 
                        id="description-input"
                        value=<?php echo $course["description"] ?>
                    /> <br> <br>
                    <label>Customize course's image</label> <br>
                    <input type="file" name="image" class="login-input" accept="image/png, image/jpeg" id="image-input" />
                    <button type="submit">Edit Course</button>
                </div>
            
            </form> 
        </div>
    </section>
</body>
</html>