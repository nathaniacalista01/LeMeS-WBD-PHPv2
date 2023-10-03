<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link href="../../public/css/home/home.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="../../public/js/home.js" defer></script>
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION["success"])){
            $message = $_SESSION["success"];
            $type = "success";
            include(__DIR__."/../components/alertBox.php");
            unset($_SESSION["success"]);
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
                <?php
                    $courses = $data["courses"];
                    foreach ($courses as $course ) {
                        $formattedDate = date('d-m-y', strtotime($course['release_date']));
                        echo"
                        <div class='card' onclick='openModal()' style='cursor: pointer;'>
                            <div class='card-top'>
                                <img src='../../public/asset/banner1.png' alt='Blog Name'>
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

        <div id="overlay" onclick="closeDialog()">
            <dialog id="dialog">
                <div class="modal-container">
                    <div class="flex">
                        <p>tanggal upload kelas</p>
                        <button class="close-btn"><i class='bx bx-x-circle'></i></button>
                    </div>
                    <div class="title"><h3>Judul Course</h3></div>
                    <div class="description">
                        <p>
                            course ini adalah matkul asdlklwa aaaaaaa aaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaa aaaaaaa aaaaaa aaaaaaaa aaaaaassssssssasdasdgasdadssassssssssssssssssassssssssasddasdasvcasdasaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaa
                        </p>
                    </div>
                    <div class="lecturer"><h4>Lecturer: Bapak saya, kakek, nenek, pak dosen</h4></div>
                    <div class="buttons-enroll">
                        <button class="enroll-btn">Enroll this Course</button>  <!-- IF WANT TO ENROLL CLICK HERE -->
                    </div>
                </div>
            </dialog>
        </div>

        <div class="paging">
            <div class="pagination">
                <a href=""><i class='bx bxs-chevron-left' ></i>PREV &nbsp;</a>
                <?php 
                    $start_index = 0; 
                    for($i =$start_index; $i < $start_index+4;$i++){
                        $number = $i+1;
                        echo "<a href='/course/lists/page=$number' class='' id='pagination-number'>$number</a>";
                    }
                ?>
               
                <a href="">...</a>
                <a href=""><?php echo $data["total_page"] ?></a>
                <a href=""> &nbsp;  NEXT <i class='bx bxs-chevron-right' ></i></a>
            </div>
        </div>
    </section>
</body>
</html>