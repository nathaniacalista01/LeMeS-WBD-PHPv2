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
                    <form action="" method="post" class="login-create" id="login-up">
                        <h1 class="login-title">Create Account</h1>

                        <div class="login-box">
                            <i class='bx bx-user login-icon'></i>
                            <input type="text" placeholder="Full Name" name="fullname" class="login-input">
                        </div>

                        <div class="login-box">
                            <i class='bx bx-user login-icon'></i>
                            <input type="text" placeholder="Username" name="username" class="login-input">
                        </div>

                        <div class="login-box">
                            <i class="bx bx-at login-icon"></i>
                            <input type="text" placeholder="Email" name="email" class="login-input">
                        </div>

                        <div class="login-box">
                            <i class='bx bx-lock-alt login-icon'></i>
                            <input type="password" placeholder="Password" name="password" class="login-input">
                        </div>

                        <button type="submit" class="login-button">Sign Up</button>

                        <div>
                            <span class="login-account">Already have an Account ?</span>
                            <a class="login-signup" href="login" id="sign-in">Sign In</a>
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
