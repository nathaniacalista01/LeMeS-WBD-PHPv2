<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link href="../../public/css/home/home.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
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
                    <i class='bx bxs-chevron-down'></i>
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
                <i class='bx bxs-chevron-down'></i>
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
                
                <div class="card">
                    <div class="card-top">
                        <img src="../../public/asset/banner1.png" alt="Blog Name">
                    </div>
                    <div class="card-info">
                        <div class="course-name">
                            <h2>First Course</h2>
                        </div>
                        <span class="lecturer">Lecturer 1</span>
                    </div>
                    <div class="card-bottom flex-row">
                        <a href="#" class="course-btn">Course Detail</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                        <img src="../../public/asset/banner2.png" alt="Blog Name">
                    </div>
                    <div class="card-info">
                        <div class="course-name">
                            <h2>Usual Course 2 lalala</h2>
                        </div>
                            <span class="lecturer">Lecture 2</span>
                    </div>
                    <div class="card-bottom flex-row">
                        <a href="#" class="course-btn">Course Detail</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                        <img src="../../public/asset/banner1.png" alt="Blog Name">
                    </div>
                    <div class="card-info">
                        <div class="course-name">
                            <h2>This is course 3 that the title is overflow because of too long</h2>
                        </div>
                        <span class="lecturer">Lecturer 3</span>
                    </div>
                    <div class="card-bottom flex-row">
                        <a href="#" class="course-btn">Course Detail</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                        <img src="../../public/asset/banner2.png" alt="Blog Name">
                    </div>
                    <div class="card-info">
                        <div class="course-name">
                            <h2>Course 4</h2>
                        </div>
                        <span class="lecturer">Lecturer 4</span>
                    </div>
                    <div class="card-bottom flex-row">
                        <a href="#" class="course-btn">Course Detail</a>
                    </div>
                </div>
            </div>		
        </div>
    </section>
    <script>
        <?php include __DIR__ . '/home.js';?>
    </script>
</body>
</html>