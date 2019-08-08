<?php
require_once "backend.php";
$formID = $_POST['formid'];
backendAuthCheck("manageproducts", $formID);

if(isset($_POST['type']) && $_POST['type']=="addCategorie"){
  if(!isset($_POST['cattitle']) && !isset($_POST['catdescription'])){
    notAllFieldsFilledIn();
  }
  $enteredAll = true;
  $cattitle = $_POST['cattitle'];
  $catdiscription = $_POST['catdescription'];
  if(strlen($cattitle) <1 ){ $enteredAll = false; }
  if(strlen($catdiscription) <1 ){ $enteredAll = false; }
  if($enteredAll !== true){
    notAllFieldsFilledIn($formID);
  }else {
    $stmt = $conn->prepare("INSERT INTO category (title, description) VALUES (?,?)");
    $stmt->bind_param("ss", $cattitle, $catdiscription);
    $stmt->execute();
    addToJsonResponse("setbgcolor", $formID."ResponseMessage", "green");
    addToJsonResponse("sethtml", $formID."ResponseMessage", "Categorie addded");
    addToJsonResponse("unlockform", $formID);
    addToJsonResponse("reload");
  }
}

if(isset($_POST['type']) && $_POST['type']=="addProduct"){
  if(!isset($_POST['prodtitle']) && !isset($_POST['proddiscription']) && !isset($_POST['prodprice']) && !isset($_POST['prodcategory'])){
    notAllFieldsFilledIn($formID);
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
    notAllFieldsFilledIn($formID);
  }else {
    $stmt = $conn->prepare("INSERT INTO products (title, description, price, categoryid) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $prodtitle, $proddiscription, $prodprice, $prodcategory);
    $stmt->execute();
    addToJsonResponse("setbgcolor", $formID."ResponseMessage", "green");
    addToJsonResponse("sethtml", $formID."ResponseMessage", "Product addded");
    addToJsonResponse("unlockform", $formID);
    addToJsonResponse("reload");
  }
}
