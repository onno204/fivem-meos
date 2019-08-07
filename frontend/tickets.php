<?php
require_once "../config.php";
doesUserHavePermission("tickets", true, true);


require_once "../includes/header.php";
require_once "../includes/nav.php";
?>
<form id="ticketForm" attr-action="tickets" attr-type="createTicket">
    titel: <input type="text" name="title"> <br>
    omschrijving: <textarea name="description"></textarea> <br>
    <input type="button" name="submitbutton" value="Submit" onclick="requestForForm('ticketForm')">
    <div id="ticketFormResponseMessage"></div>
</form>


<div id="ticketviewer">
    <div class="ticketviewerTitle"></div>
    <div class="ticketviewerresponse">
        <div class="ticketviewerresponseleftinfo">
            <label>Onno</label><span>12-2-2019</span>
        </div>
        <div>dsajdklasjkdlasjklasjdkasjals & dasdasdasds</div>
    </div>
</div>
<br>
<br>
<br>
<form id="ticketresponseForm" attr-action="tickets" attr-type="reponsetoTicket">
    response: <textarea name="responsemessage"></textarea> <br>
    <input type="button" name="submitbutton" value="Submit" onclick="requestForForm('ticketresponseForm')">
    <input type="hidden" name="ticketid" value="0">
    <div id="ticketresponseFormResponseMessage"></div>
</form>


<?php
require_once "../includes/footer.php";
