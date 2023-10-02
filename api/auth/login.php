<?php
session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Login authentication user
    
}else{
    echo "Gagal pass data";
}?>