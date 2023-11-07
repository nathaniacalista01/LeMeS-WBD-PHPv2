<?php
    require_once("../../config/config.php");
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION["user_id"])){
        header("Location: /login");
    }
    $user_id = $_SESSION["user_id"];
    $request_param = '<?xml version="1.0" encoding="utf-8" ?>
    <soap:Envelope
        xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
        xmlns:tns="http://service.LMS.com/">
        <soap:Body>
            <tns:upgrade>
                <user_id>' . $user_id . '</user_id>
            </tns:upgrade>
        </soap:Body>
    </soap:Envelope>';
    $headers = array(
        "Content-Type: text/xml;charset=\"utf-8\"",
      );
      $url = $_ENV["SOAP_URL"];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $request_param);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    if($response === FALSE){
        $_SESSION["error"] = "Subscription request has failed!";
    }else{
        if($response == "Request failed"){
            $_SESSION["error"] = "Subscritpion request has failed!";
        }else{
            $_SESSION["success"] = $response;
        }
    }
    header("Location: /profile");
?>