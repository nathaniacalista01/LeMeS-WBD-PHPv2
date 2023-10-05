<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Users List</title>
	<link rel="stylesheet" href="../../public/css/admin/users.css">
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
                                    foreach ($users as $user) {
                                        $user_id = $user['user_id'];
                                        $fullname = $user['fullname'];
                                        $username = $user['username'];
                                        $role = $user["user_role"];

                                        echo"
                                            <tr>
                                                <td class='id-column'>
                                                    $user_id
                                                </td>
                                                <td class='user-attr'>
                                                    $fullname
                                                </td>
                                                <td class='user-attr'>
                                                    $username
                                                </td>
                                                <td class='user-attr'>
                                                    $role
                                                </td>
                                                <td class='action'>
                                                    <button>Action</button>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    <div>
				</div> 
                <div class="paging">           
                    <div class="pagination">
                        <?php 
                            $start_index = $data["page_number"];
                            $max_page = $data["max_page"];
                            $prev_index = $start_index <= 1 ? 1 : $start_index-1;
                            if($start_index > 1){
                                $prev_index = $start_index-1;
                                echo "<a href='/admin/users/page=$prev_index'>PREV</a>";
                            }
                            for($i = $prev_index; $i < $start_index+2;$i++){
                                if($i == $max_page){
                                    break;
                                }
                                if($i == $start_index){
                                    echo "<a class='pagination-active' style='background-color:#9e51d8;color:white;' id='pagination-active'>$i</a>";
                                }else{
                                    echo "<a href='/admin/users/page=$i' id='pagination-number'>$i</a>";
                                }
                            }
                            if($start_index < $max_page-2){
                                echo "<a>...</a>";
                            }
                            if($start_index == $max_page){
                                echo "<a style='background-color:#9e51d8;color:white;' href='/admin/users/page=$max_page'>$max_page</a>";
                            }else{
                                echo "<a href='/admin/users/page=$max_page'>$max_page</a>";
                            }
                            if($start_index < $max_page){
                                $next_index = $start_index + 1;
                                echo "<a href='/admin/users/page=$next_index'> &nbsp;  NEXT</a>";
                            }
                        ?>
                    </div>
			</div>
		</div>
    </section>
</body>
</html>
