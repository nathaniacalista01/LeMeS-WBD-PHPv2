<?php
    class Model{
        protected $tables;
        protected $database;

        public function __construct($table_name){
            $this->tables = $table_name;
            $this->database = new Database;
        }
    }
?>