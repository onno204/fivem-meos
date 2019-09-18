    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">


<div class="kop-achtergrond">
    <img class= "politielogo1" src="assets/img/politielogo1.png" width="70" height="70">
    <div class="navbar-nav">
        <a href="dashboard.php"><button class="button">Home</button></a>             
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
