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
                    <?php
                        $course = $data["course"];
                        echo "<h3>$course[title]</h3>";
                    ?>
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
                            <?php
                                $modules = $data["modules"];
                                foreach ($modules as $module) {
                                    # code...
                                    echo "<li>
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
                            <h3><?php 
                                $course = $data["course"];
                                echo $course["title"];
                            ?></h3>
                        </div>
                        <div class="material-content">
                            <div class="material-text">
                                <p><?php $course = $data["course"]; echo $course["description"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>         
    </body>
</html>