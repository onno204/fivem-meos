<?php
require_once "../config.php";
doesUserHavePermission("dashboard", true, true);


require_once "../includes/header.php";
require_once "../includes/nav.php";
?>

<form class="box" method="post">
			<h1 style="font-family: Bahnschrift; color: #FFF;">Voertuig Zoeken</h1>
			<input class="kenteken" type="text" name="" placeholder="Kenteken">
			<p></p>
			<input class="zoeken" type="submit" name="" value="Zoeken">
			<p></p>
		</form>

<?php
require_once "../includes/footer.php";
