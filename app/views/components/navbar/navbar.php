<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Bar</title>
    <style><?php include __DIR__ . '/navbar.css' ?></style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../../../resources/teslogo.png" alt="Homepage" class="logo-img">
            <img src="../../../resources/bars-solid.svg" alt="Show More" id="btn">
        </div>
        <ul class="nav-list">
            <li>
                <a href="#">
                <img src="../../../resources/house-solid.svg" alt="Homepage" class="icon">
                    <span class="links_name">Homepage</span>
                </a>
                <span class="tooltip">Homepage</span>
            </li>
            <li>
                <a href="#">
                <img src="../../../resources/users-solid.svg" alt="My Courses" class="icon">
                    <span class="links_name">My Courses</span>
                </a>
                <span class="tooltip">My Courses</span>
            </li>
            <li>
                <a href="#">
                <img src="../../../resources/file-solid.svg" alt="Assignments" class="icon file">
                    <span class="links_name">Assignments</span>
                </a>
                <span class="tooltip">Assignments</span>
            </li>
            <li>
                <a href="#">
                <img src="../../../resources/gear-solid.svg" alt="Setting" class="icon">
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="../../../resources/user-solid.svg" alt="profileImg" class="icon"/>
                    <div class="name_job">
                        <div class="name">Nama</div>
                        <div class="job">Role</div>
                    </div>
                </div>
                <img src="../../../resources/out-solid.svg" alt="Log Out" id="log_out" class="icon">
            </li>
        </ul>
    </div>
    <script>
        <?php include __DIR__ . '/navbar.js';?>
    </script>
</body>
</html>