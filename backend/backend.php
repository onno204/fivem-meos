<?php
require_once "../config.php";

function backendAuthCheck($perm, $formID){
    if(doesUserHavePermission($perm) == false){
        sendJsonResponse(403, 'red', $formID, 'No permissions');
    }
}

function sendJsonResponseAndDie($code, $color, $formID, $message, $action="", $actionData="", $actionData2=""){
    $returnMsg = array(
        'code' => $code,
        'color' => $color,
        'formid' => $formID,
        'message' => $message,
        'action' => $action,
        'actiondata' => $actionData,
        'actiondata2' => $actionData2,
    );
    http_response_code($returnMsg['code']);
    die(json_encode($returnMsg));
}