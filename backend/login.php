<?php
require_once "backend.php";
$formID = $_POST['formid'];
backendAuthCheck("login", $formID);

if(isset($_POST['type']) && $_POST['type']=="login"){
    $enteredAll = true;
    if(!isset($_POST['username']) && !isset($_POST['password'])){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(strlen($username) <1 ){ $enteredAll = false; }
    if(strlen($password) <1 ){ $enteredAll = false; }

    if($enteredAll !== true){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }else {
        $stmt = $conn->prepare("SELECT id,username,usergroup,password,firstname,lastname,email,phone,discord FROM users WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $userexists = false;
        $passwordcorrect = false;
        while ($data = $result->fetch_assoc()){
            $userexists = $data;
        }
        if($userexists !== false ){
            if(password_verify($password, $userexists['password'])){
                $passwordcorrect = true;
            }
        }

        if($passwordcorrect === false){
            sendJsonResponseAndDie(200, 'red', $formID, 'Password or username incorrect');
        }else{
            $_SESSION['id'] = $userexists['id'];
            $_SESSION['username'] = $userexists['username'];
            $_SESSION['usergroup'] = $userexists['usergroup'];
            $_SESSION['firstname'] = $userexists['firstname'];
            $_SESSION['lastname'] = $userexists['lastname'];
            $_SESSION['email'] = $userexists['email'];
            $_SESSION['phone'] = $userexists['phone'];
            $_SESSION['discord'] = $userexists['discord'];
            $_SESSION['token'] = md5(uniqid(rand(), true));


            $stmt = $conn->prepare("UPDATE users SET lastloginip=?, lastlogindate=?, token=? WHERE id=?");
            $stmt->bind_param("sssi", strval(getUserIpAddr()), strval(microtime(true)), $_SESSION['token'], $_SESSION['id']);
            $stmt->execute();
            sendJsonResponseAndDie(200, 'green', $formID, 'Login confirmed', "redirect", "dashboard");
        }
    }
}