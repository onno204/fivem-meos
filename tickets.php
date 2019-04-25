<?php 
require_once "config.php";
doesUserHavePermission("tickets", true, true);


require_once "includes/header.php";
require_once "includes/nav.php";
?>

<h1>tickets</h1>
<form id="ticketForm" attr-action="tickets" attr-type="createTicket">
    titel: <input type="text" name="title"> <br>
    omschrijving: <textarea name="description"></textarea> <br>
    <input type="button" name="submitbutton" value="Submit" onclick="requestForForm('ticketForm')">
    <div id="ticketFormResponseMessage"></div>
</form>


<table>
    <tr>
        <th>titel</th>
        <th>status</th>
    </tr>
    <?php
        //id, price, title, description, paid, datecreated, duedate, paidon, foruser, foruserid, createdby, products, suspended
        $stmt = $conn->prepare("SELECT * FROM tickets WHERE userid = ?");
        $stmt->bind_param("i", $_SESSION['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()){
            ?>
            <tr onclick="window.location.href = 'tickets?ticket='">
                <th><?php echo $data['id']; ?></th>
                <th><?php echo $data['price']; ?></th>
            </tr>
            <?php
        }
    ?>
</table>

<div id="ticketviewer">
	
</div>

<?php
require_once "includes/footer.php";