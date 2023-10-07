<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                    <div class="wrapper">
                        <input placeholder="Enter course password" id="password-input" type="hidden" />
                        <button class='enroll-btn' id="enroll-btn" onclick='enrolled()'>Enroll this Course</button>
                    </div>
                    
                </div>
            </div>
        </dialog>
    </div>
</body>
</html>