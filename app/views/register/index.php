<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In or Sign Up</title>
        <link href="../../public/css/login/login.css" rel="stylesheet">
        <script src="../../public/js/register.js" defer>
        </script>
    </head>
    <body>
        <div class="login">
            <div class="login-content">
                <div class="login-img">
                    <img src="../../public/asset/img-login.svg" alt="login">
                </div>

                <div class="login-forms">
                    <form action="/api/auth/register.php" method="post" class="login-create" id="form-register">
                        <h1 class="login-title">Create Account</h1>

                        <div class="login-box" id="fullname-box">
                            <i class='bx bx-user login-icon'></i>
                            <input type="text" 
                                placeholder="Full Name"
                                name="fullname"
                                id="fullname-input" 
                                class="login-input"
                                onkeyup = "check_fullname()"
                                required
                            />
                        </div>
                        <p id="fullname-alert"></p>
                        <div class="login-box" id="username-box">
                            <i class='bx bx-user login-icon'></i>
                            <input type="text" 
                                placeholder="Username" 
                                id="username-input" 
                                name="username" 
                                class="login-input" 
                                onkeyup="check_username()"
                                required
                                />
                        </div>
                        <p id="username-alert"></p>
                        <div class="login-box" id="password-box">
                            <i class='bx bx-lock-alt login-icon'></i>
                            <input 
                                type="password" 
                                placeholder="Password" 
                                id="password-input" 
                                name="password" 
                                class="login-input"
                                onkeyup="check_password()"
                                required
                            />
                        </div>
                        <p id="password-alert"></p>
                        <button type="submit" class="login-button" id="login-button" disabled>Sign Up</button>
                        <div>
                            <span class="login-account">Already have an Account ?</span>
                            <a class="login-signup" href="login" id="sign-in">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

       
    </body>
</html>
