<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Bar</title>
    <link href="../../public/css/navbar/navbar.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="../../public/js/navbar.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../../public/asset/teslogo.png" alt="Homepage" class="logo-img">
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">

        <!-- PROFILE PICTURE, NAME, ROLE -->
            <li>
                <div class="profile-details">
                    <a href="#">
                        <img src="../../public/asset/tesprofilepicture.svg" alt="profileImg" class="photo"/>
                        <div class="name-job">
                            <div class="name">Nama</div>
                            <div class="job">Role</div>
                        </div>
                    </a>
                    <span class="tooltip">Profile</span>
                </div>
            </li>

            <!-- HOMEPAGE BUTTON -->
            <li>
                <a href="#">
                    <i class='bx bx-home'></i>
                    <span class="link-name">Homepage</span>
                </a>
                <span class="tooltip">Homepage</span>
            </li>

            <!-- MY COURSES BUTTON -->
            <li>
                <a href="#">
                    <i class='bx bx-book' ></i>
                    <span class="link-name">My Courses</span>
                </a>
                <span class="tooltip">My Courses</span>
            </li>

            <!-- ASSIGNMENTS BUTTON -->
            <li>
                <a href="#">
                <i class='bx bx-task' ></i>
                    <span class="link-name">Assignments</span>
                </a>
                <span class="tooltip">Assignments</span>
            </li>

            <!-- SETTING BUTTON -->
            <li>
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link-name">Setting</span>
                    </a>
                    <span class="tooltip">Setting</span>
                </li>

                <!-- LOGOUT BUTTON -->
                <li>
                    <button class="logbtn" onclick="openModalLogout()">
                        <i class='bx bx-log-out' id="log-out"></i>
                        <span class="link-name">Log Out</span>
                    </button>
                    <span class="tooltip">Log Out</span>
                </li>
            <div class="footer">
                <p class="text-xs">
                    <span>Copyright ©</span>
                    <br>
                    <span>IF3110-2023</span>
                    <br>
                    <span>Kelompok</span>
                    <br>
                    <span>26</span>
                    <br>
                    <br>
                </p>
            </div>    
        </ul>
    </div>

    <!-- LOGOUT POPUP CONFIRMATION -->
    <div id="overlay-logout" onclick="closeDialogLogout()">
        <dialog id="dialog-logout">
            <div class="modal-container-logout">
                <i class='bx bx-error-circle'></i>
                <h2>Logout</h2>
                <p>Are you sure want to logout?</p>
                <div class="buttons-logout">
                    <button class="close-btn-logout">Cancel</button> <!-- CANCEL LOGOUT AND CLOSE POPUP -->
                    <button class="confirm-logout">Logout</button> <!-- IF CONFIRM TO LOGOUT CLICK HERE -->
                </div>
            </div>
        </dialog>
    </div>
</body>
</html>