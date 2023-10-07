<?php
    class Controller{
        public function view($folderName,$viewName,$data=[]){
            $fileName =  'app/views/'.$folderName.'/'.$viewName.'.php';
            if(file_exists($fileName)){
                require_once($fileName);
            }else{
                echo "File not found";
            }
        }

        public function middleware($name){
            require_once("app/middlewares/".$name . '.php');
            return new $name;
        }
    }
?>