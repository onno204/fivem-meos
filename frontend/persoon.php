<?php
require_once "../config.php";
doesUserHavePermission("dashboard", true, true);


require_once "../includes/header.php";
require_once "../includes/nav.php";
?>

<form class="box" method="post">
	<h1 style="font-family: Bahnschrift; color: #FFF;">Persoon zoeken</h1>
	<input class="naam" type="text" name="" placeholder="Voornaam en/of Achternaam">
	<p></p>
	<input class="zoeken" type="submit" name="" value="Zoeken">
	<p></p>
</form>

<?php
require_once "../includes/footer.php";
