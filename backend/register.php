<?php
require_once "backend.php";
$formID = $_POST['formid'];
backendAuthCheck("register", $formID);

if(isset($_POST['type']) && $_POST['type']=="register"){
    $enteredAll = true;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $discord = $_POST['discord'];
    if(strlen($username) <1 ){ $enteredAll = false; }
    if(strlen($password) <6 ){ sendJsonResponseAndDie(200, 'orange', $formID, 'Passwords needs to be at least 6characters'); $enteredAll = false; }
    if(strlen($firstname) <1 ){ $enteredAll = false; }
    if(strlen($lastname) <1 ){ $enteredAll = false; }
    if(strlen($email) <1 ){ $enteredAll = false; }
    if(strlen($phone) <1 ){ $enteredAll = false; }
    if(strlen($discord) <1 ){ $enteredAll = false; }
    
    if($enteredAll !== true){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }else {
        $passwordhash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 7]);
        $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()){
            sendJsonResponseAndDie(200, 'red', $formID, 'user already exists');
        }
        $stmt = $conn->prepare("INSERT INTO users (username, password, firstname, lastname, email, phone, discord, lastloginip, lastlogindate) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $username,$passwordhash, $firstname, $lastname, $email, $phone, $discord, strval(getUserIpAddr()), strval(microtime(true)));
        $stmt->execute();
        //var_dump($stmt->error);
        sendJsonResponseAndDie(200, 'green', $formID, 'Register succes', "redirect", "login?message=Succesvol+geregistreerd%2C+log+nu+in");
    }
}






