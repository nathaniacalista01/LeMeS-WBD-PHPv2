<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update</title>
    <link href="../../public/css/profile/profile.css" rel="stylesheet">
    <script src="../../public/js/profile.js" defer></script>
    <script src="../../public/js/subscribe.js"></script>

</head>

<body>
    <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // JIKA USER SUDAH LOGIN, PROFILE DITUNJUKKAN
        if (isset($_SESSION["user_id"])) {
            // Fetch the user by ID
            include __DIR__ . '/../navbar/navbar.php';
            $thisUser = $user->getUserById($_SESSION["user_id"]);
        }
        if(isset($_SESSION["success"])){
            $message = $_SESSION["success"];
            $type = "success";
            include(__DIR__."/../components/alertBox.php");
            unset($_SESSION["success"]);
        }
        if(isset($_SESSION["error"])){
            $message = $_SESSION["error"];
            $type = "error";
            include(__DIR__."/../components/alertBox.php");
            unset($_SESSION["error"]);
        }
    ?>
    <section class='popup-section'>
        <div class='popup-overlay'></div>
        <div class='popup-box'>
            <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" viewBox="0 0 24 24" style="fill: rgba(255, 0, 0, 1);">
                    <path d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z"></path>
                    <path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path>
                </svg>
            </i>
            <br>
            <h3>Are you sure want to change profile?</h3>
            <br>
            <div class='popup-buttons'>
                <button type='button' class='cancel-save'>Cancel</button>
                <button type='submit' form='form-register' class='confirm-save'>Change</button>
            </div>
        </div>
    </section>
    <section class='home-section'>
        <div class='profile-forms'>
            <form class='profile-create' id='form-register' action='javascript:' onsubmit="return handleUpdate(<?= $thisUser['user_id']; ?>)">
                <h1 class='profile-title profile-toggle-fixed'>Profile</h1>
                <h1 class='profile-title profile-toggle-change'>Change Profile</h1>

                <input type='hidden' id='oldPicture' value=<?= $thisUser['image_path'] ?>>
                <div style='display: block;'>
                    <img src=<?= $thisUser['image_path'] ?> id='profilePicture' alt='profile picture'>
                </div>

                <div class='profile-toggle-change'>
                        <div class='picture-button'>
                            <label for='default-picture-button' class='delete-picture'>Delete</label>
                            <label for='files' class='change-picture'>Change</label>
                            <button type='button' id='default-picture-button' onclick='deleteProfilePictureChange();'></button>
                            <input id='files' type='file' accept='.jpg, .jpeg, .png' onchange='previewProfilePicture(this)'>
                        </div>
                </div>

                <div class='profile-box' id='fullname-box'>
                    <p>Fullname &nbsp; :</p>
                    <input type='text' 
                        placeholder='New Full Name'
                        name='fullname'
                        id='fullname-input' 
                        class='profile-input'
                        value=<?= $thisUser['fullname'] ?>
                        onkeyup = 'check_fullname()'
                        required
                        disabled
                    />
                </div>
                <p id='fullname-alert'></p>

                <input type='hidden' id='oldUsername' value=<?= $thisUser['username'] ?>>
                <div class='profile-box' id='username-box'>
                    <p>Username :</p>
                    <input type='text' 
                        placeholder='New Username' 
                        id='username-input' 
                        name='username' 
                        class='profile-input'
                        value=<?= $thisUser['username'] ?>
                        onkeyup = 'check_username()'
                        required
                        disabled
                        />
                </div>
                <p id='username-alert'></p>
                <?php
                    if($thisUser["user_role"] === "STUDENT"){
                ?>
                    <div class='profile-box' id='username-box'>
                        <p>Premium status :<span class="premium-status"> <?php echo $data['premium_status'] ?></span> </p>
                        
                    </div>
                <?php
                    }
                ?>
                <div class='profile-toggle-change'>
                    <div class='profile-box' id='password-box'>
                        <p>Password&nbsp; :</p>
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
                    <div class='change-buttons' style='display:flex;'>
                        <button type='reset' class='cancel-change-button' id='cancel-change-button' onclick='toggle(); cancelProfilePictureChange();'>Cancel</button>
                        <button type='button' class='save-button' id='save-profile-button' onclick='confirmChanges()' disabled>Save</button>
                    </div>
                </div>
                <div class='profile-toggle-fixed'>
                    <button type='button' onclick='toggle()' class='edit-button' id='profile-button'>Edit</button>
                </div>
                <div>
                    <?php 
                        if($thisUser["user_role"] === "STUDENT" &&($data['premium_status'] === "NOT PREMIUM" || $data["premium_status" === "REJECTED"])){
                    ?>
                    <button id="subscribe-button" type="button" class="edit-button" ><a href="/api/subscribe/subscribe.php">Subscribe</a></button>
                    <?php } ?>
                </div>
            </form>
        </div>
    </section>
</body>

</html>