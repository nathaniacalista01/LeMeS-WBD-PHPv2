<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In or Sign Up</title>
        <link href="../../public/css/login/login.css" rel="stylesheet">
        <script src="../../public/js/login.js" defer>
        </script>
    </head>
    <body>
        <?php 
            // Menampilkan alert
            if(isset($data["message"])){
                $message = $data["message"];
                $type = "success";
                include(__DIR__."/../components/alertBox.php");
            }
        ?>
        <?php
            if(isset($_SESSION["error"])){
                echo "Session error";
                $message = $_SESSION["error"];
                $type = "error";
                include(__DIR__."/../components/alertBox.php");
                unset($_SESSION["error"]);
            }
        ?>
        <div class="login">
            <div class="login-content">
                <div class="login-img">
                    <img src="../../public/asset/img-login.svg" alt="login">
                </div>

                <div class="login-forms">
                    <form action="/api/auth/login.php" method="post" class="login-register" id="login-in">
                        <h1 class="login-title">Sign In</h1>

                        <div class="login-box">
                            <i class='bx bx-user login-icon'></i>
                            <input type="text" 
                                placeholder="Username" 
                                name="username" 
                                id="username-input"
                                onkeyup="check_username()"
                                class="login-input"
                                required    
                            >
                        </div>
                        <p id="username-alert"></p>
                        <div class="login-box">
                            <i class='bx bx-lock-alt login-icon'></i>
                            <input 
                                type="password" 
                                placeholder="Password" 
                                name="password"
                                class="login-input"
                                required
                            >
                        </div>

                        <!-- <a href="#" class="login-forgot">Forgot password ?</a> -->

                        <button type="submit" class="login-button" id="login-button" disabled>Sign In</button>

                        <div>
                            <span class="login-account">Don't have an Account ?</span>
                            <span class="login-signin" id="sign-up"><a href="register">Sign Up</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>
