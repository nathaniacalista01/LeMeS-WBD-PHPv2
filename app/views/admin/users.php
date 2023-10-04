<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Users List</title>
	<link rel="stylesheet" href="../../public/css/admin/users.css">
    <script src="../../public/js/listOfUsers.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../../public/asset/teslogo.png" alt="Homepage" class="logo-img">
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">

        <!-- PROFILE PICTURE, NAME, ROLE -->
            <li>
                <div class="profile-details">
                    <a href="#">
                        <img src="../../public/asset/tesprofilepicture.svg" alt="profileImg" class="photo"/>
                        <div class="name-job">
                            <div class="name">Nama</div>
                            <div class="job">Role</div>
                        </div>
                    </a>
                    <span class="tooltip">Profile</span>
                </div>
            </li>

            <!-- HOMEPAGE BUTTON -->
            <li>
                <a href="#">
                    <i class='bx bx-home'></i>
                    <span class="link-name">Homepage</span>
                </a>
                <span class="tooltip">Homepage</span>
            </li>

            <!-- MY COURSES BUTTON -->
            <li>
                <a href="#">
                    <i class='bx bx-book' ></i>
                    <span class="link-name">My Courses</span>
                </a>
                <span class="tooltip">My Courses</span>
            </li>

            <!-- ASSIGNMENTS BUTTON -->
            <li>
                <a href="#">
                <i class='bx bx-task' ></i>
                    <span class="link-name">Assignments</span>
                </a>
                <span class="tooltip">Assignments</span>
            </li>

            <!-- SETTING BUTTON -->
            <li>
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link-name">Setting</span>
                    </a>
                    <span class="tooltip">Setting</span>
                </li>

                <!-- LOGOUT BUTTON -->
                <li>
                    <button class="logbtn" onclick="openModalLogout()">
                        <i class='bx bx-log-out' id="log-out"></i>
                        <span class="link-name">Log Out</span>
                    </button>
                    <span class="tooltip">Log Out</span>
                </li>
            <div class="footer">
                <p class="text-xs">
                    <span>Copyright ©</span>
                    <br>
                    <span>IF3110-2023</span>
                    <br>
                    <span>Kelompok</span>
                    <br>
                    <span>26</span>
                    <br>
                    <br>
                </p>
            </div>    
        </ul>
    </div>
    <!-- LOGOUT POPUP CONFIRMATION -->
    <div id="overlay-logout" onclick="closeDialogLogout()">
        <dialog id="dialog-logout">
            <div class="modal-container-logout">
                <i class='bx bx-error-circle'></i>
                <h2>Logout</h2>
                <p>Are you sure want to logout?</p>
                <div class="buttons-logout">
                    <button class="close-btn-logout">Cancel</button> <!-- CANCEL LOGOUT AND CLOSE POPUP -->
                    <button class="confirm-logout">Logout</button> <!-- IF CONFIRM TO LOGOUT CLICK HERE -->
                </div>
            </div>
        </dialog>
    </div>
			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Users List</h1>
					<button class="view">View All</button>
				</div>

				<div class="report-body">
					<div class="report-topic-heading">
						<h3 class="t-op">UserID</h3>
						<h3 class="t-op">Username</h3>
						<h3 class="t-op">Fullname</h3>
						<h3 class="t-op">Action</h3>
					</div>

					<div class="items">
						<div class="item1">
							<h3 class="t-op-nextlvl">1</h3>
							<h3 class="t-op-nextlvl">kagura01</h3>
							<h3 class="t-op-nextlvl">Uchiha Naruto</h3>
							<button style="cursor: pointer;" class="t-op-nextlvl label-tag1">Delete</button>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">2</h3>
							<h3 class="t-op-nextlvl">lylia02</h3>
							<h3 class="t-op-nextlvl">Madara</h3>
							<button style="cursor: pointer;" class="t-op-nextlvl label-tag1">Delete</button>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">3</h3>
							<h3 class="t-op-nextlvl">iniorang</h3>
							<h3 class="t-op-nextlvl">Bill Gates</h3>
							<button style="cursor: pointer;" class="t-op-nextlvl label-tag1">Delete</button>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">4</h3>
							<h3 class="t-op-nextlvl">kagura01</h3>
							<h3 class="t-op-nextlvl">Uchiha Naruto</h3>
							<button style="cursor: pointer;" class="t-op-nextlvl label-tag1">Delete</button>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">5</h3>
							<h3 class="t-op-nextlvl">lylia02</h3>
							<h3 class="t-op-nextlvl">Madara</h3>
							<button style="cursor: pointer;" class="t-op-nextlvl label-tag1">Delete</button>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">6</h3>
							<h3 class="t-op-nextlvl">iniorang</h3>
							<h3 class="t-op-nextlvl">Bill Gates</h3>
							<button style="cursor: pointer;" class="t-op-nextlvl label-tag1">Delete</button>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">7</h3>
							<h3 class="t-op-nextlvl">kagura01</h3>
							<h3 class="t-op-nextlvl">Uchiha Naruto</h3>
							<button style="cursor: pointer;" class="t-op-nextlvl label-tag1">Delete</button>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">8</h3>
							<h3 class="t-op-nextlvl">lylia02</h3>
							<h3 class="t-op-nextlvl">Madara</h3>
							<button style="cursor: pointer;" class="t-op-nextlvl label-tag1">Delete</button>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">9</h3>
							<h3 class="t-op-nextlvl">iniorang</h3>
							<h3 class="t-op-nextlvl">Bill Gates</h3>
                            <button style="cursor: pointer;" class="t-op-nextlvl label-tag2">Edit</button>
							<button style="cursor: pointer;" class="t-op-nextlvl label-tag1">Delete</button>
						</div>

                        <div class="item1">
							<h3 class="t-op-nextlvl">10</h3>
							<h3 class="t-op-nextlvl">iniorang</h3>
							<h3 class="t-op-nextlvl">Bill Gates</h3>
                            <button style="cursor: pointer;" class="t-op-nextlvl label-tag2">Edit</button>
                            <div id="button"><a href="#popup">Delete</a></div>
                                <div id="popup">
    	                        <div class="window">
        	                    <a href="#" class="close-button" title="Close">X</a>
                                    <h2>Are you sure to delete this user?</h2>
                                </div>
                            </div>
        </div>
    </div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="../../js/listOfUsers.js"></script>
</body>
</html>
