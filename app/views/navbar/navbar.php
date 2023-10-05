<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Bar</title>
    <link href="../../public/css/navbar/navbar.css" rel="stylesheet">
    <script src="../../public/js/navbar.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../../public/asset/teslogo.png" alt="Homepage" class="logo-img">
            <i id="btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/>
                </svg>
            </i>
        </div>
        <ul class="nav-list">

        <!-- PROFILE PICTURE, NAME, ROLE -->
        <?php
                    if(session_status() === PHP_SESSION_NONE){
                        session_start();
                    }
                    // JIKA USER SUDAH LOGIN, PROFILE DIGANTI DENGAN FOTO, NAMA, DAN ROLE
                    if(isset($_SESSION["user_id"])){
                    // Fetch the user by ID
                        $user = new User;
                        $thisUser = $user->getUserById($_SESSION["user_id"]);
                        echo " 
                        <li>
                            <div class='profile-details'>
                                <a href='/profile'>
                                    <img src='{$thisUser['image_path']}' alt='profileImg' class='photo'/>
                                    <div class='name-job'>
                                        <div class='name'>{$thisUser['username']}</div>
                                        <div class='job'>{$thisUser['user_role']}</div>
                                    </div>
                                </a>
                                <span class='tooltip'>Profile</span>
                            </div>
                        </li>
                        ";
                    }
                    else{
                        // JIKA USER BELUM LOGIN, PROFILE MENGARAHKAN KE PAGE LOGIN
                        echo "
                        <li>
                            <div class='profile-details'>
                                <a href='/login'>
                                    <img src='../../public/image/profile/defaultprofilepicture.jpg' alt='profileImg' class='photo'/>
                                    <div class='name-job'>
                                        <div class='name'>Login</div>
                                    </div>
                                </a>
                                <span class='tooltip'>Login</span>
                            </div>
                        </li>
                        ";
                    }
        ?>
            

            <!-- HOMEPAGE BUTTON -->
            <li>
                <a href="/">
                    <i>
                        <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"/>
                        </svg>
                    </i>
                    <span class="link-name">Homepage</span>
                </a>
                <span class="tooltip">Homepage</span>
            </li>

            <!-- MY COURSES BUTTON -->
            <li>
                <a href="/course/enrolled">
                    <i>
                        <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M6 22h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3zM5 8V5c0-.805.55-.988 1-1h13v12H5V8z"/>
                            <path d="M8 6h9v2H8z"/>
                        </svg>
                    </i>
                    <span class="link-name">My Courses</span>
                </a>
                <span class="tooltip">My Courses</span>
            </li>

            <!-- ASSIGNMENTS BUTTON -->
            <li>
                <a href="#">
                <i>
                    <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M5 22h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-2a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H5c-1.103 0-2 .897-2 2v15c0 1.103.897 2 2 2zM5 5h2v2h10V5h2v15H5V5z"/>
                        <path d="m11 13.586-1.793-1.793-1.414 1.414L11 16.414l5.207-5.207-1.414-1.414z"/>
                    </svg>
                </i>
                    <span class="link-name">Assignments</span>
                </a>
                <span class="tooltip">Assignments</span>
            </li>
            
            <!-- LOGOUT BUTTON -->
                <?php
                    if(session_status() === PHP_SESSION_NONE){
                        session_start();
                    }
                    if(isset($_SESSION["user_id"])){
                        echo " 
                            <li>
                                <a href='#'>
                                    <i>
                                        <svg fill='white' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                            <path d='M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z'/>
                                            <path d='m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z'/>
                                        </svg>
                                    </i>
                                    <span class='link-name'>Setting</span>
                                </a>
                                <span class='tooltip'>Setting</span>
                        </li>
                        <li>
                            <button class='logbtn' onclick='openModalLogout()'>
                                <i id='log-out'>
                                    <svg fill='white' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                        <path d='M16 13v-2H7V8l-5 4 5 4v-3z'/>
                                        <path d='M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z'/>
                                    </svg>
                                </i>
                                <span class='link-name'>Log Out</span>
                            </button>
                            <span class='tooltip'>Log Out</span>
                        </li>
                        ";
                    }
                ?>
                
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
                <img src="../../public/asset/logout-warning.png" style="width: 100px; margin-top: 20px;">
                <h2>Logout</h2>
                <p>Are you sure want to logout?</p>
                <div class="buttons-logout">
                    <button class="close-btn-logout">Cancel</button> <!-- CANCEL LOGOUT AND CLOSE POPUP -->
                    <button class="confirm-logout"><a href="/api/auth/logout.php">Logout</a></button> <!-- IF CONFIRM TO LOGOUT CLICK HERE -->
                </div>
            </div>
        </dialog>
    </div>
</body>
</html>