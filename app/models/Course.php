<?php
require_once(__DIR__."/Model.php");
    class Course extends Model{
        public function __construct(){
            parent::__construct("courses");
        }
    }
?>