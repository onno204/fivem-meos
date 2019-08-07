<?php

function doesUserHavePermission($permission, $dieIfNot=false, $dieIfNotLoggedIn=false){
    global $config;
    if($dieIfNotLoggedIn){
        if(isUserLoggedIn() === false){
            require_once "includes/error.php";
            startErrorCode(401);
        }
    }
    $group = "everyone";
    if(isset($_SESSION['usergroup'])){
        $group = strtolower($_SESSION['usergroup']);
    }
    if(in_array(strtolower($permission), $config['permissions'][$group])){
        return true;
    }
    if($dieIfNot){
        require_once "includes/error.php";
        startErrorCode(403);
    }
    return false;
}

function isUserLoggedIn(){
    if(isset($_SESSION['token']) == false){
        return false;
    }
    global $conn;
    $stmt = $conn->prepare("SELECT id FROM users WHERE token = ?");
    $stmt->bind_param("s", $_SESSION['token']);
    $stmt->execute();
    $result = $stmt->get_result();
    $userexists = false;
    $passwordcorrect = false;
    while ($data = $result->fetch_assoc()){
        if($data['id'] == $_SESSION['id']){
            return true;
        }
    }
    return false;
}

function htmlToPlainText($str){
    $str = str_replace('&nbsp;', ' ', $str);
    $str = html_entity_decode($str, ENT_QUOTES | ENT_COMPAT , 'UTF-8');
    $str = html_entity_decode($str, ENT_HTML5, 'UTF-8');
    $str = html_entity_decode($str);
    $str = htmlspecialchars_decode($str);
    $str = strip_tags($str);
    return $str;
}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
