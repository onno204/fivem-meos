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
function sendPostRequest(action, type, data){
  var url = 'backend/'+action+'.php';
  data['type'] = type;
  data['formid'] = "NOFORM";
  $.post(url, data, function(result){
    console.log(result);
    handleRequestRepsone(result);
  });
}

function handleRequestRepsone(data){
  $("form#"+data['formid']+" :input").each(function(){ $(this).removeAttr('disabled'); });
  for (var i=0; i < data.length; i++) {
    action = data[i];
    switch(action['action'].toLowerCase()) {
      case "redirect":
        window.location.href = action['actiondata'];
        break;
      case "alert":
        alert(action['actiondata']);
        break;
      case "settext":
        alert(action['actiondata']);
        break;
      case "reload":
        location.reload();
        break;
      case "setbgcolor":
        $("#"+action['actiondata']+"").css({"background-color": action['actiondata2']});
        break;
      case "unlockform":
        $("#"+action['actiondata']+" :input").each(function(){ $(this).removeAttr('disabled'); });
        break;
      case "setcolor":
        $("#"+action['actiondata']+"").css({"color": action['actiondata2']});
        break;
      case "sethtml":
        $("#"+action['actiondata']).html(action['actiondata2']);
        break;
      case "appendhtml":
        $("#"+action['actiondata']).appendHTML(action['actiondata2']);
        break;
      default:
        console.log("Unknown action: ", action['actiondata']);
        break;
    }
  }
}
