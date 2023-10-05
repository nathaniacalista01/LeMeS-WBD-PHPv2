<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Users List</title>
	<link rel="stylesheet" href="../../public/css/admin/lists.css">
</head>

<body>
    <?php include __DIR__ . '/../navbar/navbar.php'?>

	<section class="home-section">
		<div class="main">
			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Users List</h1>
				</div>

				<div class="report-body">
                    <div class="container">
                    <!-- POPUP WINDOW FOR DELETE USER -->
                        <div id="popup">
                            <div class="window">
                                <a href="#" class="close-button" title="Close">X</a>
                                <h2>Are you sure to delete this course?</h2>
                                <div class="clearfix">
                                    <button type="button" class="cancelbtn">Cancel</button>
                                    <button type="button" class="deletebtn">Delete</button>
                                </div>
                            </div>
                        </div>

                    <!-- TABLE HEADERS  -->
                    <table class="data">
                        <tr>
                            <th class="tid">UserID</th>
                            <th class="tusername">Username</th>
                            <th class="tfullname">Fullname</th>
                            <th class="tact-user">Action</th>
                        </tr>

                    <!-- ITERATE HERE LOOPING DATABASE TO FILL TABLE -->
                            <tr>
                                <td>11</td>
                                <td>kagura11</td>
                                <td>Uchiha Naruto</td>
                                <td>
                                    <div class="action">
                                        <button class="edit-user">
                                            Edit
                                        </button>
                                        <div class="delete-user">
                                        <a href="#popup">Delete</a></div>
                                    </div>
                                </td>
                            </tr>  
                        </table>
                <div class="paging">           
                    <div class="pagination">
                        <a href="">PREV</a>
                        <a href="">1</a>
                        <a href="">2</a>
                        <a href="">3</a>
                        <a href="">4</a>
                        <a href="">...</a>
                        <a href="">10</a>
                        <a href=""> &nbsp;NEXT</a>
                        <div class="bottom_bar"></div>
                    </div>
			</div>
		</div>
    </section>
</body>
</html>
