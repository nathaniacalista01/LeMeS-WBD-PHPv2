<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Courses List</title>
	<link rel="stylesheet" href="../../public/css/admin/lists.css">
</head>

<body>
    <?php include __DIR__ . '/../navbar/navbar.php'?>
    
	<section class="home-section">
		<div class="main">
			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Courses List</h1>
				</div>

				<div class="report-body">
                    <div class="container">
                    <!-- POPUP WINDOW FOR DELETE COURSE -->
                        <div id="delete-popup">
    	                    <div class="window">
        	                    <a href="#" class="close-button" title="Close">X</a>
                                <h2>Are you sure to delete this course?</h2>
                                <div class="clearfix">
                                    <button type="button" class="cancelbtn">Cancel</button>
                                    <button type="button" class="deletebtn">Delete</button>
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
                                    echo "
                                    <tr>
                                    <td>$course[course_id]</td>
                                    <td>$course[title]</td>
                                    <td>$course[description]</td>
                                    <td>$course[course_password]</td>
                                    <td>$formattedDate</td>
                                    <td class='action'>
                                        <span class='edit-icon'>
                                            <a href=''>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:;'>
                                                    <path fill='#564C95' d='m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z'></path>
                                                    <path fill='#564C95' d='M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z'></path>
                                                </svg>
                                            </a>
                                        </span>
                                        <span class='delete-icon'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: #564C95 ;transform: ;msFilter:;'><path d='M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z'></path></svg>
                                        </span>
                                    </td>
                                </tr>   
                                    ";
                                }
                            ?>
                            
                        </table>                        
                        <?php 
                            $href = "courses";
                            include __DIR__ . '/../components/pagination.php'
                        ?>

			    </div>
			</div>
		</div>
    </section>
</body>
</html>
