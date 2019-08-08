<?php
require_once "../config.php";
doesUserHavePermission("dashboard", true, true);


require_once "../includes/header.php";
require_once "../includes/nav.php";
?>

    <div class="persoon-buttons">
      <img class="afbeelding" src="img/persoon.png" alt="Persoon" width="100" height="100">
      <p class="naam">"Voor en Achternaam"</p>
      <a><button class="button">Aantekeningen/Notities</button></a>
      <h6></h6>
      <button class="button">Bekeuringen</button>
      <h6></h6>
      <button class="button">Voertuigen</button>   
    </div>   
    <div class="persoon-buttons">
      <h6 class="informatie" style="color: #FFF;">Informatie</h6>
        <p class="naam">Geborden op: "Geboortedatum:"</p>
        <p class="naam">Lengte: "Lengte:"</p>
        <p class="naam">Gezocht: "Button:"</p>
        <p class="naam">Geborden op: "Geboortedatum:"</p>
      </div>      

<?php
require_once "../includes/footer.php";
