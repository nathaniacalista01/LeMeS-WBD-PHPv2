<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link href="../../public/css/home/home.css" rel="stylesheet">
    <script src="../../public/js/home.js" defer></script>
    <script src="../../public/js/search.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION["user_id"])){
            $user = new User;
            $enrolled_courses = $user->getAllCoursesEnrolled();
        }
        if(isset($_SESSION["success"])){
            $message = $_SESSION["success"];
            $type = "success";
            include(__DIR__."/../components/alertBox.php");
            unset($_SESSION["success"]);
        }
        if(isset($_SESSION["error"])){
            $message = $_SESSION["error"];
            $type = "error";
            include(__DIR__."/../components/alertBox.php");
            unset($_SESSION["error"]);
        }
    ?>

    <?php include __DIR__ . '/../navbar/navbar.php'?>
    <section class="home-section">

    <!-- HEADER SLIDESHOW -->

        <div class="header">
            <div class="slideshow-container">
    
                <div class="mySlides fade">
                    <img src="../../public/asset/banner1.png" style="width:100%">
                </div>
    
                <div class="mySlides fade">
                    <img src="../../public/asset/banner2.png" style="width:100%">
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>
        </div>

    <!-- COURSES CARDS -->
        
        <div class="card-container">
            <div class="cards grid-row">

                <!-- Iterate through database the courses and put into this card -->
                <?php
                    $model = new Course();
                    $courses = $data["courses"];
                    foreach ($courses as $course ) {
                        $joined = false;
                        if(isset($_SESSION["user_id"])){
                            $rows = $model->search_participant($course["course_id"]);
                            if($rows){
                                $joined = true;
                            }
                        }
                        $image_path = isset($course["image_path"]) ? $course["image_path"]:"../../public/asset/banner1.png";
                        $formattedDate = date('d-m-y', strtotime($course['release_date']));
                        echo"
                        <div class='card' onclick='openModal(\"$joined\",\"$course[course_id]\",\"$course[title]\",\"$course[description]\",\"$formattedDate\",\"$course[course_password]\")' style='cursor: pointer;'>
                            <div class='card-top'>
                                <img src='$image_path' alt='Blog Name'>
                            </div>
                            <div class='card-info'>
                                <div class='course-name'>
                                    <h2>$course[title]</h2>
                                </div>
                                <span class='lecturer'>$course[description]</span>
                            </div>
                            <div class='card-bottom flex-row'>
                                <p>$formattedDate</p>
                            </div>
                        </div>
                        ";
                    }
                ?>
            </div>
        </div>

        <div id="overlay">
            <dialog id="dialog">
                <div class="modal-container">
                    <div class="flex">
                        <p id="upload-date"></p>
                        <button class="close-btn" onclick="closeDialog()">
                            <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"/>
                                <path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"/>
                            </svg>
                            </i>
                        </button>
                    </div>
                    <div class="title"><h3 id="course-title"></h3></div>
                    <div class="description">
                        <p id="course-desc">
                        </p>
                        <p style="display:none" id="course_id"></p>
                    </div>
                    <div class="buttons-enroll" id="button">
                        <button id="course-detail" class="enroll-btn" style="visibiility:hidden;" onclick='visitCourse()'>Go to this course</button>
                        <!-- <div class="lecturer"><h4>Lecturer: Bapak saya, kakek, nenek, pak dosen</h4></div> -->
                        <div class="wrapper">
                            <input placeholder="Enter course password" id="password-input" type="hidden" />
                            <button class='enroll-btn' id="enroll-btn" onclick='enrolled()'>Enroll this Course</button>
                        </div>
                        
                    </div>
                </div>
            </dialog>
        </div>

        <?php 
            $parent = "course";
            $href = $data["type"];
            include __DIR__ . '/../components/pagination.php'
        ?>
    </section>
</body>
</html>