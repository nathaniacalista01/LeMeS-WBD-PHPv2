<?php
    class Database{
        public static $instance;
        private $host = "db";
        private $username = "postgres";
        private $password = "postgres";
        private $db = "labpro";
        private $connection;
        private $port = 5432;
        public function __construct(){
            $dsn = "pgsql:host=" . $this->host . ";dbname=" . $this->db . ";user=" . $this->username . ";password=" . $this->password;  
            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            try {
                //code...
                $this->connection = new PDO($dsn);        
            } catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
            }
            
            try {
                $this->connection->exec(Table::STUDENT_TABLE);
                $this->connection->exec(Table::TEACHER_TABLE);
                $this->connection->exec(Table::COURSE_TABLE);
                $this->connection->exec(Table::MODULE_TABLE);
                $this->connection->exec(Table::COURSE_MODULE_TABLE);
                $this->connection->exec(Table::ENUM_TYPE);
                $this->connection->exec(Table::MATERIAL_TABLE);
                $this->connection->exec(Table::MODULE_MATERIAL_TABLE);
                $this->connection->exec(Table::COURSE_PARTICIPANT_TABLE);
                $this->connection->exec(Table::COURSE_LECTURER_TABLE);
                echo "Succesfully initialized all tables";
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        public static function instance(){
            if(self::$instance === null){
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function __call($method, $args){
            var_dump($method);
        }
    }
?>