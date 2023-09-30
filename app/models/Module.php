<?php
require_once(__DIR__."/Model.php");
    class Module extends Model{
        public function __construct(){
            parent::__construct("modules");
        }
    }
?>