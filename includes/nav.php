<nav>
    <ul>
        <li class="nav-item"><a href="dashboard" <?php if('dashboard'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>dashboard</a></li>
        <li class="nav-item"><a href="invoices" <?php if('invoices'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>invoices</a></li>
        <li class="nav-item"><a href="buyproduct" <?php if('buyproduct'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>buyproduct</a></li>
        <li class="nav-item"><a href="tickets" <?php if('tickets'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>tickets</a>
        	<ul class="drodownContent">
        		<li>Create a Ticket</li>
			    <?php
			        $stmt = $conn->prepare("SELECT * FROM tickets WHERE userid = ?");
			        $stmt->bind_param("i", $_SESSION['id']);
			        $stmt->execute();
			        $result = $stmt->get_result();
			        while ($data = $result->fetch_assoc()){
			            ?>
			            <li onclick="window.location.href = 'tickets?viewticket=<?php echo $data['id']; ?>'">
			                <?php echo $data['title']; ?>
			            </li>
			            <?php
			        }
			    ?>
			</ul>
        </li>
        <li class="nav-item"><a href="manage/products" <?php if('manage/products'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>manageproducts</a></li>
        <li class="nav-item"><a href="login?logout=1" <?php if('login'===$config['serverinfo']['currentpagelocation']){echo "class=\"active\"";} ?>>uitlogen</a></li>
    </ul>
</nav>
<main>
