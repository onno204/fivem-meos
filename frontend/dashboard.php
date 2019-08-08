<?php
require_once "../config.php";
doesUserHavePermission("dashboard", true, true);


require_once "../includes/header.php";
require_once "../includes/nav.php";
?>

<nav class="nav-links">
		<a href=""><img class="back" src="assets/img/pijllinks.png" alt="Italian Trulli"></a>
		<a href="persoon.php"><p class="persoon-nav"><i class="fas fa-user"></i>  Persoon</p></a>
		<a href="voertuig.php"><p class="voertuig-nav"><i class="fas fa-car"></i>  Voertuig</p></a>
		<a href="documentatie.php"><p class="documenten-nav"><i class="fas fa-book"></i>  Documentatie</p></a>
		<a href="instellingen.php"><p class="instellingen-nav"><i class="fas fa-cogs"></i>  Instellingen</p></a>
		<a href="login?logout"><p class="uitloggen-nav"><i class="fas fa-sign-out-alt"></i>  Uitloggen</p></a>
</nav>

<?php
require_once "../includes/footer.php";
