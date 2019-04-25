<nav>
    <ul>
        <li><a href="dashboard" <?php if('dashboard'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>dashboard</a></li>
        <li><a href="invoices" <?php if('invoices'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>invoices</a></li>
        <li><a href="buyproduct" <?php if('buyproduct'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>buyproduct</a></li>
        <li><a href="tickets" <?php if('tickets'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>tickets</a></li>
        <li><a href="manage/products" <?php if('manage/products'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>manageproducts</a></li>
        <li><a href="login?logout=1" <?php if('login'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>uitlogen</a></li>
    </ul>
</nav>
<main>