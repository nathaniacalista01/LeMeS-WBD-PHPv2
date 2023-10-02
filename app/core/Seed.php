<?php
    class Seed{
        private $database;
        public function __construct(){
            $this->database = new Database;
        }
        public function seed_user(){
            $query = "INSERT INTO users (username,fullname,password) VALUES (:username,:fullname,:password)";
            $this->database->query($query);
            $username = 'username';
            $fullname = 'fullname';
            $password = password_hash("password",PASSWORD_DEFAULT);
            for($i = 0; $i < 30; $i++){
                try {
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
    }
?>