<?php
    class LoginController extends Controller{
        public function index(){
            if(isset($_SESSION["user_id"])){
                header("Location: /");
                exit;
            }else{
                return $this->view('login','index',[]);
            }
        }
    }
?>