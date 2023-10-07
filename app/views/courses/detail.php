<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail</title>
    <link rel="stylesheet" href="../../public/css/course/detail.css">
    <script src="../../public/js/profile.js" defer></script>
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
    <section class='popup-section'>
        <div class='popup-overlay'></div>
        <div class='popup-box'>
            <form class="addForm" action='javascript:' onsubmit=''>
                <div class="addForm-header">
                    Add Module
                </div>
                <div class="addForm-element">
                    <label for="moduleName">Module Name (Max 100 char)</label>
                    <textarea class='name-area' type="text" id="moduleName" maxlength='100' onkeyup='check_area()'></textarea>
                </div>
                <div class="addForm-element">
                    <label for="moduleDescription">Description (Max 256 char)</label>
                    <textarea class='desc-area' id="moduleDescription" maxlength="256" onkeyup='check_area()'></textarea>
                </div>
                <div class="addForm-element">
                    <div class='popup-buttons'>
                        <button type='button' class='cancel-save' id='cancel-save'>Cancel</button>
                        <button type='submit' class='confirm-save' id='confirm-save' disabled>Add</button>
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
                    <a href="/course">
                        <div class="header-intro">
                            <p>Introduction</p>
                        </div>
                    </a>
                    <div class="table-container">
                        <table class="table-module">
                            <tbody>
                                <?php
                                $modules = $data["modules"];
                                foreach ($modules as $module) {
                                    # code...
                                    echo "
                                            <tr>
                                                <td>
                                                    <div class='row-container'>
                                                        <div class='module-title' onclick='openModule(\"$module[title]\",\"$module[description]\")'>
                                                            <span>Module X ash</span>
                                                        </div>
                                                        <div class='actions'>
                                                            <a href='!'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);'>
                                                                    <path fill='#564C95' d='m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z'></path>
                                                                    <path fill='#564C95' d='M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z'></path>
                                                                </svg>
                                                            </a>
                                                            <a href='?'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' style='fill: #564C95 ;'>
                                                                    <path d='M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z'></path>
                                                                </svg>
                                                            </a>
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
                    <span>
                        <div class='add-module-section' onclick='confirmChanges()'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'>
                                <path d='M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z' />
                                <path d='M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z' />
                            </svg>
                        </div>
                    </span>
                </div>
                <div class="material-box">
                    <div class="titles">
                        <h3 id="course-title">
                            Introduction
                        </h3>
                    </div>
                    <div class="material-content">
                        <div class="material-text">
                            <p id="course-desc">
                                <?php
                                foreach ($data as $key => $value) {
                                    echo "Key: " . $key . ", Value: " . $value . "<br>";
                                };
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>