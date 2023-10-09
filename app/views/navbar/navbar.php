<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Bar</title>
    <link href="../../public/css/navbar/navbar.css" rel="stylesheet">
    <link href="../../public/css/components/button.css" rel="stylesheet">

    <script src="../../public/js/navbar.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../../public/asset/teslogo.png" alt="Homepage" class="logo-img">
            <i id="btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="white" d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/>
                </svg>
            </i>
        </div>
        <ul class="nav-list">
        <?php
            $admin= false;
            if(isset($_SESSION["user_id"])){
                $user_modal = new User;
                $user = $user_modal->getUserById($_SESSION["user_id"]);
                if($user["user_role"] === "ADMIN"){
                    $admin = true;
                }
            }
        ?>
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
                    ?>
                        <li>
                            <div class='profile-details'>
                                <a href='/profile'>
                                    <img src= <?php echo ($thisUser["image_path"] ? $thisUser["image_path"] : "../../public/image/profile/defaultprofilepicture.jpg") ?> alt='profileImg' class='photo'/>
                                    <div class='name-job'>
                                        <div class='name'><?php echo $thisUser['username']?></div>
                                        <div class='job'><?php echo $thisUser['user_role'] ?></div>
                                    </div>
                                </a>
                                <span class='tooltip'>Profile</span>
                            </div>
                        </li>
                    <?php }
                    else{ ?>
                        <!--  JIKA USER BELUM LOGIN, PROFILE MENGARAHKAN KE PAGE LOGIN -->
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
                    <?php } ?>
            <!-- HOMEPAGE BUTTON -->
            <li>
                <a href=<?php echo ($admin ? "/admin/users" : "/") ?>>
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
                <a href=<?php echo ($admin ? "admin/courses":"/course/enrolled") ?>>
                    <i>
                        <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M6 22h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3zM5 8V5c0-.805.55-.988 1-1h13v12H5V8z"/>
                            <path d="M8 6h9v2H8z"/>
                        </svg>
                    </i>
                    <span class="link-name"><?php echo ($admin ? "Courses" : "My courses") ?></span>
                </a>
                <span class="tooltip"><?php echo ($admin ? "Courses" : "My courses") ?></span>
            </li>
            <?php if(!$admin){ ?>
            <li>
                <a href="/search">
                <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                    <path fill="white" d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                </svg>
                </i>
                    <span class="link-name">Search</span>
                </a>
                <span class="tooltip">Search</span>
            </li>
            <!-- LOGOUT BUTTON -->
                <?php
                    if(session_status() === PHP_SESSION_NONE){
                        session_start();
                    }
                    if(isset($_SESSION["user_id"])){
                    ?>
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
                    <?php } 
            }?>
            
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
                    <button class="cancelbtn">Cancel</button> <!-- CANCEL LOGOUT AND CLOSE POPUP -->
                    <button class="deletebtn"><a href="/api/auth/logout.php" class="delete-link">Logout</a></button> <!-- IF CONFIRM TO LOGOUT CLICK HERE -->
                </div>
            </div>
        </dialog>
    </div>
</body>
</html>