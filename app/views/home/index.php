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

    <!-- SEARCH BAR -->

        <div class="search-sort">
            <div class="search-bar">
                <div id="select">
                    <p id="selectText">All Courses</p>
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"/>
                        </svg>
                    </i>
                    <ul id="list">
                        <li class="options">All Courses</li>
                        <li class="options">Art and Design</li>
                        <li class="options">Business</li>
                        <li class="options">Math and Science</li>
                        <li class="options">Programming</li>
                    </ul>
                </div>
                <input type="text" id="inputField" placeholder="Search In All Courses">
            </div>
            <div id="sort">
                <p id="sortText">Sort By</p>
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"/>
                    </svg>
                </i>
                <ul id="sortList">
                    <li class="sort-options">Course Ascending</li>
                    <li class="sort-options">Course Descending</li>
                    <li class="sort-options">Lecturer Ascending</li>
                    <li class="sort-options">Lecturer Descending</li>
                </ul>
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

        <div class="paging">
            <div class="pagination">
                <?php 
                    $start_index = $data["page_number"]; 
                    $max_page = $data["max_page"];
                    $type = $data["type"];
                    $prev_index = $start_index <= 1 ? 1 : $start_index-1;

                    if($start_index > 1){
                        $prev_index = $start_index-1;
                        echo "<a href='/course/$type/page=$prev_index'>PREV</a>";
                    }
                    for($i =$prev_index; $i < $start_index+2;$i++){
                        if($i == $max_page){
                            break;
                        }
                        $classname = '';
                        if($i == $start_index){
                            echo "<a class='pagination-active' style='background-color:#5271e9;color:white;' id='pagination-active'>$i</a>";
                        }else{
                            echo "<a href='/course/$type/page=$i'id='pagination-number'>$i</a>";
                        }
                    }
                    if($start_index < $max_page-2){
                        echo "<a>...</a>";
                    }
                    if($start_index == $max_page){
                        echo "<a style='background-color:#5271e9;color:white;' href='/course/$type/page=$max_page'>$max_page</a>";
                    }else{
                        echo "<a href='/course/$type/page=$max_page'>$max_page</a>";
                    }
                    if($start_index < $max_page){
                        $next_index = $start_index + 1;
                        echo "<a href='/course/$type/page=$next_index'> &nbsp;  NEXT</a>";
                    }
                ?>
            </div>
        </div>
    </section>
</body>
</html>