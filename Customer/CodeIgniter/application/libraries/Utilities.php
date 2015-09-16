<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities {

    public function check_session_active(){
        session_start();
        if (!isset($_SESSION['userid'])) {
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                header("HTTP/1.0 402 You are not logged in");
                echo json_encode(array('message' => 'You are not logged in'));
            }
            else {
                header('Location: ../../assets/login.html');
            }
            die();
        }
        else{
            $now = time();
            $lastAccess = $_SESSION['access'];
            if(($now - $lastAccess)> 300){
                session_destroy();
                if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    header("HTTP/1.0 401 Session Expired");
                    echo json_encode(array('message' => 'Session Expired'));
                }
                else{
                    header('Location: ../../assets/login.html');
                }
                die();
            }
            else{
                if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    $_SESSION['access'] = $now;
                }
                else {
                    header('Location: ../../assets/html/customerHome.html');
                }
            }
        }
    }

    public function sanitizeInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data,ENT_QUOTES);
        return $data;
    }

    public function checkRequired($requiredArr){
        foreach($requiredArr as $field) {
            if (empty($field)) {
                return true;
            }
        }
        return false;
    }
}