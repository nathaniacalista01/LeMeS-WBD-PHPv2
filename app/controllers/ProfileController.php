<?php
    class ProfileController extends Controller{
        public function index(){
            $middleware = $this->middleware('LoginMiddleware');
            $middleware->hasLoggedIn();
            $user_id = $_SESSION["user_id"];
            $request_param = '<?xml version="1.0" encoding="utf-8" ?>
            <soap:Envelope
                xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                xmlns:tns="http://service.LMS.com/">
                <soap:Body>
                    <tns:getPremiumStatus>
                        <user_id>' . $user_id . '</user_id>
                    </tns:getPremiumStatus>
                </soap:Body>
            </soap:Envelope>';
            $headers = array(
                "Content-Type: text/xml;charset=\"utf-8\"",
                'Content-Length: ' .strlen($request_param),
            );
            $url = $_ENV["SOAP_URL"];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request_param);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);
            $temp = str_replace('<?xml version=\'1.0\' encoding=\'UTF-8\'?><S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/"><S:Body><ns2:getPremiumStatusResponse xmlns:ns2="http://service.LMS.com/"><return>',"",$response);
            $temp2 = str_replace('</return></ns2:getPremiumStatusResponse></S:Body></S:Envelope>',"",$temp);
            return $this->view('profile','index',["premium_status" => $temp2]);
        }
    }
?>