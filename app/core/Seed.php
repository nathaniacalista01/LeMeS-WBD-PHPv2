<?php
    class Seed{
        private $database;
        public function __construct(){
            $this->database = Database::instance();
            $this->seed_users();
            $this->seed_courses();
            $this->seed_modules();
            $this->seed_materials();
            $this->seed_course_module();
            $this->seed_course_participants();
            $this->seed_module_material();
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
            $query = "INSERT INTO modules(title,description) VALUES (:title,:description);";
            $title = "title";
            $desc = "desc";
            $this->database->query($query);
            for($i = 0; $i < 30; $i++){
                $new_title = $title.$i;
                $new_desc = $desc.$i;
                $this->database->bind("title",$new_title);
                $this->database->bind("description",$new_desc);
                $this->database->execute();
            }
        }
        public function seed_materials(){
            $query = "INSERT INTO materials(title,description,material_type) VALUES(:title,:description,:material_type);";
            $title = "title";
            $desc = "desc";
            $this->database->query($query);
            for($i = 0; $i < 30; $i++){
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
                $this->database->execute();
            }
        }
        public function seed_course_participants(){
            $query = "INSERT INTO course_participant(course_id,participant_id,is_accepted) VALUES (:course,:users,:is_accepted);";
            $query_teacher = "INSERT INTO course_participant(course_id,participant_id) VALUES (:course,:users);";
            for($i = 0; $i < 30; $i++){
                $course = rand(1,30);
                $users = rand(1,30);
                if($users%5 === 0){
                    $this->database->query($query_teacher);
                }else{
                    $this->database->query($query);
                    $this->database->bind("is_accepted",false);
                }
                $this->database->bind("course",$course);
                $this->database->bind("users",$users);
                $this->database->execute();
            }
        }
        public function seed_course_module(){
            $query = "INSERT INTO course_module(course_id,module_id) VALUES (:course,:module);";
            $this->database->query($query);
            for($i = 0; $i <30;$i++){
                $course = rand(1,30);
                $module = rand(1,31);
                $this->database->bind("course",$course);
                $this->database->bind("module",$module);
                $this->database->execute();
            }
        }
        public function seed_module_material(){
            $query = "INSERT INTO module_material(module_id,material_id) VALUES (:module,:material);";
            $this->database->query($query);
            for($i = 0; $i < 30; $i++){
                $module = rand(1,30);
                $material = rand(1,30);
                $this->database->bind("module",$module);
                $this->database->bind("material",$material);
                $this->database->execute();
            }
        }
    }
?>