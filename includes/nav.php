
<?php if (isUserLoggedIn()) { // Only show nav if user is loggedin ?>
    <nav>
      <ul>
        <li class="nav-item"><a href="dashboard" <?php if('dashboard'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>dashboard</a></li>
        <li class="nav-item"><a href="invoices" <?php if('invoices'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>invoices</a></li>
        <li class="nav-item"><a href="buyproduct" <?php if('buyproduct'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>buyproduct</a></li>
        <li class="nav-item"><a href="manage/products" <?php if('manage/products'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>manageproducts</a></li>
        <li class="nav-item"><a href="login?logout" <?php if('login'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>uitlogen</a></li>
      </ul>
    </nav>
    <main>
<?php } ?>
