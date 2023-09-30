<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Bar</title>
    <style><?php include __DIR__ . '../../public/css/navbar/navbar.css' ?></style>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../../../resources/teslogo.png" alt="Homepage" class="logo-img">
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <div class="profile-details">
                    <a href="#">
                        <img src="../../../resources/tesprofilepicture.svg" alt="profileImg" class="photo"/>
                        <div class="name-job">
                            <div class="name">Nama</div>
                            <div class="job">Role</div>
                        </div>
                    </a>
                    <span class="tooltip">Profile</span>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-home'></i>
                    <span class="link-name">Homepage</span>
                </a>
                <span class="tooltip">Homepage</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-book' ></i>
                    <span class="link-name">My Courses</span>
                </a>
                <span class="tooltip">My Courses</span>
            </li>
            <li>
                <a href="#">
                <i class='bx bx-task' ></i>
                    <span class="link-name">Assignments</span>
                </a>
                <span class="tooltip">Assignments</span>
            </li>
            <li>
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link-name">Setting</span>
                    </a>
                    <span class="tooltip">Setting</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-log-out' id="log-out"></i>
                        <span class="link-name">Log Out</span>
                    </a>
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
    <script>
        <?php include __DIR__ . '/navbar.js';?>
    </script>
</body>
</html>