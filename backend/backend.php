<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  die("This is the backend");
}
require_once "../config.php";

function backendAuthCheck($perm, $formID){
  if(doesUserHavePermission($perm, false, false, false) == false){
    sendJsonResponse(403, 'red', $formID, 'No permissions');
  }
}
function notAllFieldsFilledIn($formID=""){
  addToJsonResponse("setcolor", $formID."ResponseMessage", "orange");
  addToJsonResponse("sethtml", $formID."ResponseMessage", "Please enter something in all fields");
  addToJsonResponse("unlockform", $formID);
  sendJsonResponseAndDie();
}
$jsonResponse = array();
function addToJsonResponse($action="", $actionData="", $actionData2=""){
  global $jsonResponse;
  $newJsonResp = array(
    'action' => $action,
    'actiondata' => $actionData,
    'actiondata2' => $actionData2,
  );
  array_push($jsonResponse, $newJsonResp);
}
$executedSendResp = false;
function sendJsonResponseAndDie(){
  global $executedSendResp;
  if ($executedSendResp){ return false; }
  $executedSendResp = true;
  global $jsonResponse;
  header('Content-Type: application/json');
  die(json_encode($jsonResponse));
}
register_shutdown_function('sendJsonResponseAndDie');
