<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Update</title>
        <link href="../../public/css/profile/profile.css" rel="stylesheet">
        <script src="../../public/js/profile.js" defer>
        </script>
    </head>
    <body>
        <div class="profile">
            <div class="profile-update">
                <!-- <div class="login-img">
                    <img src="../../public/asset/img-login.svg" alt="login">
                </div> -->

                <div class="profile-forms">
                    <!-- <form action="/api/auth/login.php" method="post" class="login-register" id="login-in"> -->
                        <h1 class="profile-title">Profile</h1>

                        <div class="profile-box">
                            <i class='bx bx-user profile-icon'></i>
                            <input type="text" 
                                placeholder="Username" 
                                name="username" 
                                id="username-input"
                                class="profile-input"
                                required    
                            >
                        </div>
                        <p id="username-alert"></p>
                        <div class="profile-box">
                            <i class='bx bx-user profile-icon'></i>
                            <input type="text" 
                                placeholder="Fullname" 
                                name="fullname" 
                                id="profile-input"
                                class="profile-input"
                                required    
                            >
                        </div>
                        <div class="profile-box">
                            <i class='bx bx-lock-alt profile-icon'></i>
                            <input 
                                type="password" 
                                placeholder="Password" 
                                name="password"
                                class="profile-input"
                                required
                            >
                        </div>

                        <!-- <a href="#" class="login-forgot">Forgot password ?</a> -->

                        <button type="submit" class="profile-button" id="profile-button">Save</button>

                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>
