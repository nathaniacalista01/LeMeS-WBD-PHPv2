<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/course/detail.css">
    <script src="../../public/js/details.js" defer></script>
    <script src="../../public/js/detailsModule.js" defer></script>
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
                                foreach ($modules as $module) {?>
                                    <tr>
                                        <td>
                                            <a href='/premium/module/<?php echo $module["id"]; ?>' style='text-decoration: none; cursor: pointer;  display: block; width: 100%;'>
                                                <div class='row-container'>
                                                    <div class='module-title'>
                                                        <span><?php echo $module['title'] ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="module-material-container">
                    <div class="material-box">
                        <div class="titles">
                            <?php
                            $module = $data["module"];
                            echo "<h3 id='course-title'>$module[title]</h3>";
                            ?>
                        </div>
                        <div class="material-content">
                            <div class="material-text">
                                <p id="course-desc">
                                <?php
                                    $module = $data["module"];
                                    echo "<h3 id='course-title'>$module[description]</h3>";
                                ?>
                                </p>
                            </div>

                            <?php
                            $materials = $data["materials"];
                            
                            foreach ($materials as $material) {
                                $path = "http://localhost:8000/file/".$material["material_path"] ;
                            echo"
                            <div class='accordion'>
                                <div class='accordion-content' style='display: flex; justify-content: space-between;'>
                                    <div class='judul' style='width:94%'>
                                        <header>
                                            <span class='title'>$material[title]</span>
                                            <i class='fa-solid fa-plus'></i>
                                        </header>
                                        ";
                                        if ($material['source_type'] == "PDF"){
                                            echo "
                                        <div class='description'>
                                            <span>$material[description]<span>
                                            <br>
                                            <br>
                                            <object data='$path' type='application/pdf' width='100%' height='800'>
                                                <p>It appears your web browser doesn't support embedding PDFs.</p>
                                            </object>
                                        </div>
                                    </div>
                                    
                                ";
                            } else{ ?>
                                <div class='description'>
                                    <span><?php echo $material["description"] ?><span>
                                    <br>
                                    <br>
                                    <video width='100%' height=auto controls>
                                        <source src=<?php echo $path?> type='video/mp4'>
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                </div>
                                <?php } ?>
                              
                                    
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>