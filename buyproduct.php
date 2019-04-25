<?php 
require_once "config.php";
doesUserHavePermission("buyproduct", true, true);


require_once "includes/header.php";
require_once "includes/nav.php";
?>

<h1>Product bestellen</h1>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php

if(isset($_GET['productid'])){
    $stmt = $conn->prepare("SELECT * FROM products WHERE disabled != 1 AND id = ? LIMIT 1");
    $stmt->bind_param("i", intval($_GET['productid']));
    $stmt->execute();
    $result2 = $stmt->get_result();
    while ($data2 = $result2->fetch_assoc()){
        ?><h1>De factuur voor <?php echo $data2['title']; ?> staat in je facturen</h1><?php
        $stmt = $conn->prepare("INSERT INTO invoices (`price`, `title`, `description`, `paid`, `datecreated`, `duedate`, `paidon`, `foruser`, `foruserid`, `createdby`, `products`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ississssiss", $data2['price'], $data2['title'], $data2['description'], intval(0), strval(microtime(true)), strval(microtime(true)), intval(0), $_SESSION['username'], $_SESSION['id'], strval("system"), $data2['id']);
        $stmt->execute();
    }
}

$stmt = $conn->prepare("SELECT * FROM category WHERE disabled != 1");
$stmt->execute();
$result = $stmt->get_result();
while ($data = $result->fetch_assoc()){
    ?>
    <h1><?php echo $data['title']; ?></h1>
    <h4><?php echo $data['description']; ?></h4>
    
    <table id="producten">
        <tr>
            <th>Titel</th>
            <th>Omschrijving</th>
            <th>Prijs</th>
            <th></th>
        </tr>
        <?php
            $stmt = $conn->prepare("SELECT * FROM products WHERE disabled != 1 AND categoryid = ?");
            $stmt->bind_param("i", $data['id']);
            $stmt->execute();
            $result2 = $stmt->get_result();
            while ($data2 = $result2->fetch_assoc()){
                ?>
                <tr>
                    <th><?php echo $data2['title']; ?></th>
                    <th><?php echo $data2['description']; ?></th>
                    <th><?php echo $data2['price']; ?></th>
                    <th><a href="buyproduct?productid=<?php echo $data2['id']; ?>">Bestellen</a></th>
                </tr>
                <?php
            }
        ?>
    </table>
    
    <?php
    
    
}

require_once "includes/footer.php";





