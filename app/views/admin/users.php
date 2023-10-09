<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Users List</title>
    <link rel="stylesheet" href="../../public/css/components/button.css">
	<link rel="stylesheet" href="../../public/css/admin/admin.css">
    <script src="../../public/js/admin.js"></script>
</head>

<body>
    <?php include __DIR__ . '/../navbar/navbar.php'?>
    <?php 
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
	<section class="home-section">
		<div class="main">
			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Users List</h1>
                    <div class="header-button">
                        <button class="add-user"><a href="/admin/register">Add User</a></button>
                    </div>
				</div>
                
				<div class="report-body">
                    <div class="container">
                        <div id="delete-popup">
                            <div class="window">
                                <a onclick="handleDeleteClose()" class="close-button" title="Close">X</a>
                                <h2>Delete user with id <span id="id"><span></h2>
                                <div class="clearfix">
                                    <button type="button" class="cancelbtn">Cancel</button>
                                    <button type="button" class="deletebtn" onclick="handleDelete('user')">Delete</button>
                                </div>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th class="id-column">Id</th>
                                    <th class="user-attr">Fullname</th>
                                    <th class="user-attr">Username</th>
                                    <th class="user-attr">Role</th>
                                    <th class="user-attr">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $users = $data["users"];
                                if(isset($users) && count($users) !== 0){
                                    foreach ($users as $user ) {
                                        ?>
                                        <tr>
                                            <td><?php echo $user['user_id'] ?></td>
                                            <td><?php echo $user['username'] ?></td>
                                            <td><?php echo $user['fullname'] ?></td>
                                            <td><?php echo $user['user_role'] ?></td>
                                            <?php 
                                                $href = "edituser"; 
                                                $id = $user["user_id"];
                                                include __DIR__. '/../components/actionButton.php' 
                                            ?>
                                        </tr>   
                                <?php } }else{
                                    echo "<div class='no-content'><p>There is no data right now...</p></div>";
                                } ?>
                                
                            </tbody>
                        </table>
                        <?php 
                            $parent = "admin";
                            $href = "users";
                            include __DIR__ . '/../components/pagination.php'
                        ?>
		    </div>
        </section>
    </body>
</html>
