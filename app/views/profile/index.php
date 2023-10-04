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
        <?php include __DIR__ . '/../navbar/navbar.php'?>
        <section class="home-section">
            <div class="profile">
                <div class="profile-content">
                    <div class="profile-forms">
                        <form class="profile-create" id="form-register">
                            <h1 class="profile-title profile-toggle-fixed">Profile</h1>
                            <h1 class="profile-title profile-toggle-change">Change Profile</h1>
                            <div style="display: block;">
                                <img src="../../public/asset/logout-warning.png" alt="profile picture">
                            </div>
                            <div class="change-button profile-toggle-change">
                                <label for="files" class="change-picture">Change Picture</label>
                                <input id="files" style="visibility:hidden;" type="file" accept=".jpg, .jpeg, .png">
                            </div>

                            <div class="profile-box" id="fullname-box">
                                <input type="text" 
                                    placeholder="New Full Name"
                                    name="fullname"
                                    id="fullname-input" 
                                    class="profile-input"
                                    value="nama lengkap saat ini"
                                    required
                                    disabled
                                />
                            </div>
                            <p id="fullname-alert"></p>
                            <div class="profile-box" id="username-box">
                                <input type="text" 
                                    placeholder="New Username" 
                                    id="username-input" 
                                    name="username" 
                                    class="profile-input"
                                    value="username saat ini"
                                    required
                                    disabled
                                    />
                            </div>
                            <p id="username-alert"></p>
                            <div class="profile-toggle-change">
                                <div class="profile-box" id="password-box">
                                    <input 
                                    type="password" 
                                    placeholder="New Password (optional)" 
                                    id="password-input" 
                                    name="password" 
                                    class="profile-input"
                                    disabled
                                    />
                                </div>
                            </div>
                            <p id="password-alert"></p>
                            <div class="profile-toggle-change">
                                <div class="change-buttons" style="display: flex;">
                                    <button type="reset" class="cancel-change-button" id="cancel-change-button" onclick="toggle()">Cancel</button>
                                    <button type="submit" class="profile-button" id="profile-button" disabled>Save</button>
                                </div>
                            </div>
                            <div class="profile-toggle-fixed">
                                <button type="button" onclick="toggle()" class="profile-button" id="profile-button">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
