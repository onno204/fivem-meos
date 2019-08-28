<?php
require_once "../config.php";
doesUserHavePermission("login", true, false, false);

require_once "../includes/header.php";
require_once "../includes/nav.php";

if(isset($_GET['logout'])){
    session_destroy();
    redirectToPage("login");
}else{
    if(isUserLoggedIn() == true){
require_once "../includes/error.php";
redirectToPage("dashboard");
//startError(200, "Alread logged in", "You'r already logged in");
    }
}
?>
    <img class="focus-logo" src="assets/img/focus.png" width="430" height="117">
<form class="box" id="loginForm" attr-action="login" attr-type="login"> 
    <div class="login-status" id="loginFormResponseMessage"></div>
    <input class="inputfield" type="text" name="username" placeholder="Gebruikersnaam">
    <p></p>
    <input class="inputfield" type="password" name="password" placeholder="Wachtwoord">
    <p></p>
    <input class="login" type="submit" name="" value="Inloggen" onclick="requestForForm('loginForm')">
    <p></p>
    <a>Wachtwoord vergeten?</a>
</form>
<?php
require_once "../includes/footer.php";
