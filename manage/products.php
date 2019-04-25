<?php 
require_once "../config.php";
doesUserHavePermission("manageproducts", true, true);

 
require_once "../includes/header.php";
require_once "../includes/nav.php";

?>
<h1>manage products</h1>

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


<h1>Add Categorie</h1>
<form id="addCategorieForm" attr-action="manageProducts" attr-type="addCategorie">
    titel: <input type="text" name="cattitle"> <br>
    omschrijving: <input type="text" name="catdescription"> <br>
    <input type="button" name="submitbutton" value="Submit" onclick="requestForForm('addCategorieForm')">
    <div id="addCategorieFormResponseMessage"></div>
</form>

<table id="categorien">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>disabled</th>
    </tr>
    <?php
        $stmt = $conn->prepare("SELECT * FROM category WHERE disabled != 1");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()){
            ?>
            <tr>
                <th><?php echo $data['id']; ?></th>
                <th><?php echo $data['title']; ?></th>
                <th><?php echo $data['description']; ?></th>
                <th><?php echo $data['disabled']; ?></th>
            </tr>
            <?php
        }
    ?>
</table>

<br><br><br>
<h1>Add product</h1>
<form id="addProductForm" attr-action="manageProducts" attr-type="addProduct">
    titel: <input type="text" name="prodtitle"> <br>
    omschrijving: <input type="text" name="proddiscription"> <br>
    prijs: <input type="number" name="prodprice" step="0.01"> <br>
    categorieID: <input type="number" name="prodcategory"> <br>
    <input type="button" name="submitbutton" value="Submit" onclick="requestForForm('addProductForm')">
    <div id="addProductFormResponseMessage"></div>
</form>

<table id="producten">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>price</th>
        <th>categoryid</th>
        <th>disabled</th>
    </tr>
    <?php
        $stmt = $conn->prepare("SELECT * FROM products WHERE disabled != 1");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()){
            ?>
            <tr>
                <th><?php echo $data['id']; ?></th>
                <th><?php echo $data['title']; ?></th>
                <th><?php echo $data['description']; ?></th>
                <th><?php echo $data['price']; ?></th>
                <th><?php echo $data['categoryid']; ?></th>
                <th><?php echo $data['disabled']; ?></th>
            </tr>
            <?php
        }
    ?>
</table>

<?php
    require_once "../includes/footer.php";


