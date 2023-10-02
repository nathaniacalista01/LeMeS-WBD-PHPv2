<?php
require_once(__DIR__."/Model.php");
class Teacher extends Model{
    public function __construct(){
        parent::__construct("teachers");
    }
}
?>