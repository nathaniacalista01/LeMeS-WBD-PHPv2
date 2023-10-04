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
        <?php include __DIR__ . '/../navbar/navbar.php'?>
        <section class="home-section">
            <div class="profile">
                <div class="profile-content">
                    <div class="profile-forms">
                        <form class="profile-create" id="form-register">
                            <h1 class="profile-title">Change Profile</h1>
                            <div style="display: block;">
                                <img src="../../public/asset/logout-warning.png" alt="profile picture">
                            </div>
                            <div class="change-button">
                                <label for="files" class="change-picture">Change Picture</label>
                                <input id="files" style="visibility:hidden;" type="file" accept=".jpg, .jpeg, .png">
                            </div>

                            <div class="profile-box" id="fullname-box">
                                <input type="text" 
                                    placeholder="Full Name"
                                    name="fullname"
                                    id="fullname-input" 
                                    class="profile-input"
                                    onkeyup = "check_fullname()"
                                    required
                                />
                            </div>
                            <p id="fullname-alert"></p>
                            <div class="profile-box" id="username-box">
                                <input type="text" 
                                    placeholder="Username" 
                                    id="username-input" 
                                    name="username" 
                                    class="profile-input" 
                                    onkeyup="check_username()"
                                    required
                                    />
                            </div>
                            <p id="username-alert"></p>
                            <div class="profile-box" id="password-box">
                                <input 
                                    type="password" 
                                    placeholder="Password" 
                                    id="password-input" 
                                    name="password" 
                                    class="profile-input"
                                    onkeyup="check_password()"
                                    required
                                />
                            </div>
                            <p id="password-alert"></p>
                            <div class="change-buttons" style="display: flex;">
                                <button class="cancel-change-button" id="cancel-change-button" disabled>Cancel</button>
                                <button type="submit" class="profile-button" id="profile-button" disabled>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
