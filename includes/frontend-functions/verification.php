<?php

function doesUserHavePermission($permission, $dieIfNoPerms=false, $dieIfNotLoggedIn=false, $redirectIfNotLoggedin=true){
  global $config;
  if($redirectIfNotLoggedin)
    if(isUserLoggedIn() === false){
      redirectToPage("login");
      startErrorCode(401);
    }
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
  if($dieIfNoPerms){
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
    // Destroy session, not a valid token
    session_destroy();
    return false;
}
