    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">


<div class="kop-achtergrond">
    <img class= "politielogo1" src="assets/img/politielogo1.png" width="70" height="70">
    <div class="navbar-nav">
        <a href="index.html"><button class="nav-item snorkel-informatie snorkel-button">Informatie</button></a>
        <a href="contact.html"><button class="nav-item snorkel-contact snorkel-button">Contact</button></a>
        <a href="http://bit.ly/solliciterenroerveenravr"><button class="nav-item snorkel-solliciteren snorkel-button1">Solliciteren</button></a>
        <a href="onsteam.html"><button class="nav-item snorkel-team snorkel-button">Ons Team</button></a>
        <a href="media.html"><button class="nav-item snorkel-onderdelen snorkel-button2">Media</button></a>  
        <button class="nav-item snorkel-inloggen snorkel-button3">Inloggen</button>                 
      </div>
</div>
<?php

?>
    <nav class="nav-collaps">
        <a href="dashboard" <?php if('dashboard'===$config['serverinfo']['currentpage']){echo "class=\"active\"";} ?> ><label class="fas fa-columns"></label><span>Dashboard</span></a>
        <a class="back" onclick="toggleNavBar()"><label class="fa fa-chevron-left"></label></a>
    </nav>
<?php?>
<main>
