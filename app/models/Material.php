<?php
require_once(__DIR__."/Model.php");
class Material extends Model{
    public function __construct(){
        parent::__construct("materials");
    }
}
?>