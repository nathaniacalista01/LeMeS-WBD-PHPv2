<?php
    class LoginController extends Controller{
        public function index(){
            return $this->view('login','index',[]);
        }

        public function redirect($params){
            // Pisahkan message dengan kontennya
            $message = explode("=",$params);
            // Kalau pemecahan berhasil, decode
            if(count($message) == 2){
                $content = urldecode($message[1]);
                return $this->view('login','index',["message" => $content]);
            }else{
                return $this->view('login','index',[]);
            }
        }
    }
?>