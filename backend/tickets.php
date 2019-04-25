<?php
require_once "backend.php";
$formID = $_POST['formid'];
backendAuthCheck("tickets", $formID, true, true);

if(isset($_POST['type']) && $_POST['type']=="createTicket"){
    if(!isset($_POST['title']) && !isset($_POST['description'])){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }
    $enteredAll = true;
    $title = $_POST['title'];
    $description = $_POST['description'];
    if(strlen($title) <1 ){ $enteredAll = false; }
    if(strlen($description) <1 ){ $enteredAll = false; }
    
    if($enteredAll !== true){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }else {
        $stmt = $conn->prepare("INSERT INTO tickets (title, userid, status) VALUES (?,?,?)");
        $stmt->bind_param("sis", $title,$_SESSION['id'], "open");
        $stmt->execute();

        $stmt = $conn->prepare("SELECT * FROM tickets ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $ticketID = 0;
        while ($data = $result->fetch_assoc()){
            $ticketID = $data['id'];
        }
        $stmt = $conn->prepare("INSERT INTO ticketresponse (ticketID, message, date, userid) VALUES (?,?,?)");
        $stmt->bind_param("issi", $ticketID, $description, strval(microtime(true)), $title,$_SESSION['id']);
        $stmt->execute();

        sendJsonResponseAndDie(200, 'green', $formID, 'Ticket Created', "redirect", "ticketsID", "HTML");
    }
}
if(isset($_POST['type']) && $_POST['type']=="viewTicket"){
    if(!isset($_POST['id']){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }
    $enteredAll = true;
    $id = $_POST['id'];
    if(strlen($id) <1 ){ $enteredAll = false; }
    
    if($enteredAll !== true){
        sendJsonResponseAndDie(200, 'orange', $formID, 'Please enter something in all fields');
    }else {
        $stmt = $conn->prepare("SELECT * FROM tickets ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $ticketID = 0;
        while ($data = $result->fetch_assoc()){
            $ticketID = $data['id'];
        }
        $stmt = $conn->prepare("INSERT INTO ticketresponse (ticketID, message, date, userid) VALUES (?,?,?)");
        $stmt->bind_param("issi", $ticketID, $description, strval(microtime(true)), $title,$_SESSION['id']);
        $stmt->execute();
        
        sendJsonResponseAndDie(200, 'green', $formID, 'Ticket Created', "redirect", "ticketsID", "HTML");
    }
}