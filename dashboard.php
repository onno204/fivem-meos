<?php 
require_once "config.php";
doesUserHavePermission("dashboard", true, true);


require_once "includes/header.php";
require_once "includes/nav.php";
?>

<h1>dashboard</h1>

<?php
require_once "includes/footer.php";