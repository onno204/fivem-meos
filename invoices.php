<?php 
require_once "config.php";
doesUserHavePermission("invoices", true, true);


require_once "includes/header.php";
require_once "includes/nav.php";
?>

<h1>facturen</h1>

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

<table>
    <tr>
        <th>id</th>
        <th>price</th>
        <th>title</th>
        <th>description</th>
        <th>paid</th>
        <th>datecreated</th>
        <th>duedate</th>
        <th>paidon</th>
        <th>foruser</th>
        <th>foruserid</th>
        <th>createdby</th>
        <th>products</th>
        <th>suspended</th>
    </tr>
    <?php
        //id, price, title, description, paid, datecreated, duedate, paidon, foruser, foruserid, createdby, products, suspended
        $stmt = $conn->prepare("SELECT * FROM invoices WHERE foruserid = ?");
        $stmt->bind_param("i", $_SESSION['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()){
            ?>
            <tr>
                <th><?php echo $data['id']; ?></th>
                <th><?php echo $data['price']; ?></th>
                <th><?php echo $data['title']; ?></th>
                <th><?php echo $data['description']; ?></th>
                <th><?php echo $data['paid']; ?></th>
                <th><?php echo $data['datecreated']; ?></th>
                <th><?php echo $data['duedate']; ?></th>
                <th><?php echo $data['paidon']; ?></th>
                <th><?php echo $data['foruser']; ?></th>
                <th><?php echo $data['foruserid']; ?></th>
                <th><?php echo $data['createdby']; ?></th>
                <th><?php echo $data['products']; ?></th>
                <th><?php echo $data['suspended']; ?></th>
            </tr>
            <?php
        }
    ?>
</table>

<?php
require_once "includes/footer.php";