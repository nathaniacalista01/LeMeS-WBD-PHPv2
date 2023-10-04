<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/course/addCourse.css" rel="stylesheet"></link>
    <title>Document</title>
    <script src="../../public/js/addCourse.js"></script>
</head>
<body>
    <?php include __DIR__ . '/../navbar/navbar.php'?>
    <section class="form-section">
        <div class="form-container">
            <h1>
                Add New Course
            </h1>
            <form class="form" action="javascript:" onsubmit="return handleSubmit()">
                <!-- <div class="image-container">
                    
                </div> -->
                <div class="detail-container">
                    <label>Course's Title</label><br>
                    <input name="title" placeholder="Course's title" id="title-input" onkeyup="checkTitle()" /> 
                    <p id="title-alert"></p><br>
                    <label>Enter descriptions for this course</label> <br>
                    <input placeholder="Enter Description" name="description" id="description-input" /> <br> <br>
                    <label>Customize course's image</label> <br>
                    <input type="file" name="image" accept="image/png, image/jpeg" id="image-input" />
                    <button type="submit">Add Course</button>
                </div>
            
            </form>
        </div>
    </section>
</body>
</html>