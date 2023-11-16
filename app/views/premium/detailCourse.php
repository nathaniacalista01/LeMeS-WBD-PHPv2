<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/course/detail.css">
    <script src="../../public/js/details.js" defer></script>
    <script src="../../public/js/detailsCourse.js" defer></script>
</head>
<body>
    <?php include __DIR__ . '/../navbar/navbar.php' ?>
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
                    <div class="header-intro">
                        <p>Modules</p>
                    </div>
                    <div class="table-container">
                        <table class="table-module">
                            <tbody>
                                <?php
                                $modules = $data["modules"];
                                $course = $data["course"];
                                foreach ($modules as $module) { ?>
                                    <tr>
                                        <td>
                                            <div class='row-container'>
                                                <div class='module-title' onclick='navigateToMaterials(<?php echo $module["module_id"] ?>)'>
                                                    <span><?php echo $module['title'] ?></span>
                                                </div>
                            
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="module-material-container" style='width:100%'>
                    <div class="material-box" style='width:100%'>
                        <div class="titles">
                            <?php
                            $course = $data["course"];
                            echo "<h3 id='course-title'>$course[title]</h3>";
                            ?>
                        </div>
                        <div class="material-content" style='width:auto;'>
                            <div class="material-text">
                                <p id="course-desc">
                                    Welcome to this course!
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>