<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update</title>
    <link href="../../public/css/profile/profile.css" rel="stylesheet">
    <script src="../../public/js/profile.js" defer></script>
</head>
<body>
    <?php
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        // JIKA USER SUDAH LOGIN, PROFILE DITUNJUKKAN
        if(isset($_SESSION["user_id"])){
        // Fetch the user by ID
            $user = new User;
            $thisUser = $user->getUserById($_SESSION["user_id"]);
            include __DIR__ . '/../navbar/navbar.php';
            echo " 
                <section class='home-section'>
                    <div class='profile'>
                        <div class='profile-content'>
                            <div class='profile-forms'>
                                <form class='profile-create' id='form-register' action='javascript:' onsubmit='return handleUpdate({$thisUser['user_id']})'>
                                    <h1 class='profile-title profile-toggle-fixed'>Profile</h1>
                                    <h1 class='profile-title profile-toggle-change'>Change Profile</h1>

                                    <input type='hidden' id='oldPicture' value='{$thisUser['image_path']}'>
                                    <script>console.log({$thisUser['image_path']});</script>
                                    <div style='display: block;'>
                                        <img src='{$thisUser['image_path']}' id='profilePicture' alt='profile picture' style='width: 80px; height: 80px; object-fit: contain'>
                                    </div>

                                    <div class='change-button profile-toggle-change'>
                                        <label for='files' class='change-picture'>Change Picture</label>
                                        <input id='files' style='visibility:hidden;' type='file' accept='.jpg, .jpeg, .png' onchange='previewProfilePicture()'>
                                    </div>
        
                                    <div class='profile-box' id='fullname-box'>
                                        <input type='text' 
                                            placeholder='New Full Name'
                                            name='fullname'
                                            id='fullname-input' 
                                            class='profile-input'
                                            value='{$thisUser['fullname']}'
                                            onkeyup = 'check_fullname()'
                                            required
                                            disabled
                                        />
                                    </div>
                                    <p id='fullname-alert'></p>

                                    <input type='hidden' id='oldUsername' value='{$thisUser['username']}'>
                                    <div class='profile-box' id='username-box'>
                                        <input type='text' 
                                            placeholder='New Username' 
                                            id='username-input' 
                                            name='username' 
                                            class='profile-input'
                                            value='{$thisUser['username']}'
                                            onkeyup = 'check_username()'
                                            required
                                            disabled
                                            />
                                    </div>
                                    <p id='username-alert'></p>

                                    <div class='profile-toggle-change'>
                                        <div class='profile-box' id='password-box'>
                                            <input 
                                            type='password' 
                                            placeholder='New Password (optional)' 
                                            id='password-input' 
                                            name='password' 
                                            class='profile-input'
                                            onkeyup='check_password()'
                                            disabled
                                            />
                                        </div>
                                    </div>
                                    <p id='password-alert'></p>
                                    <div class='profile-toggle-change'>
                                        <div class='change-buttons' style='display: flex;'>
                                            <button type='reset' class='cancel-change-button' id='cancel-change-button' onclick='toggle(); resetProfilePicture();'>Cancel</button>
                                            <button type='submit' class='profile-button' id='save-profile-button' disabled>Save</button>
                                        </div>
                                    </div>
                                    <div class='profile-toggle-fixed'>
                                        <button type='button' onclick='toggle()' class='profile-button' id='profile-button'>Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            ";
            }
            else{
                // JIKA USER BELUM LOGIN, PAGE PROFILE TIDAK BISA DIBUKA 
                exit;
            }    
        ?>
    </body>
</html>
