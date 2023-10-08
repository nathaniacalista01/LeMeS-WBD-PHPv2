<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail</title>
    <link rel="stylesheet" href="../../public/css/course/detail.css">
    <script src="../../public/js/details.js" defer></script>
</head>

<body>
    <?php
    if (isset($_SESSION["success"])) {
        $message = $_SESSION["success"];
        $type = "success";
        include(__DIR__ . "/../components/alertBox.php");
        unset($_SESSION["success"]);
    }
    ?>

    <?php include __DIR__ . '/../navbar/navbar.php' ?>

    <!-- ADD AND EDIT MODULE FORM -->
    <section class='popup-section'>
        <div class='popup-overlay'></div>
        <div class='popup-box'>
            <?php
            // Add Module Form
            $course = $data["course"];
            echo "
                <form class='addForm' action='javascript:'>
                    <div class='addForm-header'>
                        Add Module
                    </div>
                    <div class='addForm-element'>
                        <label for='moduleName'>Module Name (Max 100 char)</label>
                        <textarea class='name-area' id='moduleName' maxlength='100' onkeyup='check_area()'></textarea>
                    </div>
                    <div class='addForm-element'>
                        <label for='moduleDescription'>Description (Max 256 char)</label>
                        <textarea class='desc-area' id='moduleDescription' maxlength='256' onkeyup='check_area()'></textarea>
                    </div>
                    <div class='addForm-element'>
                        <div class='popup-buttons'>
                            <button type='button' class='cancel-save' id='cancel-save'>Cancel</button>
                            <button type='submit' class='confirm-save' id='confirm-save' disabled onclick='handleAddModule($course[course_id])'>Add</button>
                        </div>
                    </div>
                </form>
                ";
            ?>
        </div>
    </section>

    <!-- DELETE MODULE FORM -->
    <section class='popup-section2'>
        <div class='popup-overlay2'></div>
        <div class='popup-box2'>
            <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" viewBox="0 0 24 24" style="fill: rgba(255, 0, 0, 1);">
                    <path d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z"></path>
                    <path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path>
                </svg>
            </i>
            <br>
            <!-- Implemented in Javascript -->
            <h3 class='delete-warning'></h3>
            <br>
            <div class='popup-buttons2'>
                <button type='button' class='cancel-save2'>Cancel</button>
                <button type='submit' class='confirm-save2'>Delete</button>
            </div>
        </div>
    </section>

    <!-- ADD MATERIAL FORM -->
    <section class='popup-section3'>
        <div class='popup-overlay3'></div>
        <div class='popup-box3' style='height: auto;'>
            <form class='addForm' action='javascript:'>
                <div class='addForm-header'>
                    Add Material
                </div>
                <div class='addForm-element'>
                    <label for='materialName'>Material Title (Max 100 char)</label>
                    <textarea class='name-area' id='materialName' maxlength='100' onkeyup='check_area()'></textarea>
                </div>
                <div class='addForm-element'>
                    <label for='materialDescription'>Description</label>
                    <textarea class='desc-area' id='materialDescription' maxlength='256' onkeyup='check_area()'></textarea>
                </div>
                <div class='addForm-element'>
                    <label for='material-file'>Upload File</label>
                    <input type="file" id="materialFile">
                </div>
                <div class='addForm-element'>
                    <div class='popup-buttons'>
                        <button type='reset' class='cancel-save'>Cancel</button>
                        <button type='submit' class='confirm-save' disabled>Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


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
                                foreach ($modules as $module) {
                                    # code...
                                    // <!-- HIDE THE ACTION BUTTON IF USER ROLE IS STUDENT -->
                                    echo "
                                            <tr>
                                                <td>
                                                    <div class='row-container' onclick='openModule(\"$module[title]\",\"$module[description]\")'>
                                                        <div class='module-title'>
                                                            <span>$module[title]</span>
                                                        </div>
                                                        <div class='actions'>
                                                            <i onclick='openFormEditModule(\"$course[course_id]\", \"$module[module_id]\", \"$module[title]\", \"$module[description]\")'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);'>
                                                                    <path fill='#564C95' d='m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z'></path>
                                                                    <path fill='#564C95' d='M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z'></path>
                                                                </svg>
                                                            </i>
                                                            <i onclick='openFormDeleteModule(\"$course[course_id]\", \"$module[module_id]\", \"$module[title]\")'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' style='fill: #564C95 ;'>
                                                                    <path d='M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z'></path>
                                                                </svg>
                                                            </i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        ";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- HIDE THIS ADD MODULE SECTION IF USER ROLE IS STUDENT  -->
                    <span>
                        <div class='add-module-section' onclick='openFormAddModule()'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'>
                                <path d='M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z' />
                                <path d='M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z' />
                            </svg>
                        </div>
                    </span>
                </div>
                <div class="module-material-container">
                    <div class="material-box">
                        <div class="titles">
                            <?php
                            $course = $data["course"];
                            echo "<h3 id='course-title'>$course[title]</h3>";
                            ?>
                        </div>
                        <div class="material-content">
                            <div class="material-text">
                                <p id="course-desc">
                                    Welcome to this course!
                                </p>
                            </div>
                            <div class="accordion">
                                <div class="accordion-content">
                                    <header>
                                        <span class="title">What do you mean by Accordion?</span>
                                        <i class="fa-solid fa-plus"></i>
                                    </header>
                                    <p class="description">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus nobis ut perspiciatis minima quidem nisi, obcaecati, delectus consequatur fuga nostrum iusto ipsam ducimus quibusdam possimus. Maiores non enim numquam voluptatem?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- HIDE THIS ADD BUTTON IF USER ROLE IS STUDENT -->
                    <div class="button-container">
                        <button class="addMaterial" onclick='openFormAddMaterial()'>
                            Add Material
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>