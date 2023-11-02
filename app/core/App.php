<?php
    class App{
        private $controllers;
        private $methods = 'index';
        private $params = [];
        public function __construct(){
            $url = $this->getUrl();
            $controllers = $url[0] === '' ? 'Home' : $url[0];
            $filename = 'app/controllers/'.$controllers.'Controller.php';
            if(file_exists($filename)){
                $this->controllers = $controllers;
            }else{
                $this->controllers = 'NotFound';
            }
            unset($url[0]);
            require_once('app/controllers/'.$this->controllers.'Controller.php');
            $controller_class = $this->controllers.'Controller';
            $this->controllers = new $controller_class;
            if(isset($url[1])){
                // Cek apakah method yang terdapat di url valid atau tidak
                if(method_exists($this->controllers,$url[1])){
                    $this->methods = $url[1];
                }
            }
            unset($url[1]);
            if(!empty($url)){
                // Kalau ada parameter
                $this->params = array_values($url);
            }else{
                if($this->methods == "lists"){
                    header("Location: /course/lists/page=1");
                    exit;
                }else if($this->methods == "enrolled"){
                    header("Location: /course/enrolled/page=1");
                    exit;
                }
            }
            call_user_func_array([$this->controllers,$this->methods],$this->params);
        }
       
        public function getUrl(){
            if(isset($_SERVER["REQUEST_URI"])){
                $url = $_SERVER["REQUEST_URI"];
                // Menghapus / di depan URL
                $url = trim($url,"/");

                // Menghapus beberapa character
                $url = filter_var($url,FILTER_SANITIZE_URL);

                // Split url menjadi array
                $url = explode("/",$url);
                return $url;
            }
        }
    }
?>