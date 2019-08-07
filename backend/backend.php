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
function setJsonResponseCode($code){
  http_response_code($code);
}
function sendJsonResponseAndDie(){
  global $jsonResponse;
  header('Content-Type: application/json');
  die(json_encode($jsonResponse));
}
register_shutdown_function('sendJsonResponseAndDie');
