<?php
    class Seed{
        private $database;
        public static $instance;
        public static function instance(){
            if(self::$instance === null){
                self::$instance = new self;
            }
            return self::$instance;
        }
        public function __construct(){
            $this->database = Database::instance();
           
        }
        public function seed_users(){
            $query = "INSERT INTO users (username,fullname,password) VALUES (:username,:fullname,:password)";
            $query_teacher = "INSERT INTO users(username,fullname,password,user_role) VALUES (:username,:fullname,:password,'TEACHER')";
            $username = 'username';
            $fullname = 'fullname';
            $password = password_hash("password",PASSWORD_DEFAULT);
            for($i = 0; $i < 30; $i++){
                try {
                    if($i%5 == 0){
                        $this->database->query($query_teacher);
                    }else{
                        $this->database->query($query);
                    }
                    $new_username = $username.$i;
                    $this->database->bind('fullname',$fullname);
                    $this->database->bind('username',$new_username);
                    $this->database->bind('password',$password);
                    $this->database->execute();                
                } catch (PDOException $th) {
                    echo $th->getMessage();
                    echo $username;
                    break;
                }   
            }
            $query_admin = "INSERT INTO users(fullname,username,password,user_role) VALUES (:fullname,:username,:password,'ADMIN')";
            $admin_username = "admin";
            $admin_password = "adminpassword";
            $this->database->query($query_admin);
            $this->database->bind("fullname",$admin_username);
            $this->database->bind("username",$admin_username);
            $this->database->bind("password",password_hash($admin_password,PASSWORD_DEFAULT));
            $this->database->execute();
        }
        public function seed_courses(){
            $query = "
                INSERT INTO courses(title, description) VALUES (:title,:description);
            ";
            $this->database->query($query);
            $title = "title";
            $desc = "desc";
            for($i = 0; $i < 30; $i++){
                $new_title = $title.$i;
                $new_desc = $desc.$i;
                $this->database->bind("title",$new_title);
                $this->database->bind("description",$new_desc);
                $this->database->execute();
            }
        }
        public function seed_modules(){
            $query = "INSERT INTO modules(title,description,course_id) VALUES (:title,:description,:course_id);";
            $title = "title";
            $desc = "desc";
            $this->database->query($query);
            for($i = 0; $i < 30; $i++){
                $course_id = rand(1,30);
                $new_title = $title.$i;
                $new_desc = $desc.$i;
                $this->database->bind("title",$new_title);
                $this->database->bind("description",$new_desc);
                $this->database->bind("course_id",$course_id);
                $this->database->execute();
            }
        }
        public function seed_materials(){
            $query = "INSERT INTO materials(title,description,material_type,module_id) VALUES(:title,:description,:material_type,:module_id);";
            $title = "title";
            $desc = "desc";
            $this->database->query($query);
            for($i = 0; $i < 30; $i++){
                $module_id = rand(1,30);
                $new_title = $title.$i;
                $new_desc = $desc.$i;
                if($i%3 == 0){
                    $type = "pdf";
                }else{
                    $type = "video";
                }
                $this->database->bind("title",$new_title);
                $this->database->bind("description",$new_desc);
                $this->database->bind("material_type",$type);
                $this->database->bind("module_id",$module_id);
                $this->database->execute();
            }
        }
        public function seed_course_participants(){
            $query = "INSERT INTO course_participant(course_id,participant_id) VALUES (:course,:users);";
            $query_teacher = "INSERT INTO course_participant(course_id,participant_id) VALUES (:course,:users);";
            for($i = 0; $i < 30; $i++){
                $course = rand(1,30);
                $users = rand(1,30);
                if($users%5 === 0){
                    $this->database->query($query_teacher);
                }else{
                    $this->database->query($query);
                }
                $this->database->bind("course",$course);
                $this->database->bind("users",$users);
                $this->database->execute();
            }
        }
    }
?>