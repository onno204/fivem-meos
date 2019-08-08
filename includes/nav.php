

<div class="kop-achtergrond">
  <img class= "politielogo1" src="assets/img/politielogo1.png" width="121" height="48">
  <a class="meos-text" style="color: white;"><strong>MEOS</strong></a>
</div>

<?php
// Only show nav if user is loggedin
if (isUserLoggedIn()) {
?>
  <nav>
    <ul>
      <li class="nav-item"><a href="dashboard" <?php if('dashboard'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>dashboard</a></li>
      <li class="nav-item"><a href="login?logout" <?php if('login'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>uitlogen</a></li>
    </ul>
  </nav>
<?php } ?>
<main>
