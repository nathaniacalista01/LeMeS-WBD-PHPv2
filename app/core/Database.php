<?php
    class Database{
        public static $instance;
        private $host = "db";
        private $username = "postgres";
        private $password = "postgres";
        private $db = "labpro";
        private $connection;
        private $port = 5432;
        private $stmt;
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

        public function query($query){
            try {
                $this->stmt = $this->connection->prepare($query);
            } catch (PDOException $th) {
                //throw $th;
                echo $th->getMessage();
            }
        }

        public function bind($param, $value, $type = null)
        {
            try {
                if (is_null($type)) {
                    if (is_int($value)) {
                        $type = PDO::PARAM_INT;
                    } else if (is_bool($value)) {
                        $type = PDO::PARAM_BOOL;
                    } else if (is_null($value)) {
                        $type = PDO::PARAM_NULL;
                    } else {
                        $type = PDO::PARAM_STR;
                    }
                }
                $this->stmt->bindValue($param, $value, $type);
            } catch (PDOException) {
                throw new LoggedException('Internal Server Error', 500);
            }
        }

        public function execute(){
            try {
                $this->stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }

        public function single_fetch(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>