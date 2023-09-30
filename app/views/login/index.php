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
        <?php 
           
        ?>
        <div class="login">
            <div class="login-content">
                <div class="login-img">
                    <img src="../../public/asset/img-login.svg" alt="login">
                </div>

                <div class="login-forms">
                    <form action="api/login.php" method="post" class="login-register" id="login-in">
                        <h1 class="login-title">Sign In</h1>

                        <div class="login-box">
                            <i class='bx bx-user login-icon'></i>
                            <input type="text" placeholder="username" name="username" class="login-input">
                        </div>

                        <div class="login-box">
                            <i class='bx bx-lock-alt login-icon'></i>
                            <input type="password" placeholder="Password" name="password" class="login-input">
                        </div>

                        <!-- <a href="#" class="login-forgot">Forgot password ?</a> -->

                        <button type="submit" class="login-button">Sign In</button>

                        <div>
                            <span class="login-account">Don't have an Account ?</span>
                            <span class="login-signin" id="sign-up"><a href="register">Sign Up</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="../../public/js/login.js">
        </script>
    </body>
</html>
