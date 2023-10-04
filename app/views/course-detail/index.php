<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Course Detail</title>
        <link rel="stylesheet" href="../../public/css/course-detail/course-detail.css">
        <script src="../../public/js/course-detail.js"></script>
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
            <div class="wrapper">
                <div class="header">
                    <h1>Course Detail</h1>
                    <h3>Judul Course</h3>
                </div>
                <div class="course-section">
                    <div class="modules">
                        <ul class="module-list">
                            <li>
                                <a href="#">
                                    <span class="module-name">Introduction</span>
                                </a>
                            </li>

                            <!-- ITERATE HERE TO  LIST THE MODULES -->
                            <li>
                                <a href="#">
                                    <span class="module-name">Module - 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="module-name">Module - 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="module-name">Module - 3</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="material-box">
                        <div class="titles">
                            <h3>Introduction/Modul X</h3>
                        </div>
                        <div class="material-content">
                            <!-- IF EXIST MEDIA (FOTO/VIDEO) -->
                            <div class="material-media">
                                <!-- IF EXIST CONTENT VIDEO -->
                                <video width="320" height="240" controls>
                                    <source src="movie.mp4" type="video/mp4">
                                </video>

                                <!-- IF EXIST CONTENT PHOTO
                                <img src="" alt="content-photo" style="width: 320px; height: 240px;"></img> -->
                            </div>
                            
                            <div class="material-text">
                                <p>Materi ini adalah ini, course ini mengajarkan kalian blablablabla</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>         
    </body>
</html>