<?php
    class Controller{
        
        public function view($folderName,$viewName,$data=[]){
            $fileName =  'views/'.$folderName.'/'.$viewName.'.php';
            if(file_exists($fileName)){
                require_once($fileName);
            }else{
                echo "File not found";
            }
        }
    }
?>