function requestForForm(formID){
    var data = {};
    var url = 'backend/'+$("#"+formID).attr('attr-action')+'.php';
    data['type'] = $("#"+formID).attr('attr-type');
    data['formid'] = formID;
    $("form#"+formID+" :input").each(function(){
        data[$(this).attr("name")] = $(this).val();
        $(this).attr('disabled', 'yes');
    });
    //$("form#"+formID).append("<div class='formOverlay'></div>");
    $.ajax({
        type: 'POST',
        url:url,
        data: data,
        success: function(result) { 
            console.log(result);
            handleRequestRepsone(result);
        }
    });
}

function handleRequestRepsone(result){
    var data = $.parseJSON(result);
    $("#"+data['formid']+"ResponseMessage").text(data['message']).css({"background-color": data['color']});
    $("form#"+data['formid']+" :input").each(function(){ $(this).removeAttr('disabled'); });
    if(data['action'] !== ""){
        switch(data['action']) {
            case "redirect":
                window.location.href = data['actiondata'];
                break;
            case "alert":
                alert(data['actiondata']);
                break;
            case "reload":
                location.reload();
                break;
            case "appendHTML":
                $("#"+data['actiondata']).appendHTML(data['actiondata2']);
                break;
            default:
                console.log("Unknown action: ", data['actiondata']);
                break;
        }
    }
}