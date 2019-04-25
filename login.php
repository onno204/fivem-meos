<?php 
require_once "config.php";
doesUserHavePermission("login", true);

require_once "includes/header.php";
require_once "includes/nav.php";

if(isset($_GET['message'])){
    echo "<h1>".htmlToPlainText($_GET['message'])."</h1>";
}
if(isset($_GET['logout'])){
    session_destroy();
    echo "<h1>succesvol uitgelogd</h1>";
}else{
    if(isUserLoggedIn() == true){
        require_once "includes/error.php";
        startError(200, "Alread logged in", "You'r already logged in");
    }
}
?>

<h1>Inloggen</h1>
<form id="loginForm" attr-action="login" attr-type="login">
    username: <input type="text" name="username"> <br>
    password: <input type="password" name="password"> <br>
    <input type="button" name="submitbutton" value="Submit" onclick="requestForForm('loginForm')">
    <div id="loginFormResponseMessage"></div>
</form>
<a href="register">registreer</a>

<?php
require_once "includes/footer.php";

