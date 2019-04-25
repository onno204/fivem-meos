<?php
require_once "backend.php";
$formID = $_POST['formid'];
backendAuthCheck("manageproducts", $formID);

if(isset($_POST['type']) && $_POST['type']=="addCategorie"){
    if(!isset($_POST['cattitle']) && !isset($_POST['catdescription'])){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }
    $enteredAll = true;
    $cattitle = $_POST['cattitle'];
    $catdiscription = $_POST['catdescription'];
    if(strlen($cattitle) <1 ){ $enteredAll = false; }
    if(strlen($catdiscription) <1 ){ $enteredAll = false; }
    if($enteredAll !== true){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }else {
        $stmt = $conn->prepare("INSERT INTO category (title, description) VALUES (?,?)");
        $stmt->bind_param("ss", $cattitle, $catdiscription);
        $stmt->execute();
        sendJsonResponseAndDie(200, 'green', $formID, 'Categorie Added', 'reload');
    }
}

if(isset($_POST['type']) && $_POST['type']=="addProduct"){
    if(!isset($_POST['prodtitle']) && !isset($_POST['proddiscription']) && !isset($_POST['prodprice']) && !isset($_POST['prodcategory'])){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }
    $enteredAll = true;
    $prodtitle = $_POST['prodtitle'];
    $proddiscription = $_POST['proddiscription'];
    $prodprice = $_POST['prodprice'];
    $prodcategory = $_POST['prodcategory'];
    if(strlen($prodtitle) <1 ){ $enteredAll = false; }
    if(strlen($proddiscription) <1 ){ $enteredAll = false; }
    if(strlen($prodprice) <1 ){ $enteredAll = false; }
    if(strlen($prodcategory) <1 ){ $enteredAll = false; }
    
    if($enteredAll !== true){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }else {
        $stmt = $conn->prepare("INSERT INTO products (title, description, price, categoryid) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $prodtitle, $proddiscription, $prodprice, $prodcategory);
        $stmt->execute();
        sendJsonResponseAndDie(200, 'green', $formID, 'Product Added', 'reload');
    }
}