$(document).ready(function(){
  const formMaintainance = $("#addBusMaintainanceForm");
  formMaintainance.on("submit", function(e){
    e.preventDefault();
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
     //send to server
     $.post("../actions/actions",formMaintainance.serialize(),function(data){
setTimeout(()=> {
  $(".__loadingBtn__").html('<span class="fa fa-paper-plane"></span> Submit').attr("disabled",false);
  $("#server-response").html(data);
},500);
     })
  })
  //delete action
  const delete_btn = $(".loadingBtn__");
  delete_btn.on("click", function(){
    isTrue = confirm("Are you sure, You want to delete this record Permananetly?");
    if(isTrue){
let action = $(this).data("action");
let actionId = $(this).data("id");
$(".delete_btn_"+actionId).html('<img src="../assets/loaders/rolling_loader.svg" width="20">').attr("disabled",true);
//send delete request
$.post("../actions/delete_actions",{action:action,maintainId:actionId},(res)=>{
setTimeout(() => {
  $("#server-response").html(res);
}, 500);
})
    }else{
      return;
    }
  })

})