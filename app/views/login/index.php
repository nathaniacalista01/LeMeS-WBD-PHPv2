<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In or Sign Up</title>
        <link href="../../public/css/login/login.css" rel="stylesheet">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class="login">
            <div class="login-content">
                <div class="login-img">
                    <img src="../../public/asset/img-login.svg" alt="login">
                </div>

                <div class="login-forms">
                    <form action="" class="login-register" id="login-in">
                        <h1 class="login-title">Sign In</h1>

                        <div class="login-box">
                            <i class='bx bx-user login-icon'></i>
                            <input type="text" placeholder="Username or Email" class="login-input">
                        </div>

                        <div class="login-box">
                            <i class='bx bx-lock-alt login-icon'></i>
                            <input type="password" placeholder="Password" class="login-input">
                        </div>

                        <a href="#" class="login-forgot">Forgot password ?</a>

                        <a href="#" class="login-button">Sign In</a>

                        <div>
                            <span class="login-account">Don't have an Account ?</span>
                            <span class="login-signin" id="sign-up">Sign Up</span>
                        </div>
                    </form>

                    <form action="" class="login-create none" id="login-up">
                        <h1 class="login-title">Create Account</h1>

                        <div class="login-box">
                            <i class='bx bx-user login-icon'></i>
                            <input type="text" placeholder="Username" class="login-input">
                        </div>

                        <div class="login-box">
                            <i class="bx bx-at login-icon"></i>
                            <input type="text" placeholder="Email" class="login-input">
                        </div>

                        <div class="login-box">
                            <i class='bx bx-lock-alt login-icon'></i>
                            <input type="password" placeholder="Password" class="login-input">
                        </div>

                        <a href="#" class="login-button">Sign Up</a>

                        <div>
                            <span class="login-account">Already have an Account ?</span>
                            <span class="login-signup" id="sign-in">Sign In</span>
                        </div>

                        <div class="login-social">
                            <a href="#" class="login-social-icon"><i class='bx bxl-facebook' ></i></a>
                            <a href="#" class="login-social-icon"><i class='bx bxl-twitter' ></i></a>
                            <a href="#" class="login-social-icon"><i class='bx bxl-google' ></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
        <?php include __DIR__ . '/login.js';?>
        </script>
    </body>
</html>
