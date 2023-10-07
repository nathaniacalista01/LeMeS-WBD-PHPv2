<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Courses List</title>
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
					<h1 class="recent-Articles">Courses List</h1>
                    <div class="header-button">
                        <button class="add-user"><a href="/admin/addcourse">Add Course</a></button>
                    </div>
				</div>
                
				<div class="report-body">
                    <div class="container">
                    <!-- POPUP WINDOW FOR DELETE COURSE -->
                        <div id="delete-popup">
    	                    <div class="window">
        	                    <a class="close-button" onclick="handleDeleteClose()" title="Close">X</a>
                                <h2>Are you sure to delete course with id <span id="id"></span></h2>
                                <div class="clearfix">
                                    <button type="button" class="cancelbtn">Cancel</button>
                                    <button type="button" class="deletebtn" onclick="handleDelete('course')">Delete</button>
                                </div>
                            </div>
                        </div>

                    <!-- HEADER TABLE -->
                        <table class="data">
                            <tr>
                                <th class="tid">CourseID</th>
                                <th class="title">Title</th>
                                <th class="description">Description</th>
                                <th class="enroll-code">Code</th>
                                <th class="tdate">Release Date</th>
                                <th class="tact">Action</th>
                            </tr>

                    <!-- ITERATE HERE LOOPING DATABASE TO FILL TABLE -->
                            <?php
                                $courses = $data["courses"];
                                foreach ($courses as $course ) {
                                    $formattedDate = date('d-m-y', strtotime($course['release_date']));
                                ?>
                                <tr>
                                    <td><?php echo $course['course_id'] ?></td>
                                    <td><?php echo $course['title'] ?></td>
                                    <td><?php echo $course['description'] ?></td>
                                    <td><?php echo $course['course_password'] ?></td>
                                    <td><?php echo $formattedDate ?></td>
                                    <?php  
                                        $href = "editcourse";
                                        $id = $course["course_id"];
                                        include __DIR__. '/../components/actionButton.php' 
                                    ?>
                                </tr>   
                                <?php } ?>
                            
                        </table>                        
                        <?php 
                            $parent = "admin";
                            $href = "courses";
                            include __DIR__ . '/../components/pagination.php'
                        ?>

			    </div>
			</div>
		</div>
    </section>
</body>
</html>
