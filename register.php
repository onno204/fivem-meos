<?php 
require_once "config.php";
doesUserHavePermission("register", true);


if(isUserLoggedIn() == true){
    require_once "includes/error.php";
    startError(200, "Alread logged in", "You'r already logged in");
}
require_once "includes/header.php";
require_once "includes/nav.php";

if(doesUserHavePermission("register") == false){
    die("<h1>You don't have permission to view this page</h1>");
}
?>

<h1>Registeren</h1>
<form id="registerForm" attr-action="register" attr-type="register">
    username: <input type="text" name="username"> <br>
    password: <input type="password" name="password"> <br>
    firstname: <input type="text" name="firstname"> <br>
    lastname: <input type="text" name="lastname"> <br>
    email: <input type="text" name="email"> <br>
    phone: <input type="text" name="phone"> <br>
    discord: <input type="text" name="discord"> <br>
    <input type="button" name="submitbutton" value="Submit" onclick="requestForForm('registerForm')">
    <div id="registerFormResponseMessage"></div>
</form>

<a href="login">login</a>



<?php
    require_once "includes/footer.php";
?>