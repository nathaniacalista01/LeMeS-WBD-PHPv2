<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Course Detail</title>
        <link rel="stylesheet" href="../../public/css/course/detail.css">
        <script src="../../public/js/detail.js"></script>
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
                    <?php
                        $course = $data["course"];
                        echo "<h1 class='course'>$course[title]</h1>";
                    ?>
                </div>
                <div class="course-section">
                    <div class="modules">
                        <ul class="module-list">
                            <li>
                                <?php 
                                    $course = $data["course"];

                                    echo "<a href='/course/preview/$course[course_id]'>
                                        <span class='module-name'>Introduction</span>
                                    </a>"
                                ?>
                    
                            </li>

                            <!-- ITERATE HERE TO  LIST THE MODULES -->
                            <?php
                                $modules = $data["modules"];
                                foreach ($modules as $module) {
                                    # code...
                                    echo "<li onclick='openModule(\"$module[title]\",\"$module[description]\")'>
                                            <a href='#'>
                                                <span class='module-name'>$module[title]</span>
                                            </a>
                                        </li>";
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="material-box">
                        <div class="titles">
                            <h3 id="course-title"><?php 
                                $course = $data["course"];
                                echo $course["title"];
                            ?></h3>
                        </div>
                        <div class="material-content">
                            <div class="material-text">
                                <p id="course-desc"><?php $course = $data["course"]; echo $course["description"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>         
    </body>
</html>